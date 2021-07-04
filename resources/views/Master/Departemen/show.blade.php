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
	                        <span class="caption-subject bold uppercase">Detail Model</span>
	                    </div>
	                </div>
                    <form action="#" method="POST" enctype="multipart" enctype="multipart/form-data">
                        <div class="form-group">
							<label for="nama_departemen">Nama Departemen</label>
							<input type="text" class="form-control" id="nama_departemen" name="nama_departemen" placeholder="Input Nama Departemen" value="{{ $data->nama_departemen }}">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Input Password" value="password">
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
