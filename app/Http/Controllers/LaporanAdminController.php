<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use App\Models\TugasApi;
use App\Models\UserApi;
use Illuminate\Http\Request;

class LaporanAdminController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $laporan = LaporanApi::getDataFromAPI();
      $tugas = TugasApi::getDataFromAPI();
      $user = UserApi::getDataFromAPI();

      $combinedData = [];

      foreach ($laporan as $l) {
         $id_tugas = $l['id_tugas'];
         $id_user = $l['id_user'];

         $tugasData = [];
         foreach ($tugas as $t) {
            if ($t['id'] === $id_tugas) {
               $tugasData[0] = $t;
            }
         }

         $userData = [];
         foreach ($user as $u) {
            if ($u['id'] === $id_user) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'laporan' => $l,
            'tugas' => $tugasData[0],
            'user' => $userData[0],
         ];
      }
      return view('admin.laporan', [
         'laporanData' => $combinedData,
      ]);
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
      //
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
   public function update(Request $request, string $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      LaporanApi::deleteDataInAPI($id);
      return redirect('/admin/laporan')->with('success', 'Data Laporan Berhasil di Hapus');
   }
}
