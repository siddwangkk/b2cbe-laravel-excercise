<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Item;

class ItemsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Item::all();

        return response()->json(['data' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store()
    {
        $item = Item::query()->create($this->validateRequest());

        return response()->json(['id' => $item->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['data'=>['error' => 'item not found']]);
        }

        return response()->json(['data'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($item)
    {
        $item->delete();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove all resource from storage.
     *
     */
    public function clean()
    {
        Item::query()->truncate();

        return response()->json(['status'=>'success']);

    }

    /**
     *  Define validated format of request data.
     */
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'url' => 'required|URL',
            'price' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
    }
}
