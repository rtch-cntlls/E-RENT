<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GuestRegisterController extends Controller
{
    public function index()
    {
        return view('guest.auth.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $user = DB::transaction(function () use ($request) {

                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'role'     => 'user',
                ]);
            });
            return redirect()
                ->route('guest.login')
                ->with('success', 'Account created successfully!');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Something went wrong. Please try again.')
                ->withInput();
        }
    }
}
