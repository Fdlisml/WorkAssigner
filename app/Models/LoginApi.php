<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoginApi extends Model
{
    use HasFactory;
    
    const API_ENDPOINT = 'https://klikyuk.com/WorkAssigner-Server/api/login';

    public static function login($postData){
      $client = new Client();
      $response = $client->post(self::API_ENDPOINT, [
         'json' => $postData
      ]);

      return $response->getBody()->getContents();
   }
}
