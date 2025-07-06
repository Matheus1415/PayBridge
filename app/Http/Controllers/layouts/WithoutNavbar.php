<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithoutNavbar extends Controller
{
  public function index()
  {
    $user = Auth::user();
    return view('content.layouts-example.layouts-without-navbar', [
      'user' => $user,
    ]);
  }
}
