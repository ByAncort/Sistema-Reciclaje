  <section class="h-100-vh mb-8">
      <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
          style="background-image: url('../assets/img/curved-images/login.jpg');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-5 text-center mx-auto">
                      <h1 class="text-white mb-2 mt-5">{{ __('Bienvenido a Iecos!') }}</h1>

                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row mt-lg-n10 mt-md-n11 mt-n10">
              <div class="col-xl-8 col-lg-8 col-md-7 mx-auto">
                  <div class="card z-index-0">
                      <div class="card-header text-center pt-4">
                          <h5>{{ __('Registrate aqui') }}</h5>
                      </div>

                      <div class="card-body">
                          @if ($errors->has('password'))
                          <div class="alert alert-danger">
                              {{ $errors->first('password') }}
                          </div>
                          @endif

                          @if ($errors->has('phone'))
                          <div class="alert alert-danger">
                              {{ $errors->first('phone') }}
                          </div>
                          @endif

                          @if ($errors->has('registration'))
                          <div class="alert alert-danger">
                              {{ $errors->first('registration') }}
                          </div>
                          @endif


                          <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
                              <div class="row">
                                  <!-- User Information Section -->
                                  <div class="col-md-6">
                                      <h4 class="mb-3">Información del Usuario</h4>
                                      <div class="mb-3">
                                          <div class="@error('name') border border-danger rounded-3 @enderror">
                                              <input wire:model="name" type="text" class="form-control"
                                                  placeholder="Nombre" aria-label="Nombre"
                                                  aria-describedby="name-addon">
                                          </div>
                                          @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div class="@error('email') border border-danger rounded-3 @enderror">
                                              <input wire:model="email" type="email" class="form-control"
                                                  placeholder="Correo Electrónico" aria-label="Correo Electrónico"
                                                  aria-describedby="email-addon">
                                          </div>
                                          @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div class="@error('password') border border-danger rounded-3 @enderror">
                                              <input wire:model="password" type="password" class="form-control"
                                                  placeholder="Contraseña" aria-label="Contraseña"
                                                  aria-describedby="password-addon">
                                          </div>
                                          @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div
                                              class="@error('password_confirmation') border border-danger rounded-3 @enderror">
                                              <input wire:model="password_confirmation" type="password"
                                                  class="form-control" placeholder="Confirmar Contraseña"
                                                  aria-label="Confirmar Contraseña"
                                                  aria-describedby="password_confirmation-addon">
                                          </div>
                                          @error('password_confirmation') <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div class="@error('phone') border border-danger rounded-3 @enderror">
                                              <input wire:model="phone" type="text" class="form-control"
                                                  placeholder="Teléfono" aria-label="Teléfono"
                                                  aria-describedby="phone-addon">
                                          </div>
                                          @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div
                                              class="@error('phone_confirmation') border border-danger rounded-3 @enderror">
                                              <input wire:model="phone_confirmation" type="text" class="form-control"
                                                  placeholder="Confirmar Teléfono" aria-label="Confirmar Teléfono"
                                                  aria-describedby="phone_confirmation-addon">
                                          </div>
                                          @error('phone_confirmation') <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div>
                                  <!-- Address Information Section -->
                                  <div class="col-md-6">
                                      <h4 class="mb-3">Información de Dirección</h4>
                                      <div class="mb-3">
                                          <div class="@error('region') border border-danger rounded-3 @enderror">
                                              <input wire:model="region" type="text" class="form-control"
                                                  placeholder="Región" aria-label="Región"
                                                  aria-describedby="region-addon">
                                          </div>
                                          @error('region') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div class="@error('comuna') border border-danger rounded-3 @enderror">
                                              <input wire:model="comuna" type="text" class="form-control"
                                                  placeholder="Comuna" aria-label="Comuna"
                                                  aria-describedby="comuna-addon">
                                          </div>
                                          @error('comuna') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div class="@error('calle') border border-danger rounded-3 @enderror">
                                              <input wire:model="calle" type="text" class="form-control"
                                                  placeholder="Calle" aria-label="Calle" aria-describedby="calle-addon">
                                          </div>
                                          @error('calle') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div
                                              class="@error('numero_direccion') border border-danger rounded-3 @enderror">
                                              <input wire:model="numero_direccion" type="text" class="form-control"
                                                  placeholder="Número de Dirección" aria-label="Número de Dirección"
                                                  aria-describedby="numero_direccion-addon">
                                          </div>
                                          @error('numero_direccion') <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                          <div class="@error('tipo_usuario') border border-danger rounded-3 @enderror">
                                              <select wire:model="tipo_usuario" class="form-control"
                                                  aria-label="Tipo de Usuario" aria-describedby="tipo_usuario-addon">
                                                  <option value="">Selecciona Tipo de Usuario</option>
                                                  @foreach($Tipos as $tipo)
                                                  <option value="{{ $tipo['id'] }}">{{ $tipo['name'] }}</option>
                                                  @endforeach
                                              </select>


                                          </div>
                                          @error('tipo_usuario') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>

                                  </div>
                              </div>

                              <!-- Terms and Submit Section -->
                              <div class="form-check form-check-info text-left">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                      checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                      {{ __('I agree the') }} <a href="javascript:;"
                                          class="text-dark font-weight-bolder">{{ __('Terms and Conditions') }}</a>
                                  </label>
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-2">Sign up</button>
                              </div>
                              <p class="text-sm mt-3 mb-0">{{ __('Already have an account? ') }}<a
                                      href="{{ route('login') }}"
                                      class="text-dark font-weight-bolder">{{ __('Sign in') }}</a></p>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </section>