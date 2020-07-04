<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <input wire:model.lazy="name" type="text" name="" id=""  
                    class="form-control @error('name') is-invalid @enderror"  placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <input wire:model.lazy="email" type="email" name="" id="" class="form-control @error('email') is-invalid @enderror"  placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col">
                    <input wire:model.lazy="password" type="password" name="" id="" class="form-control @error('password') is-invalid @enderror"  placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <input wire:model.lazy="password_confirmation" type="password" name="" id="" class="form-control"  placeholder="Password Confirm">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col">
                    <label>Bio</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror"
                    wire:model.lazy="bio"></textarea>
                    @error('bio')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br/>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
</div>
