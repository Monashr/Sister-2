<?php

use Illuminate\Support\Facades\Route;
use Modules\PostgreSQL\Http\Controllers\PostgreSQLController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('postgresqls', PostgreSQLController::class)->names('postgresql');
});
