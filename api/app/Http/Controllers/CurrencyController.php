<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Currency::with('banknotes')->get();
    }

    public function getOne($id){
        return Currency::where('id', $id)->with('banknotes')->first();        
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
