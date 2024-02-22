<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomePageController;

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

Route::get('/', [HomePageController::class, 'index'])->name('guest.index');
Route::get('/projects/{project}', [HomePageController::class, 'show'])->name('guest.show');

Auth::routes();

Route::get('/autenticazione', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/projects/deleted', [AdminProjectController::class, 'deletedIndex'])->name('projects.deleted.index');
    Route::get('/projects/deleted/{projects}', [AdminProjectController::class, 'deletedShow'])->name('projects.deleted.show');
    Route::patch('/projects/deleted/{projects}', [AdminProjectController::class, 'deletedRestore'])->name('projects.deleted.restore');
    Route::delete('/projects/deleted/{projects}', [AdminProjectController::class, 'deletedDestroy'])->name('projects.deleted.destroy');

    Route::resource('/projects',AdminProjectController::class);
});

