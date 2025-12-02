<?php

use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('sales.dashboard');
});

Route::prefix('sales')->name('sales.')->group(function () {
    Route::get('/dashboard', [SalesController::class, 'index'])->name('dashboard');
    Route::get('/export', [SalesController::class, 'export'])->name('export');
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now()->toDateTimeString(),
    ]);
});