<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $user = Auth::user();

        return view('employees.employee-index', compact('employees','user'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('employees.employee-create', compact('user'));
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
        $employee =  Employee::findOrFail($id);
        $user = Auth::user();

        // Converter birthdate para Carbon se não estiver
        if (!($employee->birthdate instanceof Carbon)) {
            $employee->birthdate = Carbon::createFromFormat('Y-m-d', $employee->birthdate);
        }

        return view('employees.employee-edit', compact('employee','user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:employees,cpf,' . $id,
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'phone' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
        ]);

        try {
            $employee = [
                'name' => $request->input('name'),
                'cpf' => $request->input('cpf'),
                'birthdate' => DB::raw("CONVERT(date, '" . Carbon::createFromFormat('Y-m-d', $request->input('birthdate'))->toDateString() . "', 120)"),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'position' => $request->input('position'),
                'email' => $request->input('email'),
            ];

            DB::table('employees')->where('id', $id)->update($employee);

            return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao atualizar funcionário: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao excluir funcionário: ' . $e->getMessage()]);
        }
    }
}
