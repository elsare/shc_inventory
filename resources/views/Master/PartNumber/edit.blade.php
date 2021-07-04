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
	                        <span class="caption-subject bold uppercase">Edit Part Number</span>
	                    </div>
	                </div>
                    <form id="headerForm" action="{{ route('Master.PartNumber.update', $data->part_number_id) }}"  method="POST">
					@csrf
		            {{ method_field('PATCH') }}
                        <div class="form-group">
							<label for="model_id">Model</label>
							<select class="form-control" id="model_id" name="model_id">
								{!! $result !!}
							</select>
							@if ($errors->has('model_id'))
				                <span class="text-danger">{{ $errors->first('model_id') }}</span>
				            @endif
						</div>
                        <div class="form-group">
							<label for="part_no">Part No.</label>
							<input type="text" class="form-control" id="part_no" name="part_no" placeholder="Input Part No." value="{{ $data->part_no }}">
							@if ($errors->has('part_no'))
				                <span class="text-danger">{{ $errors->first('part_no') }}</span>
				            @endif
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" class="form-control" id="description" name="description" placeholder="Input Description" value="{{ $data->part_no }}">
							@if ($errors->has('description'))
				                <span class="text-danger">{{ $errors->first('description') }}</span>
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
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" defer></script>
{!! JsValidator::formRequest('App\Http\Requests\Master\PartNumberRequest'); !!}
@endsection