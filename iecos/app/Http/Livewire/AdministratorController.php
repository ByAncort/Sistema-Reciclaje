<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdministratorController extends Component
{
    public function render()
    {
        $users= DB::table('users')->take(6)->get();
        
        return view('admin.user')->with('users', $users); 
    }


}
