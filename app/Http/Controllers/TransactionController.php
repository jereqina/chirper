<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TrasactionController extends Controller
{
    public function index()
    {
        $transactions = Order::all();
        return view('transactions.index', compact('transactions'));
    }
}
