<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Display a listing of suppliers with search functionality
    public function index(Request $request)
    {
        $search = $request->input('search');
        $suppliers = Supplier::query();

        // Apply search filter
        if ($search) {
            $suppliers = $suppliers->where('SupplierName', 'like', '%' . $search . '%')
                ->orWhere('ContactEmail', 'like', '%' . $search . '%')
                ->orWhere('PhoneNumber', 'like', '%' . $search . '%')
                ->orWhere('Address', 'like', '%' . $search . '%');
        }

        // Paginate with 10 suppliers per page
        $suppliers = $suppliers->paginate(10);

        return view('suppliers.index', compact('suppliers'));
    } 

    // Show the form for creating a new supplier
    public function create()
    {
        return view('suppliers.create');
    }

    // Store a newly created supplier in storage
    public function store(Request $request)
    {
        $request->validate([
            'SupplierName' => 'required|string|max:255',
            'ContactEmail' => 'required|email|max:255',
            'PhoneNumber' => 'nullable|string|max:50',
            'Address' => 'nullable|string|max:255',
        ]);

        Supplier::create([
            'SupplierName' => $request->SupplierName,
            'ContactEmail' => $request->ContactEmail,
            'PhoneNumber' => $request->PhoneNumber,
            'Address' => $request->Address,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully');
    }

    // Display the specified supplier
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    // Show the form for editing the specified supplier
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    // Update the specified supplier in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'SupplierName' => 'required|string|max:255',
            'ContactEmail' => 'required|email|max:255',
            'PhoneNumber' => 'nullable|string|max:50',
            'Address' => 'nullable|string|max:255',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'SupplierName' => $request->SupplierName,
            'ContactEmail' => $request->ContactEmail,
            'PhoneNumber' => $request->PhoneNumber,
            'Address' => $request->Address,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    // Remove the specified supplier from storage
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }
}
