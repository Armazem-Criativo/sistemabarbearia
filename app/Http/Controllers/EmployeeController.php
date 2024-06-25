<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.employee-index');
    }

    public function create()
    {
        return view('employees.employee-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:employees,cpf',
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'phone' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:employees,email',
        ]);

        try {
            $birthdate = Carbon::createFromFormat('Y-m-d', $request->birthdate);

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->cpf = $request->cpf;
            $employee->birthdate = $birthdate;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->position = $request->position;
            $employee->email = $request->email;
            $employee->save();

            return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar funcionário: ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        return view('employees.employee-edit');
    }
}
