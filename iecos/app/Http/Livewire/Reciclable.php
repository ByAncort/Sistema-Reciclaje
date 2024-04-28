<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Reciclable extends Component
{
    //inicializamos varibles bases
    public $successMessage = false;
    public $quantity;
    public $selectedTypeId;

    

    public function render()
    {
        $tipos= DB::table('recycling_types')->get();
        return view('livewire.reciclable')->with('tipos', $tipos); 
    }

    public function saveReciclable()
    {
        $this->validate([
            'quantity' => 'required|numeric|min:0',
            'selectedTypeId' => 'required|exists:recycling_types,id',
        ]);
        
        DB::table('recyclable_items')->insert([
            'quantity' => $this->quantity,
            'recycling_type_id' => $this->selectedTypeId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->quantity = null;
        $this->selectedTypeId = null;
        $this->successMessage = true;
        session()->flash('success', '¡El reciclable se ha guardado correctamente!');
    }
}


