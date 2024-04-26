@php
    $user = Auth::user();
@endphp

<main class="main-content">
    @if(session('success'))
    <div id="success-alert" class="alert alert-success" role="alert">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
    @endif

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Canjeo de Puntos</h1>
            @if($user && $user->hasRole(2))
            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
            @endif
        </div>

        @include('components.plugins.cards')
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
</main>
