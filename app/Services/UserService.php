<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAll()
    {
        return User::with('roles')->latest()->get();
    }

    public function findById($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function create($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        return $user->load('roles');
    }

    public function update($id, $data)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $data['name'] ?? $user->name,
            'email' => $data['email'] ?? $user->email,
            'password' => isset($data['password'])
                ? Hash::make($data['password'])
                : $user->password,
        ]);

        if (isset($data['role'])) {
            $user->syncRoles([$data['role']]);
        }

        return $user->load('roles');
    }

    public function delete($id, $authUserId)
    {
        if ($id == $authUserId) {
            throw new \Exception('Tidak bisa hapus akun sendiri');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return true;
    }
}