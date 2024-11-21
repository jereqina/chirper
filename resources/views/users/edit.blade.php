php 

// resources/views/users/edit.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" id="full_name" value="{{ $user->full_name }}" required>

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" value="{{ $user->age }}" required>

    <label for="length">Length:</label>
    <input type="number" step="0.01" name="length" id="length" value="{{ $user->length }}" required>

    <button type="submit">Update User</button>
</form>

</body>
</html>
