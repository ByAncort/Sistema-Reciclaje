<div>
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            Abrir formulario
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
                        <div class="form-group">
                            <label for="user-role" class="form-control-label">Tipo de reciclaje</label>
                            <div class="border border-danger rounded-3">
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>