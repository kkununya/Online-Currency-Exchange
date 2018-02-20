<?php

namespace App\Http\Controllers;
use Auth;
use App\Api;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $api;
    
        public function __construct()
        {
            $this->api = new Api();
        }

    public function index()
    {
        $response = $this->api->getMethod('/order');
        $orders = json_decode($response->getBody());

        $response = $this->api->getMethod('/branch');
        $branches = json_decode($response->getBody());

        $response = $this->api->getMethod('/currency');
        $currencies = json_decode($response->getBody());

        $response = $this->api->getMethod('/orderstatus');
        $statuses = json_decode($response->getBody());

        return view('order.main', ['orders' => $orders, 'statuses' => $statuses, 'currencies' => $currencies, 'branches' => $branches]);            
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $response = $this->api->getMethod('/order/'.$id);
        $order = json_decode($response->getBody());

        $response = $this->api->getMethod('/currency/');
        $currencies = json_decode($response->getBody());

        $response = $this->api->getMethod('/banknote/');
        $banknotes = json_decode($response->getBody());

        return view('order.show', ['order' => $order, 'currencies' => $currencies, 'banknotes' => $banknotes]);
    }

    public function edit($id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $response = $this->api->putMethod('/order/updateStatus',
          [
            'order_id' => $id,
            'status_id' => $request->status_id
          ]
        );

        return $response->getBody();
    }

    public function update(Request $request, $order)
    {
        if($request->field == 'pick_up_date_time'){
            $value = date("d/m/Y h:i:sa", time());
        }else{
            $value = $request->value;
        }
        $response = $this->api->putMethod('/order',
            [
            'order_id' => $order,
            'field' => $request->field,
            'value' => $value
            ]
        );

      return $response->getBody();
    }

    public function destroy($id)
    {
        //
    }
}
