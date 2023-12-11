<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.edit');



?>


<x-dashboard-layout>
    Editing:

    @foreach ($audit->assessment->all() as $item)
        @php
            $item = (object) $item;
        @endphp
        {{$item->clause ?? ''}}
    @endforeach

</x-dashboard-layout>
