<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:1',
            'role' => 'required|in:Admin,Student,Teacher',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['uuid'] = \Illuminate\Support\Str::uuid();

        $user = User::create($data);
        return response()->json($user, 201);
    }

    public function show($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        return response()->json($user);
    }

    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'username' => 'sometimes|required|unique:users,username,' . $user->id,
            'password' => 'sometimes|min:6',
            'role' => 'sometimes|required|in:Admin,Student,Teacher',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);
        return response()->json($user);
    }

    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $user->delete();
        return response()->json(null, 204);
    }
}