<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use App\Models\ProyekApi;
use App\Models\PekerjaanApi;
use App\Models\PenggunaApi;

class LaporanAdminController extends Controller
{
    public function getLaporanData()
   {
      session_start();
      $token = session('token');
      $laporan = LaporanApi::getDataFromAPI($token);
      $pekerjaan = PekerjaanApi::getDataFromAPI($token);
      $user = PenggunaApi::getDataFromAPI($token);
      $proyek = ProyekApi::getDataFromAPI($token);

      $combinedData = [];
      foreach ($laporan as $l) {
         $id_pekerjaan = $l['id_pekerjaan'];
         $id_user = $l['id_user'];

         $pekerjaanData = [];
         foreach ($pekerjaan as $t) {
            if ($t['id'] === $id_pekerjaan) {
               $id_proyek = $t['id_proyek'];

               $proyekData = [];
               foreach ($proyek as $p){
                  if ($p['id'] === $id_proyek) {
                     $proyekData[0] = $p;
                  }
               }

               $pekerjaanData[0] = $t;
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
            'pekerjaan' => $pekerjaanData[0],
            'proyek' => $proyekData[0],
            'user' => $userData[0]
         ];
      }

      return [
         'laporanData' => $combinedData,
      ];
   }

   public function index()
   {
      $laporanData = $this->getLaporanData();
      return view('page.admin.laporan', $laporanData);
   }
     
   public function search()
   {
      $laporanData = $this->getLaporanData();

      $keyword = request('keyword');
      $filteredLaporans = array_filter($laporanData['laporanData'], function ($laporan) use ($keyword) {
         return strpos(strtolower($laporan['laporan']['nama_laporan']), strtolower($keyword)) !== false;
      });

      return view('page.admin.laporan', [
         'laporanData' => $filteredLaporans,
      ]);
   }
   
   public function destroy(int $id)
   {
      session_start();
      $token = session('token');
      LaporanApi::deleteDataInAPI($id, $token);
      return redirect('admin/laporan')->with('success', 'Data Laporan Berhasil di Hapus');
   }
}
