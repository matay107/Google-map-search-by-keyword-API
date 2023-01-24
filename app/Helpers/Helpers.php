<?php

namespace App\Helpers;

class Helpers
{
  
    public static function googleApiGetList($lat = '', $long = '')
    {
         $key = "google-api-key";
         $type = "restaurant";
         $radius = 3000;
         $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );

        $path = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location={$lat}%2C{$long}&radius={$radius}&type={$type}&key={$key}";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,  $path);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_google_api = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $convertJson = json_decode($response_google_api, true);

        return ['data' => $convertJson['results'], 'httpcode' => $httpcode];
    }
}
