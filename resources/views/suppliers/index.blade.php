<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier List</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector("#search-input");
      const form = document.querySelector("#search-form");
      let timeout = null;

      searchInput.addEventListener("input", function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
          const query = searchInput.value;
          const url = new URL(form.action);
          url.searchParams.set("search", query);
          window.location.href = url.toString();
        }, 500); // Adjust the debounce delay (in milliseconds) if needed
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
    /* Ensure text wraps properly inside table cells */
    table th,
    table td {
      word-wrap: break-word;
      overflow-wrap: break-word;
      white-space: normal; /* Allows text to break into new lines */
      max-width: 200px; /* Limit column width */
    }
  </style>
</head>
<body class="h-full bg-gray-100">
<div class="min-h-full">
  <!-- Navigation and Header (unchanged) -->

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

      <!-- Pagination Links -->
      <div class="mt-4">
        <div class="flex justify-center">
          {{ $suppliers->appends(request()->query())->links('pagination::tailwind') }}
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
