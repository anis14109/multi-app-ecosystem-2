<?php

use Illuminate\Support\Facades\Route;

// Versioned API surface. Each version lives in routes/api/<version>.php
// so future versions (v2, ...) can be added without touching v1.
Route::prefix('v1')->group(base_path('routes/api/v1.php'));