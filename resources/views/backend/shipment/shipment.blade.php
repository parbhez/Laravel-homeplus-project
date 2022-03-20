@extends('backend.app')
@section('content')
<?php $i=1; ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						{{trans('user.shipment')}}
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						 <div class="form-inline">&nbsp;&nbsp;&nbsp;&nbsp;
						 	<div class="form-group">
								<label for="from"><b>{{trans('user.shipment_date')}} :</b></label>
									<input id="date" type="text" required style="" placeholder="Click To Select Date" class="datepicker" name="date" value="">
							</div>
							<div class="form-group pull-right">
								<button id="sendAll" class="btn btn-success btn-sm"><span class="fa fa-check-square-o"> Send Selected</span></button>
							</div>
						</div><br/>

						<table  class="table table-bordered" width="100%">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkAll" /></th>
											<th>{{trans('user.order_id')}}</th>
											<th>{{trans('user.user_name')}}</th>
											<th>{{trans('user.email')}}</th>
											<th>{{trans('user.address')}}</th>
											<th>{{trans('user.city')}}</th>
											<th>{{trans('user.ammount')}}</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@if(isset($getShipment))
										@forelse($getShipment as $viewShipment)
										<tr>
											<td class="" id="check_{{ $viewShipment->id}}"><input type="checkbox" name="orderId"  value="{{ $viewShipment->id}}"/></td>
											<td class="">{{$viewShipment->invoice_no}}</td>
											<td class="">{{$viewShipment->full_name}}</td>
											<td class="">{{$viewShipment->email}}</td>
											<td class="">{{$viewShipment->address}}</td>
											<td class="">{{$viewShipment->city_name_lng1}}</td>
											<td class="">{{$viewShipment->total_amount}}</td>
											<td class="">
						                    	<a href="javascript:;" class="btn btn-success btn-xs"  id="sendShipment_{{$viewShipment->id }}" onclick="sendShipment({{ $viewShipment->id }})"><span class="fa fa-check-square-o">Send</span></a>
						        				<a href="javascript:;" class="btn btn-warning btn-xs" id="denyShipment_{{$viewShipment->id }}" onclick="denyShipment({{ $viewShipment->id }})"><span class="fa fa-ban">Deny</span></a>

											</td>
										</tr>
										@empty
									 	@endforelse
									 @endif
									</tbody>
								</table>

					<!-- =======End Page Content======= -->
					</div>
				</div>
			</div>
	    </div>
	</div>
</div>

<script type="text/javascript">
//===@@ Approve Operation @@=====

	function sendShipment(id){
		var date       = $("#date").val();
		if(date == ''){
			
			alert('Warning!! .......Select Shipment Date......');
			return false;
		}
		//alert (date);
		$.ajax({
		  url: "{{URL::to('sendShipment')}}",
		  type     : "GET",
		  cache    : false,
		  dataType:'json',
		  data     : {'date': date, 'id': id},

		  success : function(data){

		    if(data.success == true){
		    	$('#date').val('');	
			  	$('.info-shipment').slideDown().delay(500).slideUp();
			    $("#sendShipment_"+id).parent().prev().html("<label class='label label-success'>Approved</label>");
			    $("#sendShipment_"+id).parent().parent().hide(2000);
			}
		    else{
		    	$('.info-error').slideDown().delay(500).slideUp();
		    }
		    
		  }
		});
		return true;

	}

//===@@ Deny Operation @@=====

	function denyShipment(id){
		//alert (id);
		$.ajax({
		  url: "denyShipment/"+id,
		  dataType:'json',
		  success : function(data){

		    if(data.success == true){
		    	$('#date').val('');	
			  	$('.info-suc').slideDown().delay(1000).slideUp();
			    $("#denyShipment_"+id).parent().prev().html("<label class='label label-warning'>Deny</label>");
			    $("#denyShipment_"+id).parent().parent().hide(2000);
			}
		    else{
		    	$('.info-error').slideDown().delay(500).slideUp();
		    }
		    
		  }
		});
		return true;

	}



	/*For Check Box Process*/
	   $(document).on('change', '#checkAll', function(){
	       $("input:checkbox").prop('checked', $(this).prop("checked"));
	   });
	/*For Check Box Process*/	
	$(document).on('click', '#sendAll', function(){
	       var checkedValues = $('input:checkbox:checked').map(function() {
	    return this.value;
	}).get();
	console.log(checkedValues);

	var date       = $("#date").val();
		//alert (date);
		if(date == ''){
			alert('Warning!! .......Select Shipment Date......');
			return false;
		}
		$.ajax({
		  url: "{{URL::to('collectPayment')}}",
		  type     : "GET",
		  cache    : false,
		  dataType:'json',
		  data     : {'date': date, 'id': checkedValues},

		  success : function(data){
		  	console.log(data);

		    if(data.success == true){
			  	$('.info-shipment').slideDown().delay(500).slideUp();
			    $.each(checkedValues, function( index, value ) {
				  		$("#check_"+value).parent().hide(2000);
						});	
			    $('#date').val('');	
			}
			else if(data.error == true){
		    	$('.no-record').slideDown().delay(1000).slideUp();
		    }
		    else{
		    	$('.info-error').slideDown().delay(500).slideUp();
		    }
		    
		  }
		});




   });

</script> 

@endsection