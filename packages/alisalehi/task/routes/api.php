<?php

namespace AliSalehi\Task\route;

use AliSalehi\Task\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

// add 'auth' middleware to production
Route::middleware(['api','task-middleware'])->prefix('api/v1/')->group(function () {
    Route::apiResource('task', TaskController::class);
});