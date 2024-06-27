<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Scheduling;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchedulingController extends Controller
{
    public function index()
    {
        $schedulings = Scheduling::with('clients', 'employees', 'payments', 'services')->get();

        return view('scheduling.scheduling-index', compact('schedulings'));
    }

    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all();
        $services = Service::all();
        $payments = Payment::all();

        return view('scheduling.scheduling-create', compact('clients', 'employees', 'services', 'payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'employee_id' => 'required',
            'service_id' => 'required',
            'payment_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'status' => 'required|string',
        ]);

        try {
            $scheduling = [
                'id_client' => $request->input('client_id'),
                'id_employee' => $request->input('employee_id'),
                'id_service' => $request->input('service_id'),
                'id_payment' => $request->input('payment_id'),
                'date' => DB::raw("CONVERT(date, '" . Carbon::createFromFormat('Y-m-d', $request->input('date'))->toDateString() . "', 120)"),
                'status' => $request->input('status'),
            ];

            DB::table('schedulings')->insert($scheduling);

            return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar agendamento: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $scheduling = Scheduling::findOrFail($id);
        $clients = Client::all();
        $employees = Employee::all();
        $services = Service::all();
        $payments = Payment::all();

        if (!($scheduling->date instanceof Carbon)) {
            $scheduling->date = Carbon::createFromFormat('Y-m-d', $scheduling->date);
        }

        return view('scheduling.scheduling-edit', compact('scheduling', 'clients', 'employees', 'services', 'payments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required',
            'employee_id' => 'required',
            'service_id' => 'required',
            'payment_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'status' => 'required|string',
        ]);

        try {
            $scheduling = [
                'id_client' => $request->input('client_id'),
                'id_employee' => $request->input('employee_id'),
                'id_service' => $request->input('service_id'),
                'id_payment' => $request->input('payment_id'),
                'date' => DB::raw("CONVERT(date, '" . Carbon::createFromFormat('Y-m-d', $request->input('date'))->toDateString() . "', 120)"),
                'status' => $request->input('status'),
            ];

            DB::table('schedulings')->where('id', $id)->update($scheduling);

            return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao atualizar funcionário: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $scheduling = Scheduling::findOrFail($id);
            $scheduling->delete();

            return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao excluir funcionário: ' . $e->getMessage()]);
        }
    }
}
