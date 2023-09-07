<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\LaporanApi;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class IndexUserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $tugas = TugasApi::getDataFromAPI();
      $id_user = session('id');
      
      $tugas_user = [];
      foreach ($tugas as $t) {
         if ($t['id_user'] === $id_user) {
            $tugas_user[] = $t;
         }
      }

      $randomTugas = Arr::random($tugas_user);
      return view('user.page.index', [
         'tugas' => $randomTugas,
         'slug' => 'index'
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
      $data_laporan = $request->validate([
         'nama_laporan' => ['required'],
         'deskripsi' => ['required'],
         'keluhan' => ['required'],
         'progres' => ['required'],
         'tgl_laporan' => ['required'],
         'id_tugas' => ['required'],
         'id_user' => ['required']
     ]);

     LaporanApi::postDataToAPI($data_laporan);

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
   public function update(Request $request, string $id)
   {
      $data_laporan = $request->validate([
         'progres' => ['required']
     ]);

     LaporanApi::updateDataInAPI($id, $data_laporan);

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
