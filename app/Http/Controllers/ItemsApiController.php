<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Item;
use App\Http\Requests\ItemRequest;

class ItemsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = DB::table('items')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  APP\Http\Requests\ItemRequest  $request
     * @return Response
     */
    public function store(ItemRequest $request)
    {
        $item = Item::query()->create($request->validated());

        return response()->json([
            'success' => true,
            'data' => ['id' => $item->id]
        ]);

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
            return response()->json([
                'success' => false,
                'message' => 'query result error',
                'data' => ['error' => 'item not found']]);
        }

        return response()->json([
            'success' => true,
            'data' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ItemRequest $request, $id)
    {
        Item::where('id',$id)->update(array_slice($request->all(), 0, 4));

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $res = Item::where('id',$id)->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Remove all resource from storage.
     *
     */
    public function clean()
    {
        Item::query()->truncate();

        return response()->json(['success' => true]);

    }
}
