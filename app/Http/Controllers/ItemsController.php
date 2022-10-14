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

    public function create()
    {

    }

    public function store()
    {

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
}
