<?php

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('the RepairPro setup form is available', function () {
    $this->get('/repairpro/setup')
        ->assertSuccessful()
        ->assertSee('Download RepairPro')
        ->assertSee('Email or phone');
});

test('a RepairPro setup submission is stored before redirecting to the installer', function () {
    $this->post('/repairpro/setup', [
        'name' => 'Ayesha Khan',
        'email_phone' => 'ayesha@example.com',
        'business_name' => 'Khan Electronics',
        'app_type' => 'other',
    ])->assertRedirect(route('repairpro.releases.asset', ['asset' => 'RepairPro-win-Setup.exe']));

    $this->assertDatabaseHas('app_downloads', [
        'name' => 'Ayesha Khan',
        'email_phone' => 'ayesha@example.com',
        'business_name' => 'Khan Electronics',
        'app_type' => 'repairpro',
    ]);
});

test('a RepairPro setup submission requires all contact fields', function () {
    $this->from('/repairpro/setup')
        ->post('/repairpro/setup', [])
        ->assertRedirect('/repairpro/setup')
        ->assertSessionHasErrors(['name', 'email_phone', 'business_name']);
});
