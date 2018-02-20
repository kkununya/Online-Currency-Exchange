<!-- Modal -->
<div class="modal fade" id="addCurrency" tabindex="-1" role="dialog" aria-labelledby="addCurrencyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCurrencyLabel">ระบุจำนวนเงินที่่ต้องการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-8">
            <label for="currency">Currency</label>
            <select id="currency" name="currency" class="custom-select form-control" style="width: 100%;">
              <option selected value=0>Select Currency</option>
              @foreach($currencies as $currency)
                <option value={{ $currency->id }}>{{ $currency->label }}</option>
              @endforeach
            </select>
              <div id="currency-feedback" class="invalid-feedback">
                Please select currency.
              </div>
            </div>
            <div class="col-4">
              <label for="rate">Rate</label>
              <input type="number" step="0.0001" class="form-control" id="rate" name="rate" placeholder="" style="width: 100%;" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="foreignAmount">จำนวนเงิน</label>
              <div class="input-group">
                <input type="string" step="0.0001" class="form-control" id="foreignAmount" name="foreignAmount">
                <span id="selectedCurrency" class="input-group-addon"></span>
              </div>
              <div id="foreignAmount-feedback" class="invalid-feedback">
                Please provide valid amount.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-2">
              <label for="thbAmount">จำนวนเงิน</label>
              <div class="input-group">
                <input type="string" step="0.0001" class="form-control" id="thbAmount" name="thbAmount" disabled>
                <span class="input-group-addon">THB</span>
              </div>
            </div>
          </div>
        </form>
        <span>*ประเภทธนบัตรที่มีจำหน่าย </span><span id="banknote_type"></span>
      </div>
      <div class="modal-footer">
        <!-- Add Button -->
        <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button id="add" type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        <!-- Update -->
        <button id="delete" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
        <button id="update" type="button" class="btn btn-primary" data-dismiss="modal">Save Change</button>
      </div>
    </div>
</div>