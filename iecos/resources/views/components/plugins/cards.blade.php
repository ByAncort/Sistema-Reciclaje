<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach($reward as $reward)
    <div class="col">
      <div class="card shop-card">
        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
          <a href="javascript:;" class="d-block">
            <img src="{{ asset('assets/img/curved-images/curved-8.jpg') }}" class="img-fluid border-radius-lg">
          </a>
        </div>
        <div class="card-body pt-2">
          <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span>
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
          <!-- <button type="button" class="btn btn-outline-success">Success</button>   -->
          <button type="button" class="btn btn-primary btn-lg">Large button</button>
        </div>
      </div>
    </div>
  @endforeach
</div>
