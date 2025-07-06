<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email-username' => ['required'],
      'password' => ['required'],
    ]);

    $login_field = filter_var($credentials['email-username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    $login_data = [
      $login_field => $credentials['email-username'],
      'password' => $credentials['password'],
    ];

    if (Auth::attempt($login_data)) {
      $request->session()->regenerate();

      return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
      'email-username' => 'Credenciais inválidas.',
    ])->onlyInput('email-username');
  }
}
