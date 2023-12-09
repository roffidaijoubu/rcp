<?php
// dd('tableau.detail');
use Detection\MobileDetect;

$d = new MobileDetect();

?>

@if ($d->isMobile())
    @livewire('bottomnav')
@else
    @livewire('sidebar')
@endif
