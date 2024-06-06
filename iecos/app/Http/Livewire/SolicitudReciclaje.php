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

    public function render()
    {
        
        $solicitudes = Solicitud::join('users', 'solicitudes_reciclaje.user_id', '=', 'users.id')
        ->where('solicitudes_reciclaje.user_id', Auth::id())
        ->where('solicitudes_reciclaje.estado', 'pendiente')
        ->select('solicitudes_reciclaje.*', 'users.email')
        ->get();
   
            $solicitudesADM =  Solicitud::join('users', 'solicitudes_reciclaje.user_id', '=', 'users.id')
            ->where('solicitudes_reciclaje.estado', 'pendiente')
            ->select('solicitudes_reciclaje.*', 'users.email')
            ->get();

        return view('livewire.solicitud-reciclaje', [
            'solicitudes' => $solicitudes,
            'solicitudesADM' => $solicitudesADM,
    ]);
    }

    public function marcarRealizado($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = 'realizado';
        $solicitud->save();

        return redirect('/solicitud');
    }

    public function registrarSolicitud()
    {
        
        $this->validate([
            'ubicacion' => 'required',
            'kg_aprox' => 'required|numeric|min:0',
        ]);

       
        DB::table('solicitudes_reciclaje')->insert([
            'ubicacion' => $this->ubicacion,
            'kg_aprox' => $this->kg_aprox,
            'user_id' => Auth::id(), 
            'estado' => 'pendiente',
            'created_at' => now(),
        ]);

        return redirect('/solicitud');
    }
}
