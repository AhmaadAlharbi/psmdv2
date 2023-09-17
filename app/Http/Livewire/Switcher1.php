<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Switcher1 extends Component
{
    public function render()
    {
        return view('livewire.switcher-1')
        ->layout('layouts.switcher');
    }
}
