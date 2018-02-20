<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();

        $roles = Role::all();

        return view('user.main', ['users' => json_decode($users), 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->role == '1'){
        $role = Role::where('name', 'Branch Officer')->first();
      }else if($request->role == '2'){
        $role = $role_manager  = Role::where('name', 'Manager')->first();
      }else{
        $role = $role_admin = Role::where('name', 'Administrator')->first();
      }

      $user = new User();
      $user->employee_id = $request->employee_id;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make('secret');
      $user->save();
      $user->roles()->attach($role);  

      return $user->employee_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::where('id', $id)->with('roles')->first();

      return view('user.show', ['user' => json_decode($user)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->role == '1'){
          $role = Role::where('name', 'Branch Officer')->first();
        }else if($request->role == '2'){
          $role = $role_manager  = Role::where('name', 'Manager')->first();
        }else{
          $role = $role_admin = Role::where('name', 'Administrator')->first();
        }

        $user = User::findOrFail($id);
        $user->employee_id = $request->employee_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->roles()->sync($role);

        return $user->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return $id;
    }
}
