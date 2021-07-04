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
	                        <span class="caption-subject bold uppercase">Input Barang</span>
	                    </div>
	                </div>
                    <form id="model" action="{{ route('Transaksi.Input.store') }}" method="POST" enctype="multipart" enctype="multipart/form-data">
                        @csrf
						<div class="form-group">
							<label for="part_number_id">Part Number</label>
							<select class="form-control" id="part_number_id" name="part_number_id">
								{!! $resultPart !!}
							</select>
							@if ($errors->has('part_number_id'))
				                <span class="text-danger">{{ $errors->first('part_number_id') }}</span>
				            @endif
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control" id="description" placeholder="Input Nama Description">
						</div>
						<div class="form-group">
							<label for="model">Model</label>
							<input type="text" class="form-control model" id="model" value="" placeholder="Input Nama Model">
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
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" defer></script>
{!! JsValidator::formRequest('App\Http\Requests\Transaksi\GapRequest'); !!}
@endsection
