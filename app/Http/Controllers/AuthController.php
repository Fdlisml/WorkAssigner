<?php

namespace App\Http\Controllers;

use App\Models\AuthApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      return view('login');
   }

   public function register(Request $request)
   {
      $data_register = $request->validate([
         'name' => ['required'],
         'username' => ['required'],
         'password' => ['required'],
         'role' => ['required']
      ]);

      $user = AuthApi::register($data_register);

      $response_data = json_decode($user, true);

      $success = $response_data['success'];
      $message = $response_data['message'];

      if ($success) {
         $token = $response_data['data']['token'];
         $name = $response_data['data']['name'];
         session([
            'token' => $token,
            'name' => $name
         ]);
         return redirect('/admin/user');
      } else {
         echo "Error: " . $message;
      }

   }
   public function login(Request $request)
   {
      $data_login = $request->validate([
         'username' => ['required'],
         'password' => ['required'],
      ]);

      $user = AuthApi::login($data_login);

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
         $page = ($role === "user") ? "/user/index" : "/admin/index";
         return redirect($page);
      } else {
         echo "Error: " . $message;
      }

   }

   public function logout(Request $request)
   {
      $request->session()->invalidate();
      return redirect('/login');
   }
}
