<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Branch::all();
    }

    public function getOne($id){
        return Branch::where('id', $id)->with(['orders'])->first();
    }

}