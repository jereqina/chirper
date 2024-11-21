<?php 

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the search term if provided
        $search = $request->input('search');

        // Fetch products with pagination and apply search filter if needed
        $products = Product::when($search, function ($query, $search) {
            return $query->where('ProductName', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('products.index', compact('products'));
    }

       // Show the form to create a new product
    public function create()
    {
        return view('products.create');  // Assuming your view is named products.create
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProductName' => 'required|string|max:255',
            'UnitPrice' => 'required|numeric',
            'StockQuantity' => 'required|integer',
            'ReorderLevel' => 'required|integer',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    public function edit($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'UnitPrice' => 'required|numeric',
            'StockQuantity' => 'required|integer',
        ]);

        // Update the product with the validated data
        $product->update($request->only(['ProductName', 'UnitPrice', 'StockQuantity']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
