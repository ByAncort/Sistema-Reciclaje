@php
$user = Auth::user();
@endphp

<div>
    @if ($successMessage)
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    <script>
    setTimeout(function() {
        @this.set('successMessage', false);
    }, 2000);
    </script>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    <script>
    setTimeout(function() {
        @this.set('errorMessage', false);
    }, 2000);
    </script>
    @endif

    <div class="card card-body">
        <form wire:submit.prevent="registrarSolicitud">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cant_aprox" class="form-label">Cantidad de reciclaje</label>
                        <input wire:model.defer="cant_aprox" type="number" class="form-control" id="cant_aprox" placeholder="Kg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectedTypeId" class="form-control-label">Tipo de reciclaje</label>
                        <div class="border rounded-3">
                            <select wire:model.defer="selectedTypeId" class="form-select" id="selectedTypeId">
                                <option value="">Seleccione un tipo</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <hr>

    @if($user && ($user->hasRole(1) || $user->hasRole(2)))
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad Aprox</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo de Reciclaje</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Usuario</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ubicación</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudesADM as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->cant_aprox }} kg</td>
                        <td>{{ $solicitud->recycling_type_name }}</td>
                        <td>{{ $solicitud->name }}</td>
                        <td>{{ $solicitud->location }}</td>
                        <td>
                            @if ($solicitud->estado === 'Pendiente')
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-block bg-gradient-warning mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $solicitud->id }}" data-cantidad="{{ $solicitud->cant_aprox }}" data-userid="{{ $solicitud->user_id }}" data-recyclingtypeid="{{ $solicitud->recycling_type_id }}">
                                Confirmar
                            </button>
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

    @if($user && !($user->hasRole(1) || $user->hasRole(2)))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>quantity</th>
                    <th>recycling_type_id</th>
                    <th>user_id</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->quantity }}</td>
                    <td>{{ $solicitud->recycling_type_id }}</td>
                    <!-- <td>{{ $solicitud->user_id }}</td> -->
                    <td>{{ $solicitud->name }}</td>
                    <td>{{ $solicitud->location }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Reciclaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modal-quantity" class="col-form-label">Cantidad de reciclaje:</label>
                        <input type="text" class="form-control" id="modal-quantity">
                    </div>
                    <div class="form-group">
                        <label for="modal-bonus" class="col-form-label">Bonus:</label>
                        <input type="text" class="form-control" id="modal-bonus">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn bg-gradient-primary" id="save-changes">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var solicitudId = button.getAttribute('data-id');
            var cantidad = button.getAttribute('data-cantidad');
            var userId = button.getAttribute('data-userid');
            var recyclingTypeId = button.getAttribute('data-recyclingtypeid');

            var modalQuantity = document.getElementById('modal-quantity');
            var modalBonus = document.getElementById('modal-bonus');
            modalQuantity.value = cantidad;

            var saveChangesButton = document.getElementById('save-changes');
            saveChangesButton.onclick = function () {
                @this.confirmarReciclaje(solicitudId, modalQuantity.value, userId, recyclingTypeId, modalBonus.value);
            };
        });
    });
</script>
