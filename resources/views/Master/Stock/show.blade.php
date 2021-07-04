@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
		<div class="row">
		    <div class="col-md-12">
		       <div class="portlet light">
	                <div class="portlet-title">
	                    <div class="caption font-dark">
	                        <i class="icon-settings font-dark"></i>
	                        <span class="caption-subject bold uppercase">Detail Jumlah Stock</span>
	                    </div>
	                </div>
                    <form action="#" method="POST" enctype="multipart" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
							<label for="model_id">Model</label>
							<input type="text" class="form-control" value="{{ $data->nama_model }}" readonly>
						</div>
                        <div class="form-group">
							<label for="part_no">Part No.</label>
							<input type="text" class="form-control" name="part_no" value="{{ $data->part_no }}" readonly>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control" name="description" value="{{ $data->description }}" readonly>
						</div>
						<div class="form-group">
							<label for="jumlah_stock">Stock</label>
							<input type="text" class="form-control" name="jumlah_stock" value="{{ ((!empty($data->jumlah_stock)) ? ($data->jumlah_stock) : ('0')) }}" readonly>
						</div>
						<div class="form-actions">
							<button type="reset" onClick='goBack()' class="btn btn-sm btn-secondary">Back</button>
						</div>
					</form>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
