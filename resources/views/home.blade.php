@extends('layouts.app')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="col-md-3 col-sm-6 ">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('Master.Stock.index') }}">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup">{!! $stock_kemarin !!}</span>
                            </div>
                            <div class="desc">Stock Kemarin</div>
                        </div>
                    </a>
                </div> -->
                <div class="col-md-3 col-sm-6 ">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('Transaksi.Input.index') }}">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="12,5">{!! $jml_input !!}</span>
                            </div>
                            <div class="desc"> Total Jumlah Input </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('Transaksi.Output.index') }}">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="549">{!! $jml_output !!}</span>
                            </div>
                            <div class="desc"> Total Jumlah Output </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('Master.Stock.index') }}">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup">{!! $stock_kemarin !!}</span>
                            </div>
                            <div class="desc"> Stock </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('Transaksi.Gap.index') }}">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="89">{!! $jml_actual !!}</span>
                            </div>
                            <div class="desc"> Total Actual </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase font-dark">Note</span>
                                <!-- <span class="caption-helper">distance stats...</span> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="portlet-body col-md-12">
                                <table class="table " id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <span class="caption-subject font-dark bold uppercase">Calendar</span>
                                <span class="caption-helper"></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="container">
                                <div class="response"></div>
                                <div id='calendar' style="width: 38%; display: inline-block;"></div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('home.dataTable') }}",
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className:'text-center'},
            {data: 'title', name: 'title'},
            {data: 'start', name: 'start'},
            {data: 'end', name: 'end'},
            ]
        });

        var SITEURL = "{{url('/')}}";
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/home",
            displayEventTime: false,
            editable: true,
            eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: SITEURL + "/home/create",
                data: 'title=' + title + '&start=' + start + '&end=' + end,
                type: "POST",
                success: function (data) {
                    swal("Sukses", "Pengingat Berhasil Ditambahkan!", "success");
                    setTimeout(function() {
                        location.reload();
                    }, 300);
                
                }
            });
            calendar.fullCalendar('renderEvent',
            {
                title: title,
                start: start,
                end: end,
                allDay: allDay
            },
            true
        );
        }
        calendar.fullCalendar('unselect');
        },

        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: SITEURL + '/home/update',
                data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&event_id=' + event.event_id,
                type: "POST",
                success: function (response) {
                swal("Sukses", "Pengingat Berhasil Diubah!", "success");
                }
            });
        },

        eventClick: function (event) {
            swal({
                title: 'Hapus Data?',
                text: 'anda yakin akan menghapus data ini!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=> {
                if (willDelete) {
                    $.ajax({
                        url: SITEURL + '/home/delete',
                        type: 'POST',
                        data: 
                           "&event_id=" + event.event_id,
                    success: function(response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.event_id);
                                swal({
                                    title: 'Data Berhasil Dihapus!',
                                    icon: 'success',
                                });
                            } else {
                                swal("Data Anda Tersimpan!");
                            }
                            setTimeout(function() {
                                location.reload();
                            }, 300);
                        },
                    error: function(err) {
                            swal({
                                title: 'Opps.. Ada Kesalahan!',
                                icon: 'error',
                            });
                        }
                    });
                }
            });

        // var deleteMsg = swal({
        //     title: 'Delete this data?',
        //     text: 'Once deleted, you will not be able to recover this data!',
        //     icon: 'warning',
        //     buttons: true,
        //     dangerMode: true,
        // });
        //     if (deleteMsg) {
        //         $.ajax({
        //             type: "POST",
        //             url: SITEURL + '/home/delete',
        //             data: "&event_id=" + event.event_id,

        //             success: function (response) {
        //                 if(parseInt(response) > 0) {
        //                     $('#calendar').fullCalendar('removeEvents', event.event_id);
        //                     swal("Sukses", "Pengingat Berhasil Dihapus!", "success");
        //                 }
        //             }
        //         });
        //     }
        }

        });
    });

        function displayMessage(message) {
            $(".response").html("<div class='success'>"+message+"</div>");
            setInterval(function() { $(".success").fadeOut(); }, 1000);
        }
</script>
@endsection

 


 
 
