<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{

    public function index()
    {
        //
    }

    public function getAll()
    {
      return Purpose::all();
    }

    public function getOne($id){
        return Purpose::where('id', $id)->with(['orders'])->first();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Purpose $purpose)
    {
        //
    }


    public function edit(Purpose $purpose)
    {
        //
    }


    public function update(Request $request, Purpose $purpose)
    {
        //
    }

    public function destroy(Purpose $purpose)
    {
        //
    }
}