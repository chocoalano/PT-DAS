<?php

use App\Livewire\Panels\Auth\Login;
use App\Livewire\Panels\Home\Index;
// users::module||started
use App\Livewire\Panels\Masterdata\Users\UsersIndex;
use App\Livewire\Panels\Masterdata\Users\UserForms;
// users::module||ended
// users::module||started
use App\Livewire\Panels\Masterdata\Roles\RoleIndex;
use App\Livewire\Panels\Masterdata\Roles\RoleForms;
// users::module||ended
// permission::module||started
use App\Livewire\Panels\Masterdata\Permission\PermissionIndex;
// permission::module||ended

// compro::module||started
use App\Livewire\Compro\Pages\Home;
use App\Livewire\Compro\Pages\Product;
use App\Livewire\Compro\Pages\WhatWeDo;
use App\Livewire\Compro\Pages\About;
use App\Livewire\Compro\Pages\Contact;
// compro::module||ended
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', Login::class)->name('panel-login')->prefix('app');
    Route::get('/', Home::class)->name('index');
    Route::get('/about', About::class)->name('about');
    Route::get('/what-we-do', WhatWeDo::class)->name('wwd');
    Route::get('/product', Product::class)->name('product');
    Route::get('/contact', Contact::class)->name('contact');
});
Route::group(['middleware' => 'auth'], function(){
    Route::prefix('app')->group(function () {
        Route::get('/home', Index::class)->name('panel-home');
        Route::get('/blogs', Index::class)->name('panel-blogs');
        Route::get('/projects', Index::class)->name('panel-projects');
        Route::prefix('dashboard')->group(function () {
            Route::get('/blogs', Index::class)->name('panel-dashboard-blogs');
            Route::get('/projects', Index::class)->name('panel-dashboard-projects');
        });
        Route::prefix('config')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', UsersIndex::class)->name('panel-config-users.index');
                Route::get('/create', UserForms::class)->name('panel-config-users.create');
                Route::get('/{id}', UserForms::class)->name('panel-config-users.show');
            });
            Route::prefix('roles')->group(function () {
                Route::get('/', RoleIndex::class)->name('panel-config-roles.index');
                Route::get('/create', RoleForms::class)->name('panel-config-roles.create');
                Route::get('/{id}', RoleForms::class)->name('panel-config-roles.show');
            });
            Route::prefix('permissions')->group(function () {
                Route::get('/', PermissionIndex::class)->name('panel-config-permissions.index');
                Route::get('/{id}', PermissionIndex::class)->name('panel-config-permissions.show');
            });
        });
    });
});
