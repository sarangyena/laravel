<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Online;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'userName' => ['nullable', 'string', 'max:255'],
            'first' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'userName' => $request->userName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $patient = Patient::create([
            'first' => $request->first,
            'last' => $request->last,
            'phone' => $request->phone,
            'bday' => $request->bday,
            'address' => $request->address,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('u-dash', absolute: false));
    }
}
