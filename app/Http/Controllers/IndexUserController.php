<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\LaporanApi;
use App\Models\ProjectApi;
use Illuminate\Http\Request;

class IndexUserController extends Controller
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

   public function getTugasData()
   {
      session_start();
      $token = session('token');
      $tugas = TugasApi::getDataFromAPI($token);
      $project = ProjectApi::getDataFromAPI($token);
      $laporan = LaporanApi::getDataFromAPI($token);
      $id_user = session('id');

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

      $combinedData = [];
      foreach ($tugas_user as $t) {
         $projectData = [];
         foreach ($project as $p) {
            if ($p['id'] === $t['id_project']) {
               $projectData[] = $p;
            }
         }
         $laporanData = [];
         foreach ($laporan as $l) {
            if ($l['id'] === $t['id']) {
               $laporanData[] = $l;
            }
         }
         $projectData = !empty($projectData) ? $projectData[0] : null;
         $laporanData = !empty($laporanData) ? $laporanData[0] : null;
         $combinedData[] = [
            'tugas' => $t,
            'project' => $projectData,
            'laporan' => $laporanData
         ];
      }

      return [
         'jobsToday' => $combinedData,
         'project' => $project,
         'totalJobs' => $totalJobs,
         'totalJobsPrioritas' => $totalJobsWithPrioritas
      ];
   }

   public function index()
   {
      $tugasData = $this->getTugasData();
      return view('page.user.index', $tugasData);
   }

   public function search()
   {
      $tugasData = $this->getTugasData();

      $keyword = request('keyword');
      $lowercaseKeyword = strtolower($keyword);

      $filteredTugas = array_filter($tugasData['jobsToday'], function ($tugas) use ($lowercaseKeyword) {
         return strtolower($tugas['project']['nama_project']) === $lowercaseKeyword || strpos(strtolower($tugas['tugas']['nama_tugas']), $lowercaseKeyword) !== false;
      });

      session(['search_keyword' => $lowercaseKeyword]);

      return view('page.user.index', [
         'jobsToday' => $filteredTugas,
         'project' => $tugasData['project'],
         'totalJobs' => $tugasData['totalJobs'],
         'totalJobsPrioritas' => $tugasData['totalJobsPrioritas']
      ]);
   }


   public function filter()
{
   $tugasData = $this->getTugasData();

   // Mendapatkan keyword dari request
   $keyword = request('keyword');

   if ($keyword === "Deadline") {
      usort($tugasData['jobsToday'], function ($a, $b) {
         return strcmp($b['tugas']['tgl_selesai'], $a['tugas']['tgl_selesai']);
      });
   } elseif ($keyword === "Prioritas") {
      usort($tugasData['jobsToday'], function ($a, $b) {
         return $a['tugas']['prioritas'] - $b['tugas']['prioritas'];
      });
   }

   $searchKeyword = session('search_keyword');

   if (!empty($searchKeyword)) {
      $filteredTugas = array_filter($tugasData['jobsToday'], function ($tugas) use ($searchKeyword) {
         return strtolower($tugas['project']['nama_project']) === $searchKeyword || strpos(strtolower($tugas['tugas']['nama_tugas']), $searchKeyword) !== false;
      });

      return view('page.user.index', [
         'jobsToday' => $filteredTugas,
         'project' => $tugasData['project'],
         'totalJobs' => $tugasData['totalJobs'],
         'totalJobsPrioritas' => $tugasData['totalJobsPrioritas']
      ]);
   }

   return view('page.user.index', [
      'jobsToday' => $tugasData['jobsToday'],
      'project' => $tugasData['project'],
      'totalJobs' => $tugasData['totalJobs'],
      'totalJobsPrioritas' => $tugasData['totalJobsPrioritas']
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
      //
   }
}
