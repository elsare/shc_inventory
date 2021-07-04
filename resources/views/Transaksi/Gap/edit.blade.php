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
	                        <span class="caption-subject bold uppercase">Gap</span>
	                    </div>
	                </div>
                    <form id="headerForm" action="{{ route('Transaksi.Gap.CreateActual') }}"  method="POST">
					@csrf
						<div class="form-group">
							<label for="part_number_id">Part Number</label>
							<input type="text" class="form-control" id="part_number_id"  value="{{ $data->part_no }}" readonly>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control" id="description" value="{{ $data->description }}" 
							 readonly>
						</div>
						<div class="form-group">
							<label for="model">Model</label>
							<input type="text" class="form-control" id="model" value="{{ $data->nama_model }}" 
							 readonly>
						</div>
						<input type="text" class="form-control" name="stock_id" value="{{ $data->stock_id }}" style="display: none">
						<div class="form-group">
							<label for="actual">Actual</label>
							<input type="text" class="form-control" id="actual" name="actual" placeholder="Input Actual">
							@if ($errors->has('actual'))
				                <span class="text-danger">{{ $errors->first('actual') }}</span>
				            @endif
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-sm btn-info mr-2 submit">Save</button>
							<button type="reset" onClick='goBack()' class="btn btn-sm btn-secondary">Back</button>
						</div>
					</form>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection

