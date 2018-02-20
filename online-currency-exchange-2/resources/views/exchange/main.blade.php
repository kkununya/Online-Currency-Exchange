<section>
  <h6 class="font-bold pl-0 my-4" style="text-align: center"><strong>ระบุจำนวนเงินที่ต้องการ</strong></h6>
      <table class="table table-sm table-hover mb-1" style="height: 100px;">
      <thead>
        <tr>
        <th>Currency</th>
        <th class="text-center">Rate</th>
        <th class="text-right">Amount</th>
        <th class="text-right"></th>
        </tr>
      </thead>
      <tbody id="currencyTable">

      </tbody>
        <tr style="border= none;">
          <td colspan="2">
          <p>ราคารวม (THB)</p>
          </td>
          <td colspan="3" class="text-right"> 
            <span id="totalPrice">
            
            </span>
          </td>
        </tr>
      </table>

      <form id="exchangeForm">
      <h6 id="exTotal" class="my-4" style="text-align: center">*สั่งซื้อได้ไม่เกิน 100,000 บาท ต่อหนึ่งรายการ</h6>
      <center>
        <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#addCurrency" data-value="add">เลือกสกุลเงิน</button>
        <input hidden type="text" class="currencyList form-control" name="currencyList" id="currencyList"><br/>
        <span class="currencyError"></span>
      </center>     
          <div class="form-group">
            <select class="custom-select form-control" id="purpose" name="purpose">
            <option value="" disabled selected>เลือกวัตถุประสงค์</option>
              @foreach($purposes as $purpose)
              <option value={{ $purpose->id }}>{{ $purpose->th }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="custom-select form-control" id="branch" name="branch">
              <option value="" disabled selected>เลือกสาขาส่งมอบ</option>
              @foreach($branches as $branch)
              <option value={{ $branch->id }}>{{ $branch->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <div class="input-group date">
                <input id="selectedDate" name="selectedDate" type="text" class="form-control" placeholder="เลือกวันที่ส่งมอบ" readonly>
                <div class="input-group-addon">
                    <span class="oi oi-calendar"></span>
                </div>
            </div>
            <span class="dateError"></span>
          </div>
        </form>
        <br>
        <button id="nextButton" class="btn btn-warning btn-rounded nextBtn float-right" type="submit">Next</button>
      @include('exchange.currency-modal')
      
  </div>
</section>