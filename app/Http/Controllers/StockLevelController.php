<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockLevelController extends Controller
{
    //
}

namespace App\Http\Controllers;

use App\Models\StockLevel;
use Illuminate\Http\Request;

class StockLevelController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
