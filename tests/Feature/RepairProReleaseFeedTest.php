<?php

use Illuminate\Support\Facades\Storage;

test('the RepairPro release feed redirects an allowed Velopack asset to storage', function () {
    Storage::fake('repairpro_releases');

    $response = $this->get('/repairpro-releases/releases.win.json');

    $response->assertRedirect();
    $response->assertHeader('Cache-Control', 'no-store, private');
});

test('the RepairPro release feed rejects paths outside its flat Velopack asset namespace', function () {
    $this->get('/repairpro-releases/../.env')->assertNotFound();
    $this->get('/repairpro-releases/folder/releases.win.json')->assertNotFound();
});
