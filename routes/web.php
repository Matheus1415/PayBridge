<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;

Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');
