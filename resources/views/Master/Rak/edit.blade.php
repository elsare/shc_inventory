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
	                        <span class="caption-subject bold uppercase">Edit Rak</span>
	                    </div>
	                </div>
                    <form id="headerForm" action="{{ route('Master.Rak.update', $data->rak_id) }}"  method="POST">
					@csrf
		            {{ method_field('PATCH') }}
                        <div class="form-group">
							<label for="blok_rak">Blok Rak</label>
							<select class="form-control" id="blok_rak" name="blok_rak">
								<option disabled selected>Pilih Blok</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								<option value="F">F</option>
								<option value="G">G</option>
							</select>
						</div>
                       	<div class="form-group">
							<label for="no_satu">Position 1</label>
							<select class="form-control" id="no_satu" name="no_satu">
								<option disabled selected>Pilih Position 1</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
						</div>
							<div class="form-group">
							<label for="no_dua">Position 2</label>
							<select class="form-control" id="no_dua" name="no_dua">
								<option disabled selected>Pilih Position 2</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
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
