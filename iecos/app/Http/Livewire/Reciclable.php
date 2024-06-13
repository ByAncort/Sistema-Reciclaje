<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Reciclable extends Component
{
    // Inicializamos variables bases
    public $successMessage = false;
    public $quantity;
    public $selectedTypeId;
    public $userId;
    public $userName;
    public $userEmail;
    public $userPhone;
    public $userLocation;
    public $userAbout;
    public $userRoleId;
    public $bonus = 0; 

    public function render()
    {
        $tipos = DB::table('recycling_types')->get();
        $users = DB::table('users')->get();
        return view('livewire.reciclable', compact('tipos', 'users'));
    }

    public function saveReciclable()
    {
        $this->validate([
            'quantity' => 'required|numeric|min:0',
            'selectedTypeId' => 'required|exists:recycling_types,id',
            'userId' => 'required|exists:users,id',
            'bonus' => 'nullable|numeric|min:0', 
        ]);

        // Obtiene la información del usuario
        $user = DB::table('users')->where('id', $this->userId)->first();

        if ($user) {
            // Obtiene el nombre, correo electrónico y rol del usuario
            $this->userName = $user->name;
            $this->userEmail = $user->email;
            $this->userRoleId = $user->role_id;

            // Obtiene la cantidad de reciclaje
            $quantity = intval($this->quantity);

            // Inicializa los puntos
            $puntos = 0;

            // Busca el puntaje por kilo correspondiente al tipo de reciclaje seleccionado
            $puntaje = DB::table('puntajes')
                        ->where('recycling_type_id', $this->selectedTypeId)
                        ->first();

            if ($puntaje) {
                // Calcula los puntos según la cantidad reciclada y el puntaje por kilo
                $weight = intval($puntaje->weight);
                $point = $puntaje->point;
                $puntosxkg = $point / $weight;
                $puntos = intval($quantity * $puntosxkg);
            } else {
                // Si no se encuentra un puntaje por kilo para el tipo de reciclaje seleccionado, muestra un mensaje de error
                session()->flash('error', 'No se encontró el puntaje correspondiente al tipo de reciclaje seleccionado');
                return;
            }
            $bonus = intval($this->bonus);
            // Actualiza el puntaje del usuario sumando los puntos calculados y el bonus
            $nuevoPuntaje = $user->puntos + $puntos +$bonus;
            // dd($nuevoPuntaje,$puntos,$bonus);
            DB::table('users')->where('id', $this->userId)->update(['puntos' => $nuevoPuntaje]);

            // Inserta el nuevo elemento reciclable
            DB::table('recyclable_items')->insert([
                'quantity' => $quantity,
                'recycling_type_id' => $this->selectedTypeId,
                'user_id' => $this->userId,
                'created_at' => now(),
                'updated_at' => now(),
                'estado' => "Aprobado",
            ]);

            // Reinicia las variables
            $this->quantity = null;
            $this->userId = null;
            $this->selectedTypeId = null;
            $this->bonus = 0; // Reset bonus to 0
            $this->successMessage = true;
            session()->flash('success', '¡El reciclaje se ha guardado correctamente!');
        } else {
            // Si no se encuentra el usuario, muestra un mensaje de error
            session()->flash('error', 'Usuario no encontrado');
            return;
        }
    }

    public function updatedUserId()
    {
        $user = DB::table('users')->where('id', $this->userId)->first();
        if ($user) {
            $this->userName = $user->email;
        } else {
            $this->userName = 'Usuario no encontrado';
        }
    }
}
