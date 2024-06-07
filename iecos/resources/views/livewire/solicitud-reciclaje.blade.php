<!-- resources/views/livewire/solicitud-reciclaje.blade.php -->

@php
$user = Auth::user();
@endphp

<div>
  

    <!-- Formulario para ingresar una nueva solicitud -->
    <form wire:submit.prevent="registrarSolicitud">
        <div class="card card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="ubicacion">Ubicación:</label>
        <input wire:model="ubicacion" type="text" class="form-control" id="ubicacion" placeholder="Ingrese la ubicación">
        @error('ubicacion') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="kg_aprox">Kg Aproximados a Recolectar:</label>
        <input wire:model="kg_aprox" type="number" class="form-control" id="kg_aprox" placeholder="Ingrese kg aproximados">
        @error('kg_aprox') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
    </div>
    </div>
  </div>
</form>


    <hr>
    @if($user && ($user->hasRole(1) || $user->hasRole(2)))
    <!-- Tabla de solicitudes -->
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ubicación</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KG aprox</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach ($solicitudesADM as $solicitud)
                    <tr>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $solicitud->ubicacion }}</p>
                        </td>
                        <td class="align-middle text-center text-sm ">
                            <span class="badge badge-sm badge-{{ $solicitud->estado === 'PENDIENTE' ? 'secondary' : 'secondary' }}">{{ $solicitud->estado }}</span>
                        </td>
                        <td>
                        <p class="text-xs text-secondary mb-0">{{ $solicitud->kg_aprox }}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ $solicitud->email }}</p>
                        </td>
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
        </div>
    </div>
@endif

    </tbody>
    </table>
  
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