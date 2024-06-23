<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'birthdate' => 'nullable|date_format:Y-m-d',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:255|unique:employees,email',
        ]);

        $employeeData = $request->only('name', 'cpf', 'address', 'position', 'phone', 'email');
        $employeeData['birthdate'] = $request->birthdate ? Carbon::createFromFormat('Y-m-d', $request->birthdate)->toDateString() : null;

        Employee::create($employeeData);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso');
    }


    public function edit($id)
    {
        return view('employees.employee-edit');
    }
}
