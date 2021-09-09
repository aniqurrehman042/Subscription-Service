<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    function store(Request $request)
    {
        // Validate request parameters
        $attributes = $request->validate([
            'name' => ['max:255', 'string'],
            'url' => ['max:255', 'regex:/^[0-9A-Za-z. -]+$/']
        ]);

        // Create a websites record in DB
        Website::create([
            'name' => $attributes['name'],
            'url' => $attributes['url']
        ]);

        // Return response to client
        return response()->json(['message' => 'Website created successfully.']);
    }
}
