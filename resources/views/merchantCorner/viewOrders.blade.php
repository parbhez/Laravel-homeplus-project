@extends('backend.app')
@section('content')

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Orders
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewUser" aria-controls="viewUser" role="tab" data-toggle="tab">View Order</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewUser">
						     <table id="UsersdataTables"  class="table table-bordered" style="width: 100%; font-size: 13px">
						     	<thead>
										<tr>
											<th># SL no</th>
											<th>User Name</th>
											<th>Merchant Name</th>
											<th>User Email</th>
											<th>Order Invoice No</th>
											<th>Order Date</th>
											<th>Sub Total</th>
											<th>Shipping Cost</th>
											<th>Discount</th>
											<th>Total Amount</th>
											<th>Paid Amount</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										</thead>
									<tbody>
										<?php 
											$i     = 0;
											$lang  = Session::get('last_login_lang');
										?>
										@if(isset($allOrder))
											@foreach($allOrder as $orders)
											<tr>
												<td class="">{{++$i}}</td>
												<td class="">
													<span>{{$orders->full_name}}</span>
													
												</td>
												<td class="">
													<span>{{$orders->company_name}}</span>
													
												</td>
												<td class="">
													<span>{{$orders->email}}</span>
													
												</td>

												<td class="">
													<span>{{$orders->invoice_no}}</span>
													
												</td>

												<td class="">
													<span>{{$orders->order_date}}</span>
													
												</td>

												<td class="">
													<span>{{$orders->total_amount}}</span>
													
												</td>

												<td class="">
													<span>{{$orders->shipping_cost}}</span>
													
												</td>

												<td class="">
													<span>{{$orders->discount}}</span>
													
												</td>

												<td class="">
													<span id="total_amount{{$orders->id}}">{{($orders->total_amount + $orders->shipping_cost) - $orders->discount}}</span>
													<!-- <input type="hidden" id="total_amount" value="{{($orders->total_amount + $orders->shipping_cost) - $orders->discount}}"></input> -->
													
												</td>

												<td class="">
													<input id="payable{{ $orders->id }}" class=" form-control col-md-1 input-sm" required style="" type="text" name="session_name" value="{{$orders->payable}}" onkeyup="paidAmount({{$orders->id}})" />
												</td>
												<td class="">
						      						@if($orders->status==1)
						          						<label class="label label-warning">Pending</label>
						     						@endif
						    					</td>
						    					<td>
						        					
						        					<a href="javascript:;"  onclick="approveConfirm({{$orders->id}})" class="btn btn-primary btn-sm" id="approveOrder_{{ $orders->id }}"><span class="fa fa-check">{{ trans('common.approve') }}</span></a>
						        					
						        					<a href="javascript:;"   onclick="denyConfirm({{$orders->id}})" class="btn-update btn btn-primary btn-sm" id="denyOrder_{{ $orders->id }}"><span class="fa fa-times">{{ trans('common.deny') }}</span></a>
						                  			

						                  			<!-- <a data-toggle="modal" href="#modal" onclick="loadModalEdit('loadOrderDetailsModal',{{$orders->id}},'edit')" class="btn-edit btn btn-primary btn-sm" id=""><span class="fa fa-edit">{{ trans('common.edit') }}</span></a> -->

						    					</td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
						    </div>
						</div>

					<!-- =======End Page Content======= -->
					</div>
				</div>
			</div>
	    </div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function() {
    $('#UsersdataTables').DataTable();
} );

</script>
<script type="text/javascript">

     $(document).ready(function() {
	   $('.modal-title').html('Edit Order');
	   $('.modal-dialog').removeClass('modal-small');
	   $('.modal-dialog').addClass('modal-lg');
	});

        </script>

@endsection


<script type="text/javascript">
//===@@ Approve Operation @@=====

	function approveConfirm(id){
		//alert (id);
		var payable = $("#payable"+id).val();
		//alert (payable);
		$.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

		$.ajax({
		  url: "approveOrder/"+id,
          type     : "GET",
		  dataType :'json',
		  cache    : false,
		  data     : {'payable': payable,},
		  success : function(data){

		    if(data.success == true){
			  	$('.info-approve').slideDown().delay(1000).slideUp();
			    $("#approveOrder_"+id).parent().prev().html("<label class='label label-success'>Approved</label>");
			    $("#approveOrder_"+id).parent().parent().hide(2000);
			}
		    else{
		    	$('.info-error').slideDown().delay(500).slideUp();
		    }
		    
		  }
		});
		return true;

	}

//===@@ Deny Operation @@=====

	function denyConfirm(id){
		//alert (id);
		$.ajax({
		  url: "denyOrder/"+id,
		  dataType:'json',
		  success : function(data){

		    if(data.success == true){
			  	$('.info-deny').slideDown().delay(1000).slideUp();
			    $("#denyOrder_"+id).parent().prev().html("<label class='label label-danger'>Deny</label>");
			    $("#denyOrder_"+id).parent().parent().hide(2000);
			}
		    else{
		    	$('.info-error').slideDown().delay(500).slideUp();
		    }
		    
		  }
		});
		return true;

	}
	function paidAmount(id){
		//alert("jdkf");
		var regex =  /^\d*(?:\.{1}\d+)?$/;
        var pay =$("#payable"+id).val();
        var $payable = parseInt($("#total_amount"+id).html());
        if (pay.match(regex)) {
	        if(pay>$payable){
	                
	                $("#payable"+id).val($payable);
	                //alert($payable);
	         }
     	}else{
     		$("#payable"+id).val("0");
     	}

	}
	



</script> 