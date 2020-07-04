<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent="save">
        
        @if ($image)
        {{--  Image Preview: 
        <br />  --}}
        <img src="{{ $image->temporaryUrl() }}" width="250">
         @endif
        <br />

        {{--  <div
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
        >  --}}

        <input type="file" wire:model="image">
        <br />
        <br />
        <!-- Progress Bar -->
    {{--  <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>  --}}

        <div wire:loading wire:target="image">Uploading...</div>

        <div wire:loading wire:target="save">Image store...</div>
        
        @error('image') <span class="error">{{ $message }}</span> @enderror
    
        <button type="submit">Save Image</button>
    </form>
</div>
