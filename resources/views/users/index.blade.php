php
// resources/views/users/index.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>

<h1>User Details</h1>

<a href="{{ route('users.create') }}">Create User</a>

<table border="1">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Age</th>
            <th>Length</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->length }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
