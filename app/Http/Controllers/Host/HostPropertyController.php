<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class HostPropertyController extends Controller
{
    public function index()
    {
        $host = auth()->user();
        $properties = Property::where('user_id', $host->id)->orderBy('created_at', 'desc')->get();
        return view('host.pages.properties.index', compact('properties'));
    }

    public function create()
    {   
        $typesPath = public_path('json/properties.json');
        $propertyTypesData = json_decode(file_get_contents($typesPath), true);
        $propertyTypes = $propertyTypesData['property_types'] ?? [];

        $amenitiesPath = public_path('json/property_amenities.json');
        $propertyAmenities = json_decode(file_get_contents($amenitiesPath), true);
    
        return view('host.pages.properties.create', compact('propertyTypes', 'propertyAmenities'));
    }      

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'amenities' => 'nullable|string',
            'fixed_days' => 'nullable|integer|min:1',
        ]);
    
        $host = auth()->user();
    
        Property::create([
            'user_id' => $host->id,
            'description' => $request->description,
            'type' => $request->type,
            'address' => $request->address,
            'price' => $request->price,
            'amenities' => $request->amenities ? explode(',', $request->amenities) : null,
            'fixed_days' => $request->fixed_days,
        ]);
    
        return redirect()->route('host.properties')->with('success', 'Property added successfully.');
    }    
}
