<?php

namespace App\Http\Controllers;

use App\Models\BanknoteTransaction;
use Illuminate\Http\Request;

class BanknoteTransactionController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return BanknoteTransaction::all();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $banknoteTransaction = BanknoteTransaction::create(
            [
                'order_detail_id' => $request->order_detail_id,
                'banknote_id' => $request->banknote_id,
                'amount' => $request->amount
            ]);
  
          if(empty($banknoteTransaction)){
            return self::jsonResponse(500, ['msg' => 'Create Banknote Transaction not success']);
          }
          
          return response()->json($banknoteTransaction->id, 200);
    }


    public function show(Currency $currency)
    {
        //
    }


    public function edit(Currency $currency)
    {
        //
    }


    public function update(Request $request, Currency $currency)
    {
        //
    }

    public function destroy(Currency $currency)
    {
        //
    }
}