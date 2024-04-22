<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdministratorController extends Component
{
    public function render()
    {
        $users = DB::table('users')
        ->orderByRaw("CASE WHEN role_id = 1 THEN 1 WHEN role_id = 3 THEN 2 WHEN role_id = 2 THEN 3 ELSE 4 END")
        ->take(10)
        ->get();

        
        return view('admin.user')->with('users', $users); 
    }


}
