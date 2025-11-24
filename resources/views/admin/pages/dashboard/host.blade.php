@extends('layouts.admin')
@section('title', 'Hosts Analytics')
@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Hosts Analytics</h4>
    <div class="row g-4">
        @include('admin.pages.dashboard.chart.verification')
        @include('admin.pages.dashboard.chart.host-trends')
        @include('admin.pages.dashboard.chart.host-activity')
        @include('admin.pages.dashboard.chart.top-host')
    </div>
</div>
@endsection
