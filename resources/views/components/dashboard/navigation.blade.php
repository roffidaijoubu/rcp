<?php
// dd('tableau.detail');
use Detection\MobileDetect;

$d = new MobileDetect();

$menus = [
    [
        'label' => 'Dashboard',
        'route' => 'tableau',
        'icon' => 's-chart-bar-square',
    ],
    [
        'label' => 'Assets',
        'route' => 'assets',
        'icon' => 'o-table-cells',
    ],
    [
        'label' => 'Audit',
        'route' => 'audit',
        'icon' => 'o-users',
    ],
];

?>

@if ($d->isMobile())
    @livewire('bottomnav', ['menus' => $menus])
@else
    @livewire('sidebar', ['menus' => $menus])
@endif
