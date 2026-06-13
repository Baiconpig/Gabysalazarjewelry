<?php

use App\Http\Controllers\Admin\BrandImageController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBlockController;
use App\Http\Controllers\Admin\HomeVideoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestReportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/historia-de-la-marca', [PublicPageController::class, 'history'])->name('public.history');
Route::get('/catalogo-de-joyas', [PublicPageController::class, 'catalog'])->name('public.catalog');
Route::get('/galerias-de-colecciones', [PublicPageController::class, 'collections'])->name('public.collections');
Route::get('/custom-made', [PublicPageController::class, 'customMade'])->name('public.custom-made');
Route::get('/piezas-personalizadas', [PublicPageController::class, 'customRequest'])->name('public.custom-request');
Route::post('/piezas-personalizadas', [PublicPageController::class, 'storeCustomRequest'])->name('public.custom-request.store');
Route::get('/agenda-de-citas', [PublicPageController::class, 'appointments'])->name('public.appointments');
Route::post('/agenda-de-citas', [PublicPageController::class, 'storeAppointment'])->name('public.appointments.store');
Route::get('/instagram', [PublicPageController::class, 'instagram'])->name('public.instagram');
Route::get('/testimonios', [PublicPageController::class, 'testimonials'])->name('public.testimonials');
Route::get('/contacto', [PublicPageController::class, 'contact'])->name('public.contact');
Route::post('/contacto', [PublicPageController::class, 'storeContact'])->name('public.contact.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/catalogo', CatalogController::class)->name('catalog');
    Route::get('/reportes/solicitudes', RequestReportController::class)->name('reports.requests');
    Route::get('/cms-inicio', [HomeBlockController::class, 'index'])->name('home-blocks.index');
    Route::put('/cms-inicio/{homeBlock}', [HomeBlockController::class, 'update'])->name('home-blocks.update');
    Route::resource('images', BrandImageController::class)->except(['show']);
    Route::resource('videos', HomeVideoController::class)->except(['show']);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
