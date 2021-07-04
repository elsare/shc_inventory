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
	                        <span class="caption-subject bold uppercase">Detail Rak</span>
	                    </div>
	                </div>
                    <form action="#" method="POST" enctype="multipart" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
							<label for="model_id">Blok</label>
							<input type="text" class="form-control" value="{{ $data->blok_rak }}" readonly>
						</div>
                        <div class="form-group">
							<label for="no_satu">Position 1</label>
							<input type="text" class="form-control"  value="{{ $data->no_satu }}" readonly>
						</div>
						<div class="form-group">
							<label for="no_dua">Position 2</label>
							<input type="text" class="form-control" value="{{ $data->no_dua }}" readonly>
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
