<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:super_admin,admin,employee',
            'status'   => 'in:on going,expired',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 402,
                'errors' => $validator->errors()
            ]);
        }
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:super_admin,admin,employee',
            'status'   => 'in:on going,expired',
        ]);

        $authUser = $request->user();

        // 🔑 Role-based restrictions
        if ($request->role === 'super_admin') {
            return response()->json(['error' => 'Cannot create super_admin via API'], 403);
        }

        if ($request->role === 'admin' && $authUser->role !== 'super_admin') {
            return response()->json(['error' => 'Only super_admin can create admin'], 403);
        }

        if ($request->role === 'employee' && $authUser->role !== 'admin') {
            return response()->json(['error' => 'Only admin can create employee'], 403);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'status'   => $request->status ?? 'on going',
            'expired' => $request->expired
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'user'    => $user,
        ], 201);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 402,
                'errors' => $validator->errors(),
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'user'  => $user,
            'token' => $token,
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
