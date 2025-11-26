<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class LandingPageController extends Controller
{
    public function index()
    {
        $jsonPath = public_path('json/properties.json');
        $jsonData = file_get_contents($jsonPath);
        $propertyTypes = json_decode($jsonData, true)['property_types'] ?? [];

        $allTypes = [];
        foreach ($propertyTypes as $category => $types) {
            $allTypes = array_merge($allTypes, $types);
        }
        
        $properties = Property::with('images')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('guest.pages.landing.index', compact('allTypes', 'properties'));
    }

    public function show(Property $property)
    {
        return view('guest.pages.landing.show', compact('property'));
    }
}
