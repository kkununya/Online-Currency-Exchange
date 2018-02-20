<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $customer = Customer::create([
        //     'id_type' => $request->id_type,
        //     'card_id' => $request->card_id,
        //     'nation' => $request->nation,
        //     'name_title' => $request->name_title,
        //     'first_name' => $request->fist_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'telephone_no' => $request->telephone_no,
        //     'address' => $request->address,
        //     'province' => $request->province,
        //     'district' => $request->district,
        //     'sub_district' => $request->sub_district,
        //     'postal_code' => $request->postal_code
        // ]);
        
        // if(empty($customer)){
        //     return self::jsonResponse(500, ['msg' => "customer is empty"]);
        // }
            return $request->nation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
