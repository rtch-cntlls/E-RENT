@extends('layouts.admin')
@section('title', 'Approved Hosts')

@section('content')
@include('admin.pages.hosts.table', [
    'pageTitle' => 'Approved Hosts',
    'hosts' => $hosts
])
@endsection
