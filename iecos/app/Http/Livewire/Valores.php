<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Valores extends Component
{
    public $puntajes;
    public $recycling_type_id;
    public $point;
    public $weight;
    public $selectedTypeId;

    public function mount()
    {
        // Cargar los puntajes al iniciar el componente
        $this->cargarPuntajes();
    }

    public function render()
    {
        $tipos = DB::table('recycling_types')->get();
        $asasd = DB::table('puntajes as a')
        ->join('recycling_types as b', 'a.recycling_type_id', '=', 'b.id')
        ->select('a.*', 'b.name as recycling_type_name')
        ->get();

        return view('livewire.valores', [
            'tipos' => $tipos,
            'asasd' => $asasd,
        ]);
    }

    public function cargarPuntajes()
    {
        // Obtener todos los puntajes de la base de datos junto con los nombres de los tipos de reciclaje
        $this->puntajes = DB::table('puntajes as a')
            ->join('recycling_types as b', 'a.recycling_type_id', '=', 'b.id')
            ->select('a.*', 'b.name as recycling_type_name')
            ->get();

            
    }
    
    public function agregarPuntaje()
    {
        // Validación simple para asegurarse de que se hayan ingresado valores
        $this->validate([
            'recycling_type_id' => 'required',
            'point' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
    
        // Imprimir los valores para verlos antes de la inserción
        // dd([
        //     'recycling_type_id' => $this->recycling_type_id,
        //     'point' => $this->point,
        //     'weight' => $this->weight,
        // ]);
    
        try {
            // Insertar un nuevo puntaje
            DB::table('puntajes')
            ->where('recycling_type_id' ,$this->recycling_type_id)
            ->update([
                'point' => $this->point,
                'weight' => $this->weight,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Recargar los puntajes para reflejar los cambios en la tabla
            $this->cargarPuntajes();
    
            // Limpiar los campos después de agregar el puntaje
            $this->recycling_type_id = null;
            $this->point = null;
            $this->weight = null;
        } catch (\Exception $e) {
            // Capturar cualquier excepción y mostrar un mensaje de error
            session()->flash('error', 'Error al agregar el puntaje: ' . $e->getMessage());
        }
    }
    

}