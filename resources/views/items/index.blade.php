@extends('layout')

@section('title', 'Item List')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Items</h1>
            <p><a href="items/create">Add New Item</a></p>
        </div>
    </div>

    @foreach($items as $item)
        <div class="row ">
            <div class="col-1">
                {{ $item->id }}
            </div>
            <div class="col-1">
                <a href="/items/{{$item->id}}">
                    {{ $item->name }}
                </a>
            </div>
            <div class="col-2">
                <a href="https://{{$item->url}}">{{ $item->url }}</a>
            </div>
            <div class="col-1">
                {{ $item->price }}
            </div>
            <div class="col-1">
                {{ $item->qty }}
            </div>
        </div>
    @endforeach
@endsection
