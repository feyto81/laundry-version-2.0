@extends('admin.layouts.main')
@section('title','Log Activity | Laundry Application')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Log Acivity</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Log Activity</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>URL</th>
                                <th>Method</th>
                                <th>IP</th>
                                <th>Code</th>
                                <th width="300px">User Agent</th>
                                <th>User</th>
                            </tr>
                            </thead>


                            <tbody>
                                @if($logs->count())
                                @foreach($logs as $key => $log)
                                <tr>
                                  <td>{{ ++$key }}</td>
                                  <td>{{ $log->subject }}</td>
                                  <td class="text-success">{{ $log->url }}</td>
                                  <td><label class="label label-info">{{ $log->method }}</label></td>
                                  <td class="text-warning">{{ $log->ip }}</td>
                                  <td class="text-success">200</td>
            
                                  <td class="text-danger">{{ $log->agent }}</td>
                                  <td>{{ $log->Nama->name}}</td>
                                </tr>
                                @endforeach
                              @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div id="modal-detail" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Outlet Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="sampleTable">
                  <tbody>
                    <tr>
                      <th style="">Name</th>
                      <td><span id="name"></span></td>
                    </tr>
                    <tr>
                        <th style="">Address</th>
                        <td><span id="address"></span></td>
                    </tr>
                    <tr>
                        <th style="">Phone Number</th>
                        <td><span id="phone_number"></span></td>
                    </tr>
                    <tr>
                        <th style="">Created</th>
                        <td><span id="created"></span></td>
                    </tr>
                    <tr>
                        <th style="">Updated</th>
                        <td><span id="updated"></span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>  
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script> 
<script>
    $('.btn-delete').click(function(){
        var outlet_id = $(this).attr('outlet-id');
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mt-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass:"btn btn-success mt-2",
        cancelButtonClass:"btn btn-danger ms-2 mt-2",
        buttonsStyling:!1}).then((result) => {
        if (result.isConfirmed) {
            window.location = "{{url('admin/outlet/delete')}}/"+outlet_id+"";
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    });
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var name = $(this).data('name');
            var address = $(this).data('address');
            var phone_number = $(this).data('phone_number');
            var created = $(this).data('created');
            var updated = $(this).data('updated');
            $('#name').text(name);
            $('#address').text(address);
            $('#phone_number').text(phone_number);
            $('#created').text(created);
            $('#updated').text(updated);
        })
    })
</script>
@endpush