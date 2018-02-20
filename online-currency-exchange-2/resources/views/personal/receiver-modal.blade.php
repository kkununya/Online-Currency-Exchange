<!-- Modal -->
<div class="modal fade" id="receiverModal" tabindex="-1" role="dialog" aria-labelledby="receiverModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="receiverModalLabel">กรอกข้อมูลส่วนตัวผู้รับเงิน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="receiverForm">
          <div class="row">
            <div class="col-6 form-group">
                <select id="re_title_name" name="re_title_name" class="custom-select" style="width: 100%;">
                  <option value="" disabled selected>คำนำหน้าชื่อ</option>
                  <option value="นาย">นาย</option>
                  <option value="นาง">นาง</option>
                  <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="col-6 form-group">
                <select id="re_nation" name="re_nation" class="custom-select" style="width: 100%;">
                <option value="" disabled selected>สัญชาติ</option>
                <option value="ไทย">ไทย</option>
                <option value="2">อเมริกา</option>
                <option value="3">ญี่ปุ่น</option>
                </select>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                  <input type="text" class="form-control" id="re_first_name" name="re_first_name" placeholder="ชื่อ" value="">
              </div>
              <div class="col-md-6 form-group">
                  <input type="text" class="form-control" id="re_last_name" name="re_last_name" placeholder="นามสกุล" value="">
              </div>
            </div>
            <div class="row">
              <div class="col-4 form-group">
                  <select id="re_id_type" name="re_id_type" class="custom-select" style="width: 100%;">
                  <option value="" disabled selected>ประเภทบัตร</option>
                  <option value="บัตรประชาชน">บัตรประชาชน</option>
                  <option value="หนังสือเดินทาง">หนังสือเดินทาง</option>
                  </select>
              </div>
              <div class="col-8 form-group">
                  <input type="text" class="form-control" id="re_card_id" name="re_card_id" placeholder="หมายเลขบัตร" value="">
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="re_tel" name="re_tel" placeholder="เบอร์โทรศัพท์" value="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalCloseButton">Close</button>
        <button type="button" class="btn btn-primary" id="recieverSaveButton" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>