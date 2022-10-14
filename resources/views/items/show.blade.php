@extends('layout')

@section('title', 'Detail for ' . $item->name)

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Detail for {{$item->name}}</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <p class="h5 pb-3"><strong>Name: </strong> {{$item->name}}</p>
            <p class="h5 pb-3"><strong>Email: </strong> {{$item->url}}</p>
            <p class="h5 pb-3"><strong>Price: </strong> {{$item->price}}</p>
            <p class="h5 pb-3"><strong>Quantity: </strong> {{$item->qty}}</p>
            <p class="h6 pb-3" style="color: gray;"><strong>Created Time: </strong> {{$item->created_at}}</p>
            <p class="h6 pb-3" style="color: gray;"><strong>Update Time: </strong> {{$item->updated_at}}</p>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <form action="/items/{{ $item->id }}/edit" >
            <button type="submit" class="btn btn-dark" style="width:75px;">Edit</button>
        </form>
        <form action="/items/{{ $item->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

@endsection
