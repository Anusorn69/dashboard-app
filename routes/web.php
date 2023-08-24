<?php

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
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/page1', [App\Http\Livewire\DashboardTable::class, '__invoke']); 

    Route::get('/page5', function () { 
        return 'Hello page5';
    }); 
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // 127.0.0.1:8000/dashboard
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    
    // 127.0.0.1:8000/dashboard-table 
    // www.google.co.th/dashboard-table
    Route::get('/dashboard-table', function () { 
        return 'Hello dashboard table';
    });
    
});
