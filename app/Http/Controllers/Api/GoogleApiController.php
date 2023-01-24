<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Helpers;
use Illuminate\Http\Request;

class GoogleApiController extends Controller
{
    protected $key = "AIzaSyCIbmvpJx51URocWBJWVoBqO0klQsSuvWo";
    protected $type = "restaurant";
    protected $radius = 3000;
    protected $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
    );

    public function getList(Request $request)
    {
        try {
            $convertJson = Helpers::googleApiGetList($request->lat,$request->long);
          
            $response = array(
                'status'  => true,
                'message' => 'OK',
                'data' => $convertJson['data']
            );
        } catch (Exception $e) {
            $response = array(
                'status'  => false,
                'message' =>  $e->getMessage()
            );
        }

        return response($response, $convertJson['httpcode']);
    }


}
