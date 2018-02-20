<?php

namespace App\Http\Controllers;

use App\Api;
use stdClass;
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
        $response = $this->api->getMethod('/currency');
        $currencies = json_decode($response->getBody());
        return view('main', ['currencies' => $currencies]);
    }

    public function create()
    {
        $response = $this->api->getMethod('/currency');
        $currencies = json_decode($response->getBody());

        $response = $this->api->getMethod('/purpose');
        $purposes = json_decode($response->getBody());

        $response = $this->api->getMethod('/branch');
        $branches = json_decode($response->getBody());

        return view('template.step', [
            'currencies' => $currencies,
            'purposes' => $purposes,
            'branches' => $branches
        ]);
    }


    public function store(Request $request)
    {
      $orderDetails = $request[0]['cart'];
      $customer = $request[0]['customer'][0];
      $receiver = $request[0]['receiver'][0];
      $selectedBranchId = $request[0]['selectedBranch'];
      $selectedDate = $request[0]['selectedDate'];
      $purposeId = $request[0]['purpose'];
      $totalPrice = $request[0]['totalPrice'];
      $payment = $request[1]['payment'];

      $status = 4;
      if($payment == 'rtp'){
          $status = 1;
      }

      $response = $this->api->postMethod('/customer',
          [
            'nameTitle' => $customer['title_name'],
            'nation' => $customer['nation'],
            'firstName' => $customer['firstName'],
            'lastName' => $customer['lastName'],
            'idType' => $customer['idType'],
            'cardId' => $customer['cardId'],
            'tel' => $customer['tel'],
            'email' => $customer['email'],
            'address' => $customer['address'],
            'district' => $customer['district'],
            'amphoe' => $customer['amphoe'],
            'province' => $customer['province'],
            'zipcode' => $customer['zipcode']
          ]
      );

      $customerId = json_decode($response->getBody());

      $response = $this->api->postMethod('/receiver',
          [
            'nameTitle' => $receiver['title_name'],
            'nation' => $receiver['nation'],
            'firstName' => $receiver['firstName'],
            'lastName' => $receiver['lastName'],
            'idType' => $receiver['idType'],
            'cardId' => $receiver['cardId'],
            'tel' => $receiver['tel']
          ]
        );
      
      $receiverId = json_decode($response->getBody());
      
      $response = $this->api->postMethod('/order',
        [
          'userId' => 'admin',
          'customerId' => $customerId,
          'receiverId' => $receiverId,
          'purposeId' => $purposeId,
          'selectedDate' => $selectedDate,
          'selectedBranchId' => $selectedBranchId,
          'totalPrice' => $totalPrice,
          'pickUpDateTime' => '',
          'pickUpBranch' => '',
          'paymentId' => '',
          'status' => $status
        ]
      );

      $orderId = json_decode($response->getBody());

      foreach($orderDetails as $orderDetail){
        $response = $this->api->postMethod('/orderdetail',
          [
            'orderId' => $orderId,
            'currencyId' => $orderDetail['currencyId'],
            'quantity' => $orderDetail['frAmount'],
            'thbPrice' => $orderDetail['thbAmount']
          ]
        );
      }

      return $this->show($orderId);
    }


    public function show($id)
    {
        $response = $this->api->getMethod('/order/'.$id);
        $order = json_decode($response->getBody());

        $response = $this->api->getMethod('/branch/'.(int)$order->selected_branch_id);
        $branch = json_decode($response->getBody());
        
        return view('bill.main', ['order' => $order, 'branch' => $branch]);
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
