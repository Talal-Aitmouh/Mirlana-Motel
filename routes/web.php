<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChambreController;
require __DIR__.'/auth.php';




Route::middleware(['auth'])->group(function () {
    Route::resource('chambres', ChambreController::class);
});Route::get('/', function () {
    return view('welcome');
});
