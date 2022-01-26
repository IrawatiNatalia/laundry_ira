<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbMemberController;
use App\Http\Controllers\TbOutletController;
use App\Http\Controllers\TbPaketController;

Route::get('/', [HomeController::class, 'index']);
Route::resource('member', TbMemberController::class);
Route::resource('paket', TbPaketController::class);
Route::resource('outlet', TbOutletController::class);
