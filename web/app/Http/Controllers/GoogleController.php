<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
    try {
      $user = Socialite::driver('google')->stateless()->user();
      $findUser = User::where('google_id', $user->id)->first();

      if ($findUser) {
        Auth::login($findUser, true);
      } else {
        $newUser = User::create([
          'name' => $user->name,
          'email' => $user->email,
          'google_id' => $user->id,
          'password' => encrypt('test1234')
        ]);

        Auth::login($newUser, true);
      }
      return response()->view('index');
    } catch (Exception $e) {
      Log::error(print_r($e, true));
    }
  }
}
