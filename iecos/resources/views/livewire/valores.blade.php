<div>
    <div class="row mb-3">
    <div class="col">
    <select class="form-select" wire:model="recycling_type_id" placeholder="Recycling Type">
        <option value="">Tipo de reciclaje</option>
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

    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <!-- Encabezados de la tabla -->
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recycling Type</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Point</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Weight</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
        </tr>
      </thead>
      <!-- Cuerpo de la tabla -->
      <tbody>
        @foreach ($asasd as $puntaje)
        <tr>
          <td>
            <p class="text-xs font-weight-bold mb-0">{{ $puntaje->id }}</p>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">{{ $puntaje->recycling_type_name }}</p>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">{{ $puntaje->point }}</p>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">{{ $puntaje->weight }}</p>
          </td>
          <td class="align-middle text-center text-sm">
            <span>{{ $puntaje->created_at }}</span>
          </td>
          <td class="align-middle text-center text-sm">
            <span>{{ $puntaje->updated_at }}</span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

</div>
