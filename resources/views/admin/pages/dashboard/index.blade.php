@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <h4 class="mb-3 fw-bold">Overview Dashboard</h4>
    @include('admin.pages.dashboard.includes.cards')
    @include('admin.pages.dashboard.includes.table')
    @include('admin.pages.dashboard.chart.propertyTypes')
    @include('admin.pages.dashboard.chart.growth')
</div>
@endsection
