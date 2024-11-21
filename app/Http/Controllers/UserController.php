<?php
use App\Http\Controllers\UserController;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all(); // Retrieve all users from the database
        return view('users.index', compact('users'));
    }

    // Show the form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'length' => 'required|numeric|min:1',
        ]);

        User::create($request->all()); // Store data in the users table

        return redirect()->route('users.index');
    }

    // Show the form to edit an existing user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'length' => 'required|numeric|min:1',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    // Delete the specified user from the database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
