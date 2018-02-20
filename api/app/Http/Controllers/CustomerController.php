<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Customer::all();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $customer = Customer::create(
          [
            'id_type' => $request->idType,
            'nation' => $request->nation,
            'name_title' => $request->nameTitle,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'card_id' => $request->cardId,
            'telephone_no' => $request->tel,
            'email' => $request->email,
            'address' => $request->address,
            'district' => $request->district,
            'amphoe' => $request->amphoe,
            'province' => $request->province,
            'zipcode' => $request->zipcode
          ]
        );

        if(empty($customer)){
          return self::jsonResponse(500, ['msg' => 'Create Customer not success']);
        }
        
        return response()->json($customer->id, 200);
    }


    public function show(Customer $customer)
    {
        //
    }


    public function edit(Customer $customer)
    {
        //
    }


    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}