<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepairProDownloadRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RepairProSetupController extends Controller
{
    public function create(): View
    {
        return view('repairpro.setup');
    }

    public function store(StoreRepairProDownloadRequest $request): RedirectResponse
    {
        DB::table('app_downloads')->insert([
            ...$request->validated(),
            'app_type' => 'repairpro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('repairpro.releases.asset', ['asset' => 'RepairPro-win-Setup.exe']);
    }
}
