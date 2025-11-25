<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $jsonPath = public_path('json/properties.json');
        $jsonData = file_get_contents($jsonPath);
        $propertyTypes = json_decode($jsonData, true)['property_types'];

        $allTypes = [];
        foreach ($propertyTypes as $category => $types) {
            $allTypes = array_merge($allTypes, $types);
        }

        return view('guest.pages.landing.index', compact('allTypes'));
    }
}
