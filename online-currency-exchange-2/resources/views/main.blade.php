@extends('template.base')

@section('content')
<div>
  <h5>อัตราแลกเปลี่ยน</h5>
  <table class="table" style="height: 100px;">
    <thead>
      <tr>
        <th>#</th>
        <th>Currency</th>
        <th>Buying</th>
        <th>Selling</th>
      </tr>
    </thead>
    <tbody>
      @foreach($currencies as $currency)
        <tr>
          <th>
          <img class="flag" width="20" src={{ $currency->img_path }} alt="United States Minor Outlying Islands Flag">
          </th>
          <td>{{ $currency->label }}</td>
          <td>{{ $currency->purchase_rate }}</td>
          <td>{{ $currency->sale_rate }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('order.create') }}"><button class="btn btn-warning" style="width: 100%;">Order Now</button></a>
</div>
@endsection

@section('stylesheet')
  <style>
  div {
    padding: 10px;
  }
  th, td {
    text-align:center;
  }
  </style>
@endsection