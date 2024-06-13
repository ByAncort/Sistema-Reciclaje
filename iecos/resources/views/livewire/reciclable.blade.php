<div>
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            Ingresar reciclaje
        </button>
    
    </p>
    @if ($successMessage)
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    <script>
    setTimeout(function() {
        @this.set('successMessage', false);
    }, 2000); // Oculta el mensaje después de 5 segundos (5000 milisegundos)
    </script>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    <script>
    setTimeout(function() {
        @this.set('errorMessage', false);
    }, 2000); // Oculta el mensaje después de 2 segundos (2000 milisegundos)
    </script>
@endif


    <div class="collapse show">
    <div class="card card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="userId" class="form-label">ID del Usuario</label>
                    <input wire:model.lazy="userId" type="number" class="form-control" id="userId"
                        placeholder="ID del Usuario" @blur="loadUserName">
                </div>
            </div>

            <div class="col-md-6">
                <label for="userName" class="form-label">Nombre del Usuario</label>
                <input wire:model="userName" type="text" class="form-control" id="userName" disabled>
            </div>
        </div>
    </div>
</div>



    <div class="collapse" id="collapseExample">
        <div class="card card-body">

            <form wire:submit.prevent="saveReciclable">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cantidad de reciclaje</label>
                            <input wire:model.defer="quantity" type="quantity" class="form-control"
                                id="exampleFormControlInput1" placeholder="Kg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">bonus</label>
                            <input wire:model.defer="bonus" type="bonus" class="form-control"
                                id="exampleFormControlInput2" placeholder="Puntos">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-role" class="form-control-label">Tipo de reciclaje</label>
                            <div class="border rounded-3">
                                <select wire:model.defer="selectedTypeId" class="form-select" id="user-role">
                                    <option value="">Select Role</option>
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
    </div>
</div>

<!-- form de bonus -->

<div class="collapse" id="Bonus">
    <div class="card card-body">
        <form wire:submit.prevent="agregarBonus">
            <div class="mb-3">
                <label for="bonusPoints" class="form-label">Puntos de bonificación</label>
                <input wire:model.defer="bonusPoints" type="number" class="form-control" id="bonusPoints" placeholder="Puntos">
            </div>
            <button type="submit" class="btn btn-success">Agregar Bonus</button>
        </form>
    </div>
</div>
