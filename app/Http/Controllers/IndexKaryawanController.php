<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanApi;
use App\Models\LaporanApi;
use App\Models\ProyekApi;
use App\Models\PenggunaApi;

class IndexKaryawanController extends Controller
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

   public function getPekerjaanData()
   {
      session_start();
      $token = session('token');
      $id_user = session('id');
      $pekerjaan = PekerjaanApi::getDataFromAPI($token);
      $proyek = ProyekApi::getDataFromAPI($token);
      $user = PenggunaApi::getDataByIdFromAPI($id_user, $token);
      $laporan = LaporanApi::getDataFromAPI($token);

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

      $combinedData = [];
      foreach ($pekerjaan_user as $t) {
         $proyekData = [];
         foreach ($proyek as $p) {
            if ($p['id'] === $t['id_proyek']) {
               $proyekData[] = $p;
            }
         }
         $laporanData = [];
         foreach ($laporan as $l) {
            if ($l['id_pekerjaan'] === $t['id']) {
               $laporanData[] = $l;
            }
         }
         $proyekData = !empty($proyekData) ? $proyekData[0] : null;
         $laporanData = !empty($laporanData) ? $laporanData[0] : null;

         $combinedData[] = [
            'pekerjaan' => $t,
            'proyek' => $proyekData,
            'user' => $user,
            'laporan' => $laporanData
         ];
      }

      return [
         'jobsToday' => $combinedData,
         'proyek' => $proyek,
         'totalJobs' => $totalJobs,
         'totalJobsPrioritas' => $totalJobsWithPrioritas
      ];
   }

   public function index()
   {
      $pekerjaanData = $this->getPekerjaanData();
      return view('page.karyawan.index', $pekerjaanData);
   }

   public function filter()
   {
      $pekerjaanData = $this->getPekerjaanData();
      $filter = request('prioritas');
      $filteredData = array_filter($pekerjaanData['jobsToday'], function ($item) use ($filter) {
         return $item['pekerjaan']['prioritas'] == $filter;
      });
      return view('page.karyawan.index', [
         'jobsToday' => $filteredData,
         'proyek' => $pekerjaanData['proyek'],
         'totalJobs' => $pekerjaanData['totalJobs'],
         'totalJobsPrioritas' => $pekerjaanData['totalJobsPrioritas']
      ]);
   }
}
