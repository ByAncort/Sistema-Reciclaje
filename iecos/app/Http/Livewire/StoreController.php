<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class StoreController extends Component
{
    public function render()
    {
        
        $rewards = DB::table('rewards')->get();

        
        return view('livewire.store')->with('rewards', $rewards);
        
    }
}
