<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
   /**
    * Handle an incoming request.
    *
    * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
   public function handle(Request $request, Closure $next, string $role)
   {
      if ($role == 'karyawan' && session('role') == 'karyawan') {
         return $next($request);
      }elseif($role == 'admin' && session('role') == 'admin'){
         return $next($request);
      }else{
         return redirect()->back()->with("error", "Anda tidak memiliki akses untuk memasuki halaman ini");
      }
   }
}
