<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\LaporanApi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanUserController extends Controller
{
   public function tugasPrioritas($prioritas, $tugas)
   {
      $tugasPrioritas = [];
      foreach ($tugas as $t) {
         if ($t['prioritas'] === $prioritas) {
            $tugasPrioritas[] = $t;
         }
      }
      return count($tugasPrioritas);
   }

   public function getLaporanData()
   {
      session_start();
      $token = session('token');
      $laporan = LaporanApi::getDataFromAPI($token);
      $tugas = TugasApi::getDataFromAPI($token);
      $name = session('name');

      $laporanData = [];
      foreach ($laporan as $l) {
         if ($l['name'] === $name) {
            $laporanData[] = $l;
         }
      }

      $tugas_user = [];
      foreach ($tugas as $t) {
         if ($t['name'] === $name && $t['status'] == false) {
            $tugas_user[] = $t;
         }
      }

      $totalJobs = count($tugas_user);
      $totalJobsWithPrioritas = [
         '1' => $this->tugasPrioritas('1', $tugas_user),
         '2' => $this->tugasPrioritas('2', $tugas_user),
         '3' => $this->tugasPrioritas('3', $tugas_user)
      ];

      return [
         'laporan' => $laporanData,
         'totalJobs' => $totalJobs,
         'totalJobsPrioritas' => $totalJobsWithPrioritas
      ];
   }

   public function index()
   {
      $laporanData = $this->getLaporanData();
      return view('page.user.hasil', $laporanData);
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
         'id_tugas' => ['required'],
         'id_user' => ['required']
      ]);

      $data_laporan['tgl_laporan'] = Carbon::now()->format('Y-m-d');

      if ($data_laporan['progres'] === "100") {
         $data_tugas['status'] = true;

         TugasApi::updateDataInAPI($request->id_tugas, $data_tugas, $token);
      }

      LaporanApi::postDataToAPI($data_laporan, $token);

      return redirect('user/laporan')->with('success', 'Data Laporan Berhasil di Tambah');
   }

   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $tugas = TugasApi::getDataFromAPI($token);

      $data_laporan = $request->validate([
         'progres' => ['required']
      ]);

      if ($data_laporan['progres'] === "100") {

         $nama_tugas = $request->nama_tugas;

         $tugasData = array_filter($tugas, function($t) use ($nama_tugas) {
             return $t['nama_tugas'] === $nama_tugas;
         });
         
         $tugasData = reset($tugasData);
         $data_tugas['status'] = true;
         $id_tugas = $tugasData['id'];
         TugasApi::updateDataInAPI($id_tugas, $data_tugas, $token);
      }

      LaporanApi::updateDataInAPI($id, $data_laporan, $token);

      return redirect('user/laporan')->with('success', 'Data Laporan Berhasil di Ubah');
   }
}
