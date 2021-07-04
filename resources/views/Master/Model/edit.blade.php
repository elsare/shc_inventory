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
	                        <span class="caption-subject bold uppercase">Edit Model</span>
	                    </div>
	                </div>
                    <form id="headerForm" action="{{ route('Master.Model.update', $data->model_id) }}"  method="POST">
					@csrf
		            {{ method_field('PATCH') }}
                        <div class="form-group">
							<label for="nama_model">Nama Model</label>
							<input type="text" class="form-control" name="nama_model" value="{{ $data->nama_model }}" >
							@if ($errors->has('nama_model'))
				                <span class="text-danger">{{ $errors->first('nama_model') }}</span>
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
{!! JsValidator::formRequest('App\Http\Requests\Master\ModelRequest'); !!}
@endsection
