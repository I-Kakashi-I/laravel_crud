<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Employee;
use App\Http\Livewire\User;
use App\Http\Livewire\Users\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['role:Super Admin'])->group(function (){
        Route::match(['get','post'],'users', Index::class)->name('users.index');
        Route::resource('users', UserController::class)->except('index');
        Route::get('permissions', \App\Http\Livewire\Permissions\Index::class)->name('permissions.index');

    });
    Route::resource('department', DepartmentController::class);
    Route::resource('branches', BranchesController::class);
    Route::get('employee', Employee::class)->name('employee.index');
    Route::resource('employee', EmployeesController::class)->except('index');
});
