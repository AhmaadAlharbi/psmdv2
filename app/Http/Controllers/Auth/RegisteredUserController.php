<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Rules\FullName;
use App\Rules\MewEmail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // $departmentId = null;
        // switch ($department) {
        //     case 'protection':
        //         $departmentId = 2;
        //         break;
        //     case 'sales':
        //         $departmentId = 3;
        //         break;
        //         // Add cases for any other departments here
        //     default:
        //         // Handle an invalid department name
        //         break;
        // }

        return view('livewire.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', new FullName],
            'arabic_name' => ['required', 'string', 'max:255', new FullName],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new MewEmail],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'department' => ['required', 'integer'],

        ]);
        $user = User::create([
            'name' => $request->name,
            'arabic_name' => $request->arabic_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department_id' => $request->department,
            'role_id' => 4,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::USERHOME);
    }
}
