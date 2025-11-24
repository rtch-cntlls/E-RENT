<?php

namespace App\Services;

use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardService
{
    public function getDashboardData()
    {
        $cards = [
            [
                'title' => 'Total Hosts',
                'icon'  => 'fas fa-user-tie',
                'value' => User::where('role', 'host')->count(),
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

        $recenthosts = User::where('role', 'host')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $commonProperties = Property::select('type', DB::raw('COUNT(*) as count'))
            ->groupBy('type')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        $verifiedhosts   = User::where('role', 'host')->where('is_verified', 1)->count();
        $unverifiedhosts = User::where('role', 'host')->where('is_verified', 0)->count();

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

        $propertyTypeData = Property::select('type', DB::raw('COUNT(*) as count'))
            ->groupBy('type')
            ->orderByDesc('count')
            ->get();
        
        $propertyTypes = $propertyTypeData->pluck('type');
        $propertyTypeCounts = $propertyTypeData->pluck('count');

        return [
            'cards' => $cards,
            'recenthosts' => $recenthosts,
            'commonProperties' => $commonProperties,
            'verifiedhosts' => $verifiedhosts,
            'unverifiedhosts' => $unverifiedhosts,
            'months' => $months,
            'userCounts' => $userCounts,
            'propertyTypes' => $propertyTypes,
            'propertyTypeCounts' => $propertyTypeCounts
        ];
    }

    public function gethostAnalytics()
    {
        $verified = User::where('role', 'host')->where('is_verified', 1)->count();
        $unverified = User::where('role', 'host')->where('is_verified', 0)->count();

        $monthlyVerification = User::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(CASE WHEN is_verified = 1 THEN 1 ELSE 0 END) as verified_count'),
                DB::raw('SUM(CASE WHEN is_verified = 0 THEN 1 ELSE 0 END) as unverified_count')
            )
            ->where('role', 'host')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $verifiedTrend = [];
        $unverifiedTrend = []; 

        for ($i=1; $i<=12; $i++) {
            $months[] = Carbon::create()->month($i)->format('M');
            $data = $monthlyVerification->firstWhere('month', $i);
            $verifiedTrend[] = $data->verified_count ?? 0;
            $unverifiedTrend[] = $data->unverified_count ?? 0;
        }

        $activityData = User::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->where('role', 'host')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $joinedTrend = [];
        for ($i=1; $i<=12; $i++) {
            $joinedTrend[] = $activityData->firstWhere('month', $i)->count ?? 0;
        }

        $tophosts = User::where('users.role', 'host')
            ->leftJoin('properties', 'users.id', '=', 'properties.user_id')
            ->select('users.id', 'users.name', DB::raw('COUNT(properties.id) as total_properties'))
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_properties')
            ->take(5)
            ->get();

        $tophostNames = $tophosts->pluck('name');
        $tophostCounts = $tophosts->pluck('total_properties');

        return [
            'verified' => $verified,
            'unverified' => $unverified,
            'months' => $months,
            'verifiedTrend' => $verifiedTrend,
            'unverifiedTrend' => $unverifiedTrend,
            'joinedTrend' => $joinedTrend,
            'tophostNames' => $tophostNames,
            'tophostCounts' => $tophostCounts
        ];
    }
}
