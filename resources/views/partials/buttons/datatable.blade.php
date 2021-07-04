<?php
	use App\Helpers\helper;
?>
@if(isset($add))
<a href="{{$add}}" class="btn btn-sm blue" data-toggle="tooltip" title="INPUT">
	<i class="fa fa-edit"></i>
</a>
@endif

@if(isset($show))
<a href="{{$show}}" class="btn btn-sm green" data-toggle="tooltip" title="SHOW">
	<i class="fa fa-search"></i>
</a>
@endif

@if(isset($edit))
<a href="{{$edit}}" class="btn btn-sm yellow" data-toggle="tooltip" title="EDIT">
	<i class="fa fa-edit"></i>
</a>
@endif

@if(isset($delete))
<a href="{{$delete}}" class="btn btn-sm red" data-toggle="tooltip" title="DELETE">
	<i class="fa fa-trash"></i>
</a>
@endif

@if(isset($ajaxDelete))
<a href="javascript:void(null)" onClick="deleteFunc({{$ajaxDelete}})" class="btn btn-sm red" data-toggle="tooltip" title="DELETE">
	<i class="fa fa-trash"></i>
</a>
@endif

@if(isset($create))
<a href="{{$create['route']}}" class="btn btn-sm blue dt-buttons">
    <i class="fa fa-plus-square"></i>
    Tambah {{$create['name']}}
</a>
@endif

@if(isset($print))
<a href="javascript:void(null)" onClick="myFunction({{$print}})" class="btn btn-sm green" data-toggle="tooltip" title="PRINT">
	<i class="fa fa-print"></i>
</a>
@endif

@if(isset($activePill))
        @if($activePill === true)
		<span class="badge badge-pill badge-primary ml-3">Active</span>
		@else
		<span class="badge badge-pill badge-danger ml-3">Inactive</span>
	@endif
@endif

@if(isset($materi1))
		@if($materi1)
			<?php 	
				$extension1 = explode('.',$materi1)[1];
			?>	
			<a href="javascript:void(null)" onClick="materiHandler('{{$extension1}}' , '{{$materi1}}')"  class="btn btn-success btn-sm mr-3"><i class="flaticon2-file"></i> Materi </a>
		@endif
@endif

@if(isset($materi2))
		@if($materi2)
			<?php 	
				$extension1 = explode('.',$materi2)[1];
			?>	
			<a href="javascript:void(null)" onClick="materiHandler('{{$extension1}}' , '{{$materi2}}')"  class="btn btn-success btn-sm mr-3"><i class="flaticon2-file"></i> Materi </a>
		@endif
@endif

@if(isset($materi3))
		@if($materi3)
			<?php 	
				$extension1 = explode('.',$materi3)[1];
			?>	
			<a href="javascript:void(null)" onClick="materiHandler('{{$extension1}}' , '{{$materi3}}')"  class="btn btn-success btn-sm mr-3"><i class="flaticon2-file"></i> Materi </a>
		@endif
@endif

@if(isset($materi4))
		@if($materi4)
			<?php 	
				$extension1 = explode('.',$materi4)[1];
			?>	
			<a href="javascript:void(null)" onClick="materiHandler('{{$extension1}}' , '{{$materi4}}')"  class="btn btn-success btn-sm mr-3"><i class="flaticon2-file"></i> Materi </a>
		@endif
@endif

@if(isset($materi5))
		@if($materi5)
			<?php 	
				$extension1 = explode('.',$materi5)[1];
			?>	
			<a href="javascript:void(null)" onClick="materiHandler('{{$extension1}}' , '{{$materi5}}')"  class="btn btn-success btn-sm mr-3"><i class="flaticon2-file"></i> Materi </a>
		@endif
@endif