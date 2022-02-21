<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{

  protected function authenticated(Request $request, $user)
  {
      return $user;
  }
}
