<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\rewards;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StoreController extends Component
{
    public function render()
    {
        
        $reward = DB::table('rewards')->get();

        
        return view('livewire.store')->with('reward', $reward);
        
    }
    public function add(){
        
        $data = $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'points_required' => 'required|integer|min:0',
        ]);
        
        $rewards = new rewards();
        $rewards->nombre = $data['nombre'];
        $rewards->descripcion = $data['descripcion']; 
        $rewards->cantidad = $data['cantidad']; 
        $rewards->points_required = $data['points_required']; 
        
        $rewards->save(); 
        
      
        
        return redirect('/store')->with('success', 'Recompensa creada correctamente.');
        
    }
    
}
