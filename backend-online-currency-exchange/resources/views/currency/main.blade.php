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
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

			<div class="box box-primary box-solid">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Currency</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Selling</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Buying</th>
              </tr>
            </thead>
            <tbody>
              @foreach($currencies as $currency)
                <tr>
                  <td>
                    <img class="flag" width="20" src={{ $currency->img_path }} alt="United States Minor Outlying Islands Flag">
                  </td>
                  <td>{{ $currency->label }}</td>
                  <td>{{ $currency->purchase_rate }}</td>
                  <td>{{ $currency->sale_rate }}</td>
                </tr>
              @endforeach
            </tbody>
            <!-- <tfoot>
              <tr>
                <th rowspan="1" colspan="1">#</th>
                <th rowspan="1" colspan="1">Currency</th>
                <th rowspan="1" colspan="1">Selling</th>
                <th rowspan="1" colspan="1">Buying</th>
              </tr>
            </tfoot> -->
          </table>
        </div>
			</div>
		</div>
	</div>
@endsection
