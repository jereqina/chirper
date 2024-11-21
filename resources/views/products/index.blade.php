<!DOCTYPE html>
<html>
<head>
  <title>Supplier List</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector("#search-input");
      const form = document.querySelector("#search-form");

      searchInput.addEventListener("input", function() {
        form.submit(); // Automatically submit the form when the input changes
      });
    });
  </script>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
    }
    .hover-icon:hover::before {
      content: attr(data-icon);
      font-weight: bold;
      margin-right: 4px;
    }
    .active {
      background-color: #4a5568; /* Tailwind gray-700 */
      color: white;
    }
    table th,
    table td {
      word-wrap: break-word;
      overflow-wrap: break-word;
      white-space: normal;
      max-width: 200px;
    }
  </style>
</head>
<body class="h-full bg-gray-100">
<div class="min-h-full">
  <nav class="bg-gray-900">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="shrink-0">
          <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="flex-1 flex justify-center">
          <div class="hidden md:flex space-x-4">
            <a href="{{ route('products.index') }}" class="nav-link rounded-md px-3 py-2 text-lg font-bold text-white hover:bg-gray-700">Products</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-lg font-bold text-white hover:bg-gray-700">Orders</a>
            <a href="{{ route('suppliers.index') }}" class="nav-link rounded-md px-3 py-2 text-lg font-bold text-white hover:bg-gray-700">Suppliers</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-lg font-bold text-white hover:bg-gray-700">Categories</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-lg font-bold text-white hover:bg-gray-700">Transactions</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8 flex justify-between items-center">
      <form id="search-form" method="GET" action="{{ route('suppliers.index') }}" class="flex">
        <input id="search-input" type="text" name="search" placeholder="Search Supplier Name"
               value="{{ request('search') }}"
               class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:ring-indigo-200">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-500 text-sm font-medium">
          Search
        </button>
      </form>
      <a href="{{ route('suppliers.create') }}" class="bg-indigo-600 text-white font-bold px-4 py-2 rounded-md text-sm hover:bg-indigo-500">
        Add Supplier<span class="ml-2 font-extrabold">+</span>
      </a>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <table class="min-w-full divide-y divide-gray-200 border border-gray-300 mx-auto">
        <thead class="text-base text-gray-700">
          <tr>
            <th class="px-8 py-3 text-center font-semibold">Supplier Name</th>
            <th class="px-8 py-3 text-center font-semibold">Contact Email</th>
            <th class="px-8 py-3 text-center font-semibold">Phone Number</th>
            <th class="px-8 py-3 text-center font-semibold">Address</th>
            <th class="px-8 py-3 text-center font-semibold">Date Created</th>
            <th class="px-8 py-3 text-center font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($suppliers as $supplier)
          <tr>
            <td class="px-8 py-4 text-center text-black">{{ $supplier->SupplierName }}</td>
            <td class="px-8 py-4 text-center text-black">{{ $supplier->ContactEmail }}</td>
            <td class="px-8 py-4 text-center text-black">{{ $supplier->PhoneNumber }}</td>
            <td class="px-8 py-4 text-center text-black">{{ $supplier->Address }}</td>
            <td class="px-8 py-4 text-center text-black">{{ $supplier->created_at }}</td>
            <td class="px-8 py-4 text-center">
              <a href="{{ route('suppliers.edit', $supplier->SupplierID) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Edit</a>
              |
              <form action="{{ route('suppliers.destroy', $supplier->SupplierID) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-4">
        {{ $suppliers->links('pagination::tailwind') 
