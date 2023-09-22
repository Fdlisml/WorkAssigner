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
      $projects = ProjectApi::getDataFromAPI($token);


      return view('page.admin.project', [
         'project' => $projects
      ]);
   }
   
   public function search()
   {
      session_start();
      $token = session('token');
      $projects = ProjectApi::getDataFromAPI($token);


      $keyword = request('keyword');
      $filteredProjects = array_filter($projects, function ($project) use ($keyword) {
         return strpos(strtolower($project['nama_project']), strtolower($keyword)) !== false;
      });

      return view('admin.index', [
         'project' => $filteredProjects,
         'slug' => 'style'
      ]);
   }

   /**
    * Display a listing of the resource.
    */

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
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required']
      ]);

      ProjectApi::postDataToAPI($data_project, $token);

      return redirect('page/admin/index')->with('success', 'Data project Berhasil di Tambah');
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

      $projects = ProjectApi::getDataFromAPI($token);

      usort($projects, function ($a, $b) {
         return $a['prioritas'] - $b['prioritas'];
      });

      return view('page.admin.index', [
         'project' => $projects,
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
         'deskripsi' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required']
      ]);

      ProjectApi::updateDataInAPI($id, $data_project, $token);

      return redirect('page/admin/index')->with('success', 'Data Project Berhasil di Update');
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
      return redirect('page/admin/index')->with('success', 'Data Project Berhasil di Hapus');
   }
}
