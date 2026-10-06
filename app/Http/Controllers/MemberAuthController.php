<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MemberAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('members.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('member')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'is_active' => 1
        ], $request->boolean('remember'))) {

            $request->session()->regenerate();

            return redirect()->route('members.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }

    public function showCredentialsForm()
    {
        $account = auth('member')->user();
        return view('members.auth.credentials', compact('account'));
    }

    public function updateCredentials(Request $request)
    {
        $account = auth('member')->user();

        $rules = [
            'current_password' => ['required', 'current_password:member'],
            'email' => ['required', 'email', 'unique:'.$account->getConnectionName().'.members_accounts,email,'.$account->id],
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['required', 'confirmed', Password::defaults()];
        }

        $validated = $request->validate($rules);

        $account->email = $validated['email'];
        if (!empty($validated['password'])) {
            $account->password = Hash::make($validated['password']);
        }
        $account->save();

        return redirect()->route('members.account')->with('success', 'Account credentials updated successfully.');
    }
}
