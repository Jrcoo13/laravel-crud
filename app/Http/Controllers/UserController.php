<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        // dd($request);
        $validateFields = $request->validate([
            'email' => ['required', 'min:8', 'max:200', 'email', Rule::unique('users', 'email')],
            'name' => ['required', 'max:200', Rule::unique('users', 'name')],
            'password' => ['required', 'min:8', 'max:200'],
        ]);

        $validateFields['password'] = bcrypt($validateFields['password']);
        $user = User::create($validateFields);

        auth()->login($user);

        return redirect('/');
    }
}
