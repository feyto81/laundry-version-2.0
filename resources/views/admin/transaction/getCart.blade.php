<?php
$toti = 0;
?>
@foreach($cart as $row)

<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$row->Paket->type}}</td>
    <td>{{$row->Paket->paket_name}}</td>
    <td>@currency($row->Paket->price)</td>
    <td>{{$row->weight}}</td>
    <td>{{$row->sub_total}}</td>
    <td>
        
        <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" cart-id="{{$row->id}}">
          <i class="fas fa-sm fa fa-trash"></i> Delete</a>
      </td>
</tr>
@endforeach