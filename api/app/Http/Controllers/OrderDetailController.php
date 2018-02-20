<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Currency;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return OrderDetail::with(['BanknoteTransactions'])->get();
    }

    public function getOne($id){
        return OrderDetail::where('id', $id)->with(['BanknoteTransactions'])->get();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
      
        $cur = Currency::where('id', $request->currencyId)->get();

        $orderdetail = OrderDetail::create(
            [
                'order_id' => $request->orderId,
                'currency_id' => $cur[0]->id,
                'label' => $cur[0]->label,
                'sale_rate' => $cur[0]->sale_rate,
                'purchase_rate' => $cur[0]->purchase_rate,
                'quantity' => $request->quantity,
                'price_thb' => $request->thbPrice
            ]);

          if(empty($orderdetail)){
            return self::jsonResponse(500, ['msg' => 'Create Order not success']);
          }

          return response()->json("Success!", 200);
          
    }


    public function show(OrderDetail $orderdetail)
    {
        //
    }


    public function edit(OrderDetail $orderdetail)
    {
        //
    }


    public function update(Request $request, OrderDetail $orderdetail)
    {
        //
    }

    public function destroy(OrderDetail $orderdetail)
    {
        //
    }
}