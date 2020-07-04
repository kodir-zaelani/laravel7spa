<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <input wire:model.lazy="name" type="text" name="" id=""  
                    class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col">
                    <input wire:model.lazy="phone" type="text" name="" id="" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number">
                    @error('phone')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
</div>
