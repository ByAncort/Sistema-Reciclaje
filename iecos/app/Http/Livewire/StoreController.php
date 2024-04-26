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
    public function add(Request $request)
    {
        // Validate incoming request
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'points_required' => 'required|integer|min:0',
        ]);

        // Create a new reward instance
        $reward = new Rewards();
        $reward->nombre = $data['nombre'];
        $reward->descripcion = $data['descripcion'];
        $reward->cantidad = $data['cantidad'];
        $reward->points_required = $data['points_required'];

        // Save the reward
        $reward->save();

        // Redirect back to the store page with a success message
        return redirect('/store')->with('success', 'Recompensa creada correctamente.');
    }
}
