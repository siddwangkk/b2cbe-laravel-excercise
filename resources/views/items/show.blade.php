@extends('layout')

@section('title', 'Detail for ' . $item->name)

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Detail for {{$item->name}}</h1>
            <p><a href="/items/{{ $item->id }}/edit">Edit</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{$item->name}}</p>
            <p><strong>Email</strong> {{$item->url}}</p>
            <p><strong>Price</strong> {{$item->price}}</p>
            <p><strong>Quantity</strong> {{$item->qty}}</p>
        </div>
    </div>

@endsection
