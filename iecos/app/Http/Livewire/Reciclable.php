<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Reciclable extends Component
{
    public $successMessage = false;
    public $quantity;
    public $selectedTypeId;
    public $userRut;
    public $userName;
    public $userEmail;
    public $userPhone;
    public $userLocation;
    public $userAbout;
    public $userRoleId;

    public function render()
    {
        $tipos = DB::table('recycling_types')->get();
        return view('livewire.reciclable', compact('tipos'));
    }

    public function saveReciclable()
    {
        $this->validate([
            'quantity' => 'required|numeric|min:0',
            'selectedTypeId' => 'required|exists:recycling_types,id',
            'userRut' => 'required|exists:users,rut',
        ]);

        $user = DB::table('users')->where('rut', $this->userRut)->first();
        if ($user) {
            $this->userName = $user->name;
            $this->userEmail = $user->email;
            $this->userRoleId = $user->role_id;

            $quantity = intval($this->quantity);
            $puntos = 0;

            if ($this->selectedTypeId == 1) {
                $puntos = $this->quantity / 2;
            } elseif ($this->selectedTypeId == 2) {
                $puntos = $this->quantity / 3;
            } elseif ($this->selectedTypeId == 3) {
                $puntos = $this->quantity / 1.5;
            }

            $puntaje = $user->puntos;
            $nuevoPuntaje = $puntaje + $puntos;

            DB::table('users')->where('rut', $this->userRut)->update(['puntos' => $nuevoPuntaje]);

            DB::table('recyclable_items')->insert([
                'quantity' => $this->quantity,
                'recycling_type_id' => $this->selectedTypeId,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            session()->flash('error', 'Usuario no encontrado');
            return;
        }

        $this->quantity = null;
        $this->userRut = null;
        $this->selectedTypeId = null;
        $this->successMessage = true;
        session()->flash('success', '¡El reciclaje se ha guardado correctamente!');
    }
    

    public function updatedUserRut()
    {
        $user = DB::table('users')->where('rut', $this->userRut)->first();
        if ($user) {
            $this->userName = $user->name;
            // Asigna el resto de los campos del usuario si es necesario
        } else {
            $this->userName = 'Usuario no encontrado';
        }
    }
}
