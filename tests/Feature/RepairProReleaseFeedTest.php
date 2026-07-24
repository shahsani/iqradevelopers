<?php

use Illuminate\Support\Facades\Storage;

test('the RepairPro release feed redirects an allowed Velopack asset to storage', function () {
    Storage::fake('private');
    Storage::disk('private')->put('repairpro-releases/releases.win.json', '{}');

    $response = $this->get('/repairpro-releases/releases.win.json');

    $response->assertRedirect();
});

test('the RepairPro release feed rejects unavailable Velopack assets', function () {
    Storage::fake('private');

    $this->get('/repairpro-releases/releases.win.json')->assertNotFound();
});
