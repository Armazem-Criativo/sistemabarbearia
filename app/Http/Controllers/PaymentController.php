<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        return view('payments.payment-index', compact('payments'));
    }

    public function create()
    {
        return view('payments.payment-create');
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

    public function edit()
    {
        return view('payments.payment-edit');
    }
}
