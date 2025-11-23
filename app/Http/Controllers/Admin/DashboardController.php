<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $cards = [
            [
                'title' => 'Total Listers',
                'icon'  => 'fas fa-user-tie',
                'value' => User::where('role', 'lister')->count(),
            ],
            [
                'title' => 'Properties',
                'icon'  => 'fas fa-building',
                'value' => Property::count(),
            ],
            [
                'title' => 'Active Listings',
                'icon'  => 'fas fa-check-circle',
                'value' => Property::count(),
            ],
            [
                'title' => 'Users',
                'icon'  => 'fas fa-users',
                'value' => User::where('role', 'user')->count(),
            ],
        ];

        $recentListers = User::where('role', 'lister')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $commonProperties = Property::select('type', DB::raw('COUNT(*) as count'))
            ->groupBy('type')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        $verifiedListers   = User::where('role', 'lister')->where('is_verified', 1)->count();
        $unverifiedListers = User::where('role', 'lister')->where('is_verified', 0)->count();

        $monthlyUsers = User::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->where('role', 'user')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $userCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('M');
            $userCounts[] = $monthlyUsers->firstWhere('month', $i)->count ?? 0;
        }

        $propertyTypes = ['Apartment', 'Room', 'Condo', 'Rest House', 'Boarding Room'];
        $propertyTypeCounts = [];
        foreach ($propertyTypes as $type) {
            $propertyTypeCounts[] = Property::where('type', $type)->count();
        }

        return view('admin.pages.dashboard.index', compact(
            'cards',
            'recentListers',
            'commonProperties',
            'verifiedListers',
            'unverifiedListers',
            'months',
            'userCounts',
            'propertyTypes',
            'propertyTypeCounts'
        ));
    }
}
