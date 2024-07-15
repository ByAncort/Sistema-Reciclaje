<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach($reward as $reward)
    <div class="col">
      <div class="card shop-card">
  
        <div class="card-body pt-2">
          <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">     {{ $reward->nombre}}</span>
          <a href="javascript:;" class="card-title h5 d-block text-darker">
            {{ $reward->nombre}}
          </a>
          <p class="card-description mb-4">
            {{$reward->descripcion}}
          </p>
          <div class="author align-items-center">
            <!-- <img src="./assets/img/kit/pro/team-2.jpg" alt="..." class="avatar shadow"> -->
            <div class="name ps-3">
              <span>Puntos necesarios: {{$reward->points_required}}</span>
              <div class="stats">
                <small>cantidad: {{$reward->cantidad}}</small>
              </div>
              
            </div>
          </div>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Edit">Editar</button>  
          <button type="button" wire:click="shop({{ $reward->id }})"" class="btn btn-primary btn-lg">canjear</button>

        </div>
      </div>
    </div>
  @endforeach
</div>
