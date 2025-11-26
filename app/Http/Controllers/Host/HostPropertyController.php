<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;

class HostPropertyController extends Controller
{
    public function index()
    {
        $host = auth()->user();
        $properties = Property::where('user_id', $host->id)->orderBy('created_at', 'desc')->get();
        return view('host.pages.properties.index', compact('properties'));
    }

    public function show($id)
    {
        $host = auth()->user();
        $property = Property::where('user_id', $host->id)
                            ->with('images')
                            ->findOrFail($id);
    
        return view('host.pages.properties.show', compact('property'));
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
            'type' => 'required|string',
            'address' => 'required|string',
            'price' => 'required|numeric',
            'fixed_days' => 'nullable|integer|min:1',
            'amenities' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:5120',
        ]);
    
        try {
            DB::transaction(function () use ($request) {
                $property = Property::create([
                    'user_id' => auth()->id(),
                    'description' => $request->description,
                    'type' => $request->type,
                    'address' => $request->address,
                    'price' => $request->price,
                    'fixed_days' => $request->fixed_days,
                    'amenities' => $request->amenities,
                ]);
    
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('properties'), $filename);
    
                        PropertyImage::create([
                            'property_id' => $property->id,
                            'image_path' => 'properties/' . $filename,
                        ]);
                    }
                }
            });
    
            return redirect()->route('host.properties')->with('success', 'Property added successfully!');
    
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create property: ' . $e->getMessage()]);
        }
    }
}
