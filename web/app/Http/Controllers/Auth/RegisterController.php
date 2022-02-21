<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{

  protected function registered(Request $request, $user)
  {
      return $user;
  }
}
