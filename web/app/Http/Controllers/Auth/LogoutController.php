<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogoutController extends Controller
{

  protected function loggedOut(Request $request)
  {
      $request->session()->regenerate();

      return response()->json();
  }
}
