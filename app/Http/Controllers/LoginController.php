<?php

namespace App\Http\Controllers;

use App\Models\UserApi;
use App\Models\LoginApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      return view('login');
   }

   public function login(Request $request)
   {
      $data_login = $request->validate([
         'username' => ['required'],
         'password' => ['required'],
      ]);

      $user = LoginApi::login($data_login);

      $response_data = json_decode($user, true);

      $success = $response_data['success'];
      $message = $response_data['message'];

      if ($success) {
         $id = $response_data['data']['id'];
         $token = $response_data['data']['token'];
         $name = $response_data['data']['name'];
         $username = $response_data['data']['username'];
         $role = $response_data['data']['role'];
         session([
            'id' => $id,
            'token' => $token,
            'name' => $name,
            'username' => $username,
            'role' => $role
         ]);
      } else {
         echo "Error: " . $message;
      }

      $page = ($role === "user") ? "/user/index" : "/admin/index";
      return redirect($page);
   }

   public function logout(Request $request)
   {
      $request->session()->invalidate();
      return redirect('/login');
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
