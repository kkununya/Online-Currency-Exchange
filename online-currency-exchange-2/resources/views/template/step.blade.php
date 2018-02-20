@extends('template.base')

@section('content')
<!-- Steps form -->
<div class="card">
    <div class="card-body">        
        <div class="steps-form">
            <div class="steps-row setup-panel">
                <div class="steps-step">
                    <a href="#step-1" class="btn-indigo" >
                    <button class="btn btn-warning btn-circle" disabled>
                    1
                    </button>
                    </a>
                    <p>Exchange</p>
                </div>
                <div class="steps-step">
                    <a href="#step-2" disabled="disabled">
                    <button class="btn btn-secondary btn-circle" disabled>
                        2
                    </button>
                    </a>
                    <p>Personal</p>
                </div>
                <div class="steps-step">
                    <a href="#step-3" disabled="disabled">
                        <button class="btn btn-secondary btn-circle" disabled>
                            3
                        </button>
                    </a>
                    <p>Payment</p>
                </div>
                <div class="steps-step">
                    <a href="#step-4" disabled="disabled">
                        <button class="btn btn-secondary btn-circle" disabled>
                            4
                        </button>
                    </a>
                    <p>Bill</p>
                </div>
            </div>
        </div>

            <div class="row setup-content" id="step-1">
                <div class="col-md-12">
                    @include('exchange.main')  
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-md-12">
                    @include('personal.main')
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-md-12">
                    @include('payment.main')                    
                    <br>
                </div>
            </div>
            <div class="row setup-content" id="step-4">
                <div class="col-md-12">
                    <span id="bill"></span>
                </div>
            </div>
    </div>
</div>
<!-- Steps form -->

<div class="loading">Loading&#8230;</div>

@endsection


@section('javascript')
<script src="{{URL::asset('js/form-validation.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/order/step.js')}}"></script>
    <script>
        $('.loading').hide();
        $('#step-1').css('display', 'flex');
        var js_data = '<?php echo json_encode($currencies); ?>';
        var currencyData = JSON.parse(js_data);
        var js_data = '<?php echo json_encode($branches); ?>';
        var branchData = JSON.parse(js_data);
        $('input[name="selectedDate"]').datepicker({
            startDate:  '+1d',
            endDate: '+30d'
        });
    </script>
  <script type="text/javascript" src="{{URL::asset('js/order/addCurrency.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/order/personal.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/order/payment.js')}}"></script>

@endsection

@section('stylesheet')
    <!-- Step CSS -->
  <style>
  .steps-form {
  display: table;
  width: 100%;
  position: relative;
  }
  .steps-form .steps-row {
    display: table-row;
  }
  .steps-form .steps-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
  }
  .steps-form .steps-row .steps-step {
    display: table-cell;
    text-align: center;
    position: relative;
    width: 25%;
  }
  .steps-form .steps-row .steps-step p {
    margin-top: 0.5rem; }
  .steps-form .steps-row .steps-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
  }
  .steps-form .steps-row .steps-step .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
    margin-top: 0; 
  }
  .table-sm td, .table-sm th {
    border: none;
    }
    .error {
    color: red;
    }
  </style>
    <link rel="stylesheet" href="{{ URL::asset('css/loading.css') }}">
@endsection