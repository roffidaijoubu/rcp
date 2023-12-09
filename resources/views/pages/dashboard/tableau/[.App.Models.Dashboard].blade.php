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
    // return view('tableau.detail', [
    //     'tableau' => $tableau_dashboard,
    //     'url' => $tableau_view_url,
    //     'request' => $request
    // ]);

    $var = [
        'url' => $tableau_view_url,
        'tableau' => $dashboard,
    ];

    return $view->with('var', $var);
});

// $tableau = $dashboard;

?>

<x-dashboard-layout>

    <div class="flex w-full h-full">
        @livewire('tableau-list', ['property' => $var['tableau']])
        <div class="h-full w-full bg-white" id="tableauContainer">

            <iframe src="{{ $var['url'] }}" frameborder="0" class="w-full h-full"></iframe>
        </div>
    </div>
</x-dashboard-layout>
