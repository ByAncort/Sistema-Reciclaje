<div>
    <div class="row mb-3">
    <div class="col">
    <select class="form-select" wire:model="recycling_type_id" placeholder="Recycling Type">
        <option value="">Select Recycling Type</option>
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
        @endforeach
    </select>
</div>

        <div class="col">
            <input type="number" class="form-control" wire:model="point" placeholder="Point">
        </div>
        <div class="col">
            <input type="number" class="form-control" wire:model="weight" placeholder="Weight">
        </div>
        <div class="col">
            <button class="btn btn-primary" wire:click="agregarPuntaje">Modificar</button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Recycling Type ID</th>
                <th>Point</th>
                <th>Weight</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asasd as $puntaje)
                <tr>
                    <td>{{ $puntaje->id }}</td>
                    <td>{{ $puntaje->recycling_type_name }}</td>
                    <td>{{ $puntaje->point }}</td>
                    <td>{{ $puntaje->weight }}</td>
                    <td>{{ $puntaje->created_at }}</td>
                    <td>{{ $puntaje->updated_at }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
