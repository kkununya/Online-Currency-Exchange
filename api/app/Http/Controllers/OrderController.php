<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Order::with(['customer', 'receiver', 'orderdetails.BanknoteTransactions', 'branch', 'purpose', 'status'])->get();
    }

    public function getOne($id){
        return Order::where('id', $id)->with(['customer', 'receiver', 'orderdetails.BanknoteTransactions', 'branch', 'purpose', 'status'])->first();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $order = Order::create(
            [
                'user_id' => $request->userId,
                'customer_id' => $request->customerId,
                'receiver_id' => $request->receiverId,
                'purpose_id' => $request->purposeId,
                'selected_date' => $request->selectedDate,
                'selected_branch_id' => $request->selectedBranchId,
                'total_price' => $request->totalPrice,
                'pick_up_date_time' => $request->pickUpDateTime,
                'pick_up_branch' => $request->pickUpBranch,
                'payment_id' => $request->paymentId,
                'order_status_id' => $request->status
            ]);
  
          if(empty($order)){
            return self::jsonResponse(500, ['msg' => 'Create Order not success']);
          }
          
          return response()->json($order->id, 200);
    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request)
    {
        Order::where('id', $request->order_id)
            ->update([$request->field => $request->value]);

        return $request->field;
    }

    public function destroy(Order $order)
    {
        //
    }

    public function updateStatus(Request $request){

        Order::where('id', $request->order_id)
            ->update(['order_status_id' => $request->status_id]);

        return "Status Updated!";
    }
}
