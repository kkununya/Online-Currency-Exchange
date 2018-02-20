<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Receiver::all();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
              
        $receiver = Receiver::updateOrCreate(
            ['card_id' => $request->cardId],
            [
              'id_type' => $request->idType,
              'nation' => $request->nation,
              'name_title' => $request->nameTitle,
              'first_name' => $request->firstName,
              'last_name' => $request->lastName,
              'telephone_no' => $request->tel
            ]
          );

        if(empty($receiver)){
          return self::jsonResponse(500, ['msg' => 'Create Customer not success']);
        }
        // return $receiver->id;
        return response()->json($receiver->id, 200);
      }


    public function show(Receiver $receiver)
    {
        //
    }


    public function edit(Receiver $receiver)
    {
        //
    }


    public function update(Request $request, Receiver $receiver)
    {
        //
    }

    public function destroy(Receiver $receiver)
    {
        //
    }
}