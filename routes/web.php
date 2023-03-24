<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;

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
Route::group(['domain' => Config::get('app.domain_p')], function () {
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [TeamController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    Route::get('/dashboard/profile', [ProfileController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard.profile');

    Route::post('/dashboard/profile', [ProfileController::class, 'update'])
        ->middleware(['auth'])
        ->name('dashboard.profile.update');

    Route::put('/dashboard/profile', [ProfileController::class, 'password'])
        ->name('dashboard.profile.password');

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

    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])
        ->middleware(['auth'])
        ->name('dashboard.teams.edit');

    Route::post('/teams/{team}/edit', [TeamController::class, 'update'])
        ->middleware(['auth'])
        ->name('dashboard.teams.update');

    Route::post('/teams/{team}/scripts', [TeamController::class, 'scripts_store'])
        ->middleware(['auth'])
        ->name('dashboard.teams.scripts.store');

    Route::post('/teams/{team}/logo', [TeamController::class, 'logo_store'])
        ->middleware(['auth'])
        ->name('dashboard.teams.logo.store');

    //Template config
    Route::get('/teams/{team}/template/{template}', [TemplateController::class, 'show'])
        ->middleware(['auth'])
        ->name('dashboard.teams.template.show');

    Route::post('/teams/{team}/template/{template}', [TemplateController::class, 'config_store'])
        ->middleware(['auth'])
        ->name('dashboard.teams.template.config.store');

    Route::get('/teams/{team}/property/{property}/leadpage/{leadpage}', [TemplateController::class, 'property_show'])
        ->middleware(['auth'])
        ->name('dashboard.properties.template.show');

    Route::post('/teams/{team}/property/{property}/leadpage', [TemplateController::class, 'property_store'])
        ->middleware(['auth'])
        ->name('dashboard.properties.template.store');

    Route::post('/teams/{team}/property/{property}/leadpage/{leadpage}', [TemplateController::class, 'property_config_store'])
        ->middleware(['auth'])
        ->name('dashboard.properties.template.config.store');

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

    Route::get('/teams/{team}/properties/{property}/edit', [PropertyController::class, 'edit'])
        ->middleware(['auth'])
        ->name('dashboard.properties.edit');

    Route::post('/teams/{team}/properties/{property}/edit', [PropertyController::class, 'update'])
        ->middleware(['auth'])
        ->name('dashboard.properties.update');

    Route::post('/teams/{team}/properties/{property}/destroy', [PropertyController::class, 'destroy'])
        ->middleware(['auth'])
        ->name('dashboard.properties.destroy');

    Route::get('/teams/{team}/properties/{property}/medias/list', [PropertyController::class, 'media_index'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.list');

    Route::post('/teams/{team}/properties/{property}/medias/store', [PropertyController::class, 'media_store'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.store');

    Route::post('/teams/{team}/properties/{property}/medias/{media}/destroy', [PropertyController::class, 'media_destroy'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.destroy');

    Route::post('/teams/{team}/properties/{property}/medias/{media}/thumb', [PropertyController::class, 'media_thumb'])
        ->middleware(['auth'])
        ->name('dashboard.properties.media.thumb');

});


//subs e sites de clientes
Route::get('/', [SiteController::class, 'home'])->name('site-home');
Route::get('/busca', [SiteController::class, 'search'])->name('site-home');
Route::get('/imovel/{property}/{imovel_name}', [SiteController::class, 'show_property'])->name('imovel-site');
Route::get('/imoveis', [SiteController::class, 'list_property'])->name('imoveis-site');
//leadpage para imóvel
Route::get('/lpage/imovel/{leadpage}', [SiteController::class, 'leadpage_imovel'])->name('site.leadpage.imovel');

require __DIR__.'/auth.php';
