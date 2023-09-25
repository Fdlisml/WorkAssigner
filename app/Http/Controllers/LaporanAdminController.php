<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use App\Models\ProjectApi;
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
      session_start();
      $token = session('token');
      $laporans = LaporanApi::getDataFromAPI($token);
      $tugas = TugasApi::getDataFromAPI($token);
      $users = UserApi::getDataFromAPI($token);
      $projects = ProjectApi::getDataFromAPI($token);

      $combinedData = [];
      foreach ($laporans as $l) {
         $id_tugas = $l['id_tugas'];
         $id_users = $l['id_user'];

         $tugasData = [];
         foreach ($tugas as $t) {
            if ($t['id'] === $id_tugas) {
               $id_project = $t['id_project'];

               $projectData = [];
               foreach ($projects as $p){
                  if ($p['id'] === $id_project) {
                     $projectData[0] = $p;
                  }
               }

               $tugasData[0] = $t;
            }
         }

         $userData = [];
         foreach ($users as $u) {
            if ($u['id'] === $id_users) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'laporan' => $l,
            'tugas' => $tugasData[0],
            'project' => $projectData[0],
            'user' => $userData[0]
         ];
      }

      return view('page.admin.laporan', [
         'laporanData' => $combinedData,
      ]);
   }
     
   public function search()
   {
      session_start();
      $token = session('token');
      $laporans = LaporanApi::getDataFromAPI($token);
      $tugas = TugasApi::getDataFromAPI($token);
      $users = UserApi::getDataFromAPI($token);
      $projects = ProjectApi::getDataFromAPI($token);

      $laporanData = [];
      foreach ($laporans as $l) {
         $id_tugas = $l['id_tugas'];
         $id_users = $l['id_user'];

         $tugasData = [];
         foreach ($tugas as $t) {
            if ($t['id'] === $id_tugas) {
               $id_project = $t['id_project'];

               $projectData = [];
               foreach ($projects as $p){
                  if ($p['id'] === $id_project) {
                     $projectData[0] = $p;
                  }
               }

               $tugasData[0] = $t;
            }
         }

         $userData = [];
         foreach ($users as $u) {
            if ($u['id'] === $id_users) {
               $userData[0] = $u;
            }
         }

         $laporanData[] = [
            'laporan' => $l,
            'tugas' => $tugasData[0],
            'project' => $projectData[0],
            'user' => $userData[0]
         ];
      }

      $keyword = request('keyword');
      $filteredLaporans = array_filter($laporanData, function ($laporan) use ($keyword) {
         return strpos(strtolower($laporan['laporan']['nama_laporan']), strtolower($keyword)) !== false;
      });

      return view('page.admin.laporan', [
         'laporanData' => $filteredLaporans,
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
   public function destroy(int $id)
   {
      session_start();
      $token = session('token');
      LaporanApi::deleteDataInAPI($id, $token);
      return redirect('admin/laporan')->with('success', 'Data Laporan Berhasil di Hapus');
   }
}
