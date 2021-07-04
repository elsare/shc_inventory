@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="portlet-body">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <span class="caption-subject bold uppercase">Departemen</span>
                            </div>
                        </div>
                        <div class="dataTables_wrapper">
                            <div class="col-md-12 col-sm-12">
                                        <!-- {{view('partials.buttons.datatable',
                                            ['create' => ['route' => route('Master.Departemen.create'),
                                                          'name' => 'Departemen']
                                            ])
                                        }} -->
                             </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="datatable" role="grid">
                                <thead>
                                    <tr>
                                        <th class="text-center"  width="5">No.</th>
                                        <th>Nama Departemen</th>
                                        <th class="text-center" width="15%">Action</th>
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

@endsection
@section('scripts')
<script>
    // $('body').on('click', '.dt-buttons' , function(){
    //     swal("Error", "Maaf, Anda Tidak Memiliki Hak Akses !", "error");
    // });

    $(document).ready(function(){
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('Master.Departemen.dataTable') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className:'text-center'},
            {data: 'nama_departemen', name: 'nama_departemen'},
            {data: 'action', name: 'action'},
            ]
        });
    });

    const deleteData = async (id) => {
           const res = await fetch(`{{ route('Master.Departemen.destroy','') }}/${id}`,{
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
</script>
@endsection

