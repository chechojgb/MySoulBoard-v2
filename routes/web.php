<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\table\TableController;



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
    return view('index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/areas', [AreaController::class, 'create'])->name('areas.create');
});

Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('/users.store', [UserController::class, 'store'])->name('users.store');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');




Route::get('table', [TableController::class, 'index'])->name('table.agents');

//SUPEERVISOR
Route::middleware(['auth', 'verified', 'supervisor'])->group(function () {
    Route::get('/dashboard', function () {
        return view('supervisor.dashboard');
    })->name('supervisor.dashboard');

});





Route::get('/dashboard.admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.admin');

require __DIR__.'/auth.php';
