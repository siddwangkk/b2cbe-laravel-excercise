@extends('layout')

@section('title', 'Add New Item')

@section('content')

    <div class="row pb-4">
        <div class="col-12">
            <h1>Add New Item</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form id="new-item-form" >
                @include('items.form')
                    <button id="new-item-btn" type="submit" class="btn btn-primary">Add Item</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script type="module" src="{{asset('js/create.js')}}"></script>
@endsection
