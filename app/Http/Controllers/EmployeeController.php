<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.employee-index');
    }

    public function create()
    {
        return view('employees.employee-create');
    }

    public function edit()
    {
        return view('employees.employee-edit');
    }
}
