<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\HostProfile;

class GuestAccountController extends Controller
{
    public function showUpgradeForm()
    {
        $user = auth()->user();
        $hasPendingRequest = $user->hostProfile && $user->hostProfile->status === 'pending';
    
        return view('guest.pages.account.upgrade-to-host', compact('hasPendingRequest'));
    }
    

    public function submitUpgradeRequest(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'full_address' => 'required|string|max:500',
            'id_document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'agreement' => 'required|accepted',
        ]);

        $user = Auth::user();

        $path = null;
        if ($request->hasFile('id_document')) {
            $file = $request->file('id_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('id_documents'), $filename);
            $path = 'id_documents/' . $filename;
        }

        HostProfile::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'address' => $request->full_address,
            'id_document' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('guest.upgrade.form')->with('success', 'Your request has been submitted. Await approval.');
    }
}
