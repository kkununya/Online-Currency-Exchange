<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showLogin()
    {
        return view('login');
    }

    public function doLogOut()
    {
        Auth::logout();
        return Redirect::to('login');
    }

    public function doLogin()
    {
        // $rules = array(
        //     'email' => 'required|email',
        //     'password' => 'required|min:4'
        // );

        // $validator = Validator::make(Input::all(), $rules);

        // if ($validator->fails()) {
		// 	return Redirect::to('login')
		// 		->withErrors($validator) 
		// 		->withInput(Input::except('password')); 
		// }else{
        //     $userdata = [
        //         'email' => Input::get('email'),
        //         'password' => Input::get('password')
        //     ];

        //     if(Auth::attemp($userdata)){
        //         return Redirect::to('order');
        //     }
        //     else{
        //         return Redirect::to('login');
        //     }
        // }

    }
}
