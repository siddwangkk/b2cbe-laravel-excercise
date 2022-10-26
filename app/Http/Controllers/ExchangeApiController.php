<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Kkday\Gmbe\Services\KkdayCom\SvcCommon\V1\SvcCommon;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp;


class ExchangeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, SvcCommon $svcCommon)
    {
        $cache = Redis::get('currencies');

        if (!$cache) {
            $client = new GuzzleHttp\Client();
            $res = $client->request('GET', 'https://svc-common.sit.kkday.com/api/v1/currencies');
            $currencies = $res->getBody()->getContents();

//            $currency = $svcCommon->get('/api/v1/currencies' );

            Redis::set('currencies', $currencies);
            return response()->json($currencies);
        }

        $currencies = Redis::get('currencies');

        return response()->json($currencies);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
