@extends('adminlte::page')

@section('htmlheader_title')
	User
@endsection

@section('contentheader_title')
  User
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User Profile</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body" style="padding: 0 20% 10% 20%;">
        <center>
          <img src={{ asset('img/user1-128x128.jpg') }} class="img-circle" alt="User Image" style="margin: 5%;">

          <div class="row">
            <div class="col-sm-6 text-right">
            Employee ID :
            </div>
            <div class="col-sm-6 text-left">
            {{Auth::user()->employee_id}}
            </div>
            <div class="col-sm-6 text-right">
            Name :
            </div>
            <div class="col-sm-6 text-left">
            {{Auth::user()->name}}
            </div>
            <div class="col-sm-6 text-right">
            E-mail :
            </div>
            <div class="col-sm-6 text-left">
            {{Auth::user()->email}}
            </div>
            <div class="col-sm-6 text-right">
            Role :
            </div>
            <div class="col-sm-6 text-left">
            {{Auth::user()->roles()->get()[0]['name']}}
            </div>
          </div>
      </div>
      </center>
    </div>
  </section>
@endsection