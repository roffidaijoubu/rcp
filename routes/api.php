<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// add route to getClauseAggregatedAssessmentBySatkerAndYear
Route::get('/audit/assessment/{satker}/{year}', [AuditController::class, 'getClauseAggregatedAssessmentBySatkerAndYear']);
Route::get('/audit/average/{satker}/{year}', [AuditController::class, 'getAveragedClauseAggregatedAssessmentBySatkerAndYear']);
Route::get('/audit/combined/{satker}/{year}', [AuditController::class, 'getCombinedClauseAggregatedAssessmentBySatkerAndYear']);

Route::put('/audit/assessment/{id}', [AuditController::class, 'updateAssessment']);
