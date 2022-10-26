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

            $currencies = $svcCommon->get('currencies' );
            Redis::set('currencies', json_encode($currencies), 'EX', 3600);

            return response()->json($currencies);
        }

        $currencies = Redis::get('currencies');

        return response()->json(json_decode($currencies));
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
