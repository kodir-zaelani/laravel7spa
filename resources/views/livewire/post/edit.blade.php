<div>
    {{-- In work, do what you enjoy. --}}
    <<div class="card card-primary mt-5">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Title">
            <br/>
            <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" rows="4" placeholder="Masukkan Konten"></textarea>
            <br />
        </div>
    </div>
</div>
