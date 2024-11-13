<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector("#search-input");
      const form = document.querySelector("#search-form");

      searchInput.addEventListener("input", function() {
        form.submit();
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
            <a href="{{ route('products.index') }}" class="nav-link rounded-md px-3 py-2 text-sm font-bold text-white hover:bg-gray-700">Products</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-sm font-bold text-white hover:bg-gray-700">Orders</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-sm font-bold text-white hover:bg-gray-700">Suppliers</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-sm font-bold text-white hover:bg-gray-700">Categories</a>
            <a href="#" class="nav-link rounded-md px-3 py-2 text-sm font-bold text-white hover:bg-gray-700">Transactions</a>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
              </svg>
            </button>
            <div class="relative ml-3">
              <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User Avatar">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8 flex justify-between items-center">
      <form id="search-form" method="GET" action="{{ route('products.index') }}" class="flex">
        <input id="search-input" type="text" name="search" placeholder="Search Product Name"
               value="{{ request('search') }}"
               class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:ring-indigo-200">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-500 text-sm font-medium">
          Search
        </button>
      </form>
      <a href="{{ route('products.create') }}" class="bg-indigo-600 text-white font-bold px-4 py-2 rounded-md text-sm hover:bg-indigo-500">
        Add stock<span class="ml-2 font-extrabold">+</span>
      </a>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <table class="min-w-full divide-y divide-gray-200 border border-gray-300 mx-auto">
        <thead class="text-base text-gray-700">
          <tr>
            <th scope="col" class="px-8 py-3 text-center font-semibold tracking-wide">Product Name</th>
            <th scope="col" class="px-8 py-3 text-center font-semibold tracking-wide">Unit Price</th>
            <th scope="col" class="px-8 py-3 text-center font-semibold tracking-wide">Stock Quantity</th>
            <th scope="col" class="px-8 py-3 text-center font-semibold tracking-wide">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($products as $product)
          <tr>
            <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->ProductName }}</td>
            <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->UnitPrice }}</td>
            <td class="px-8 py-4 text-center whitespace-nowrap text-sm text-black">{{ $product->StockQuantity }}</td>
            <td class="px-8 py-4 text-center whitespace-nowrap text-sm font-medium">
              <a href="{{ route('products.edit', $product->id) }}" class="bg-indigo-600 text-white hover:bg-indigo-500 px-4 py-2 rounded-md hover-icon" data-icon="✏️">
                Edit
              </a> 
              |
              <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white hover:bg-red-500 px-4 py-2 rounded-md hover-icon" data-icon="🗑️">
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="mt-4">
        {{ $products->links('pagination::tailwind') }}
      </div>
    </div>
  </main>
</div>

<script>
  document.querySelectorAll(".nav-link").forEach(link => {
    link.addEventListener("click", function() {
      document.querySelectorAll(".nav-link").forEach(item => item.classList.remove("active"));
      link.classList.add("active");
    });
  });
</script>
</body>
</html>
