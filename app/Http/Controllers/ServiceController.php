<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.service-index');
    }

    public function create()
    {
        return view('services.service-create');
    }

    public function edit()
    {
        return view('services.service-edit');
    }
}
