<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use Illuminate\Http\Request;

class LaporanUserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      session_start();
      $token = session('token');
      $laporan = LaporanApi::getDataFromAPI($token);
      $id_user = session('id');

      $laporanData = [];
      foreach ($laporan as $l) {
         if ($l['id_user'] === $id_user) {
            $laporanData[] = $l;
         }
      }

      return view('user.page.hasil', [
         'laporan' => $laporanData,
         'slug' => 'laporan'
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

      LaporanApi::postDataToAPI($data_laporan, $token);

      return redirect('/user/laporan')->with('success', 'Data Laporan Berhasil di Tambah');
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

      LaporanApi::updateDataInAPI($id, $data_laporan, $token);

      return redirect('/user/laporan')->with('success', 'Data Laporan Berhasil di Ubah');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      //
   }
}
