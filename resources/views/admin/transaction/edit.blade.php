@extends('admin.layouts.main')
@section('title','Order | Laundry Application')
@section('css')

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
            <div class="col-12">
                
                <a href="{{route('transaction.index')}}" class="button"><i class="bx bx-arrow-back label-icon"></i> &nbsp;&nbsp;Back To List User</a>
                <br>
                <br>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{url('admin/transaction/update/'.$transaction->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="status" class="col-md-2 col-form-label">Status</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" name="status">
                                                <option disabled selected>Select</option>
                                                <option value="baru" @if($transaction->status == 'baru') selected @endif>Baru</option>
                                                <option value="proses" @if($transaction->status == 'proses') selected @endif>Proses</option>
                                                <option value="selesai" @if($transaction->status == 'selesai') selected @endif>Selesai</option>
                                                <option value="diambil" @if($transaction->status == 'diambil') selected @endif>DIambil</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-md-2 col-form-label">Paid</label>
                                        <div class="col-md-10">
                                            <select class="form-select select2" name="paid">
                                                <option disabled selected>Select</option>
                                                <option value="dibayar" @if($transaction->paid == 'dibayar') selected @endif>Di Bayar</option>
                                                <option value="belum_dibayar" @if($transaction->paid == 'belum_dibayar') selected @endif>Belum DIbayar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-md-2 col-form-label">Total</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="pay_total" id="pay_total" value="{{$transaction->pay_total}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-md-2 col-form-label">Cash</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="dibayar" id="dibayar" value="{{$transaction->dibayar}}">
                                        </div>
                                        <small></small>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-md-2 col-form-label">Change</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="change" id="change" value="{{$transaction->kembalian}}">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert-form">
                                        <img src="{{asset('assets/images/info.png')}}" class="img-info-form">
                                        Mohon lengkapi form yang sudah di sediakan untuk dapat melanjutkan proses !
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('cms_users.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script>
    $('document').ready(function(){
    $('#dibayar').on('keyup', function() {
        var pay_total = $('#pay_total').val();
        var dibayar = $('#dibayar').val();
        var change = parseInt(dibayar) - parseInt(pay_total);
        $('#change').val(change);
    })
});
</script>
@endpush