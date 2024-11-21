php


// resources/views/users/create.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>

<h1>Create New User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" id="full_name" required>

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" required>

    <label for="length">Length:</label>
    <input type="number" step="0.01" name="length" id="length" required>

    <button type="submit">Create User</button>
</form>

</body>
</html>
