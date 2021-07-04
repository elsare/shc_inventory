@extends('layouts.dept.app')
<style>
th,td {
  border: 1px solid black;
}
</style>
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
		<div class="row">
		    <div class="col-md-12">
		       <div class="portlet light">
				    <div class="row">
	                    <div class="col-md-12">
	                        <img src="{{ asset('img/shin_heung.png') }}" width="100">
		                    <strong style="font-size: 35px;padding-left: 150px;">LAPORAN BARANG KELUAR</strong>
	                    </div>
	                    <div class="col-md-9" align="right">
	                    {{ date('d/m/Y') }}<br>
	                    by : {{ \Auth::user()->name }}
		                <hr>
	                    </div>
                    </div>
					@foreach($jumlah_output as $jml)
                    <p>
                    	<strong style="font-size: 22px">Model : {{ $jml->nama_model }} </strong><br>
                    	<strong style="font-size: 22px">Part No. : {{ $jml->part_no }} </strong><br>
                    	<strong style="font-size: 22px">Description : {{ $jml->description }} </strong><br>
                    </p>
                     <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="datatable" role="grid">
					    <thead>
                            <tr>
                            	<th>Departemen</th>
                            	<th>Jumlah Output</th>
                            	<th>Tanggal Output</th>
                            </tr>
                        </thead>
						<tbody>
							<tr>
								<td>{{ $jml->nama_departemen }}</td>
								<td>{{ $jml->jumlah }}</td>
								<td>{{ \Carbon\Carbon::parse($jml->created_at)->translatedFormat('d-m-Y, H:i') }}</td>
							</tr>
						</tbody>
						@endforeach
					</table>
                </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	// $(document).ready(function(){
 //        var table = $('#datatable').DataTable();
 //        $('[data-toggle="tooltip"]').tooltip();
 //    })
        setTimeout(function() {
            window.print();
        }, 100);

        setTimeout(function() {
            window.close();
        }, 300);
</script>
@endsection