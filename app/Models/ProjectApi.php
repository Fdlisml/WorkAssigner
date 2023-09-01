<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class ProjectApi extends Model
{
   use HasFactory;
   const API_ENDPOINT = 'https://klikyuk.com/ngankngonk/fadli/project-pkl/api/project.php/';

   public static function getDataFromAPI()
   {
      $client = new Client();
      $response = $client->get(self::API_ENDPOINT);
      $data = json_decode($response->getBody(), true);

      return $data['data_project'];
   }

   public static function postDataToAPI($postData)
   {
      $client = new Client();
      $response = $client->post(self::API_ENDPOINT, [
         'json' => $postData
      ]);

      return $response->getStatusCode(); // Returns the HTTP status code
   }

   public static function updateDataInAPI($id, $updatedData)
   {
      $client = new Client();
      $response = $client->put(self::API_ENDPOINT . '/' . $id, [
         'json' => $updatedData
      ]);

      return $response->getStatusCode(); // Returns the HTTP status code
   }

   public static function deleteDataInAPI($id)
   {
      $client = new Client();
      $response = $client->delete(self::API_ENDPOINT . '/' . $id);

      return $response->getStatusCode(); // Returns the HTTP status code
   }

   public function tugas()
   {
      return $this->hasMany(TugasApi::class, 'project_id', 'id');
   }
}
