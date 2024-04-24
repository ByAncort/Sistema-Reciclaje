<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Recompensa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addRewardForm" method="POST" action="{{ route ('add-rewards') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la recompensa" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la recompensa" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad disponible" required>
                    </div>
                    <div class="mb-3">
                        <label for="points_required" class="form-label">Puntos Requeridos</label>
                        <input type="number" class="form-control" id="points_required" name="points_required" placeholder="Puntos necesarios para canjear" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="guardarBtn" class="btn bg-gradient-primary">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script>
    document.getElementById("guardarBtn").addEventListener("click", function(event) {
        var form = document.getElementById("addRewardForm");
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add("was-validated");
    });
</script>
