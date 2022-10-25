@extends('layout')

@section('title', 'Edit Detail for')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1 id="banner-title"></h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <form id="edit-item-form">
                @include('items.form')
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button id="confirm-btn" type="submit" class="btn btn-dark">Confirm</button>
        <button id="cancel-btn" class="btn btn-secondary">Cancel</button>
    </div>

@endsection

@section('script')
    <script type="module" src="{{asset('js/edit.js')}}"></script>
@endsection
