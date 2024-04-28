<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Reciclable extends Component
{
    // inicializamos variables bases
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
            'userId' => 'required|exists:users,id', // asegúrate de validar el ID del usuario
        ]);

        
        $user = DB::table('users')->where('id', $this->userId)->first();
        if ($user) {
            $this->userName = $user->name;
            $this->userEmail = $user->email;
            $this->userPhone = $user->phone;
            $this->userLocation = $user->location;
            $this->userAbout = $user->about;
            $this->userRoleId = $user->role_id;

           
            DB::table('recyclable_items')->insert([
                'quantity' => $this->quantity,
                'recycling_type_id' => $this->selectedTypeId,
                'user_id' => $this->userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            
            session()->flash('error', 'Usuario no encontrado');
            return;
        }

        $this->quantity = null;
        $this->userId = null;
        $this->selectedTypeId = null;
        $this->successMessage = true;
        session()->flash('success', '¡El reciclaje se ha guardado correctamente!');
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
