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
	                        <span class="caption-subject bold uppercase">Create Departemen</span>
	                    </div>
	                </div>
                    <form id="form" action="{{ route('Master.Departemen.store') }}" method="POST" enctype="multipart" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
							<label for="nama_departemen">Nama Departemen</label>
							<input type="text" class="form-control" id="nama_departemen" name="nama_departemen" placeholder="Input Nama Departemen" value="{{ old('nama_departemen') }}">
							@if ($errors->has('nama_departemen'))
				                <span class="text-danger">{{ $errors->first('nama_departemen') }}</span>
				            @endif
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Input Password">
							@if ($errors->has('password'))
				                <span class="text-danger">{{ $errors->first('password') }}</span>
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
{!! JsValidator::formRequest('App\Http\Requests\Master\DepartemenRequest'); !!}
@endsection
