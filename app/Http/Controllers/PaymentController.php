<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $user = Auth::user();

        return view('payments.payment-index', compact('payments','user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('payments.payment-create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'formpay' => 'required|unique:payments,formpay',
            'parcel' => 'nullable|string',
        ]);

        try {
            $payment = [
                'formpay' => $request->input('formpay'),
                'parcel' => $request->input('parcel') ?? null,
            ];

            DB::table('payments')->insert($payment);

            return redirect()->route('formas-de-pagamento.index')->with('success', 'Forma de pagamento criada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar forma de pagamento: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $user = Auth::user();

        return view('payments.payment-edit', compact('payment', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'formpay' => 'required|unique:payments,formpay,' . $id,
            'parcel' => 'nullable|string',
        ]);

        try {
            $payment = [
                'formpay' => $request->input('formpay'),
                'parcel' => $request->input('parcel'),
            ];

            DB::table('payments')->where('id', $id)->update($payment);

            return redirect()->route('formas-de-pagamento.index')->with('success', 'Forma de pagamento atualizada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao atualizar forma de pagamento: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();

            return redirect()->route('formas-de-pagamento.index')->with('success', 'Forma de pagamento excluída com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao excluir forma de pagamento: ' . $e->getMessage()]);
        }
    }
}
