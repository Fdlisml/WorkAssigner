<?php

namespace App\Http\Controllers;

use App\Models\UserApi;
use Illuminate\Http\Request;

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
      $userData = UserApi::getDataFromAPI();

      // Mengecek username dan password
      foreach ($userData as $user) {
         if ($user['username'] === $request->username && $user['password'] === $request->password) {
            session([
               'role' => $user['role'],
               'name' => $user['name'],
               'id' => $user['id']
            ]);
            $page = ($user['role'] === "user") ? "/user/index" : "/admin/index";
            return redirect($page);
         }
      }
      return back()->with('error', 'Invalid username or password.');
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
