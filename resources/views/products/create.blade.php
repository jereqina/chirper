<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
    .input-focus:focus {
      border-color: #4c51bf; /* Indigo color for focus */
      ring-color: #4c51bf; /* Indigo ring on focus */
    }
  </style>
</head>
<body class="h-full bg-gray-100">
  <div class="min-h-full">
    <!-- Navigation Bar -->
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
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="flex justify-center py-3">
      <div class="w-full max-w-lg bg-white p-8 shadow-lg rounded-lg">
        <!-- Form Header -->
        <div class="mb-4">
          <h2 class="text-xl font-bold text-white bg-indigo-600 p-4 text-center rounded-md">Add Product Form</h2>
        </div>

        @if (session('success'))
          <div id="successNotification" class="bg-green-500 text-white p-4 rounded-md mb-4">
            <p>{{ session('success') }}</p>
            <button id="okButton" class="mt-2 bg-white text-green-500 px-4 py-2 rounded-md hover:bg-green-100">OK</button>
          </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
          @csrf
          
          <!-- Product Name -->
          <div class="form-group">
            <label for="productName" class="block text-lg font-medium text-gray-700">Product Name</label>
            <input type="text" id="productName" name="ProductName" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 input-focus" required>
          </div>

          <!-- Unit Price -->
          <div class="form-group">
            <label for="unitPrice" class="block text-lg font-medium text-gray-700">Unit Price</label>
            <input type="number" id="unitPrice" name="UnitPrice" step="0.01" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 input-focus" required>
          </div>

          <!-- Stock Quantity -->
          <div class="form-group">
            <label for="stockQuantity" class="block text-lg font-medium text-gray-700">Stock Quantity</label>
            <input type="number" id="stockQuantity" name="StockQuantity" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 input-focus" required>
          </div>

          <!-- Action Buttons -->
          <div class="flex space-x-4">
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold px-4 py-2 rounded-md hover:bg-indigo-500">Add Product</button>
            <a href="{{ route('products.index') }}" class="w-full text-center bg-indigo-600 text-white font-bold px-4 py-2 rounded-md hover:bg-indigo-500">Cancel</a>
          </div>
        </form>
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

    // If the success message is shown, display the notification and handle the button click
    const successNotification = document.getElementById('successNotification');
    if (successNotification) {
      const okButton = document.getElementById('okButton');
      okButton.addEventListener('click', function() {
        // Redirect to the products page after clicking OK
        window.location.href = "{{ route('products.index') }}";
      });
    }
  </script>
</body>
</html>
