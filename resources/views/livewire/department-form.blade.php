<div>
    {{-- The whole world belongs to you. --}}
    <input wire:model="name" type="text">
    <button wire:click="submit">Submit</button>
   @if($success)
        <div>
     Saved
    </div>
    @endif
</div>
