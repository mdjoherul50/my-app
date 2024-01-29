<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        $data = [
            'customers' => $customers
        ];
        return view('customers.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',   
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
    $messages = array(  
          'name.required' => 'Name is required',
          'email.required' => 'Email is required',  
          'phone.required' => 'Phone is required',
          'address.required' => 'Address is required',
    );
        if ($validator->fails()) {
            // If validation fails, redirect back with the error messages
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
