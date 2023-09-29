<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\UserApi;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
   public function getUserData($id = null)
   {
      session_start();
      $token = session('token');
      return [
         'user' => UserApi::getDataFromAPI($token),
         'userEdit' => UserApi::getDataByIdFromAPI($id, $token)
      ];
   }

   public function index()
   {
      $userData = $this->getUserData();
      return view('page.admin.user', $userData);
   }

   public function search()
   {
      $userData = $this->getUserData();

      $keyword = request('keyword');
      $filteredUser = array_filter($userData['user'], function ($user) use ($keyword) {
         return strpos(strtolower($user['name']), strtolower($keyword)) !== false;
      });

      return view('page.admin.user', [
         'user' => $filteredUser,
      ]);
   }

   public function edit(int $id)
   {
      $userData = $this->getUserData($id);
      return view('page.admin.user', [
         'user' => $userData['user'],
         'userEdit' => $userData['userEdit']
      ]);
   }

   public function update(Request $request, int $id)
   {
      session_start();
      $token = session('token');
      $data_user = $request->validate([
         'name' => ['required'],
         'username' => ['required'],
         'password' => ['required'],
         'role' => ['required']
      ]);

      UserApi::updateDataInAPI($id, $data_user, $token);

      return redirect('admin/user')->with('success', 'Data User Berhasil di Update');
   }

   public function destroy(int $id)
   {
      session_start();
      $token = session('token');

      $tugas = TugasApi::getDataFromAPI($token);

      $tugasData = [];
      foreach ($tugas as $t) {
         if ($t['id_user'] === $id) {
            $tugasData[] = $t;
         }
      }

      if ($tugasData) {
         return back()->with('error', "User masih digunakan di menu Tugas");
      }

      UserApi::deleteDataInAPI($id, $token);
      return redirect('admin/user')->with('success', 'Data User Berhasil di Hapus');
   }
}
