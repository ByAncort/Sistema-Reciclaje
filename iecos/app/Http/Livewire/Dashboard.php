<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Dashboard extends Component
{
    public function render()
    {
        $cantidadReciclada = 53000;
        $porcentajeIncremento = 55;

        $count = DB::table('users')->count(); 
 
    return view('livewire.dashboard', [
        'count' => $count,
        'cantidadReciclada' => $cantidadReciclada,
        'porcentajeIncremento' => $porcentajeIncremento
    ]);
    
    }
}
