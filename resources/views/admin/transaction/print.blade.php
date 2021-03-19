<html moznomarginboxes mozdisallowselectionprint>
	<head>
		<title>Laundry - Print Nota</title>
		<style type="text/css">
			html { font-family: "Verdana, Arial"; }
			.content {
				width: 80mm;
				font-size: 12px;
				padding: 5px;
			}
			.title {
				text-align: center;
				font-size: 13px;
				padding-bottom: 5px;
				border-bottom: 1px dashed;
			}
			.head {
				margin-top: 5px;
				margin-bottom: 10px;
				padding-bottom: 10px;
				border-bottom: 1px solid;
			}
			table {
				width: 100%;
				font-size: 12px;
			}
			.thanks {
				margin-top: 10px;
				padding-top: 10px;
				text-align: center;
				border-top: 1px dashed;
			}
			@media print {
				@page {
					width: 80mm;
					margin: 0mm;
				}
			}
		</style>
	</head>
	<body>
		<div class="content">
			<div class="title">
				<b>Dewangga Laundry</b>
				<br>
				Jl. Bumiharjo
			</div>
			<div class="head">
                @foreach($transaction as $item)
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td style="width: 200px">
							{{$item->created_at}}
						</td>
						<td>
							Employe
						</td>
						<td style="text-align: center; width: 10px">
							:
						</td>
                        <td style="text-align: right;">
                            {{$item->user_name}}
						</td>
					</tr>
					<tr>
						<td>
							{{$item->invoice_code}}
						</td>
						<td>
							Member
                        </td>
                    
                        
						<td style="text-align: center;">
							:
						</td>
                        <td style="text-align: right;">
                           
                                {{$item->member_name}}
                          
							
						</td>
					</tr>
				</table>
                @endforeach
            </div>
            

			<div class="transaction">
				<table class="transaction-table" cellspacing="0" cellpadding="0">
					@foreach($transaction_detail as $row)
                    <tr>
                        <td style="width: 110px">{{$loop->iteration}}</td>
                        <td style="width: 110px">{{$row->outlet_name}}</td>

                        <td style="width: 110px">{{$row->paket_name}}</td>
                        <td style="text-align: ; width: 60px">{{$row->paket_price}}</td>

                    </tr>
                    @endforeach
                    <tr>
						<td colspan="5" style="border-bottom: 1px dashed; padding-top: 5px"></td>
                    </tr>
                    @foreach($transaction as $item)
					<tr>
						<td colspan="3"></td>
						<td style="text-align: right; padding-top:5px">Sub  Total</td>
						<td style="text-align: right; padding-top: 5px">
							{{$item->sub_total}}
						</td>
					</tr>
						<tr>
							<td colspan="3"></td>
							<td style="text-align: right; padding-bottom:5px ">Disc. Sale</td>
							<td style="text-align: right; padding-bottom: 5px">{{$item->discon}}</td>
						</tr>
					<tr>
						<td colspan="3"></td>
						<td style="border-top: 1px dashed; text-align: right; padding: 5px 0">
							Tax
						</td>
						<td style="border-top: 1px dashed; text-align: right; padding: 5px 0">
							{{$item->tax}}
						</td>
					</tr>
                    <tr>
						<td colspan="3">
							
						</td>
						<td style="border-top: 1px dashed; text-align: right; padding-top: 5px">
							Additional Cost
						</td>
						<td style="border-top: 1px dashed; text-align: right; padding: 5px">
							{{$item->additional_cost}}
						</td>
					</tr>
					<tr>
						<td colspan="3">
							
						</td>
						<td style="border-top: 1px dashed; text-align: right; padding-top: 5px">
							Pay Total
						</td>
						<td style="border-top: 1px dashed; text-align: right; padding: 5px">
							{{$item->pay_total}}
						</td>
					</tr>
					{{-- <tr>
						<td colspan="3">
							
						</td>
						<td style="text-align: right;">
							Change
						</td>
						<td style="text-align: right;">
							{{$item->remaining}}
						</td>
                    </tr> --}}
                    @endforeach
					
				</table>
			</div>
			<div class="thanks">
				--- Thank You ---
				<br>
				www.dewangga.ga
			</div>


		</div>
	</body>

</html>