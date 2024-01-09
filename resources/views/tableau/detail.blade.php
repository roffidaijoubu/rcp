
<x-dashboard-layout>

    <div class="flex w-full h-full" >
        @livewire('tableau-list', ['property' => $tableau])
        <div class="h-full w-full bg-white" id="tableauContainer">
            <iframe src="{{$url}}" frameborder="0" class="w-full h-full"></iframe>
        </div>
    </div>
</x-dashboard-layout>
