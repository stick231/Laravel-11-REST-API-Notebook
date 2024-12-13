<?php

use App\Http\Controllers\NotebookController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function(){
    Route::apiResource('notebook', NotebookController::class);
});