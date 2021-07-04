@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
		<div class="row">
		    <div class="col-md-12">
		        <div class="portlet light ">
		            <div class="portlet-body">
		                <div class="row">
		                <form id="model" action="{{ route('Management.Profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
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
                                        </div><br>
                                        <div>
                                            <span class="btn default">
                                                <input type="file" name="image" placeholder="Choose image" id="image" >
                                            </span>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE! </span>
                                            <span> Just for image file !</span>
                                        </div>
                                    </div>
		                        </div>
		                    </div>
		                    <div class="col-md-8">
			                    <div class="portlet light">
			                        <div class="portlet-title">
			                            <div class="caption font-dark">
			                                <i class="icon-settings font-dark"></i>
			                                <span class="caption-subject bold uppercase">Edit Personal Data</span>
			                            </div>
			                        </div>
			                        <div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
										@if ($errors->has('name'))
							                <span class="text-danger">{{ $errors->first('name') }}</span>
							            @endif
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
										@if ($errors->has('email'))
							                <span class="text-danger">{{ $errors->first('email') }}</span>
							            @endif
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-sm btn-info mr-2 submit">Save</button>
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

@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" defer></script>
{!! JsValidator::formRequest('App\Http\Requests\Management\ProfileRequest'); !!}
<script type="text/javascript">
	$(document).ready(function (e) {
 
	   	$('#image').change(function(){

	    let reader = new FileReader();
	    reader.onload = (e) => { 
	      $('#preview-image').attr('src', e.target.result); 
	    }
	 
	    reader.readAsDataURL(this.files[0]); 
	   
	   });

</script>
@endsection