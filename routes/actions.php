<?php

use Edalzell\PrivateEye\DownloadController;
use Edalzell\PrivateEye\ShowController;
use Illuminate\Support\Facades\Route;

Route::name('private-eye.')->middleware('auth')->group(function () {
    Route::get('download/{code}', [DownloadController::class, '__invoke'])->name('download');
    Route::get('show/{code}', [ShowController::class, '__invoke'])->name('show');
});
