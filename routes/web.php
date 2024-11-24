<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;





// Redirect root to the items index
Route::get('/', [ItemController::class, 'index']);

// Resource routes for items
Route::resource('items', ItemController::class);
