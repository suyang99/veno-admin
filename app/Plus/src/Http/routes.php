<?php


use App\Plus\src\Http\Controllers\DcatPlusSiteController;
use App\Plus\src\Http\Controllers\DcatPlusUIController;
use Illuminate\Support\Facades\Route;
use App\Plus\src\Http\Controllers\CommonController;

Route::get('/dcat-plus/site', [DcatPlusSiteController::class, 'index'])
    ->name('dcat-plus.site.index');

Route::get('/dcat-plus/ui', [DcatPlusUIController::class, 'index'])
    ->name('dcat-plus.ui.index');

Route::get('/dcat-plus/common', [CommonController::class, 'index'])
    ->name('dcat-plus.common.index');
