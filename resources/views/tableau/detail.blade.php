<x-dashboard-layout>

    <div class="flex w-full h-full">
        @livewire('tableau-list', ['property' => $tableau])
        <div>
            {{$tableau->name}}
        </div>
    </div>
    
    
</x-dashboard-layout>