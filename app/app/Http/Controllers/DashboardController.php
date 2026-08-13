<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Farm;
use App\Models\Shed;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        $farms = Farm::query()->withCount('sheds')->orderBy('name')->get();

        $shedStats = Shed::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('dashboard', [
            'farms' => $farms,
            'farmCount' => $farms->count(),
            'shedCount' => Shed::query()->count(),
            'companyCount' => Company::query()->count(),
            'userCount' => User::query()->count(),
            'occupiedSheds' => (int) $shedStats->get(Shed::STATUS_OCCUPIED, 0),
            'emptySheds' => (int) $shedStats->get(Shed::STATUS_EMPTY, 0),
            'maintenanceSheds' => (int) $shedStats->get(Shed::STATUS_MAINTENANCE, 0),
            'recentActivity' => Activity::query()
                ->where('causer_id', auth()->id())
                ->latest()
                ->limit(10)
                ->get(),
        ]);
    }
}