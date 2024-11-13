<!-- resources/views/dash.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-xl font-bold mb-4">Product List</h2>
    <table class="min-w-full divide-y divide-gray-200 border">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Stock Quantity</th>
                <th>Reorder Level</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->ProductName }}</td>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->UnitPrice }}</td>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->StockQuantity }}</td>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->ReorderLevel }}</td>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->created_at }}</td>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->updated_at }}</td>
                <td class="px-8 py-4 text-center whitespace-nowrap text-sm font-medium">
                    <button class="bg-indigo-600 text-white hover:bg-indigo-500 px-4 py-2 rounded-md hover-icon" data-icon="✏️">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
