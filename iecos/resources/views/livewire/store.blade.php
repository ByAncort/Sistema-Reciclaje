<main class="main-content">
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Canjeo de Puntos</h1>
            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>
        </div>

        @include('components.plugins.cards')
        @include('components.modal.add_rewards')
        

    </div>
</main>