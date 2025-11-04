<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        // fetch all subscriptions; can add pagination or filtering
        $subscriptions = Subscription::orderBy('created_at', 'desc')->get();
        return view('admin.subscribe.index', compact('subscriptions'));

    }

  public function store(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'email' => 'required|email|unique:subscriptions,email',
    ]);

    // Create subscription
    $subscription = Subscription::create([
        'email' => $validated['email'],
    ]);

    // Return success response
    return response()->json([
        'message' => 'Email registration successful!',
        'data' => $subscription
    ], 201);
}

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
