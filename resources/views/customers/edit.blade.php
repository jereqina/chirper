<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edit User</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $customer->full_name }}" required>
        </div>
        <div class="mb-3">
            <label for="length" class="form-label">Length</label>
            <input type="number" class="form-control" id="length" name="length" value="{{ $customer->length }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $customer->age }}" required>
        </div>
        <div class="mb-3">
            <label for="is_drunkard" class="form-label">Is Drunkard</label>
            <select class="form-control" id="is_drunkard" name="is_drunkard" required>
                <option value="1" {{ $customer->is_drunkard ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$customer->is_drunkard ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
</body>
</html>
