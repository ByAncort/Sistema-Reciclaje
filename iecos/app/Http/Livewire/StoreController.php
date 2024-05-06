<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reward;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Component
{
     
    
    public function render()
    {
        
        $reward = DB::table('rewards')->get();

        
        return view('livewire.store')->with('reward', $reward);
        
    }
    public function add(Request $request)
    {
        
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'points_required' => 'required|integer|min:0',
        ]);

        
        $reward = new Rewards();
        $reward->nombre = $data['nombre'];
        $reward->descripcion = $data['descripcion'];
        $reward->cantidad = $data['cantidad'];
        $reward->points_required = $data['points_required'];

        
        $reward->save();

        
        return redirect('/store')->with('success', 'Recompensa creada correctamente.');
    }
    public function shop($rewardId)
    {
        $user_id = Auth::id();
        $puntosQuery = DB::table('users')->select('puntos')->where('id', $user_id)->first();
        $puntos = $puntosQuery->puntos;
    
       
        $reward = Reward::find($rewardId);
        //campos de recompensa canjeada
        $id = $reward->id;
        $nombre = $reward->nombre;
        $descripcion = $reward->descripcion;
        $cantidad = $reward->cantidad;
        $points_required = $reward->points_required;
        $created_at = $reward->created_at;
        $updated_at = $reward->updated_at;

        $cantidad = $reward->points_required;

        if ($puntos >= $cantidad) {
            $res = $puntos - $cantidad;
    
            $cantidad = intval(DB::table('rewards')->where('id', $id)->value('cantidad'));
            $cantidadTotal =$cantidad - 1;
            
            DB::table('rewards')->where('id', $id)->update(['cantidad' => $cantidadTotal]);

            DB::table('users')->where('id', $user_id)->update(['puntos' => $res]);
            DB::table('canjeos')->insert([
                'user_id' =>$user_id,
                'n_recompensa' =>$nombre,
                'estado'=>'pendiente',
                'created_at' => now(),
                
            ]);
            

            
            return redirect('/store')->with('success', 'Compra realizada con éxito!');
        } else {
            
            return redirect('/store')->with('error', 'No tienes suficientes puntos para comprar este premio.');
        }
    }
    
    

}
