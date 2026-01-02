<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;

class GoogleAuthController extends Controller
{
    // Step 1: Redirect admin to Google OAuth
    public function redirectToGoogle()
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(route('admin.google.callback'));
        $client->addScope([
            'https://www.googleapis.com/auth/calendar',
            'https://www.googleapis.com/auth/calendar.events',
        ]);
        $client->setAccessType('offline'); // important to get refresh token
        $client->setPrompt('consent');     // force consent to get refresh token

        return redirect($client->createAuthUrl());
    }

    // Step 2: Handle Google callback and save tokens
    public function Callback(Request $request)
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(route('admin.google.callback'));

        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        if (!isset($token['access_token'])) {
            return "Failed to get access token. Please try again.";
        }

        // Save tokens in your settings or DB
                \App\Models\Setting::updateOrCreate(
            ['key' => 'google_access_token'],
            ['value' => $token['access_token']]
        );

        \App\Models\Setting::updateOrCreate(
            attributes: ['key' => 'google_refresh_token'],
            values: ['value' => $token['refresh_token'] ?? null]
        );


        return "Google Workspace connected successfully!";
    }

    // Step 3: Create Google Client with saved token
    public static function getClient()
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(route('admin.google.callback'));
        $client->addScope([
            'https://www.googleapis.com/auth/calendar',
            'https://www.googleapis.com/auth/calendar.events',
        ]);

        $accessToken = setting('google_access_token');
        $refreshToken = setting('google_refresh_token');

        if (!$accessToken) {
            throw new \Exception("Google access token not found. Authorize first!");
        }

        $client->setAccessToken([
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'expires_in' => 3600,
            'created' => time(),
        ]);

        // Refresh token if expired
        if ($client->isAccessTokenExpired()) {
            $newToken = $client->fetchAccessTokenWithRefreshToken($refreshToken);
            setting()->set('google_access_token', $newToken['access_token']);
            setting()->set('google_refresh_token', $newToken['refresh_token'] ?? $refreshToken);
            $client->setAccessToken($newToken);
        }

        return $client;
    }
}
