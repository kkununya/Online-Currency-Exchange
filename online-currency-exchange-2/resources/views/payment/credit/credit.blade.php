<div class="modal fade bd-example-modal-lg"id="credit-modal" tabindex="-1" role="dialog" aria-labelledby="credit-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div style="padding: 20px;">
      <h6 class="font-bold pl-0 my-4 text-center"><strong>ชำระเงินผ่านบัตรเครดิต</strong></h6>
        <div class="text-center">
          <img src="{{ asset('storage/Credit_Card.png') }}" class="rounded" alt="..." width=70px;>
        </div><br>
      <form id="creditForm">
        <input type="text" class="form-control mb-3" id="credit_card_name" name="credit_card_name" placeholder="ชื่อที่ปรากฎบนบัตร" value="">
        <input type="text" class="form-control mb-3" id="credit_card_no" name="credit_card_no" placeholder="หมายเลขบัตร" value="">
        <select id="credit_card_type" name="credit_card_type" class="custom-select mb-3" style="width: 100%;">
          <option value="" selected>ประเภทบัตร</option>
          <option value="1">
          VISA
          </option>
          <option value="2">Master Card</option>
        </select>
      <br>
      <div class="row">
        <div class="col-8 mb-3">
        <label for="expireMonth" class="col-form-label">Expire Date</label>
          <div class="row">
            <div class="col-6">
              <select id="expireMonth" name="expireMonth" class="form-control">
                <option value="" selected>M</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
              </select>
            </div>
            <div class="col-6">
              <select id="expireYear" name="expireYear" class="form-control">
                <option value="" selected>Y</option>
                <option value=2017>2017</option>
                <option value=2018>2018</option>
                <option value=2019>2019</option>
                <option value=2020>2020</option>
                <option value=2021>2021</option>
                <option value=2022>2022</option>
                <option value=2023>2023</option>
                <option value=2024>2024</option>
                <option value=2025>2025</option>
                <option value=2026>2026</option>
                <option value=2027>2027</option>
                <option value=2027>2028</option>
                <option value=2027>2029</option>
                <option value=2027>2030</option>
                <option value=2027>2031</option>
                <option value=2027>2032</option>
                <option value=2027>2033</option>
                <option value=2027>2034</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-4 mb-3">
          <label for="cvv" class="col-form-label" style="font-size: 15px;">Security Code</label>
          <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" value="">
        </div>
      </div>
      <br>
      <button id="creditSubmit" type="button" class="btn btn-warning mb-3" style="width: 100%;"  data-dismiss="modal"><strong>ชำระเงิน 29,871.00 บาท</strong></button>
      <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100%;">ยกเลิก</button>
    </form>
    </div>
    </div>
  </div>
</div>
