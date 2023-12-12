<?php
use function Laravel\Folio\name;

name('audits');

$user = auth()->user();

?>
<x-dashboard-layout>
    <div>

        {{ $user->audits->count() }}
        <ul class="menu">

            @foreach ($user->audits as $item)
            <li>

                <a href="
                {{ route('audits.edit', ['audit' => $item]) }}
                "
                wire:navigate>{{ $item->name }}</a>
            </li>
            @endforeach
        </ul>

    </div>
</x-dashboard-layout>
