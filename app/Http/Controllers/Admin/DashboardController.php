<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->getDashboardData();
        return view('admin.pages.dashboard.index', $data);
    }

    public function hostAnalytics()
    {
        $data = $this->service->gethostAnalytics();
        return view('admin.pages.dashboard.host', $data);
    }
}
