<div class="col-lg-5">
    <div class="card h-100">
        <div class="card-header pb-0">
            <h6>Últimos Movimientos</h6>
            <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> este mes
            </p>
        </div>
        <div class="card-body p-3">
            <div class="timeline timeline-one-side">
            @foreach ($ultimoMovimiento as $movimiento)
    <div class="timeline-block mb-3">
        <span class="timeline-step">
            <i class="ni ni-bell-55 text-success text-gradient"></i>
        </span>
        <div class="timeline-content">
            <h6 class="text-dark text-sm font-weight-bold mb-0">
            {{ $movimiento->recycling_type_name }} - {{ $movimiento->quantity }} kg
            </h6>
            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $movimiento->created_at }}</p>
        </div>
    </div>
@endforeach




            </div>
        </div>
    </div>
</div>
