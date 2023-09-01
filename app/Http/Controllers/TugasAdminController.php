<?php

namespace App\Http\Controllers;

use App\Models\ProjectApi;
use App\Models\TugasApi;
use App\Models\UserApi;
use Illuminate\Http\Request;

class TugasAdminController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $tugas = TugasApi::getDataFromAPI();
      $project = ProjectApi::getDataFromAPI();
      $user = UserApi::getDataFromAPI();

      $combinedData = [];

      foreach ($tugas as $t) {
         $id_project = $t['id_project'];
         $id_user = $t['id_user'];

         // Mencari data proyek berdasarkan id_project
         // $projectData = array_values(array_filter($project, function ($p) use ($id_project) {
         //    return $p['id'] === $id_project;
         // }));

         $projectData = [];
         foreach ($project as $p) {
            if ($p['id'] === $id_project) {
               $projectData[0] = $p;
            }
         }

         // Mencari data pengguna berdasarkan id_user
         // $userData = array_values(array_filter($user, function ($u) use ($id_user) {
         //    return $u['id'] === $id_user;
         // }));

         $userData = [];
         foreach ($user as $u) {
            if ($u['id'] === $id_user) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'tugas' => $t,
            'project' => $projectData[0], // Ambil indeks pertama karena array_filter mengembalikan array
            'user' => $userData[0], // Ambil indeks pertama karena array_filter mengembalikan array
         ];
      }

      return view('admin.tugas', [
         'tugasData' => $combinedData,
         'projectData' => $project,
         'userData' => $user
      ]);
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $data_tugas = $request->validate([
         'nama_tugas' => ['required'],
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required'],
         'id_project' => ['required'],
         'id_user' => ['required']
      ]);

      TugasApi::postDataToAPI($data_tugas);

      return redirect('/admin/tugas')->with('success', 'Data tugas Berhasil di Tambah');
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
