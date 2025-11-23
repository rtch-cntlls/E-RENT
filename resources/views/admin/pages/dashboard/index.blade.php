@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-5 mb-5">
    <h5 class="mb-3 fw-bold">Admin Dashboard</h5>
    @include('admin.pages.dashboard.includes.cards')
    @include('admin.pages.dashboard.includes.table')
    <div class="row">
        @include('admin.pages.dashboard.chart.listerVerification')
        @include('admin.pages.dashboard.chart.propertyTypes')
    </div>
    @include('admin.pages.dashboard.chart.growth')
</div>
@endsection
