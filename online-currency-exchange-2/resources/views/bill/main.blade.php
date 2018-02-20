
<div class="card">
    <div class="card-body"> 
      @if($order->status->id == 1)
        <div class="text-center text-warning" style="font-size: 40px;">
          <span class="oi oi-warning"></span>
        </div>
        <h6 class="card-title" style="text-align: center">RTP sent to other Bank, please complete transaction from your RTP's bank which you registered</h6>
        <h6 class="card-title" style="text-align: center">หลังจากทำรายการสำเร็จ ระบบจะส่งใบสรุปรายการไปที่ E-mail: <strong>{{ $order->customer->email }}</strong></h6>
      @else
        <div class="text-center text-success" style="font-size: 40px;">
          <span class="oi oi-circle-check"></span>
        </div>
        <h6 class="card-title" style="text-align: center">ทำรายการสำเร็จ</h6>
        <h6 class="card-title" style="text-align: center">ระบบจะทำการส่งใบสรุปรายการไปทางอีเมลของคุณ<br>โปรดนำไปแสดงที่ธนาคารเพื่อรับมอบเงิน</h6>
      @endif
      <div class="card mb-3">
        <div class="card-body">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td class="text-right font-weight-bold" colspan="2">
                    Order ID :
                    <span id="orderId">{{ $order->id }}</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    ชื่อ-นามสกุล
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="customerName" style="white-space: nowrap;">
                      {{ $order->customer->first_name}} {{$order->customer->last_name }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    ID/Passport No.
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="customerId" style="white-space: nowrap;">
                      {{ $order->customer->card_id}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    หมายเลขโทรศัพท์
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="customerTel" style="white-space: nowrap;">
                     {{ $order->customer->telephone_no}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    อีเมล
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="customerEmail" style="white-space: nowrap;">
                      {{ $order->customer->email }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    สาขาส่งมอบ
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="selectBranch">
                      {{ $order->branch->name }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    วันที่ส่งมอบ (วัน/เดือน/ปี)
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="selectDate" style="white-space: nowrap;">
                      {{ $order->selected_date}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    ผู้รับ
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="receiverName" style="white-space: nowrap;">
                      {{ $order->receiver->first_name}} {{$order->receiver->last_name }}
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
            <table id="cartTable" class="table text-center">
              <tr>
                <th>สกุลเงิน</th>
                <th>Rate</th>
                <th>Amount</th>
              </tr>
              @foreach($order->orderdetails as $orderdetail)
                <tr>
                  <td>{{ $orderdetail->label }}</td>
                  <td>{{ $orderdetail->sale_rate }}</td>
                  <td>{{ $orderdetail->quantity }}</td>
                </tr>
              @endforeach
            </table>
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td>
                    ราคารวม (THB)
                  </td>
                  <td class="text-right font-weight-bold">
                    <span id="total">
                      {{ $order->total_price }}
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>

      <a href="{{ route('order.index') }}">
        <button id="directButton" type="button" class="btn btn-warning" style="width: 100%;">
          <span class="oi oi-home"></span>
          Back to home
        </button>
      </a>
    </div>
  </div>
