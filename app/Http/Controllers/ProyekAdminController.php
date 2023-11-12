<?php

namespace App\Http\Controllers;

use App\Models\ProyekApi;
use App\Models\PekerjaanApi;
use Illuminate\Http\Request;

class ProyekAdminController extends Controller
{
   public function index()
   {
      session_start();
      $token = session('token');
      $proyeks = proyekApi::getDataFromAPI($token);

      return view('page.admin.proyek', [
         'proyek' => $proyeks
      ]);
   }
   
   public function search()
   {
      session_start();
      $token = session('token');
      $proyeks = ProyekApi::getDataFromAPI($token);

      $keyword = request('keyword');
      $filteredProyeks = array_filter($proyeks, function ($proyek) use ($keyword) {
         return strpos(strtolower($proyek['nama_proyek']), strtolower($keyword)) !== false;
      });

      return view('page.admin.proyek', [
         'proyek' => $filteredProyeks
      ]);
   }

   public function store(Request $request)
   {
      session_start();
      $token = session('token');
      $data_proyek = $request->validate([
         'nama_proyek' => ['required'],
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required']
      ]);

      ProyekApi::postDataToAPI($data_proyek, $token);

      return redirect('admin/index')->with('success', 'Data Proyek Berhasil di Tambah');
   }

   public function edit(int $id)
   {
      session_start();
      $token = session('token');
      $proyeks = ProyekApi::getDataFromAPI($token);

      return view('page.admin.proyek', [
         'proyek' => $proyeks,
         'proyekEdit' => proyekApi::getDataByIdFromAPI($id, $token),
      ]);
   }

   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_proyek = $request->validate([
         'nama_proyek' => ['required'],
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required']
      ]);

      ProyekApi::updateDataInAPI($id, $data_proyek, $token);

      return redirect('admin/index')->with('success', 'Data Proyek Berhasil di Update');
   }

   public function destroy(int $id)
   {
      session_start();
      $token = session('token');

      $pekerjaan = PekerjaanApi::getDataFromAPI($token);

      $pekerjaanData = [];
      foreach ($pekerjaan as $t) {
         if ($t['id_proyek'] === $id) {
            $pekerjaanData[] = $t;
         }
      }

      if ($pekerjaanData) {
         return back()->with('error', "Proyek ini masih digunakan di menu Pekerjaan");
      }

      ProyekApi::deleteDataInAPI($id, $token);
      return redirect('admin/index')->with('success', 'Data Proyek Berhasil di Hapus');
   }
}
