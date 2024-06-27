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
            'password' => 'required|string|min:8',
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

    public function edit()
    {
        return view('user.user-edit');
    }
}
