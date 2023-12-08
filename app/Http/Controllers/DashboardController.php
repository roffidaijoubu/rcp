<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tableauList = Dashboard::all();
        return view('tableau.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
    {
        $tableau_dashboard = Dashboard::findOrFail($id);
        $tableau_ticket = Dashboard::signIn($request->ip());
        $tableau_view_url = Dashboard::getViewUrl($tableau_ticket, $tableau_dashboard->view_name, $tableau_dashboard->workbook_name);
        return view('tableau.detail', [
            'tableau' => $tableau_dashboard,
            'url' => $tableau_view_url,
            'request' => $request
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
