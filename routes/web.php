<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use Laravel\Folio\Folio;

Folio::path(resource_path('views/pages'))->middleware([
    'dashboard/*' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ],
]);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', function () {
    return redirect('/dashboard/tableau');
})->name('dashboard');

// Route::get('/admin/login', function () {
//     return redirect('/login');
// });
// Route::get('/admin', function () {
//     return redirect('/admin/dashboards');})->name('toAdmin');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     //
//     // })->name('dashboard');
//     // Route::get('/dashboard/tableau/', [DashboardController::class, 'index'])->name('tableau');
//     // Route::get('/dashboard/tableau/{id}', [DashboardController::class, 'show'])->name('tableau.detail');

//     Route::get('/dashboard/assets', function () {
//         return view('assets');
//     })->name('assets');
// });

require_once __DIR__ . '/jetstream.php';
