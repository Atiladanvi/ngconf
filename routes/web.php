<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('/dashboard', function (){
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/sites', [ \App\Http\Controllers\SitesController::class , 'index'])
        ->name('sites.index');

    Route::put('/site/{id}', [ \App\Http\Controllers\SitesController::class , 'update'])
        ->name('sites.update');

    Route::delete('/site/{id}', [ \App\Http\Controllers\SitesController::class , 'destroy'])
        ->name('sites.destroy');

    Route::post('/site', [ \App\Http\Controllers\SitesController::class , 'store'])
        ->name('sites.store');

    Route::get('/server/create', [\App\Http\Controllers\ServerController::class, 'create'])
        ->name('servers.create');

    Route::post('/server', [\App\Http\Controllers\ServerController::class, 'store'])
        ->name('servers.store');

    Route::get('/server/{id}', [\App\Http\Controllers\ServerController::class, 'edit'])
        ->name('servers.edit');

    Route::put('/server/{id}', [\App\Http\Controllers\ServerController::class, 'update'])
        ->name('servers.update');

    Route::delete('/server/{id}', [\App\Http\Controllers\ServerController::class, 'destroy'])
        ->name('servers.destroy');

    Route::put('/current-server', [\App\Http\Controllers\CurrentServerController::class, 'update'])
        ->name('current-server.update');
});
