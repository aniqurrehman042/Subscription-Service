<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    function store(Request $request) {
        // Validate request parameters
        $attributes = $request->validate([
            'email' => ['max:255', 'email'],
            'website_url' => ['max:255', 'regex:/^[0-9A-Za-z. -]+$/']
        ]);
        // Check if website exists
        Website::findOrFail($attributes['website_url']);

        // Create a subscriptions record in DB
        Subscription::create([
            'email' => $attributes['email'],
            'website_url' => $attributes['website_url']
        ]);

        // Return response to client
        return response()->json(['message' => 'Subscribed to website successfully.']);
    }
}
