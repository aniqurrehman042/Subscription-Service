<?php

namespace App\Http\Controllers;

use App\Mail\PostCreated;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    function store(Request $request)
    {
        // Validate request parameters
        $attributes = $request->validate([
            'title' => ['max:255', 'string'],
            'description' => ['max:300', 'string'],
            'website_url' => ['max:255', 'regex:/^[0-9A-Za-z. -]+$/']
        ]);

        // Check if website exists
        $website = Website::findOrFail($attributes['website_url']);

        // Create a posts record in DB
        $post = Post::create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'website_url' => $attributes['website_url']
        ]);

        // Get subscriptions
        $subscriptions = $website->subscriptions;

        // Send mail in background
        foreach ($subscriptions as $key => $subscriptions) {
            Mail::to($subscriptions->email)
                ->queue(new PostCreated($post->title, $post->description));
        }

        // Return response to client
        return response()->json(['message' => 'Post created successfully.']);
    }
}
