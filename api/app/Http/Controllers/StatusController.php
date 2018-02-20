<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return OrderStatus::all();
    }

    public function getOne($id){
        return OrderStatus::where('id', $id)->first();
    }

    public function getOrder($id){
        return OrderStatus::where('id', $id)->with(['orders' => function($query){
            $query->where('selected_branch_id', 'like', 106);
        }])->first();
    }
}