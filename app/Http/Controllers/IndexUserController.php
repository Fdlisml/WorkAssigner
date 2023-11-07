<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use App\Models\TugasApi;
use App\Models\ProjectApi;
use Illuminate\Http\Request;

class IndexUserController extends Controller
{
   public function tugasPrioritas($prioritas, $tugas)
   {
      $tugasPrioritas = [];
      foreach ($tugas as $t) {
         if ($t['tugas']['prioritas'] === $prioritas) {
            $tugasPrioritas[] = $t;
         }
      }
      return count($tugasPrioritas);
   }

   public function getTugasData()
   {
      session_start();
      $token = session('token');
      $project = ProjectApi::getDataFromAPI($token);
      $tugas = TugasApi::getDataFromAPI($token);
      $laporan = LaporanApi::getDataFromAPI($token);
      $name = session('name');

      $tugas_user = [];
      foreach ($tugas as $t) {
         if ($t['name'] === $name && $t['status'] == false) {
            $laporanData = [];
            foreach ($laporan as $l){
               if($l['nama_tugas'] === $t['nama_tugas']){
                  $laporanData[] = $l;
               }
            }
            $laporanData = !empty($laporanData) ? $laporanData[0] : null;

            $tugas_user[] = [
               'tugas' => $t,
               'laporan' => $laporanData
            ];
         }
      }

      $totalJobs = count($tugas_user);
      $totalJobsWithPrioritas = [
         '1' => $this->tugasPrioritas('1', $tugas_user),
         '2' => $this->tugasPrioritas('2', $tugas_user),
         '3' => $this->tugasPrioritas('3', $tugas_user)
      ];

      return [
         'jobsToday' => $tugas_user,
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
      $filter = request('prioritas');
      $filteredData = array_filter($tugasData['jobsToday'], function ($item) use ($filter) {
         return $item['tugas']['prioritas'] == $filter;
      });
      return view('page.user.index',[
         'jobsToday' => $filteredData,
         'project' => $tugasData['project'],
         'totalJobs' => $tugasData['totalJobs'],
         'totalJobsPrioritas' => $tugasData['totalJobsPrioritas']
      ]);
   }
}
