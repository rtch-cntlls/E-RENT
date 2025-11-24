<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HostController extends Controller
{
    public function index()
    {
        $hosts = User::where('role', 'host')->get();
        return view('admin.pages.hosts.index', compact('hosts'));
    } 

    public function show($id)
    {
        $host = User::with('hostProfile')->findOrFail($id); 
        return view('admin.pages.hosts.show', compact('host'));
    }
}
