<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class TestController extends Controller
{
    public const LEAD_TYPE = "lead";
    public const CONTACT_TYPE = "contact";
    public const COMPANY_TYPE = "company";
    private const API_URL = "https://d6757be6f1c95.amocrm.ru/";

    public function test(Request $request){
        $type = $request->input('type');
        
        $client = new \GuzzleHttp\Client([    'verify' => false]);
        $response = $client->request('GET', 'https://test.gnzs.ru/oauth/get-token.php', [
            'headers' => [
                'X-Client-Id' => '29982469'
            ],
        ]);
        $token = @json_decode($response->getBody()->getContents(),1)['access_token'];
        

        $types = [
            self::LEAD_TYPE => [
                "path"=> "api/v4/leads",
                "r_path"=>"leads",
                'name'=> "Сделка" 
            ],
            self::CONTACT_TYPE => [
                "path"=> "api/v4/contacts",
                "r_path"=>"contacts",
                'name'=> "Контакт" 
            ],
            self::COMPANY_TYPE => [
                "path"=> "api/v4/companies",
                "r_path"=>"companies",
                'name'=> "Компания" 
            ],
        ];
        if (!array_key_exists($type, $types)){
            throw new BadRequestHttpException("type is not correct");
        }

        $response = $client->request("POST",self::API_URL.$types[$type]['path'],[
            "headers"=>[
                "Authorization"=>"Bearer $token",
            ],
            "body"=>'[{}]'
        ]);
        $decoded = @json_decode($response->getBody()->getContents(),1);
        
        $id = $decoded["_embedded"][$types[$type]['r_path']][0]['id'];
        return ["id"=>$id, "type"=>$types[$type]['name']];
    }
}
