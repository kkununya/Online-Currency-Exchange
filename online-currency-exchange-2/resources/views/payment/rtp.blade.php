<div class="modal fade bd-example-modal-lg" id="rtp-modal" tabindex="-1" role="dialog" aria-labelledby="rtp-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div style="padding: 20px;">
        <h6 class="font-bold pl-0 my-4 text-center"><strong>ชำระเงินผ่านพร้อมเพย์/RTP</strong></h6>
        <div class="text-center">
          <img src="{{ asset('storage/promt_pay.png') }}" class="rounded" alt="..." width=70px;>
        </div>
        <br>
        <input type="text" class="form-control mb-4" id="anyId" name="anyId" placeholder="หมายเลขบัตรประจำตัวประชาชน/เบอร์โทรศัพท์" value="">
        <label class="custom-control custom-checkbox ">
          <input id="termRtp" type="checkbox" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description" style="padding: 0px 10px 0px 10px;">ข้าพเจ้ายอมรับ<u>ข้อกำหนดและเงื่อนไข</u>การใช้ RTP</span>
        </label>
        <span class="error-rtp mb-3" style="display: none; color: red;">กรุณายอมรับข้อกำหนดและเงื่อนไขการใช้บริการ</span>
        
        <button id="rtpSubmit" data-dismiss="modal" type="button" class="btn btn-warning mb-3" style="width: 100%;"><strong>ยืนยัน</strong></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100%;">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>