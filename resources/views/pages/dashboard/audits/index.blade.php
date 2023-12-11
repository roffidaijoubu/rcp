<?php
use function Laravel\Folio\name;


name('audits.index');



$user = auth()->user();

?>
<x-dashboard-layout>
    <div>

        {{$user->audits->count()}}
        @foreach ($user->audits as $item)
            <a href="
                {{route('audits.edit', ['audit' => $item])}}
            " wire:navigate>{{$item->year}}</a>
        @endforeach

    </div>
</x-dashboard-layout>
