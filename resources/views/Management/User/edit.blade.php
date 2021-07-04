@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
		<div class="row">
		    <div class="col-md-12">
		        <div class="portlet light ">
		            <div class="portlet-body">
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="portlet light ">
		                            <div class="portlet-title">
		                                <div class="caption font-dark">
		                                    <i class="icon-settings font-dark"></i>
		                                    <span class="caption-subject bold uppercase">Photo</span>
		                                </div>
		                            </div>
		                            <div class="card" style="width: 18rem;">
									  <img class="card-img-top" src="{{ asset('img/wip_logo.png') }}" width="180" alt="Card image cap">
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
		                        <form>
		                        @csrf
			                        <div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
									</div>
									<!-- <div class="form-group">
										<label for="role">Role</label>
										<select class="form-control" id="role">
											<option>admin</option>
											<option>user</option>
										</select>
									</div> -->
								</form>
								<div class="form-actions">
									<button onClick='goBack()' class="btn btn-sm btn-default">Back</button>
									<button type="submit" class="btn btn-sm btn-info">Save</button>
									
								</div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
<script type="text/javascript">

	

</script>