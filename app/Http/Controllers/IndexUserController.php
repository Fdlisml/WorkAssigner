<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\LaporanApi;
use App\Models\ProjectApi;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class IndexUserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      session_start();
      $token = session('token');
      $tugas = TugasApi::getDataFromAPI($token);
      $project = ProjectApi::getDataFromAPI($token);
      $id_user = session('id');

      $tugas_user = [];
      foreach ($tugas as $t) {
         if ($t['id_user'] === $id_user) {
            $tugas_user[] = $t;
         }

         $projectData = [];
         foreach ($project as $p) {
            if ($p['id'] === $t ['id_project']) {
               $projectData[0] = $p;
            }
         }
         $combinedData[] = [
            'tugas' => $t,
            'project' =>$projectData[0]
         ];
      }

      return view('page.user.index', [
         'tugas' => $tugas_user,
         'projectData' => $combinedData,
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
