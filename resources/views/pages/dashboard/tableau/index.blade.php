<?php
use function Laravel\Folio\name;


name('tableau');



use Detection\MobileDetect;

$d = new MobileDetect();

?>

<x-dashboard-layout>
    @if ($d->isMobile())
    @livewire('tableau-list',['isIndex' => true])
    @else
    <div class="flex w-full h-full">
        @livewire('tableau-list',['isIndex' => true])

        @slot('left_drawer')
            @livewire('tableau-list',['isIndex' => true])
        @endslot
        <div class="h-full w-full bg-base-100">
            <div class="flex flex-col items-center justify-center h-full">
                <div class="h-[400px] w-[400px] opacity-50 -mb-20 text-error">
                    <x-undraw illustration="charts" color="currentColor" />
                </div>

                <div class="text-2xl font-semibold text-base-content/70">Select a Tableau Dashboard</div>
                <div class="text-sm text-base-content/50">Pick from the list on the left to get started.
                </div>
            </div>
        </div>
    </div>
    @endif
</x-dashboard-layout>
