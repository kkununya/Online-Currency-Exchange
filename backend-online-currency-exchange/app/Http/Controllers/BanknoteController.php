<?php

namespace App\Http\Controllers;

use App\Api;
use Illuminate\Http\Request;

class BanknoteController extends Controller
{

    private $api;
    
        public function __construct()
        {
            $this->api = new Api();
        }

    public function index()
    {
        $response = $this->api->getMethod('/currency');
        $currencies = json_decode($response->getBody());

        $response = $this->api->getMethod('/banknote');
        $banknotes = json_decode($response->getBody());

        $response = $this->api->getMethod('/orderdetail');
        $orderdetails = json_decode($response->getBody());

        return view('banknote.main', ['orderdetails' => $orderdetails, 'banknotes' => $banknotes, 'currencies' => $currencies]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $order_detail_id = $request[0]['order_detail_id'];
        $banknote_id = $request[0]['banknote_id'];
        $amount = $request[0]['amount'];

        $response = $this->api->postMethod('/banknotetransaction',
            [
              'order_detail_id' => $order_detail_id,
              'banknote_id' => $banknote_id,
              'amount' => $amount
            ]
        );

        return json_decode($response->getBody());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
