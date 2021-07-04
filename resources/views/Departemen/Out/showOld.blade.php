@extends('layouts.app')
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
	                    {{ date('d/m/Y') }}
		                <hr>
	                    </div>
                    </div>
                    <p>
                    	<strong style="font-size: 22px">Model : {{ $data->nama_model }} </strong><br>
                    	<strong style="font-size: 22px">Part No. : {{ $data->part_no }} </strong><br>
                    	<strong style="font-size: 22px">Description : {{ $data->description }} </strong><br>
                    </p>
                    <table style="width:100%" >
					    <thead>
                            <tr>
                                <th colspan="6" class="text-center" style="font-size: 20px">Departemen</th>
                                <th rowspan="2" class="text-center" style="font-size: 20px">Total</th>
                            </tr>
                            <tr>
                                @foreach($departemen as $val)
                                    <td class="text-center"><strong>{{ $val->nama_departemen }}</strong></td>
                                @endforeach
                            </tr>
                        </thead>
						<tr>
						    <td class="text-center">{!! $departemen_sein !!}</td>
						    <td class="text-center">{!! $departemen_kitting !!}</td>
						    <td class="text-center">{!! $departemen_repair !!}</td>
						    <td class="text-center">{!! $departemen_iqc !!}</td>
						    <td class="text-center">{!! $departemen_operator !!}</td>
						    <td class="text-center">{!! $departemen_semiAssy !!}</td>
						    <td class="text-center">{!! $jml_input !!}</td>
						</tr>
					</table>
                </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
        setTimeout(function() {
            window.print();
        }, 100);

        setTimeout(function() {
            window.close();
        }, 300);
</script>
@endsection