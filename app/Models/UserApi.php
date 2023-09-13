<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UserApi extends Model
{
   use HasFactory;

   const API_ENDPOINT = 'https://klikyuk.com/WorkAssigner-Server/api/users';

   public static function getDataFromAPI($token)
   {
      try {
         $client = new Client();
         $response = $client->get(self::API_ENDPOINT, [
            'headers' => [
               'Authorization' => 'Bearer ' . $token,
            ] 
         ]);
         $data = json_decode($response->getBody(), true);

         return $data['data_user'];
      } catch (GuzzleException $e) {
         // Handle error (contoh: log atau kembalikan pesan kesalahan)
         return null;
      }
   }
}