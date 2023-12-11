<?php
use function Laravel\Folio\name;


name('audit');



use Detection\MobileDetect;

$d = new MobileDetect();

?>
<x-dashboard-layout>
    Audits here
</x-dashboard-layout>
