@extends('adminlte::page')

@section('htmlheader_title')
	Manage Order
@endsection

@section('contentheader_title')
Manage Order
@endsection

@section('contentheader_description')
  Order No. {{ $order->id }}
  @if($order->status->id == 1)
  <span class="badge bg-yellow-active">{{ $order->status->th }}</span>
  @elseif($order->status->id == 2)
  <span class="badge bg-purple-active">{{ $order->status->th }}</span>
  @elseif($order->status->id == 3)
  <span class="badge bg-gray">{{ $order->status->th }}</span>
  @elseif($order->status->id == 4)
  <span class="badge bg-light-blue">{{ $order->status->th }}</span>
  @elseif($order->status->id == 5)
  <span class="badge bg-green">{{ $order->status->th }}</span>
  @elseif($order->status->id == 6)
  <span class="badge bg-red">{{ $order->status->th }}</span>
  @elseif($order->status->id == 7)
  <span class="badge bg-maroon">{{ $order->status->th }}</span>
  @elseif($order->status->id == 8)
  <span class="badge bg-black">{{ $order->status->th }}</span>
  @endif
@endsection

@section('main-content')
  Ordered Date (DD/MM/YY)

  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">Customer Information</div>
        <div class="box-body">
          <table class="table">
            <tbody>
              <tr>
                <td>ชื่อ-สกุล</td>
                <td class="pull-right">{{ $order->customer->name_title }}{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
              </tr>
              <tr>
                <td>สัญชาติ</td>
                <td class="pull-right">{{ $order->customer->nation }}</td>
              </tr>
              <tr>
                <td>
                @if($order->customer->id_type == "บัตรประชาชน")
                  หมายเลขประจำตัวประชาชน
                @endif
                </td>
                <td class="pull-right">
                  <?php echo FnID($order->customer->card_id) ?>
                </td>
              </tr>
              <tr>
                <td>ที่อยู่</td>
                <td class="pull-right">{{ $order->customer->address }}
                @if($order->customer->province == "กรุงเทพมหานคร")แขวง@elseตำบล@endif{{ $order->customer->district }}
                @if($order->customer->province == "กรุงเทพมหานคร")เขต@elseตำบล@endif{{ $order->customer->amphoe }}
                {{ $order->customer->province }}
                {{ $order->customer->zipcode }}</td>
              </tr>
              <tr>
                <td>เบอร์โทรศัพท์</td>
                <td class="pull-right">{{ $order->customer->telephone_no }}</td>
              </tr>
              <tr>
              <td>อีเมล</td>
              <td class="pull-right">{{ $order->customer->email }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="box">
        <div class="box-header">Receiver Information</div>
        <div class="box-body">
          <table class="table">
            <tbody>
              <tr>
                <td>ชื่อ-สกุล</td>
                <td class="pull-right">{{ $order->receiver->name_title }}{{ $order->receiver->first_name }} {{ $order->receiver->last_name }}</td>
              </tr>
              <tr>
                <td>สัญชาติ</td>
                <td class="pull-right">{{ $order->receiver->nation }}</td>
              </tr>
              <tr>
              <tr>
                <td>
                @if($order->receiver->id_type == "บัตรประชาชน")
                  หมายเลขประจำตัวประชาชน
                @endif
                </td>
                <td class="pull-right">
                  <?php echo FnID($order->receiver->card_id) ?>
                </td>
              </tr>
              <tr>
                <td>เบอร์โทรศัพท์</td>
                <td class="pull-right">{{ $order->receiver->telephone_no }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">Order Detail</div>
        <div class="box-body">
          <table class="table">
            <tbody>
              <tr>
                <th>สกุลเงิน</th>
                <th>อัตราแลกเปลี่ยน</th>
                <th>จำนวน</th>
                <th>ราคา(บาท)</th>
              </tr>
              @foreach($order->orderdetails as $orderdetail)
              <tr>
                <td>{{ $orderdetail->label }}</td>
                <td>{{ $orderdetail->sale_rate }}</td>
                <td>{{ number_format($orderdetail->quantity) }}</td>
                <td>{{ number_format($orderdetail->price_thb) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="box-footer" align="center">
          <tr>
            <td>Total Price:</td>
            <td>{{ number_format($order->total_price) }}</td>
          </tr>
        </div>
      </div>
      <!-- Banknote Detail Box -->
      <div class="box" id="banknoteBox">
        <div class="box-header">Banknote Detail</div>
        <div class="box-body">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">สกุลเงิน</th>
                <th class="text-center">ประเภทธนบัตร</th>
                <th class="text-center">รวม</th>
                <th class="text-center">จำนวน</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order->orderdetails as $odt)
                @foreach($odt->banknote_transactions as $bn)
                <tr>
                  <td class="text-center">{{ $odt->label }}</td>
                  <td class="text-center">{{ number_format($banknotes[$bn->banknote_id-1]->type) }}</td>
                  <td class="text-center">{{ number_format($banknotes[$bn->banknote_id-1]->type*$bn->amount) }}</td>
                  <td class="text-center">{{ $bn->amount }}</td>
                </tr>
                @endforeach
              @endforeach
            </tbody>
          </table> 
        </div>
        <div class="box-footer">
          <tr>
            <td>ส่งมอบแล้ววันที่ : </td>
            <td>{{ $order->pick_up_date_time }}</td>
            <td>โดย : </td>
            <td>{{$order->user_id}}</td>
          </tr>
        </div>
      </div>
    </div>
  </div>
  <!-- /////////////////// -->
  
  <div class="tranfer">

  <div class="form-check">
    <label class="form-check-label">
      <input id="idCheckbox" class="form-check-input" type="checkbox" value="">
      หลักฐานการแสดงตัวของผู้มารับธนบัตรถูกต้อง (กรณีบุคคลธรรมดา สำเนาบัตรประจำตัวประชาชน หรือ หนังสือเดินทาง)
    </label>
  </div>

<!-- Banknote Box -->
  <div class="box">
    <div class="box-body">
      <div class="row">
      <form id="bnForm">
      {{ csrf_field() }}
      <?php $index = 1?>
        @foreach($order->orderdetails as $od)
          <div class="col-md-6">
            <table class="table" id="{{$index}}">
              <thead>
              BANKNOTES TABLE - {{ $currencies[$od->currency_id - 1]->label }}
              <img class="flag" width="20" src={{ $currencies[$od->currency_id - 1]->img_path }} alt="United States Minor Outlying Islands Flag">
              </thead>
              <tbody>
                <tr>
                  <th class="text-center" width="30%">ธนบัตร(ใบละ)</th>
                  <th class="text-center">{{ $currencies[$od->currency_id - 1]->label }}</th>
                  <th class="text-center">จำนวน</th>
                </tr>
                @foreach($currencies[$od->currency_id - 1]->banknotes as $banknote)
                  <tr>
                    <td class="text-center">{{ $banknote->type }}</td>
                    <td>
                      <div class="input-group-sm">
                        <input class="form-control text-right total{{$index}}" type="number" value="0.00" min="0" readonly id="total{{ $banknote->id }}" name="total{{ $banknote->id }}">
                      </div>
                    </td>
                    <td>
                      <div class="input-group-sm">
                        <input class="form-control text-right amount{{$index}}" type="number" value="0" min="0" id="amount{{ $banknote->id }}" name="{{ $banknote->id }}">
                        </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td class="text-right">รวม :</td>
                  <td>
                  <div class="form-group input-group-sm">
                    <input id="totalfr{{$index}}" class="form-control text-right" type="text" value="0.00" min="0" readonly>
                    <span class="help-block{{$index}} text-danger hidden">ราคารวมธนบัตรต้องเท่ากับที่สั่งซื้อ</span>
                  </div>
                  </td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <?php $index += 1?>
          @endforeach
        </form>
      </div>
      <center>
      @if(Auth::user()->hasRole('Manager'))
        <button type="button" id="cancelOrder" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#alert" data-state="cancel" data-extra="ต้องการยกเลิกรายการหมายเลข {{ $order->id }} ?">ยกเลิกรายการ</button>
      @endif
        <button type="button" id="tranferButton" class="btn btn-success btn-lg">ส่งมอบธนบัตร</button>
      </center>
    </div>
  </div>
<!--////////////////// -->
  <!-- MODAL -->
  <div class="modal fade" id="summary-modal" tabindex="-1" role="dialog" aria-labelledby="summary-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            ยืนยันการรับธนบัตร - Order No. {{ $order->id }}
            <span class="pull-right">วันที่ {{ date("d-m-Y") }}</span>
          </h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body" id="tranferModalBody">
          <table class="table">
            <tr>
              <td>ชื่อ-นามสกุล</td>
              <td>{{$order->receiver->name_title}} {{$order->receiver->first_name}} {{$order->receiver->last_name}}</td>
            </tr>
            <tr>
              <td>เลขบัตรประจำตัวประชาชน/เลขที่หนังสือเดินทาง</td>
              <td><?php echo FnID($order->receiver->card_id) ?></td>
            </tr>
            @foreach($order->orderdetails as $orderdetail)
              <tr>
                <td >{{ $orderdetail->label }}</td>
                <td>{{ number_format($orderdetail->quantity) }}</td>
              </tr>
            @endforeach
          </table>
          <span>รายการธนบัตร</span>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">สกุลเงิน</th>
                <th class="text-center">ประเภท</th>
                <th class="text-center">รวม</th>
                <th class="text-center">จำนวน</th>
              </tr>
            </thead>
            <tbody id="bankTable">
            
            </tbody>
          </table>
        </div>
        
        <!-- Printer Loading... -->
        <div class="hidden" id="printing">
          <center>
            <img id="imgPrinter" src="{{ asset('img/printer.png') }}" alt="" width=130px;>
            </br>
            <span>กำลังพิมพ์ใบรับเงิน</span>
            </br>
            <div id="fountainG">
              <div id="fountainG_1" class="fountainG"></div>
              <div id="fountainG_2" class="fountainG"></div>
              <div id="fountainG_3" class="fountainG"></div>
              <div id="fountainG_4" class="fountainG"></div>
              <div id="fountainG_5" class="fountainG"></div>
            </div>
          </center>
          </br></br>
        </div>
        <div class="modal-footer" id="modalFoot">
          <button id="cancelButton" type="button" class="btn btn-danger" data-dismiss="modal" >ยกเลิก</button>
          <button id="submitButton" type="button" class="btn btn-success">ข้อมูลถูกต้อง</button>
          <button id="okButton" type="button" class="btn btn-success hidden" data-dismiss="modal">ตกลง</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Alert Modal -->
<div class="modal fade modal-secondary" id="alert" tabindex="-1" role="dialog" aria-labelledby="alert" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="extra">Recipient:</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button id="yesButton" type="Button" class="btn" data-dismiss="modal">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

@endsection

<?php 
  function FnID($var){
    $srt[0] = substr($var, 0, 1);
    $srt[1] = substr($var, 1, 4);
    $srt[2] = substr($var, 5, 5);
    $srt[3] = substr($var, 10, 2);
    $srt[4] = substr($var, 12, 1);
    return $srt[0]."-".$srt[1]."-".$srt[2]."-".$srt[3]."-".$srt[4];
  }
?>

@section('javascript')
  <script>
    var js_data = '<?php echo json_encode($currencies); ?>';
    var currencyData = JSON.parse(js_data);
    var js_data = '<?php echo json_encode($order->orderdetails); ?>';
    var orderData = JSON.parse(js_data);
    var js_data = '<?php echo json_encode($banknotes); ?>';
    var banknoteData = JSON.parse(js_data);
    var js_data = '<?php echo json_encode($order->id); ?>';
    var orderId = JSON.parse(js_data);
    var js_data = '<?php echo json_encode($order->status->id); ?>';
    var orderStatus = JSON.parse(js_data);
    var js_data = '<?php echo json_encode(Auth::user()->employee_id); ?>';
    var user_employee_id = JSON.parse(js_data);

    if(orderStatus == 5){
      $('.tranfer').hide();
    }else if(orderStatus == 1){
      $('#banknoteBox').hide();
      $('.tranfer').find("input, select").attr("disabled", true);
      $("#tranferButton").attr("data-toggle", "modal");
      $("#tranferButton").attr("data-target", "#alert");
      $("#tranferButton").attr("data-extra", "รายการนี้ยังไม่ได้ชำระเงิน");
    }else if(orderStatus == 6 || orderStatus == 7){
      $('.tranfer').hide();
      $('#banknoteBox').hide();
    }
    else{
      $('#banknoteBox').hide();
    }

  </script>
  <script src="{{ url (asset('/js/order.js')) }}" type="text/javascript"></script>
@endsection

@section('stylesheet')

@endsection
