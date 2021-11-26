<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController{

    protected function sendJSONResponse($data, $httpStatusCode = 200)
    {
        // say to lumen "send a JSON response ; with specified status code
        return response()->json($data, $httpStatusCode);
    }
}