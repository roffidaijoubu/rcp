<div wire:key="{{$key1}}-{{$key2}}-form">
    {{$note}}
    {{$score}}
    {{-- {{$key1}}
    {{$key2}} --}}
    <x-input type="text" wire:model.live="note" label="note" wire:key="{{$key1}}-{{$key2}}-note" />
    <br>
    <x-input type="text" wire:model.live="score" label="score" wire:key="{{$key1}}-{{$key2}}-score"/>
</div>
