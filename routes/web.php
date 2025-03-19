<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Response;

Route::get('/', fn (): Response => inertia('Welcome'));

Route::middleware('auth')->group(function (): void {
    Route::get('/home', fn (): Response => inertia('Home'));
});

// flash('asdad', 'success');
