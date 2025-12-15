<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterSubscribed;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $validated = $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $subscription = Subscription::create([
            'email' => $validated['email'],
        ]);

        // Send confirmation email
        Mail::to($subscription->email)
            ->send(new NewsletterSubscribed($subscription->email));

        return response()->json([
            'message' => 'Email registration successful! You are subscribed to the newsletter.',
            'data' => $subscription,
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
