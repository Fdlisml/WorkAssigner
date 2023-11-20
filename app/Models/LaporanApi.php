<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class LaporanApi extends Model
{
   use HasFactory;
   const API_ENDPOINT = 'http://workassigner-server.test/api/laporans';
   public static function getDataFromAPI($token)
   {
      $client = new Client();
      $response = $client->get(self::API_ENDPOINT, [
         'headers' => [
            'Authorization' => 'Bearer ' . $token,
         ]
      ]);
      $data = json_decode($response->getBody(), true);

      return $data['data_laporan'];
   }

   public static function getDataByIdFromAPI($id, $token)
   {
      $client = new Client();
      $response = $client->get(self::API_ENDPOINT . '/' . $id, [
            'headers' => [
               'Authorization' => 'Bearer ' . $token,
            ]
         ]);
      $data = json_decode($response->getBody(), true);

      return $data['data_laporan'];
   }

   public static function postDataToAPI($postData, $token)
   {
      $client = new Client();
      $response = $client->post(self::API_ENDPOINT, [
         'headers' => [
            'Authorization' => 'Bearer ' . $token,
         ],
         'json' => $postData
      ]);

      return $response->getStatusCode(); // Returns the HTTP status code
   }

   public static function updateDataInAPI($id, $updatedData, $token)
   {
      $client = new Client();
      $response = $client->put(self::API_ENDPOINT . '/' . $id, [
         'headers' => [
            'Authorization' => 'Bearer ' . $token,
         ],
         'json' => $updatedData
      ]);

      return $response->getStatusCode(); // Returns the HTTP status code
   }

   public static function deleteDataInAPI($id, $token)
   {
      $client = new Client();
      $response = $client->delete(self::API_ENDPOINT . '/' . $id, [
         'headers' => [
            'Authorization' => 'Bearer ' . $token,
         ]
      ]);

      return $response->getStatusCode(); // Returns the HTTP status code
   }
}
