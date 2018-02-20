@extends('template.base')

@section('content')
<div style="padding: 15px;">
    <h6 class="font-bold pl-0 my-4 text-center"><strong>ชำระเงินผ่านบัญชีกรุงศรี</strong></h6>
    <table class="table table-sm">
        <tbody>
          <tr>
            <td class="text-right" width="30%">
              ผู้รับชำระ
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              ธนาคารกรุงศรีอยุธยา
            </td>
          </tr>
          <tr>
            <td class="text-right" width="40%">
              หมายเลขอ้างอิง
            </td>
            <td class="text-left font-weight-bold pl-3" width="60%">
              123456789
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              จำนวนเงิน (THB)
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              29,871.00
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              วันที่
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              28 ก.ย. 2560
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              ค่าธรรมเนียม(บาท)
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              0.00
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              บันทึกช่วยจำ
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              -
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              บัญชีที่จะชำระ
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              1-3452-XXXXX<br> น.ส.คุณัญญา ศรีวงษ์
            </td>
          </tr>
        </tbody>
      </table>

      <p class="p-3 text-center">ระบบได้ส่งข้อความ OTP ไปยังโทรศัพท์มือถือของท่านเรียบร้อยแล้ว กรุณากรอก OTP<br> เพื่อยืนยัน</p>

      <div class="row">
        <div class="col-6 text-right">
          OTP <br> One-Time Password
        </div>
        <div class="col-6">
          <input type="text" class="form-control"/>
        </div>
      </div>
    <br>
      <div class="row">
        <div class="col-6">
          <button type="button" class="btn btn-warning" style="width: 100%;">ยืนยัน</button>
        </div>
        <div class="col-6">
          <button type="button" class="btn" style="width: 100%;">ย้อนกลับ</button>
        </div>
      </div>

    </div>

@endsection

@section('stylesheet')
    <style>
        .table-sm td, .table-sm th {
        border: none;
        }
    </style>
@endsection