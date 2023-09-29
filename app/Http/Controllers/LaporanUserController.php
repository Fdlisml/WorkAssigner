<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\LaporanApi;
use Illuminate\Http\Request;

class LaporanUserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
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
      $id_user = session('id');

      $laporanData = [];
      foreach ($laporan as $l) {
         if ($l['id_user'] === $id_user) {
            $laporanData[] = $l;
         }
      }

      $tugas_user = [];
      foreach ($tugas as $t) {
         if ($t['id_user'] === $id_user && $t['status'] == false) {
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

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    */
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
         'id_tugas' => ['required'],
         'id_user' => ['required']
      ]);

      if ($data_laporan['progres'] === "100") {
         $data_tugas['status'] = true;

         TugasApi::updateDataInAPI($request->id_tugas, $data_tugas, $token);
      }

      LaporanApi::postDataToAPI($data_laporan, $token);

      return redirect('user/laporan')->with('success', 'Data Laporan Berhasil di Tambah');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_laporan = $request->validate([
         'progres' => ['required']
      ]);

      if ($data_laporan['progres'] === "100") {
         $data_tugas['status'] = true;

         TugasApi::updateDataInAPI($request->id_tugas, $data_tugas, $token);
      }
      LaporanApi::updateDataInAPI($id, $data_laporan, $token);

      return redirect('user/laporan')->with('success', 'Data Laporan Berhasil di Ubah');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      //
   }
}
