<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\WebsitesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Creates a website
 */
Route::post('website', [WebsitesController::class, 'store']);

/**
 * Creates a post
 */
Route::post('post', [PostsController::class, 'store']);

/**
 * Subscribes a user to a website by creating a subscription
 */
Route::post('subscription', [SubscriptionsController::class, 'store']);