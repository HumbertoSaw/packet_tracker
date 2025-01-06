<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Packets\PaqueteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => '/packet'], function () {
    Route::get('/index/{id}', [PaqueteController::class, 'packetSearch'])->name('packet.search');
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/daily-report', [AdminController::class, 'dailyReport'])->name('admin.daily-report');
});

