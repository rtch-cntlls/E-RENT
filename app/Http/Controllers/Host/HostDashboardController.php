<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;

class HostDashboardController extends Controller
{
    public function index()
    {
        $host = auth()->user();

        $properties_count = $host->properties()->count();
        $bookings_count = Booking::whereHas('property', fn($q) => $q->where('user_id', $host->id))->count();
        $pending_requests = Booking::whereHas('property', fn($q) => $q->where('user_id', $host->id))
                                    ->where('status', 'pending')->count();
        $revenue = Booking::whereHas('property', fn($q) => $q->where('user_id', $host->id))
                          ->where('status', 'approved')->sum('amount');

        $recent_bookings = Booking::with(['property', 'guest'])
                                  ->whereHas('property', fn($q) => $q->where('user_id', $host->id))
                                  ->orderBy('created_at', 'desc')
                                  ->take(5)->get();

        $bookings_over_time = Booking::selectRaw("DATE(created_at) as date, COUNT(*) as total")
                                      ->whereHas('property', fn($q) => $q->where('user_id', $host->id))
                                      ->groupBy('date')
                                      ->orderBy('date')
                                      ->get()
                                      ->pluck('total','date');

        $revenue_distribution = Booking::whereHas('property', fn($q) => $q->where('user_id', $host->id))
                                       ->where('status', 'approved')
                                       ->get()
                                       ->groupBy('property_id')
                                       ->map(fn($b) => $b->sum('amount'));

        return view('host.pages.dashboard.index', compact(
            'properties_count',
            'bookings_count',
            'pending_requests',
            'revenue',
            'recent_bookings',
            'bookings_over_time',
            'revenue_distribution'
        ));
    }
}
