<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    public function generateAccessToken()
    {
        $clientId = env('ZOOM_CLIENT_ID');
        $clientSecret = env('ZOOM_CLIENT_SECRET');
        $accountId = env('ZOOM_ACCOUNT_ID');

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
        ])->asForm()->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => $accountId,
        ]);

        if ($response->failed()) {
            throw new \Exception('Zoom API Token Request Failed: ' . $response->body());
        }

        return $response->json()['access_token'];
    }

public function createMeeting($topic, $startTime, $duration = 30)
{
    $token = $this->generateAccessToken();

    // First, get the user ID (host) associated with this app
    $userResponse = Http::withToken($token)->get('https://api.zoom.us/v2/users/me');


    if ($userResponse->failed()) {
        throw new \Exception('Failed to fetch Zoom user: ' . $userResponse->body());
    }

    $userId = $userResponse->json()['id'] ?? null;

    if (!$userId) {
        throw new \Exception('Zoom user ID not found in response.');
    }

    // Now create the meeting for that user
    $response = Http::withToken($token)->post("https://api.zoom.us/v2/users/asmat6894@gmail.com/meetings", [

        'topic' => $topic,
        'type' => 2,
        'start_time' => $startTime,
        'duration' => $duration,
        'timezone' => 'Asia/Karachi',
        'settings' => [
            'join_before_host' => true,
            'waiting_room' => false,
        ],
    ]);

    if ($response->failed()) {
        throw new \Exception('Zoom API Meeting Create Failed: ' . $response->body());
    }

    return $response->json();
}

}
