@extends('layouts.admin')
@section('title', 'Rejected Hosts')

@section('content')
@include('admin.pages.hosts.table', [
    'pageTitle' => 'Rejected Hosts',
    'hosts' => $hosts
])
@endsection
