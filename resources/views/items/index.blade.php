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
                <th class="col-1 h5 text-white text-center" style="width: 2%;">
                    <input id="select-all" type="checkbox" onclick="toggle(this)">
                </th>
                <th class="col-1 h5 text-white text-center">ID</th>
                <th class="col-1 h5 text-white text-center">Name</th>
                <th class="col-1 h5 text-white text-center">URL</th>
                <th class="col-1 h5 text-white text-end">Price(USD)</th>
                <th class="col-1 h5 text-white text-center">Quantity</th>
            </tr>
        </thead>
        <tbody id="items-tbody">
        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        <button id="add-item-btn" class="btn btn-dark me-2">Add Item</button>
        <button id="calculate-btn" class="btn btn-outline-success me-2">Calculate</button>
        <div id="exchange" class="me-auto mb-0 align-self-center">
            <div id="total-usd" class="align-self-center"></div>
            <div id="total-exchange" class="align-self-center"></div>
        </div>
        <button id="delete-all-btn" class="btn btn-danger">Delete All</button>
    </div>
    <div id="avc"></div>

{{--    <div id="exchange">Total USD: <p id="total-usd"></p>></div>--}}

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
@endsection
