<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Routing\Router;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->middleware('guest')->group(function(Router $route){
    $route->get('login',[AuthController::class, 'login_page'])->name('guest.login');
    $route->post('login',[AuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->middleware('admin')->group(function(Router $route){
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashbaord');
    
    $route->get('/users',[UserController::class, 'index'])->name('admin.users.index');
    $route->get('/create-user',[UserController::class, 'create'])->name('admin.users.create');
    $route->post('/store-user',[UserController::class, 'store'])->name('admin.users.store');
    $route->get('/edit-user/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
    $route->post('/update-user/{user}', [UserController::class, 'update'])->name('admin.users.update');
    $route->get('/delete-user/{user}', [UserController::class, 'delete'])->name('admin.users.delete');
    $route->get('/logout', [AuthController::class, 'logout'])->name('logout');
});
