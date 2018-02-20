@extends('adminlte::page')

@section('htmlheader_title')
	อัตราแลกเปลี่ยนประจำวัน
@endsection

@section('contentheader_title')
  อัตราแลกเปลี่ยนประจำวัน
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Banknote Transactions</h3>
        <div class="box-tools">

          <div id="datepick" class="pull-right" style="padding: 5px 10px; border: 1px solid #ccc; margin-left: 5px; cursor: pointer;">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
            <span></span> <b class="caret"></b>
          </div>
            <div class="form-group pull-right" style="margin-left: 5px;">
              <select name="currency" id="currency" class="form-control">
              <option value="">All Currency</option>
                @foreach($currencies as $currency)
                  <option value={{ $currency->label }}>{{ $currency->label }}</option>
                @endforeach
              </select>
            </div>
        </div>

      </div>
      <div class="box-body">
        <table id="banknoteTable" class="table table-bordered">
          <thead>
            <tr>
              <th>Transaction ID</th>
              <th>Currency</th>
              <th>Banknote Type</th>
              <th>Amount</th>
              <th>Order ID</th>
              <th>Date Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orderdetails as $orderdetail)
              @foreach($orderdetail->banknote_transactions as $banknote_transaction)
            <tr>
              <td>{{ $banknote_transaction->id }}</td>
              <td>{{ $orderdetail->label }}</td>
              <td>{{ $banknotes[$banknote_transaction->id - 1]->type }}</td>
              <td>{{ $banknote_transaction->amount }}</td>
              <td>{{ $orderdetail->order_id }}</td>
              <td>{{ $banknote_transaction->created_at }}</td>
            </tr>
              @endforeach
            @endforeach
          </tbody>
          <tfoot></tfoot>
        </table>
      </div>
      <div class="box-footer">
      
      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script>
    $(document).ready(function(){
      var table = $('#banknoteTable').DataTable();
      table.order([0, 'desc']).draw();
      $('#currency').on('change', function(){
        table.columns(1).search(this.value).draw();
      });
      
      $('#datepick span').html('Pick Date Here');
      
      $('#datepick').daterangepicker({
          ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          }
      });

      $('#datepick').on('apply.daterangepicker', function(ev, picker) {
      $('#datepick span').html(picker.startDate.format('MMMM D, YYYY') + ' - ' + picker.endDate.format('MMMM D, YYYY'));
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = picker.startDate.format('MM-DD-YYYY');
                var max = picker.endDate.format('MM-DD-YYYY');
                console.log(min, max);
                var selectedDate = data[6];
                if (
                    (min == "" || max == "") ||
                    (moment(selectedDate.split(" ")[0]).isSameOrAfter(min) && moment(selectedDate.split(" ")[0]).isSameOrBefore(max))
                ) {
                    return true;
                }
                return false;
            }
        );
        table.draw();
      });

      $('#datepick').on('cancel.daterangepicker', function(ev, picker) {
          $('#datepick span').html('Pick Date Here');
          $('#datepick').val('');
          table.columns(5).search("").draw();
      });
      
    });
  </script>
@endsection

@section('stylesheet')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" /> -->
@endsection