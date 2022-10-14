<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    public function create(Item $item)
    {
        return view('items.create', compact('item'));
    }

    public function store()
    {
        Item::query()->create($this->validateRequest());

        return redirect('items');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }

    public function destroy()
    {

    }

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
