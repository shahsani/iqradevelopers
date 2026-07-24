<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::view('/', 'welcome')->name('home');

Route::get('/repairpro-releases/{asset}', function (string $asset) {
    $prefix = trim((string) config('filesystems.repairpro_releases_prefix', 'windows'), '/');
    $url = Storage::disk('repairpro_releases')->temporaryUrl(
        "{$prefix}/{$asset}",
        now()->addMinutes(15),
    );

    return redirect()->away($url, 302, ['Cache-Control' => 'no-store']);
})->where('asset', '[A-Za-z0-9][A-Za-z0-9._-]*')->name('repairpro.releases.asset');
