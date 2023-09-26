<?php

namespace App\Http\Controllers;

use App\Models\LaporanApi;
use App\Models\TugasApi;
use App\Models\ProjectApi;
use App\Models\UserApi;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class TugasAdminController extends Controller
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
      $user = UserApi::getDataFromAPI($token);

      $combinedData = [];
      foreach ($tugas as $t) {
         $id_project = $t['id_project'];
         $id_user = $t['id_user'];

         $projectData = [];
         foreach ($project as $p) {
            if ($p['id'] === $id_project) {
               $projectData[0] = $p;
            }
         }

         $userData = [];
         foreach ($user as $u) {
            if ($u['id'] === $id_user) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'tugas' => $t,
            'project' => $projectData[0],
            'user' => $userData[0],
         ];

         usort($combinedData, function ($a, $b) {
            return $a['tugas']['prioritas'] - $b['tugas']['prioritas'];
         });
      }

      return view('page.admin.tugas', [
         'tugasData' => $combinedData,
         'projectData' => $project,
         'userData' => $user
      ]);
   }

   public function search()
   {
      session_start();
      $token = session('token');
      $tugas = TugasApi::getDataFromAPI($token);
      $project = ProjectApi::getDataFromAPI($token);
      $user = UserApi::getDataFromAPI($token);

      usort($tugas, function ($a, $b) {
         return $a['prioritas'] - $b['prioritas'];
      });

      $tugasData = [];
      foreach ($tugas as $t) {
         $id_project = $t['id_project'];
         $id_user = $t['id_user'];

         $projectData = [];
         foreach ($project as $p) {
            if ($p['id'] === $id_project) {
               $projectData[0] = $p;
            }
         }

         $userData = [];
         foreach ($user as $u) {
            if ($u['id'] === $id_user) {
               $userData[0] = $u;
            }
         }

         $tugasData[] = [
            'tugas' => $t,
            'project' => $projectData[0],
            'user' => $userData[0],
         ];
      }

      $keyword = request('keyword');
      $filteredTugas = array_filter($tugasData, function ($t) use ($keyword) {
         return strpos(strtolower($t['tugas']['nama_tugas']), strtolower($keyword)) !== false;
      });

      return view('page.admin.tugas', [
         'tugasData' => $filteredTugas,
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
      session_start();
      $token = session('token');
      $data_tugas = $request->validate([
         'nama_tugas' => ['required'],
         'deskripsi' => ['required'],
         'prioritas' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required'],
         'id_project' => ['required'],
         'id_user' => ['required']
      ]);
      $data_tugas['status'] = false;

      TugasApi::postDataToAPI($data_tugas, $token);

      return redirect('admin/tugas')->with('success', 'Data tugas Berhasil di Tambah');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      //
   }

   public function create_project_selected(int $id_project)
   {
      session_start();
      $token = session('token');
      $tugas = TugasApi::getDataFromAPI($token);
      $projects = ProjectApi::getDataFromAPI($token);
      $users = UserApi::getDataFromAPI($token);

      $combinedData = [];
      foreach ($tugas as $t) {
         $id_projects = $t['id_project'];
         $id_users = $t['id_user'];

         $projectData = [];
         foreach ($projects as $p) {
            if ($p['id'] === $id_projects) {
               $projectData[0] = $p;
            }
         }

         $userData = [];
         foreach ($users as $u) {
            if ($u['id'] === $id_users) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'tugas' => $t,
            'project' => $projectData[0],
            'user' => $userData[0],
         ];
      }

      usort($tugas, function ($a, $b) {
         return $a['prioritas'] - $b['prioritas'];
      });

      return view('page.admin.tugas', [
         'tugasData' => $combinedData,
         'projectData' => $projects,
         'userData' => $users,
         'tugasDataF' => ProjectApi::getDataByIdFromAPI($id_project, $token)
      ]);
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(int $id)
   {
      session_start();
      $token = session('token');
      $tugas = TugasApi::getDataFromAPI($token);
      $projects = ProjectApi::getDataFromAPI($token);
      $users = UserApi::getDataFromAPI($token);

      usort($tugas, function ($a, $b) {
         return $a['prioritas'] - $b['prioritas'];
      });

      $combinedData = [];
      foreach ($tugas as $t) {
         $id_projects = $t['id_project'];
         $id_users = $t['id_user'];

         $projectData = [];
         foreach ($projects as $p) {
            if ($p['id'] === $id_projects) {
               $projectData[0] = $p;
            }
         }

         $userData = [];
         foreach ($users as $u) {
            if ($u['id'] === $id_users) {
               $userData[0] = $u;
            }
         }

         $combinedData[] = [
            'tugas' => $t,
            'project' => $projectData[0],
            'user' => $userData[0],
         ];
      }

      return view('page.admin.tugas', [
         'tugasData' => $combinedData,
         'projectData' => $projects,
         'userData' => $users,
         'tugasDataF' => TugasApi::getDataByIdFromAPI($id, $token)
      ]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_tugas = $request->validate([
         'nama_tugas' => ['required'],
         'deskripsi' => ['required'],
         'prioritas' => ['required'],
         'tgl_mulai' => ['required'],
         'tgl_selesai' => ['required'],
         'id_project' => ['required'],
         'id_user' => ['required']
      ]);

      TugasApi::updateDataInAPI($id, $data_tugas, $token);

      return redirect('admin/tugas')->with('success', 'Data Tugas Berhasil di Update');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(int $id)
   {
      session_start();
      $token = session('token');
      $laporan = LaporanApi::getDataFromAPI($token);

      $laporanData = [];
      foreach ($laporan as $l) {
         if ($l['id_tugas'] === $id) {
            $laporanData[] = $l;
         }
      }

      if ($laporanData) {
         return back()->with('error', "Tugas masih digunakan di menu Laporan");
      }

      TugasApi::deleteDataInAPI($id, $token);
      return redirect('admin/tugas')->with('success', 'Data Tugas Berhasil di Hapus');
   }
}
