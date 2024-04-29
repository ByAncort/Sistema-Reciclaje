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
        $user_id = Auth::id();
        $cantidadReciclada = DB::table('recyclable_items')->where('user_id', $user_id)->sum('quantity');
        $porcentajeIncremento = 55;
        $puntosQuery = DB::table('users')->select('puntos')->where('id', $user_id)->first();
// dd($puntos);
        $puntos = $puntosQuery->puntos;

        $ultimoMov = DB::table('recyclable_items')
        ->select('recyclable_items.*', 'recycling_types.name as recycling_type_name')
        ->join('recycling_types', 'recycling_types.id', '=', 'recyclable_items.recycling_type_id')
        ->where('recyclable_items.user_id', $user_id)->limit(5)
        ->get();
        // dd($ultimoMov);
        $count = DB::table('users')->count(); 
 
    return view('livewire.dashboard', [
        'count' => $count,
        'cantidadReciclada' => $cantidadReciclada,
        'porcentajeIncremento' => $porcentajeIncremento,
        'puntos' => $puntos,
        'ultimoMovimiento' => $ultimoMov 
    ]);
    
    }
}
