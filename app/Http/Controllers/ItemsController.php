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

    public function show()
    {

        return view('items.show');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

}
