@extends('admin.layouts.main')
@section('title','Transaction | Laundry Application')
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
                    <h4 class="mb-sm-0 font-size-18">{{$page_title}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">{{$page_sub_title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                
                <a href="{{route('transaction.index')}}" class="button"><i class="bx bx-arrow-back label-icon"></i> &nbsp;&nbsp;Back To List Transaction</a>
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
            <form id="formSave" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <table widht="100%">
                                        <tr>
                                            <tr>
                                                <td style="">
                                                    <label for="invoice_code">Invoice</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="invoice_code" readonly name="invoice_code" value="{{$invoice_code}}" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="date">Date</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="date" name="date" readonly value="<?=date('Y-m-d H:i:s')?>" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; width: 30%">
                                                    <label for="outlet_id">Outlet</label>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input type="text" id="name" name="name" class="form-control" autofocus >
                                                        <input type="hidden" id="outles" name="outlet_id">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#modal-outlet">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="pay_date">Pay Date</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="date" id="pay_date" name="pay_date" value="{{date('Y-m-d')}}" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                           
            
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <table widht="100%">
                                        <tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="deadline">Deadline</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="date" id="deadline" name="deadline" value="" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top; width: 30%">
                                                    <label for="paket_id">Paket</label>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input type="text" id="paket_name" name="name" class="form-control" autofocus >
                                                        <input type="hidden" id="paket_id" name="paket_id">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#modal-paket">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="type">Type</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="type" name="type" value="" readonly class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="price">Price</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="price" name="price" readonly value="" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            
            
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <table widht="100%">
                                        <tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="weight">Weight</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="weight" name="weight" value="" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top">
                                                    <label for="sub_total">Sub Total</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="sub_total" readonly name="sub_total" value="" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tr>
                                        
                                    </table>
                                    
                                </div>
                                
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-cart-plus"></i> Add
                              </button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
        <div class="row">
            <form action="{{route('kirimsemua')}}" method="POST">
                
                @csrf
                <input type="hidden" id="date" name="date" readonly value="<?=date('Y-m-d')?>" class="form-control">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Type</th>
                                            <th>Paket</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody id="cart_table">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <table widht="100%">
                                    <tr>
                                        <tr>
                                            <td style="vertical-align: top">
                                                <label for="total">Total</label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" id="total" readonly name="total" value="" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr id="member_id">
                                            <td style="vertical-align: top">
                                                <label for="member_id">Member</label>
                                            </td>
                                            <td>
                                                <div class="col-md-10">
                                                    <select class="form-select" id="member_id" name="member_id">
                                                        
                                                        @foreach ($member as $members)
                                                        <option value="{{$members->id}}">{{$members->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top">
                                                <label for="tax">Tax</label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" id="tax" readonly name="tax" value="10" class="form-control">
                                                    <input type="hidden" id="result_tax" name="" value="" class="form-control">
                                                    <input type="hidden" id="result_discount" name="" value="" class="form-control">
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                    </tr>
                                    
                                </table>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <table widht="100%">
                                    <tr>
                                        
                                        <tr>
                                            <td style="vertical-align: top">
                                                <label for="discount">Discount</label>
                                            </td>
                                            <td>
                                                <div class="col-md-10">
                                                    <input type="number" id="discount" name="discount" value="0" class="form-control">
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top">
                                                <label for="additional_cost">Additional Cost</label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" id="additional_cost" name="additional_cost" value="" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top">
                                                <label for="additional_cost">Pay Total</label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" id="pay_total" readonly name="pay_total" value="" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        
                                    </tr>
                                    
                                </table>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <table widht="100%">
                                    <tr>
                                        
                                        <button type="submit" id="process_payment" class="btn btn-flat btn-lg btn-success">
                                            <i class="fa fa-paper-plane-o"></i> Process Payment
                                        </button>
                                        
                                    </tr>
                                    
                                </table>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>

        
        
    </div>
</div>
<div id="modal-outlet" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Outlet</h5>
                <button type="button" id="closeModalOutlet" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($outlet as $data)
                      <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->phone_number}}</td>
                        <td class="text-right">
                          <button class="btn btn-info btn-xs" id="select"
                           data-id="{{$data->id}}"
                           data-name="{{$data->name}}"
                           data-address="{{$data->address}}"
                           data-phone_number="{{$data->phone_number}}">
                            <i class="fa fa-check"></i> Select
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
<div id="modal-paket" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Paket</h5>
                <button type="button" id="closeModalPaket" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                  <thead>
                    <tr>
                      <th>Outlet</th>
                      <th>Type</th>
                      <th>Paket Name</th>
                      <th>Price</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($paket as $pakets)
                      <tr>
                        <td>{{$pakets->Outlet->name}}</td>
                        <td>{{$pakets->type}}</td>
                        <td>{{$pakets->paket_name}}</td>
                        <td>{{$pakets->price}}</td>
                        <td class="text-right">
                          <button class="btn btn-info btn-xs" id="select3"
                           data-id="{{$pakets->id}}"
                           data-outlet = "{{$pakets->Outlet->name}}"
                           data-type="{{$pakets->type}}"
                           data-name="{{$pakets->paket_name}}"
                           data-price="{{$pakets->price}}">
                            <i class="fa fa-check"></i> Select
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
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
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>  
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script> 
<script>
$(document).on('click', '#select', function() {
	$('#outles').val($(this).data('id'))
	$('#name').val($(this).data('name'))
	$('#address').val($(this).data('address'))
	$('#phone_number').val($(this).data('phone_number'))
  $('#closeModalOutlet').click();
});

$(document).on('click', '#select3', function() {
    $('#paket_id').val($(this).data('id'))
	$('#outlet_id').val($(this).data('outlet'))
	$('#type').val($(this).data('type'))
	$('#paket_name').val($(this).data('name'))
	$('#price').val($(this).data('price'))
  $('#closeModalPaket').click();
});

$('document').ready(function(){
    $('#weight').on('keyup', function() {
        var price = $('#price').val();
        var weight = $('#weight').val();
        var sub_total = parseInt(price) * parseInt(weight);
        $('#sub_total').val(sub_total);
    })
});
function loadDataTable(){
      $.ajax({
        url: "{{route('getCart')}}",
        success:function(data){
          $('#cart_table').html(data);
          calculate();
        }
      })
    }
loadDataTable();
$('#formSave').submit(function(e){
    e.preventDefault();
    var request = new FormData(this);
    var outlet_id = $('#outlet_id').val()
    var pay_date = $('#pay_date').val()
    var deadline = $('#deadline').val()
    var paket = $('#paket_id').val()
    var weight = $('#weight').val()
    console.log(outlet_id);
    if (outlet_id == '') {
        Swal.fire({
            title:"Error",
            text:"Outlet is empty!",
            icon: "warning",
            confirmButtonColor:"#556ee6"
        })
    } else if (pay_date == '') {
        Swal.fire({
            title:"Error",
            text:"Pay Date is empty!",
            icon: "warning",
            confirmButtonColor:"#556ee6"
        })
    } else if (deadline == '') {
        Swal.fire({
            title:"Error",
            text:"Deadline is empty!",
            icon: "warning",
            confirmButtonColor:"#556ee6"
        })
    } else if (paket == '') {
        Swal.fire({
            title:"Error",
            text:"Paket is empty!",
            icon: "warning",
            confirmButtonColor:"#556ee6"
        })
    } else if(weight == '') {
        Swal.fire({
            title:"Error",
            text:"Weight is empty!",
            icon: "warning",
            confirmButtonColor:"#556ee6"
        })
    } else {
        $.ajax({
            url: "{{route('savecart')}}",
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            success:function (data) {
                if(data == "sukses"){
                    // Swal.fire({
                    //     title:"Success",
                    //     text:"Successfully saved!",
                    //     icon: "success",
                    //     confirmButtonColor:"#556ee6"
                    // })
                    loadDataTable();
                }
                else {
                    alert('gagal menambah data');
                }
            }
        });
    }

});
$(document).on('click','.btn-delete',function(e){
    e.preventDefault();
    var cart_id = $(this).attr('cart-id');
    $.ajax({
        url: "{{url('admin/transaction/delete-cart/response')}}/"+cart_id,
        method: "GET",
        success:function(data){
            if (data == "sukses") {
                // Swal.fire({
                //         title:"Success",
                //         text:"Successfully Deleted!",
                //         icon: "success",
                //         confirmButtonColor:"#556ee6"
                // })
                loadDataTable();
            } else {
                alert('gagal');
            }
        }
    });
});
function calculate() {
	var subtotal = 0;
	$('#cart_table tr').each(function() {
		subtotal += parseInt($(this).find('#sub_total_cart').text())
	})
	isNaN(subtotal) ? $('#total').val(0) : $('#total').val(subtotal)
    
    var total = $('#total').val()
    var tax = $('#tax').val()
    var pajak = parseInt(total) * parseInt(tax) / 100;
    var pjk = parseInt(total) + parseInt(pajak)
    $('#pay_total').val(pjk)
    $('#result_tax').val(pjk)

   
    // var discount = $('#discount').val();
    // var pay_total = parseInt(discount) / 100 * parseInt(total);
    // $('#pay_total').val(pay_total);
    var pajak = parseInt(sub_) * parseInt(discount) / 100;
    
}
$(document).ready(function() {
	calculate()
})
$('.member').on('change', function() {
        var tb_member = $(this).val();
        if (tb_member == 'bukan_member') {
            $("#member_id").hide();
            $("#diskon").hide();
        } else if (tb_member == 'member') {
            $("#member_id").show();
            $("#diskon").show();
        }
    });
    $('document').ready(function(){
        $('#discount').on('keyup', function() {
            var result_tax = $('#result_tax').val();
            var discount = $('#discount').val();
           
            var pay_total = parseInt(result_tax) - parseInt(discount);
            $('#pay_total').val(pay_total);
            $('#result_discount').val(pay_total);
           
        })
    });
    $('document').ready(function(){
        $('#additional_cost').on('keyup', function() {
            var additional_cost = $('#additional_cost').val();
            var result_discount = $('#result_discount').val();
            var jumlah =  parseInt(additional_cost) + parseInt(result_discount);

            $('#pay_total').val(jumlah);
           
        })
    });
</script>
@endpush