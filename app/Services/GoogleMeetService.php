<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;

class GoogleMeetService
{
    public function createMeeting($title, $start, $end)
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/credentials.json'));
        $client->addScope(Calendar::CALENDAR);

        $client->setAccessToken([
            'access_token' => setting('google_access_token'),
            'refresh_token' => setting('google_refresh_token'),
        ]);

        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken(
                setting('google_refresh_token')
            );
            set_setting(
                'google_access_token',
                $client->getAccessToken()['access_token']
            );
        }

        $calendar = new Calendar($client);

        $event = new Event([
            'summary' => $title,
            'start' => [
                'dateTime' => $start,
                'timeZone' => 'Asia/Karachi',
            ],
            'end' => [
                'dateTime' => $end,
                'timeZone' => 'Asia/Karachi',
            ],
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => uniqid(),
                    'conferenceSolutionKey' => [
                        'type' => 'hangoutsMeet',
                    ],
                ],
            ],
        ]);

        $created = $calendar->events->insert(
            'primary',
            $event,
            ['conferenceDataVersion' => 1]
        );

        return $created->hangoutLink;
    }
}
