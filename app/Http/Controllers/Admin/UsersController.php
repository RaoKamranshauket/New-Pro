<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
  public function index()
  {
    $users=User::all();
    return view('admin.users.index',compact('users'));
  }
}
