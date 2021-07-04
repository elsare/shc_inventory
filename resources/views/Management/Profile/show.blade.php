@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
		<div class="row">
		    <div class="col-md-12">
		        <div class="portlet light ">
		            <div class="portlet-body">
		                <div class="row">
		                <form id="model" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
			            {{ method_field('PATCH') }}
		                    <div class="col-md-4">
		                        <div class="portlet light ">
		                            <div class="portlet-title">
		                                <div class="caption font-dark">
		                                    <span class="caption-subject bold uppercase">Photo</span>
		                                </div>
		                            </div>
									<div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 250px; height: 260px;">
                                            <img id="preview-image" src="{{ ((!empty($data)) ? ((!empty($data->image)) ? (asset('admin/image/'.$data->image)) : (asset('img/admin.png'))) : (asset('img/admin.png'))) }}" alt="preview image" name="image" style="max-height: 250px;">
                                        </div>
                                    </div>
		                        </div>
		                    </div>
		                    <div class="col-md-8">
			                    <div class="portlet light">
			                        <div class="portlet-title">
			                            <div class="caption font-dark">
			                                <i class="icon-settings font-dark"></i>
			                                <span class="caption-subject bold uppercase">Personal Data</span>
			                            </div>
			                        </div>
			                        <div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
									</div>
									<div class="form-actions">
										<a href="{{ route('Management.Profile.index') }}" class="btn btn-sm btn-info mr-2">Edit</a>
										<button type="reset" onClick='goBack()' class="btn btn-sm btn-secondary">Back</button>
									</div>
			                    </div>
			                </div>
						</form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection