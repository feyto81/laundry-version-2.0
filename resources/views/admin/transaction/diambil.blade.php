@extends('admin.layouts.main')
@section('title','Order List | Laundry Application')
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
                    <h4 class="mb-sm-0 font-size-18">Order List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-8">
                
            </div>
            <div class="col-4">
                
                <a href="{{url('admin/transaction/category/baru')}}" class="btn btn-danger">Baru</a>
                <a href="{{url('admin/transaction/category/proses')}}" class="btn btn-info">Proses</a>
                <a href="{{url('admin/transaction/category/selesai')}}" class="btn btn-success">Selesai</a>
                <a href="{{url('admin/transaction/category/diambil')}}" class="btn btn-secondary">Di ambil</a>
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
                                <th>Invoice Code</th>
                                <th>Member</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Paid</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($transaction as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->invoice_code}}</td>
                                    <td>{{$row->Member->name}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->User->name}}</td>
                                    @if ($row->status == "baru")
                                        <td><span class="badge rounded-pill bg-primary">Baru</span></td>
                                    @elseif($row->status == "proses")
                                        <td><span class="badge rounded-pill bg-primary">Proses</span></td>
                                    @elseif($row->status == "selesai")
                                        <td><span class="badge rounded-pill bg-primary">Selesai</span></td>
                                    @elseif($row->status == "diambil")
                                        <td><span class="badge rounded-pill bg-primary">Di Ambil</span></td>
                                    @endif
                                    @if ($row->paid == "belum_dibayar")
                                        <td><span class="badge rounded-pill bg-warning">Belum Di Bayar</span></td>
                                    @else
                                        <td><span class="badge rounded-pill bg-primary">Di Bayar</span></td>
                                    @endif
                                    <td>
                                        <a href="{{url('admin/transaction/diambil/edit/'.$row->id)}}" class="btn btn-success btn-rounded waves-effect waves-light">
                                            Edit
                                         </a>
                                        @if ($row->paid == "belum_dibayar")
                                         
                                        @else
                                        <a target="_blank" href="{{url('admin/transaction/print/invoice/'.$row->id)}}" class="btn btn-warning btn-rounded waves-effect waves-light">
                                            Print
                                         </a>
                                        @endif
                                        {{-- @if (row->paid == "belum_dibayar")
                                        
                                        @else

                                        <a target="_blank" href="{{url('admin/transaction/print/invoice/'.$row->id)}}" class="btn btn-warning btn-rounded waves-effect waves-light">
                                           Print
                                        </a>
                                        @endif --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
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
        var paket_id = $(this).attr('paket-id');
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
            window.location = "{{url('admin/transaction/delete')}}/"+paket_id+"";
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
            var outlet = $(this).data('outlet');
            var type = $(this).data('type');
            var paket_name = $(this).data('paket_name');
            var price = $(this).data('price');
            var created = $(this).data('created');
            var updated = $(this).data('updated');
            $('#outlet').text(outlet);
           
            $('#type').text(type);
            $('#paket_name').text(paket_name);
            $('#price').text(price);
            $('#created').text(created);
            $('#updated').text(updated);
        })
    })
</script>
@endpush