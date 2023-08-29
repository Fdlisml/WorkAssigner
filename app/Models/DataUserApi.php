<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Guzzlehttp\Client;

class DataUserApi extends Model
{
    use HasFactory;

    const API_ENDPOINT = '';

    public static function getDataFromAPI()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(self::API_ENDPOINT);
        $data = json_decode($response->getBody(), true);

        return $data;
    }
}

