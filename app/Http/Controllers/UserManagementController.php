<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    //
    public function index()
    {
        $userItems = User::all();
        return view('userm.index', ['userItems' => $userItems]);
    }

    public function create()
    {
        return view('userm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('userm.index');
    }

    public function show($id)
    {
        $userItem = User::findOrFail($id);
        return view('userm.show', ['userItem' => $userItem]);
    }

    public function edit($id)
    {
        $userItem = User::findOrFail($id);
        return view('userm.edit', ['userItem' => $userItem]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
        ]);

        $userItem = User::findOrFail($id);
        $userItem->update([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('userm.index');
    }

    public function destroy($id)
    {
        $userItem = User::findOrFail($id);
        $userItem->delete();

        return redirect()->route('userm.index');
    }
}
