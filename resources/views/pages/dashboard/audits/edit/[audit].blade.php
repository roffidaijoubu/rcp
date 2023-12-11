<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.edit');

?>


<x-dashboard-layout>

    @foreach ($audit->assessment->all() as $item)
        @php
            $item = (object) $item;
            $item = optional($item);
        @endphp
        @if ($item->clause)
            <div>
                {{$item->clause}}
            </div>
        @endif
    @endforeach

    @livewire('audit-form', ['audit' => $audit]);

</x-dashboard-layout>
