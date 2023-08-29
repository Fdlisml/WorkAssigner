<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UserApi extends Model
{
    use HasFactory;

    const API_ENDPOINT = 'https://klikyuk.com/ngankngonk/fadli/project-pkl/api/user.php/'; // Ganti dengan URL yang sesuai

    public static function getDataFromAPI()
    {
        try {
            $client = new Client();
            $response = $client->get(self::API_ENDPOINT);
            $data = json_decode($response->getBody(), true);

            return $data['data_user'];
        } catch (GuzzleException $e) {
            // Handle error (contoh: log atau kembalikan pesan kesalahan)
            return null;
        }
    }
}

