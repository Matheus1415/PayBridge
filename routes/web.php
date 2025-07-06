<?php

use App\Http\Controllers\authentications\LoginBasic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
Route::middleware('guest.only')->group(function(){
    Route::get('/', [LoginBasic::class, 'index'])->name('login');
    Route::post('/login', [LoginBasic::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
    Route::get('/plans', [Analytics::class, 'plans'])->name('dashboard-plans');
    Route::get('/plans-selec/{id}', [Analytics::class, 'planSelect'])->name('plans-select');
    Route::get('/subscription', [Analytics::class, 'subscriptionSucess'])->name('subscription.success');
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    
        return redirect('/');
    })->name('logout');
});