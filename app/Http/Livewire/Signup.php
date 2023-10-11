<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class Signup extends Component
{

    public function render()
    {
        $departments = Department::all();
        return view('livewire.signup', compact('departments'))
            ->layout('layouts.custom-app');
    }
}
