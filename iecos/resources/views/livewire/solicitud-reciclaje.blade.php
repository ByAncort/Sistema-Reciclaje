<!-- resources/views/livewire/solicitud-reciclaje.blade.php -->

@php
    $user = Auth::user();
@endphp

<div>
    <h2>Registro de Solicitud de Reciclaje</h2>

    <!-- Formulario para ingresar una nueva solicitud -->
    <form wire:submit.prevent="registrarSolicitud">
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input wire:model="ubicacion" type="text" class="form-control" id="ubicacion">
            @error('ubicacion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="kg_aprox">Kg Aproximados a Recolectar:</label>
            <input wire:model="kg_aprox" type="number" class="form-control" id="kg_aprox">
            @error('kg_aprox') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
    </form>

    <hr>
    @if($user && ($user->hasRole(1) || $user->hasRole(2)))
    <!-- Tabla de solicitudes -->
    <table class="table table-striped">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>KG aprox </th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            @foreach ($solicitudesADM as $solicitud)
                <tr>
                    <td>{{ $solicitud->ubicacion }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->kg_aprox }}</td>
                    <td>{{ $solicitud->email }}</td>
                    <td>
                        @if ($solicitud->estado === 'pendiente')
                            <button wire:click="marcarRealizado({{ $solicitud->id }})" class="btn btn-primary">Marcar como Realizado</button>
                        @else
                            Realizado
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if($user && !($user->hasRole(1) || $user->hasRole(2)))
<!-- Tabla de solicitudes -->
<table class="table table-striped">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>KG aprox </th>
                
            </tr>
        </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->ubicacion }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->kg_aprox }}</td>
                    <td>{{ $solicitud->email }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif


</div>
