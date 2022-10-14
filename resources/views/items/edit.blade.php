@extends('layout')

@section('title', 'Edit Detail for' . $item->name)

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Edit Detail for {{ $item->name }}</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <form action="/items/{{ $item->id }}" method="POST" id="edit">
                @method('PATCH')
                @include('items.form')
                @csrf
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button form="edit" type="submit" class="btn btn-dark">Confirm</button>
        <form id="back" class="pd-0" action="/items/{{ $item->id }}">
            <button class="btn btn-secondary">Cancel</button>
        </form>
    </div>

@endsection
