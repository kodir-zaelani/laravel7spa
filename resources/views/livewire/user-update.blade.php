<div>
    <form wire:submit.prevent="update">
        <input type="hidden" name="" wire:model="userId">
        <div class="form-group">
            <div class="row">
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
                    <textarea class="form-control @error('bio') is-invalid @enderror"
                    wire:model.lazy="bio"></textarea>
                    @error('bio')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
    </form>
</div>
