<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.payment-index');
    }

    public function create()
    {
        return view('payments.payment-create');
    }

    public function edit()
    {
        return view('payments.payment-edit');
    }
}
