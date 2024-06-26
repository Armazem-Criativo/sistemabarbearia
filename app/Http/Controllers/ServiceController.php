<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services.service-index', compact('services'));
    }

    public function create()
    {
        return view('services.service-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|string',
            'value' => 'required|string',
        ]);

        try {
            $service = [
                'service' => $request->input('service'),
                'value' => $request->input('value'),
            ];

            DB::table('services')->insert($service);

            return redirect()->route('servicos.index')->with('success', 'Forma de pagamento criada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar forma de pagamento: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('services.service-edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service' => 'required|string',
            'value' => 'required|string',
        ]);

        try {
            $service = [
                'service' => $request->input('service'),
                'value' => $request->input('value'),
            ];

            DB::table('services')->where('id', $id)->update($service);

            return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao atualizar serviço: ' . $e->getMessage()]);
        }
    }
}
