<section>
  <div class="card">
    <div class="card-body">
      <h6 class="card-title" style="text-align: center"><b>สรุปยอดที่ต้องชำระ</b><br>กรุณาตรวจสอบความถูกต้องของข้อมูล</h6>
      <p class="lead">
      <table class="table table-sm table-striped">
        <tbody>
          <tr>
            <td>
              ชื่อ-นามสกุล
            </td>
            <td class="text-right font-weight-bold">
              <span id="customerName"></span>
            </td>
          </tr>
          <tr>
            <td>
              เลขประจำตัวประชาชน
              /หนังสือเดินทาง
            </td>
            <td class="text-right font-weight-bold">
              <span id="customerId"></span>
            </td>
          </tr>
          <tr>
            <td>
              หมายเลขโทรศัพท์
            </td>
            <td class="text-right font-weight-bold">
              <span id="customerTel"></span>
            </td>
          </tr>
          <tr>
            <td>
              อีเมล
            </td>
            <td class="text-right font-weight-bold">
              <span id="customerEmail"></span>
            </td>
          </tr>
          <!-- <tr>
            <td>
              ที่อยู่
            </td>
            <td class="text-right font-weight-bold">
              <span id="customerAddress"></span>
            </td>
          </tr> -->
          <tr>
            <td>
              สาขาส่งมอบ
            </td>
            <td class="text-right font-weight-bold">
              <span id="selectBranch"></span>
            </td>
          </tr>
          <tr>
            <td>
              วันที่ส่งมอบ
            </td>
            <td class="text-right font-weight-bold">
              <span id="selectDate"></span>
            </td>
          </tr>
          <tr>
            <td>
              ผู้รับ
            </td>
            <td class="text-right font-weight-bold">
              <span id="receiverName"></span>
            </td>
          </tr>
          <tr>
            <td>
              เลขประจำตัวประชาชน
              /หนังสือเดินทางผู้รับ
            </td>
            <td class="text-right font-weight-bold">
              <span id="receiverId"></span>
            </td>
          </tr>
          <tr>
        </tbody>
      </table>

      <table class="table text-center table-sm">
        <thead>
          <tr>
            <th class="text-center">สกุลเงิน</th>
            <th class="text-center">Rate</th>
            <th class="text-right">Amount</th>
          </tr>
        </thead>
        <tbody id="cartTable">

        </tbody>
        <tr>
          <tr style="border= none;">
            <td colspan="2" class="text-left">
            <p>ราคารวม (THB)</p>
            </td>
            <td colspan="2" class="text-right"> 
            <span id="total"></span>            
            </td>
          </tr>
      </table>

      </p>
    </div>
   </div>
   <br>

   <button id="editButton" type="button" class="btn btn-danger mb-3 prevBtn" style="width: 100%;">แก้ไขข้อมูล</button>

   <label class="custom-control custom-checkbox ">
      <input id="termcondition" type="checkbox" class="custom-control-input">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description" style="padding: 0px 10px 0px 10px;">ข้าพเจ้ายอมรับ<u><span data-toggle="modal" data-target="#term">ข้อกำหนดและเงื่อนไข</span></u>การสั่งซื้อธนบัตรต่างประเทศผ่าน Krungsri Online Currency Exchange</span>
    </label>

    <h6 class="font-bold pl-0 my-4" style="text-align: center"><strong>เลือกช่องทางการชำระเงิน</strong></h6>
    <div class="row">
      <div class="col-4 mb-1">
        <button id="directButton" type="button" class="btn btn-warning" style="width: 100%;"><span style="font-size: 13px;">ผ่านบัญชีกรุงศรี</span></button>
      </div>
      <div class="col-4 mb-1">
        <button id="creditButton" type="button" class="btn btn-warning" style="width: 100%;">บัตรเครดิต</button>
      </div>
      <div class="col-4 mb-1">
        <button id="rtpButton" type="button" class="btn btn-warning" style="width: 100%;">พร้อมเพย์</button>
      </div>
    </div>
</section>

<!-- Term & Condition Alert Modal  -->
<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="alert" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="recipient-name" class="form-control-label">กรุณายอมรับเงื่อนไขและข้อกำหนดการใช้บริการ</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

@include('payment.credit.credit')
@include('payment.rtp')
@include('payment.direct-debit.main')

<!-- Large modal -->
<div class="modal fade bd-example-modal-lg"id="credit-modal" tabindex="-1" role="dialog" aria-labelledby="credit-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<div class="modal fade" id="term" tabindex="-1" role="dialog" aria-labelledby="term" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">เงื่อนไขการใช้บริการซื้อธนบัตรต่างประเทศผ่าน Krungsri Online Currency Exchange</h5>
    </div>
    <div class="modal-body">
      <label for="recipient-name" class="form-control-label">...</label>
    </div>
    <div class="modal-footer">
      <button id="accept" type="button" class="btn btn-warning" data-dismiss="modal">ยอมรับ</button>
      <button id="refuse" type="button" class="btn btn-secondary" data-dismiss="modal">ปฏิเสธ</button>
    </div>
  </div>
</div>
</div>

