<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use App\Models\PekerjaanApi;
use App\Models\ProyekApi;
use App\Models\PenggunaApi;
use Illuminate\Http\Request;

class PekerjaanAdminController extends Controller
{
   public function getPekerjaanData()
   {
      session_start();
      $token = session('token');
      $pekerjaan = PekerjaanApi::getDataFromAPI($token);
      $proyek = ProyekApi::getDataFromAPI($token);
      $user = PenggunaApi::getDataFromAPI($token);

      $combinedData = [];
      foreach ($pekerjaan as $t) {
         $id_proyek = $t['id_proyek'];
         $id_user = $t['id_user'];

         $proyekData = [];
         foreach ($proyek as $p) {
            if ($p['id'] === $id_proyek) {
               $proyekData[0] = $p;
            }
         }

         $userData = [];
         foreach ($user as $u) {
            if ($u['id'] === $id_user) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'pekerjaan' => $t,
            'proyek' => $proyekData[0],
            'user' => $userData[0],
         ];
         
         usort($combinedData, function ($a, $b) {
            return $a['pekerjaan']['prioritas'] - $b['pekerjaan']['prioritas'];
         });
      }

      return [
         'pekerjaanData' => $combinedData,
         'proyekData' => $proyek,
         'userData' => $user
      ];
   }

   public function index()
   {
      $pekerjaanData = $this->getPekerjaanData();
      return view('page.admin.pekerjaan', $pekerjaanData);
   }

   public function search()
   {
      $pekerjaanData = $this->getPekerjaanData();

      $keyword = request('keyword');
      $filteredPekerjaan = array_filter($pekerjaanData['pekerjaanData'], function ($t) use ($keyword) {
         return strpos(strtolower($t['pekerjaan']['nama_pekerjaan']), strtolower($keyword)) !== false;
      });

      return view('page.admin.Pekerjaan', [
         'pekerjaanData' => $filteredPekerjaan,
         'proyekData' => $pekerjaanData['proyekData'],
         'userData' => $pekerjaanData['userData']
      ]);
   }

   public function store(Request $request)
   {
      session_start();
      $token = session('token');
      $data_pekerjaan = $request->validate([
         'nama_pekerjaan' => ['required'],
         'deskripsi' => ['required'],
         'prioritas' => ['required'],
         'tenggat' => ['required'],
         'id_proyek' => ['required'],
         'id_user' => ['required']
      ]);
      $data_pekerjaan['status'] = false;

      PekerjaanApi::postDataToAPI($data_pekerjaan, $token);

      return redirect('admin/pekerjaan')->with('success', 'Data Pekerjaan Berhasil di Tambah');
   }

   public function create_proyek_selected(int $id_proyek)
   {
      $token = session('token');
      $pekerjaanData = $this->getPekerjaanData();

      return view('page.admin.pekerjaan', [
         'pekerjaanData' => $pekerjaanData['pekerjaanData'],
         'proyekData' => $pekerjaanData['proyekData'],
         'userData' => $pekerjaanData['userData'],
         'pekerjaanDataF' => ProyekApi::getDataByIdFromAPI($id_proyek, $token)
      ]);
   }

   public function edit(int $id)
   {
      $token = session('token');
      $pekerjaanData = $this->getPekerjaanData();

      return view('page.admin.pekerjaan', [
         'pekerjaanData' => $pekerjaanData['pekerjaanData'],
         'proyekData' => $pekerjaanData['proyekData'],
         'userData' => $pekerjaanData['userData'],
         'pekerjaanDataF' => PekerjaanApi::getDataByIdFromAPI($id, $token)
      ]);
   }

   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_pekerjaan = $request->validate([
         'nama_pekerjaan' => ['required'],
         'deskripsi' => ['required'],
         'prioritas' => ['required'],
         'tenggat' => ['required'],
         'id_proyek' => ['required'],
         'id_user' => ['required']
      ]);

      PekerjaanApi::updateDataInAPI($id, $data_pekerjaan, $token);

      return redirect('admin/pekerjaan')->with('success', 'Data Pekerjaan Berhasil di Update');
   }

   public function destroy(int $id)
   {
      session_start();
      $token = session('token');
      $laporan = LaporanApi::getDataFromAPI($token);

      $laporanData = [];
      foreach ($laporan as $l) {
         if ($l['id_pekerjaan'] === $id) {
            $laporanData[] = $l;
         }
      }

      if ($laporanData) {
         return back()->with('error', "Pekerjaan masih digunakan di menu Laporan");
      }

      PekerjaanApi::deleteDataInAPI($id, $token);
      return redirect('admin/pekerjaan')->with('success', 'Data Pekerjaan Berhasil di Hapus');
   }
}
