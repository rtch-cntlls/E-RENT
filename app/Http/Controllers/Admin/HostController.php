<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HostController extends Controller
{
    public function pending()
    {
        $hosts = User::whereHas('hostProfile', function ($query) {
            $query->where('status', 'pending');
        })->get();
    
        return view('admin.pages.hosts.pending', compact('hosts'));
    }
    
    public function approved()
    {
        $hosts = User::whereHas('hostProfile', function ($query) {
            $query->where('status', 'approved');
        })->get();
    
        return view('admin.pages.hosts.approved', compact('hosts'));
    }
    
    public function rejected()
    {
        $hosts = User::whereHas('hostProfile', function ($query) {
            $query->where('status', 'rejected');
        })->get();
    
        return view('admin.pages.hosts.rejected', compact('hosts'));
    }    

    public function show($id)
    {
        $host = User::with('hostProfile')->findOrFail($id); 
        return view('admin.pages.hosts.show', compact('host'));
    }

    public function approve($id)
    {
        $host = User::findOrFail($id);
    
        $host->hostProfile->update([
            'status' => 'approved'
        ]);
        $host->update([
            'role' => 'host'
        ]);
        return redirect()->back()->with('success', 'Host has been approved and role updated to host.');
    }

    public function reject($id)
    {
        $host = User::findOrFail($id);

        $host->hostProfile->update([
            'status' => 'rejected'
        ]);

        if ($host->role === 'host') {
            $host->update([
                'role' => 'user'
            ]);
        }
        return redirect()->back()->with('error', 'Host request rejected.');
    }   
}
