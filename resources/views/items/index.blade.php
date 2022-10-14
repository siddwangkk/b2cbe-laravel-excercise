@extends('layout')

@section('title', 'Item List')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Items List</h1>
        </div>
    </div>

    <table class="table mb-5" >
        <thead class="thead-dark">
            <tr class="tr" style="background-color: #1b1e21">
                <th class="col-1 h5 text-white">Item ID</th>
                <th class="col-1 h5 text-white">Name</th>
                <th class="col-1 h5 text-white">URL</th>
                <th class="col-1 h5 text-white">Price</th>
                <th class="col-1 h5 text-white">Quantity</th>
            </tr>
        </thead>
        @foreach($items as $item)
            <tr class="pb-3">
                <td>{{ $item->id }}</td>
                <td>
                    <a href="/items/{{$item->id}}">
                        {{ $item->name }}
                    </a>
                </td>
                <td>
                    <a href="{{$item->url}}" target="_blank">{{ $item->url }}</a>
                </td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->qty }}</td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-between">
        <form action="/items/create">
            <button class="btn btn-dark">Add Item</button>
        </form>
        <form action="/items" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger">Delete All</button>
        </form>
    </div>

@endsection
