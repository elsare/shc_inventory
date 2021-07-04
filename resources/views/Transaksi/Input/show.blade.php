@extends('layouts.app')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
		<div class="row">
		    <div class="col-md-12">
			    <div class="portlet light">
                    <img src="{{ asset('img/shin_heung.png') }}" width="100">
                    <strong style="font-size:25px;padding-left: 350px;">LAPORAN BARANG MASUK</strong>
                    <hr>
                    <strong style="font-size: 15px">Model : {{ $data->nama_model }} </strong><br>
                	<strong style="font-size: 15px">Part No. : {{ $data->part_no }} </strong><br>
                	<strong style="font-size: 15px">Description : {{ $data->description }} </strong>
				</div>
		
			    <div class="portlet light">
			    	<div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="datatable" role="grid">
                                <thead>
                                    <tr>
	                                    <th class="text-center" width="5">No.</th>
                                        <th>Departemen</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Input</th>
                                        <th width="5">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            		@foreach($jumlah_input as $jml)
                                	<tr>
                                		<td class="text-center" width="5">{{ $loop->iteration }}</td>
                                		<td>{{ $jml->nama_departemen }}</td>
                                		<td>{{ $jml->jumlah }}</td>
                                		<td>{{ \Carbon\Carbon::parse($jml->created_at)->translatedFormat('d-m-Y, H:i') }}</td>
                                		<td>
                                			<button class="btn btn-sm green" data-id="{{ $jml->jumlah_input_id }}" data-toggle="tooltip" title="PRINT" id="jml_id">
												<i class="fa fa-print"></i>
											</button>
                                		</td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
			    </div>
		    </div>
	    </div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
        var table = $('#datatable').DataTable();
        $('[data-toggle="tooltip"]').tooltip();
    })

    $('body').on('click', '#jml_id', function(){
    	var jml_id = $(this).data('id');

     window.open(`{{ route('Transaksi.Input.print','') }}/${jml_id}`);

    })

</script>
@endsection