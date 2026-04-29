<?php

namespace App\Http\Controllers;


use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // Service-nya sama dengan yang di API
        $users = $this->userService->getAll();

        // Kirim ke folder users file index.blade.php
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $this->userService->create($request->all());
        return redirect()->route('users.index')->with('success', 'User berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($id, $request->all());
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->userService->delete($id, auth()->id());
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
