<?php

namespace App\Http\Controllers;

use App\Models\ProjectApi;
use App\Models\TugasApi;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectAdminController extends Controller
{
   /**
    * Display a listing of the resource.
    */

   public function index()
   {
      session_start();
      $token = session('token');
      return view('admin.index', [
         'project' => ProjectApi::getDataFromAPI($token)
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
      $data_project = $request->validate([
         'nama_project' => ['required'],
         'tugas' => ['required'],
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required']
      ]);

      ProjectApi::postDataToAPI($data_project, $token);

      return redirect('/admin/index')->with('success', 'Data project Berhasil di Tambah');
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
   public function edit(int $id)
   {
      session_start();
      $token = session('token');
      return view('admin.index', [
         'project' => ProjectApi::getDataFromAPI($token),
         'projectEdit' => ProjectApi::getDataByIdFromAPI($id, $token),
      ]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_project = $request->validate([
         'nama_project' => ['required'],
         'tugas' => ['required'],
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required']
      ]);

      ProjectApi::updateDataInAPI($id, $data_project, $token);

      return redirect('admin/index')->with('success', 'Data Project Berhasil di Update');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(int $id)
   {
      session_start();
      $token = session('token');

      $tugas = TugasApi::getDataFromAPI($token);

      $tugasData = [];
      foreach ($tugas as $t) {
         if ($t['id_project'] === $id) {
            $tugasData[] = $t;
         }
      }

      if ($tugasData) {
         return back()->with('error', "Project masih digunakan di menu Tugas");
      }

      ProjectApi::deleteDataInAPI($id, $token);
      return redirect('/admin/index')->with('success', 'Data Project Berhasil di Hapus');
   }
}
