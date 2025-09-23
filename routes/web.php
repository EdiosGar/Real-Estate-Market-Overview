<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;


Route::get('/', [SearchController::class, 'search'])->name('search');
Route::get('/select/{parcl_id}',[SearchController::class, 'select'])->name('select');