<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\RoleController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/dashboard/promote-teacher', [\App\Http\Controllers\RoleController::class, 'assignTeacher'])->name('admin.dashboard.promote_teacher');

    Route::get('/admin/users', [\App\Http\Controllers\RoleController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/role', [\App\Http\Controllers\RoleController::class, 'update'])->name('admin.users.role.update');
});

Route::get('/lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
     app()->setLocale($locale); 
    return redirect()->back();
});



Route::middleware('auth')->group(function () {

    Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');

    Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
    Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');

    Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
    Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formations.update');

    Route::delete('/formations/{id}', [FormationController::class, 'destroy'])->name('formations.destroy');

    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});