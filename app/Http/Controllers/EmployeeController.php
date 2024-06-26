<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'birthdate' => 'required|date_format:Y-m-d', // Ajustado para formato YYYY-MM-DD
            'address' => 'required',
            'phone' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:employees,email',
        ]);

        try {
            $employee = [
                'name' => $request->input('name'),
                'cpf' => $request->input('cpf'),
                'birthdate' => DB::raw("CONVERT(date, '" . Carbon::createFromFormat('Y-m-d', $request->input('birthdate'))->toDateString() . "', 120)"), // Converte a data para o formato YYYY-MM-DD
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'position' => $request->input('position'),
                'email' => $request->input('email'),
            ];

            DB::table('employees')->insert($employee);

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
