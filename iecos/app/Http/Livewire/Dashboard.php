<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Dashboard extends Component
{
    public function render()
    {
        
        return view('livewire.dashboard');
    }
}
