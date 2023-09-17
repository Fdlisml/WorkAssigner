<?php

namespace App\Http\Controllers;

use App\Models\TugasApi;
use App\Models\UserApi;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session_start();
        $token = session('token');
        return view('admin.user', [
            'user' => UserApi::getDataFromAPI($token)
        ]);
    }

   public function search()
   {
      session_start();
      $token = session('token');
      $users = UserApi::getDataFromAPI($token);

      $keyword = request('keyword');
      $filteredUser = array_filter($users, function ($user) use ($keyword) {
         return strpos(strtolower($user['name']), strtolower($keyword)) !== false;
      });

      return view('admin.user', [
         'user' => $filteredUser,
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
        // session_start();
        // $token = session('token');
        // $data_user = $request->validate([
        //     'name' => ['required'],
        //     'username' => ['required'],
        //     'password' => ['required'],
        //     'role' => ['required']
        // ]);

        // UserApi::postDataToAPI($data_user, $token);

        // return redirect('/admin/user')->with('success', 'Data User Berhasil di Tambah');
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
      return view('admin.user', [
         'user' => UserApi::getDataFromAPI($token),
         'userEdit' => UserApi::getDataByIdFromAPI($id, $token),
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
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
            if ($t['id_user'] === $id) {
                $tugasData[] = $t;
            }
        }

        if ($tugasData) {
            return back()->with('error', "User masih digunakan di menu Tugas");
        }

        UserApi::deleteDataInAPI($id, $token);
        return redirect('/admin/user')->with('success', 'Data User Berhasil di Hapus');
    }
}
