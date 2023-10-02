<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuthApi extends Model
{
   use HasFactory;

   const API_ENDPOINT = 'https://klikyuk.com/WorkAssigner-Server/api';

   public static function register($postData)
   {
      $client = new Client();
      $response = $client->post(self::API_ENDPOINT . "/register", [
         'json' => $postData
      ]);

      return $response->getBody()->getContents();
   }

   public static function login($postData)
   {
      $client = new Client();
      $response = $client->post(self::API_ENDPOINT . "/login", [
         'json' => $postData
      ]);

      return $response->getBody()->getContents();
   }

   public static function logout($token)
   {
      $client = new Client();
      $response = $client->post(self::API_ENDPOINT . "/logout", [
         'headers' => [
            'Authorization' => 'Bearer ' . $token,
         ]
      ]);

      return $response->getBody()->getContents();
   }
}
