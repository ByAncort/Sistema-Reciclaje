<form wire:submit.prevent="createUser" action="#" method="POST" role="form text-left">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="user-name" class="form-control-label">{{ __('Name') }}</label>
                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                    <input wire:model="user.name" class="form-control" type="text" placeholder="Name" id="user-name">
                </div>
                @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                    <input wire:model="user.email" class="form-control" type="email" placeholder="@example.com" id="user-email">
                </div>
                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Create User') }}</button>
    </div>
</form>
