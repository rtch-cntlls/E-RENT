@extends('layouts.admin')
@section('title', 'Pending Hosts')

@section('content')
@include('admin.pages.hosts.table', [
    'pageTitle' => 'Pending Hosts',
    'hosts' => $hosts
])
@endsection
