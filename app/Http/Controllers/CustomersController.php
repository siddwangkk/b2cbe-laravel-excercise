<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create(Customer  $customer)
    {
        $companies = Company::all();

        return view('customers.create', compact('customer','companies'));
    }


    public function store()
    {
        Customer::query()->create($this->validateRequest());

        return redirect('customers');
    }

    // Route Model Binding
    public function show(Customer $customer)
    {
    //  below code can be omitted
    //  $customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function  update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        return redirect('/customers/'. $customer->id);
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'

        ]);
    }

}
