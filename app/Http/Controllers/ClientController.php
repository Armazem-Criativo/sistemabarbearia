<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $user = Auth::user();

        return view('clients.client-index', compact('clients', 'user'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('clients.client-create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:clients,cpf',
            'birthdate' => 'required|date_format:Y-m-d', // Ajustado para formato YYYY-MM-DD
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:clients,email',
        ]);

        try {
            $client = [
                'name' => $request->input('name'),
                'cpf' => $request->input('cpf'),
                'birthdate' => DB::raw("CONVERT(date, '" . Carbon::createFromFormat('Y-m-d', $request->input('birthdate'))->toDateString() . "', 120)"), // Converte a data para o formato YYYY-MM-DD
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ];

            DB::table('clients')->insert($client);

            return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar funcionário: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $user = Auth::user();

        // Converter birthdate para Carbon se não estiver
        if (!($client->birthdate instanceof Carbon)) {
            $client->birthdate = Carbon::createFromFormat('Y-m-d', $client->birthdate);
        }

        return view('clients.client-edit', compact('client','user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:clients,cpf,' . $id,
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:clients,email,' . $id,
        ]);

        try {
            $client = [
                'name' => $request->input('name'),
                'cpf' => $request->input('cpf'),
                'birthdate' => DB::raw("CONVERT(date, '" . Carbon::createFromFormat('Y-m-d', $request->input('birthdate'))->toDateString() . "', 120)"),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ];

            DB::table('clients')->where('id', $id)->update($client);

            return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao atualizar funcionário: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao excluir funcionário: ' . $e->getMessage()]);
        }
    }
}
