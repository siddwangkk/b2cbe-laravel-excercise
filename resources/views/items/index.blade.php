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
            <tr class="tr thead-dark" style="background-color: #1b1e21">
                <th class="col-1 h5 text-white">Item ID</th>
                <th class="col-1 h5 text-white">Name</th>
                <th class="col-1 h5 text-white">URL</th>
                <th class="col-1 h5 text-white">Price</th>
                <th class="col-1 h5 text-white">Quantity</th>
            </tr>
        </thead>
        <tbody id="items-tbody">
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <button id="add-item-btn" class="btn btn-dark">Add Item</button>
        <button id="delete-all-btn" class="btn btn-danger">Delete All</button>
    </div>

    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>

@endsection
