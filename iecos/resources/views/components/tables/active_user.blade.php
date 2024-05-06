<div class="col-lg-5">
    <div class="card h-100">
        <div class="card-header pb-0">
            <h6>Recompensas Canjeadas</h6>
            <hr>
        </div>
        <div class="card-body p-3" style="max-height: 400px; overflow-y: auto;">
            <div class="timeline timeline-one-side">
                @foreach ($canjeos as $movimiento)
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-bell-55 text-success text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">
                                {{ $movimiento->n_recompensa }} - {{ $movimiento->estado }} 
                            </h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $movimiento->created_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
