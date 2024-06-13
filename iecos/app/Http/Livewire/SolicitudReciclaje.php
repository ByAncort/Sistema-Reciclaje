<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;

class SolicitudReciclaje extends Component
{
    public $ubicacion;
    public $kg_aprox;
    public $successMessage = false;
    public $cant_aprox;
    public $selectedTypeId;

    public function render()
    {
        $tipos = DB::table('recycling_types')->get();

        $solicitudes = Solicitud::join('users', 'recyclable_items.user_id', '=', 'users.id')
        ->join('recycling_types', 'recyclable_items.recycling_type_id', '=', 'recycling_types.id')
        ->where('recyclable_items.user_id', Auth::id())
        ->where('recyclable_items.estado', 'Pendiente')
        ->select('recyclable_items.*', 'users.name', 'users.location', 'recycling_types.name AS recycling_type_name')
        ->get();
    
           
        $solicitudesADM = Solicitud::join('users', 'recyclable_items.user_id', '=', 'users.id')
        ->join('recycling_types', 'recyclable_items.recycling_type_id', '=', 'recycling_types.id')
        
        ->where('recyclable_items.estado', 'Pendiente')
        ->select('recyclable_items.*', 'users.name', 'users.location', 'recycling_types.name AS recycling_type_name')
        ->get();
    
            // dd($solicitudesADM);
        return view('livewire.solicitud-reciclaje', [
            'solicitudes' => $solicitudes,
            'solicitudesADM' => $solicitudesADM,
            'tipos' => $tipos,
        ]);
    }

    public function confirmarReciclaje($solicitudId, $cantidad, $userId, $recyclingTypeId, $bonus)
    {
        // dd($solicitudId, $cantidad, $userId, $recyclingTypeId);
        $user = DB::table('users')->where('id', $userId)->first();
        $bonus = intval($bonus);
        if ($user) {
            // Obtiene el nombre, correo electrónico y rol del usuario
            $this->userName = $user->name;
            $this->userEmail = $user->email;
            $this->userRoleId = $user->role_id;
    
            // Obtiene la cantidad de reciclaje
            $quantity = $cantidad;
    
            // Inicializa los puntos
            $puntos = 0;
    
            // Busca el puntaje por kilo correspondiente al tipo de reciclaje seleccionado
            $puntaje = DB::table('puntajes')
                        ->where('recycling_type_id', $recyclingTypeId)
                        ->first();
    
            if ($puntaje) {
                // Calcula los puntos según la cantidad reciclada y el puntaje por kilo
                $weight = intval($puntaje->weight);
                $point=$puntaje->point;
                $puntosxkg=$point/$weight;
                $puntos = intval($quantity * $puntosxkg);
                // dd($puntos);
            } else {
                // Si no se encuentra un puntaje por kilo para el tipo de reciclaje seleccionado, muestra un mensaje de error
                session()->flash('error', 'No se encontró el puntaje correspondiente al tipo de reciclaje seleccionado');
                return;
            }
    
            // Actualiza el puntaje del usuario
            $nuevoPuntaje = $user->puntos + $puntos+$bonus;
            
            // dd($nuevoPuntaje);
            DB::table('users')->where('id', $userId)->update(['puntos' => $nuevoPuntaje]);
            DB::table('recyclable_items')->where('id', $solicitudId)->update(['estado'=>"Aprobado",'quantity'=>$cantidad]);
    
    
            // Reinicia las variables
            $this->quantity = null;
            $this->userId = null;
            $this->selectedTypeId = null;
            $this->successMessage = true;
            session()->flash('success', 'Solicitud confirmada exitosamente.');
            return redirect('/solicitud');
        } else {
            // Si no se encuentra el usuario, muestra un mensaje de error
            session()->flash('error', 'Usuario no encontrado');
            return;
        }

      
       
    }
    

    public function registrarSolicitud()
    {
        $this->validate([
            'cant_aprox' => 'required|numeric|min:0',
            'selectedTypeId' => 'required|exists:recycling_types,id',
        ]);

        DB::table('recyclable_items')->insert([
            'cant_aprox' => $this->cant_aprox,
            'recycling_type_id' => $this->selectedTypeId,
            'user_id' => Auth::id(), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/solicitud');
    }
}
