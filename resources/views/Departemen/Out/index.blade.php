@extends('layouts.dept.app')
 
@section('content')
<div class="page-content-wrapper">
    <div class="page-content" style="min-height: 1003px;">
        <h1 class="page-title"> <!-- Tables -->
            <small></small>
        </h1>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pencil"></i>Table Output</div>
                        <div class="actions">
                            <a type="button" data-bs-toggle="modal" id="modal" data-bs-target="#exampleModal" class="btn btn-default btn-sm" style="color: white">
                                <i class="fa fa-plus"></i> Tambah 
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="datatable" role="grid">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center"  width="5">No.</th>
                                        <th rowspan="2">Model</th>
                                        <th rowspan="2">Part No</th>
                                        <th rowspan="2">Description</th>
                                        <th rowspan="2">Stock</th>
                                        <th colspan="6" class="text-center">Departemen</th>
                                        <th rowspan="2">Total Output</th>
                                        <th class="text-center" rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        @foreach($departemen as $data)
                                            <td>{{ $data->nama_departemen }}</td>
                                        @endforeach
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Output</h5>
            </div>
            <div class="modal-body">
                <form id="model" action="{{ route('Departemen.Out.store') }}" method="POST" enctype="multipart" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="part_number_id">Part Number</label>
                        <select class="form-control" id="part_number_id" name="part_number_id">
                            {!! $resultPart !!}
                        </select>
                        @if ($errors->has('part_number_id'))
                            <span class="text-danger">{{ $errors->first('part_number_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="Input Nama Description">
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control model" id="model" placeholder="Input Nama Model">
                    </div>
                    <input type="text" class="form-control" name="stock_id" id="stock_id" style="display: none;">
                    <div class="form-group">
                        <label for="departemen_id">Departemen</label>
                        <select class="form-control" id="departemen_id" name="departemen_id">
                            {!! $resultDepartemen !!}
                        </select>
                        @if ($errors->has('departemen_id'))
                            <span class="text-danger">{{ $errors->first('departemen_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Output</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Output Jumlah">
                        @if ($errors->has('jumlah'))
                            <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " id="close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}" defer></script>
{!! JsValidator::formRequest('App\Http\Requests\Departemen\OutRequest'); !!}
<script type="text/javascript">
    if('{{session()->has('error')}}'){
        swal({
            title: 'Gagal',
            text: '{{session()->get('error')}}',
            icon:'error',
        });
    }

    $(document).ready(function(){
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('Departemen.Out.dataTable') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className:'text-center'},
            {data: 'nama_model', name: 'nama_model'},
            {data: 'part_no', name: 'part_no'},
            {data: 'description', name: 'description'},
            {data: 'jumlah_stock', name: 'jumlah_stock'},
            {data: 'sein', name: 'sein'},
            {data: 'kitting', name: 'kitting'},
            {data: 'repair', name: 'repair'},
            {data: 'iqc', name: 'iqc'},
            {data: 'produksi', name: 'produksi'},
            {data: 'semiAssy', name: 'semiAssy'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'action', name: 'action'}
            ]
        });
        $('[data-toggle="tooltip"]').tooltip();
    })

    $('body').on('click', '#modal', function() {
        $('#exampleModal').modal('show');
    });

    $('body').on('click', '#close', function() {
        $('#exampleModal').modal('hide');
    });

    $('body').on('change', '#part_number_id', function() {
        var part_number = $(this).val();
        var token    = $('meta[name=csrf-token]').attr('content');

        $.ajax({
                url: '{{ route('Departemen.Out.getDetail') }}',
                type: 'POST',
                data: {
                    'part_number_id': part_number,
                    '_token': token,
                },
                success: function(data) {
                    $('#description').val(data.description);
                    $('.model').val(data.model);
                    $('#stock_id').val(data.stock_id);
                },
                error: function(err) {
                    swal({
                        title: 'Opps.. Something went wrong!',
                        icon: 'error',
                    });
                }
            });
        });

    const deleteData = async (id) => {
           const res = await fetch(`{{ route('Departemen.Out.destroy','') }}/${id}`,{
               headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'},
               method:'DELETE',
               body:id
           });

           const {status} = await res.json();

           if(status === 'success'){
             swal("Success", "Berhasil Di Hapus!", "success");

            $('#datatable').DataTable().ajax.reload();
           }else{
            swal("Error", "Maaf Terjadi Kesalahan!", "error");
           }
    }

    const deleteFunc = (id) => {
        swal({
            title: "Konfirmasi",
            text: "Apakah anda yakin untuk menghapus?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            deleteData(id);
          } else {
            swal("Proses Hapus Dibatalkan!");
          }
        });
    }

    function myFunction(id) {
      window.open(`{{ route('Departemen.Out.show','') }}/${id}`);
    }
</script>
@endsection