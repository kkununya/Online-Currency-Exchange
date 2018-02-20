<?php

namespace App\Http\Controllers;

use App\Models\Banknote;
use Illuminate\Http\Request;

class BanknoteController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Banknote::all();
    }

    public function getOne($id){
        return Banknote::where('currency_id', $id)->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Branch $branch)
    {
        //
    }


    public function edit(Branch $branch)
    {
        //
    }


    public function update(Request $request, Branch $branch)
    {
        //
    }

    public function destroy(Branch $branch)
    {
        //
    }
}