<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::view('/', 'welcome')->name('home');

Route::get('/repairpro-releases/{asset}', function (string $asset) {
    $key = 'repairpro-releases/'.$asset;
    abort_unless(Storage::disk('private')->exists($key), 404);

    return redirect()->away(
        Storage::disk('private')->temporaryUrl($key, now()->addMinutes(60)),
    );
})->where('asset', '.*')->name('repairpro.releases.asset');
