<section>
  <h6 class="font-bold pl-0 my-4" style="text-align: center"><strong>กรอกข้อมูลส่วนตัว</strong></h6>
  <form id="personalForm">
    <div class="row">
      <div class="col-6 form-group">
        <select id="title_name" name="title_name" class="custom-select" style="width: 100%;">
          <option value="" disabled selected>คำนำหน้าชื่อ</option>
          <option value="นาย">นาย</option>
          <option value="นาง">นาง</option>
          <option value="นางสาว">นางสาว</option>
        </select>
      </div>
      <div class="col-6 form-group">
        <select id="nation" name="nation" class="custom-select" style="width: 100%;">
          <option value="" disabled selected>สัญชาติ</option>
          <option value="ไทย">ไทย</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อ" value="">
      </div>
      <div class="col-md-6 form-group">
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-5 form-group">
        <select id="id_type" name="id_type" class="custom-select" style="width: 100%;">
          <option value="" disabled selected>ประเภทบัตร</option>
          <option value="บัตรประชาชน">บัตรประชาชน</option>
          <option value="หนังสือเดินทาง">หนังสือเดินทาง</option>
        </select>
      </div>
      <div class="col-7 form-group">
        <input type="number" class="form-control" id="card_id" name="card_id" placeholder="หมายเลขบัตร"pattern="\d*" maxlength="13">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <input type="number" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรศัพท์" value="">
      </div>
      <div class="col-md-6 form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" value="">
        <small id="emailHelp" class="form-text text-muted">* กรอกอีเมลเพื่อรับใบสรุปรายการทางอีเมล</small>
      </div>
    </div>
  <h6 class="font-bold pl-0 my-3" style="text-align: center"><strong>กรอกข้อมูลที่อยู่</strong></h6>
    <div class="row">
      <div class="col-md-6 form-group">
        <input type="text" class="form-control" id="address" name="address" placeholder="ที่อยู่" value="">
      </div>
      <div class="col-md-6 form-group">
      <input type="text" class="form-control" id="district" name="district" placeholder="แขวง/ตำบล" value="">      
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
      <input type="text" class="form-control" id="amphoe" name="amphoe" placeholder="เขต/อำเภอ" value="">            
      </div>
      <div class="col-md-6 form-group">
      <input type="text" class="form-control" id="province" name="province" placeholder="จังหวัด" value="">                  
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" value="">                  
      </div>
    </div>

    <label class="custom-control custom-radio">
      <input id="by_self" name="radio" type="radio" class="custom-control-input">
      <span class="custom-control-indicator" selected></span>
      <span class="custom-control-description">รับเงินด้วยตนเอง</span>
    </label>
    <label class="custom-control custom-radio">
      <input id="by_other" name="radio" type="radio" class="custom-control-input" data-toggle="modal" data-target="#receiverModal">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">ผู้อื่นรับแทน (โปรดระบุ)</span>
    </label>

    <div class="form-group form-group">
      <label for="receiver">ผู้รับเงิน</label>
      <input type="text" class="form-control" id="receiver" name="receiver" data-toggle="modal" data-target="#receiverModal" readonly>
    </div>
  </form>
  <button id="backBut" class="btn btn-light btn-rounded prevBtn float-left" type="button">Previous</button>
  <button id="nextToPayment" class="btn btn-warning btn-rounded nextBtn float-right" type="button">Next</button>

    @include('personal.receiver-modal')
</section>

<script>

</script>