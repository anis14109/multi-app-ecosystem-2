<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// *************************************************
// Database Migration Routes (For Development Only)
// *************************************************
Route::middleware('auth.basic')->group(function () {
    // 1. Run Standard Migration (Safe for live data)
    Route::get('/db-migrate', function () {
        Artisan::call('migrate', ['--force' => true]);
        return response("<pre>Database Migrated:\n\n".Artisan::output()."</pre>");
    });
    // 2. Fresh Migration Only (Wipes all data)
    Route::get('/db-fresh', function () {
        Artisan::call('migrate:fresh', ['--force' => true]);
        return response("<pre>Database Wiped & Rebuilt:\n\n".Artisan::output()."</pre>");
    });
    // 3. Fresh Migration + Database Seeding (Wipes all data)
    Route::get('/db-fresh-seed', function () {
        Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return response("<pre>Database Wiped, Rebuilt & Seeded:\n\n".Artisan::output()."</pre>");
    });
});

// Authentication (Breeze) — /access/*
require __DIR__.'/auth.php';

// Authenticated Admin area — /access/*
require __DIR__.'/admin.php';

// Public Frontend Website / CMS — must be registered last so /{slug}
// can never shadow /access/*, /api/* or the routes defined above.
require __DIR__.'/frontend.php';