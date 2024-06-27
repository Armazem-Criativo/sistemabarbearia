<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('employees')->get();

        return view('user.user-index', compact('users'));
    }

    public function create()
    {
        $employees = Employee::all();

        return view('user.user-create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_employee' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'role' => 'required|string',
        ]);

        try {
            $user = [
                'id_employee' => $request->input('id_employee'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
            ];

            DB::table('users')->insert($user);

            return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar usuário: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $employees = Employee::all();
        return view('user.user-edit', compact('user', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_employee' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string',
        ]);

        try {
            $user = [
                'id_employee' => $request->input('id_employee'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->filled('password') ? Hash::make($request->input('password')) : DB::raw('password'),
                'role' => $request->input('role'),
            ];

            if (!$request->filled('password')) {
                unset($user['password']);
            }

            DB::table('users')->where('id', $id)->update($user);

            return redirect()->route('usuarios.index')->with('success', 'Usuário alterado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao atualizar usuário: ' . $e->getMessage()]);
        }
    }
}
