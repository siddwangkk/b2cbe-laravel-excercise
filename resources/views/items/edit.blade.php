@extends('layout')

@section('title', 'Edit Detail for' . $item->name)

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Edit Detail for {{ $item->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/items/{{ $item->id }}" method="POST">
                @method('PATCH')
                @include('items.form')

                <button type="submit" class="btn btn-primary">Confirm</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
