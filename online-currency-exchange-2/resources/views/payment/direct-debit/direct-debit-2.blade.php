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
              จำนวนเงิน (บาท)
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              29,871.00
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              บันทึกช่วยจำ
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              <input type="text" class="form-control"/>
            </td>
          </tr>
          <tr>
            <td class="text-right" width="30%">
              บัญชีที่จะชำระ
            </td>
            <td class="text-left font-weight-bold pl-3" width="70%">
              <select id="nation" name="nation" class="custom-select" style="width: 100%;">
                <option selected>โปรดเลือก</option>
                <option value="1">ไทย</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>

      <p class="p-3 text-center">หมายเหตุ: ระบบจะส่ง OTP (One Time Password) ไปที่หมายเลข 087XXXXX93 เพื่อยืนยันการทำรายการ</p>
      
      <div class="row">
        <div class="col-6">
          <button type="button" class="btn btn-warning" style="width: 100%;">ขั้นตอนต่อไป</button>
        </div>
        <div class="col-6">
          <button type="button" class="btn" style="width: 100%;">ยกเลิก</button>
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