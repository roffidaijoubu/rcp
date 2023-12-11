<?php
use function Laravel\Folio\name;

name('tableau.detail');

use App\Models\Dashboard;
use function Laravel\Folio\render;
use Illuminate\View\View;
use Illuminate\Http\Request;

render(function (View $view, Dashboard $dashboard, Request $request) {
    $id = $dashboard->id;
    $tableau_dashboard = Dashboard::findOrFail($id);
    $tableau_ticket = Dashboard::signIn($request->ip());
    $tableau_view_url = Dashboard::getViewUrl($tableau_ticket, $tableau_dashboard->view_name, $tableau_dashboard->workbook_name);

    $var = [
        'url' => $tableau_view_url,
        'tableau' => $dashboard,
    ];

    return $view->with('var', $var);
});

use Detection\MobileDetect;

$d = new MobileDetect();
?>

<x-dashboard-layout>

    <div class="flex w-full h-full">
        @if (!$d->isMobile())
            @livewire('tableau-list',['isIndex' => true])
        @endif
        <div class="h-full w-full bg-white flex flex-col md:block" id="tableauContainer">
            <div class="md:hidden w-full bg-white text-black border-b-[1px] border-black/20 flex items-center justify-between h-14 px-5">
                <a wire:navigate href="{{ route('tableau') }}" class="flex items-center gap-2">
                    <x-heroicon-s-arrow-left class="w-5 h-5" />
                    <span>Back</span>
                </a>
                <p class="font-bold">
                    {{ $var['tableau']->name }}
                </p>
            </div>
            <iframe src="{{ $var['url'] }}" frameborder="0" class="w-screen md:w-full h-full"></iframe>
        </div>
    </div>
</x-dashboard-layout>
