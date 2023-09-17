<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function usersList()
    {
        $users = User::where('department_id', Auth::user()->department_id)->get();
        return view('dashboard.users.usersList', compact('users'));
    }
    public function update($id)
    {
        $user = User::findOrFail($id);
        $role = null;
        if ($user->role->title === 'Admin') {
            $role = 4;
        } else {
            $role = 2;
        }
        $user->update([
            'role_id' => $role
        ]);
        session()->flash('success', 'تم التعديل بنجاح');
        return back();
    }
}
