<?php
use function Laravel\Folio\name;


name('assets');

?>

<x-dashboard-layout>
        <livewire:assets-table :search="request('search', '')" />
</x-dashboard-layout>
