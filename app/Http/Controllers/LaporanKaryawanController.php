<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanApi;
use App\Models\LaporanApi;
use Illuminate\Http\Request;

class LaporanKaryawanController extends Controller
{
   public function pekerjaanPrioritas($prioritas, $pekerjaan)
   {
      $pekerjaanPrioritas = [];
      foreach ($pekerjaan as $t) {
         if ($t['prioritas'] === $prioritas) {
            $pekerjaanPrioritas[] = $t;
         }
      }
      return count($pekerjaanPrioritas);
   }

   public function getLaporanData()
   {
      session_start();
      $token = session('token');
      $laporan = LaporanApi::getDataFromAPI($token);
      $pekerjaan = PekerjaanApi::getDataFromAPI($token);
      $id_user = session('id');

      $laporanData = [];
      foreach ($laporan as $l) {
         if ($l['id_user'] === $id_user) {
            $laporanData[] = $l;
         }
      }

      $pekerjaan_user = [];
      foreach ($pekerjaan as $t) {
         if ($t['id_user'] === $id_user && $t['status'] == false) {
            $pekerjaan_user[] = $t;
         }
      }

      $totalJobs = count($pekerjaan_user);
      $totalJobsWithPrioritas = [
         '1' => $this->pekerjaanPrioritas('1', $pekerjaan_user),
         '2' => $this->pekerjaanPrioritas('2', $pekerjaan_user),
         '3' => $this->pekerjaanPrioritas('3', $pekerjaan_user)
      ];

      return [
         'laporan' => $laporanData,
         'totalJobs' => $totalJobs,
         'totalJobsPrioritas' => $totalJobsWithPrioritas,
         'routeDT' => 'dataLaporan'
      ];
   }

   public function index()
   {
      $laporanData = $this->getLaporanData();
      return view('page.karyawan.hasil', $laporanData);
   }

   public function data()
   {
      $laporanData = $this->getLaporanData();
      return [
         "draw" => 1,
         "recordsTotal" => 20,
         "recordsFiltered" => 20,
         "data" => $laporanData['laporan']
      ];
   }

   public function store(Request $request)
   {
      session_start();
      $token = session('token');
      $data_laporan = $request->validate([
         'nama_laporan' => ['required'],
         'deskripsi' => ['required'],
         'keluhan' => ['required'],
         'progres' => ['required'],
         'tgl_laporan' => ['required'],
         'id_pekerjaan' => ['required'],
         'id_user' => ['required']
      ]);

      if ($data_laporan['progres'] === "100") {
         $data_pekerjaan['status'] = true;

         PekerjaanApi::updateDataInAPI($request->id_pekerjaan, $data_pekerjaan, $token);
      }

      LaporanApi::postDataToAPI($data_laporan, $token);

      return redirect('karyawan/laporan')->with('success', 'Data Laporan Berhasil di Tambah');
   }
   
   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_laporan = $request->validate([
         'progres' => ['required']
      ]);

      if ($data_laporan['progres'] === "100") {
         $data_pekerjaan['status'] = true;

         PekerjaanApi::updateDataInAPI($request->id_pekerjaan, $data_pekerjaan, $token);
      }
      LaporanApi::updateDataInAPI($id, $data_laporan, $token);

      return redirect('karyawan/laporan')->with('success', 'Data Laporan Berhasil di Ubah');
   }
}
