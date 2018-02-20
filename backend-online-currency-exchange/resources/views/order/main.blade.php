@extends('adminlte::page')

@section('htmlheader_title')
	Order
@endsection

@section('contentheader_title')
  Order
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Order List</h3>
        <div class="box-tools">

          <div id="datepick" class="pull-right" style="padding: 5px 10px; border: 1px solid #ccc; margin-left: 5px; cursor: pointer;">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
            <span></span> <b class="caret"></b>
          </div>

            <div class="form-group pull-right" style="margin-left: 5px;">
              <select name="status" id="status" class="form-control">
              <option value="">All Status</option>
                @foreach($statuses as $status)
                  <option value={{ $status->th }}>{{ $status->th }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group pull-right" style="margin-left: 5px;">
              <select name="currency" id="currency" class="form-control">
              <option value="">All Currency</option>
                @foreach($currencies as $currency)
                  <option value={{ $currency->label }}>{{ $currency->label }}</option>
                @endforeach
              </select>
            </div>
            <!-- <div class="form-group pull-right">
              <select name="branch" id="branch" class="form-control">
              <option value="">All Branch</option>
                @foreach($branches as $branch)
                  <option value={{ $branch->id }}>{{ $branch->name }}</option>
                @endforeach
              </select>
            </div> -->
        </div>
      </div>
      <div class="box-body">
        <table id="orderTable" class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Order No.</th>
              <th>Customer Name</th>
              <th>Currency</th>
              <th>Amount</th>
              <th>Total Price (THB)</th>
              <!-- <th class="text-center">Receive Branch</th> -->
              <th class="text-center">Selected Date</th>
              <th class="text-center">Receiver Name</th>
              <th class="text-center">Receive Date</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td class="text-center"><a href="{{ route('order.show', $order->id) }}">{{ $order->id }}</a></td>
                <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                <td>
                  @foreach($order->orderdetails as $orderdetail)
                    {{ $orderdetail->label }}</br>
                  @endforeach
                </td>
                <td>
                  @foreach($order->orderdetails as $orderdetail)
                  <?php $q = number_format($orderdetail->quantity)?>
                  {{ $q }}</br>
                  @endforeach
                </td>
                <td class="text-center">{{ number_format($order->total_price) }}</td>
                <!-- <td>{{ $order->branch->name }}</td> -->
                <td>{{ $order->selected_date }}</td>
                <td>{{ $order->receiver->first_name }} {{ $order->receiver->last_name }}</td>
                <td class="text-center">{{ $order->pick_up_date_time }}</td>
                <td class="text-center">
                  @if($order->status->id == 1)
                  <span class="badge bg-yellow-active">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 2)
                  <span class="badge bg-purple-active">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 3)
                  <span class="badge bg-gray">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 4)
                  <span class="badge bg-light-blue">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 5)
                  <span class="badge bg-green">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 6)
                  <span class="badge bg-red">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 7)
                  <span class="badge bg-maroon">{{ $order->status->th }}</span>
                  @elseif($order->status->id == 8)
                  <span class="badge bg-black">{{ $order->status->th }}</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">
        <button class="btn btn-success pull-right" aria-controls="orderTable">
          <span class="fa fa-print"></span>
          Print Order
        </button>
      </div>
    </div>
  </section>
@endsection

@section('javascript')
<script>var searchFn</script>
<div class="form-group pull-right" style="margin-left: 5px;">
  <select name="status" id="status" >
  <option value="">All Status</option>
    @foreach($statuses as $status)
      <option value={{ $status->th }}>{{ $status->th }}</option>
    @endforeach
  </select>
</div>
<script>
  $(document).ready(function(){
    var table = $('#orderTable').DataTable();
    table.order([0, 'desc']).draw();
    $('#status').on('change', function(){
      table.columns(8).search(this.value).draw();
    });

    $('#currency').on('change', function(){
      table.columns(2).search(this.value).draw();
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
              var min = picker.startDate.format('MM/DD/YYYY');
              var max = picker.endDate.format('MM/DD/YYYY');
              var selectedDate = data[5];
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
@endsection
