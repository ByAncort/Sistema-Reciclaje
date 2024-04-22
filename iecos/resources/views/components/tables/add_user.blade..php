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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="user-phone" class="form-control-label">{{ __('Phone') }}</label>
                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                    <input wire:model="user.phone" class="form-control" type="tel" placeholder="Phone" id="user-phone">
                </div>
                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user-location" class="form-control-label">{{ __('Location') }}</label>
                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                    <input wire:model="user.location" class="form-control" type="text" placeholder="Location" id="user-location">
                </div>
                @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="user-about">{{ __('About Me') }}</label>
        <div class="@error('user.about')border border-danger rounded-3 @enderror">
            <textarea wire:model="user.about" class="form-control" id="user-about" rows="3" placeholder="Say something about yourself"></textarea>
        </div>
        @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Create User') }}</button>
    </div>
</form>
