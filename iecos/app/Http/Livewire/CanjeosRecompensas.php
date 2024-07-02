<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;

use Livewire\Component;

class CanjeosRecompensas extends Component
{
    public function render()
    {
        $canjeos = DB::table('canjeos')
        ->join('users', 'canjeos.user_id', '=', 'users.id')
        ->select('canjeos.*', 'users.email as user_email','users.name')
        ->orderBy('estado', 'DESC')->get()  ;
        // dd($canjeos);
        return view('livewire.canjeos-recompensas')->with('canjeos', $canjeos);
    }
    public function actualizarEstado($canjeoId)
    {
        DB::table('canjeos')
            ->where('id', $canjeoId)
            ->update(['estado' => 'Entregado']); 
    }
}
