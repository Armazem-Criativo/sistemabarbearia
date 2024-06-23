<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.user-index');
    }

    public function create()
    {
        return view('user.user-create');
    }

    public function edit()
    {
        return view('user.user-edit');
    }
}