@php
$user = Auth::user();
@endphp

<main class="main-content">
    @if(session('success'))
    <div id="success-alert" class="alert alert-success" role="alert">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        <strong>¡Error!</strong> {{ session('error') }}
    </div>
    @endif

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Canjeo de Puntos</h1>
            @if($user && $user->hasRole(2))
            <button type="button" class="btn bg-gradient-primary m-3" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Agregar recompensa
            </button>
            @endif
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($reward as $rewardItem)
            @if($rewardItem->cantidad > 1)
            <div class="col">
                <div class="card shop-card">
                    <div class="card-body pt-2">

                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">
                            {{ $rewardItem->nombre }}
                        </span>
                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                            {{ $rewardItem->nombre }}
                        </a>
                        <p class="card-description mb-4">
                            {{ $rewardItem->descripcion }}
                        </p>
                        <div class="author align-items-center">
                            <div class="name ps-3">
                                <span>Puntos necesarios: {{ $rewardItem->points_required }}</span>
                                <div class="stats">
                                    <small>Cantidad: {{ $rewardItem->cantidad }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">

                            <button type="button" wire:click="shop({{ $rewardItem->id }})"
                                class="btn btn-primary btn-lg ms-2">
                                Canjear
                            </button>
                            @if($user && $user->hasRole(2))
                            <button class="edit-button ms-2" data-bs-toggle="modal"
                                data-bs-target="#editRewardModal{{ $rewardItem->id }}">
                                <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                    </path>
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Reward Modal -->
            <div class="modal fade" id="editRewardModal{{ $rewardItem->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editRewardModalLabel{{ $rewardItem->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRewardModalLabel{{ $rewardItem->id }}">Editar Recompensa
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('edit-reward', ['id' => $rewardItem->id]) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nombre{{ $rewardItem->id }}" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre{{ $rewardItem->id }}"
                                        name="nombre" value="{{ $rewardItem->nombre }}">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion{{ $rewardItem->id }}" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion{{ $rewardItem->id }}"
                                        name="descripcion" rows="3" required>{{ $rewardItem->descripcion }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="points_required{{ $rewardItem->id }}" class="form-label">Puntos
                                        Requeridos</label>
                                    <input type="number" class="form-control" id="points_required{{ $rewardItem->id }}"
                                        name="points_required" value="{{ $rewardItem->points_required }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cantidad{{ $rewardItem->id }}" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad{{ $rewardItem->id }}"
                                        name="cantidad" value="{{ $rewardItem->cantidad }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        @include('components.modal.add_rewards')

        <script>
        // Ocultar la alerta después de 2 segundos
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.classList.add('d-none');
            }
        }, 2000);
        </script>
    </div>
</main>