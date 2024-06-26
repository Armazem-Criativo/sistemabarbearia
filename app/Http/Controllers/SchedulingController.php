<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchedulingController extends Controller
{
    public function index()
    {
        return view('scheduling.scheduling-index');
    }

    public function create()
    {
        return view('scheduling.scheduling-create');
    }

    public function edit()
    {
        return view('scheduling.scheduling-edit');
    }
}
