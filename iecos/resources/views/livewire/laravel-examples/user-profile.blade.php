<div>
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mx-4 ml-3"
        style="background-image: url('{{ asset('assets/img/curved-images/bg-signup.jpg') }}'); background-position-y: 40%;  ">
        <span class="bg-gradient-primary opacity-6"></span>
    </div>
</div>

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Información de Perfil') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                @if ($showDemoNotification)
                <div wire:model="showDemoNotification" class="mt-3 alert alert-primary alert-dismissible fade show"
                    role="alert">
                    <span class="alert-text text-white">
                        {{ __('Información de perfil guardada correctamente') }}</span>
                    <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Cerrar">
                    </button>
                </div>
                @endif

                @if ($showSuccesNotification)
                <div wire:model="showSuccesNotification"
                    class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text text-white">{{ __('¡Tu información de perfil se ha guardado correctamente!') }}</span>
                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Cerrar">
                    </button>
                </div>
                @endif

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Nombre Completo') }}</label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.name" class="form-control" type="text" placeholder="Nombre"
                                        id="user-name">
                                </div>
                                @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Correo Electrónico') }}</label>
                                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.email" class="form-control" type="email"
                                        placeholder="ejemplo@dominio.com" id="user-email">
                                </div>
                                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-location" class="form-control-label">{{ __('Ubicación') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input wire:model.live="user.location" class="form-control" type="text"
                                        placeholder="Ubicación" id="user-location">
                                </div>
                                @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-phone" class="form-control-label">{{ __('Teléfono') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input wire:model.live="user.phone" class="form-control" type="tel"
                                        placeholder="40770888444" id="user-phone">
                                </div>
                                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Guardar Cambios') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
