<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PropertyController;

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

//site principal
Route::group(['domain' => Config::get('app.domain')], function () {
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [TeamController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    //Teams
    Route::get('/teams/list', [TeamController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard.teams.list');

    Route::get('/teams/create', [TeamController::class, 'create'])
        ->middleware(['auth'])
        ->name('dashboard.teams.create');

    Route::post('/teams/create', [TeamController::class, 'store'])
        ->middleware(['auth'])
        ->name('dashboard.teams.store');

    Route::post('/teams/{team}/logo', [TeamController::class, 'logo_store'])
        ->middleware(['auth'])
        ->name('dashboard.teams.logo.store');

    //Properties
    Route::get('/teams/{team}/properties/list/', [PropertyController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard.properties.list');

    Route::get('/teams/{team}/properties/create', [PropertyController::class, 'create'])
        ->middleware(['auth'])
        ->name('dashboard.properties.create');

    Route::post('/teams/{team}/properties/create', [PropertyController::class, 'store'])
        ->middleware(['auth'])
        ->name('dashboard.properties.store');

    Route::get('/teams/{team}/properties/{property}/medias/list', [PropertyController::class, 'media_index'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.list');

    Route::post('/teams/{team}/properties/{property}/medias/store', [PropertyController::class, 'media_store'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.store');

    Route::post('/teams/{team}/properties/{property}/medias/{media}/thumb', [PropertyController::class, 'media_thumb'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.thumb');

});


//subs e sites de clientes
Route::get('/', [SiteController::class, 'home'])->name('site-home');
Route::get('/imovel/{property}/{imovel_name}', [SiteController::class, 'show_property'])->name('imovel-site');
Route::get('/imoveis', [SiteController::class, 'list_property'])->name('imoveis-site');


require __DIR__.'/auth.php';
