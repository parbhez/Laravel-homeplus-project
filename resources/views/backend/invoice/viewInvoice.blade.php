@extends('backend/app')
@section('content')
<?php
	$i=1;
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						View Invoice
					</span>
			    </span>
            </div>
            <div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
						<div class="row">
							<div class="form-group">
							
								<div class="form-inline">
								&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-group">
									<label for="from"><b>From :</b></label>
										<input id="start_date" type="text" style="" placeholder="click to show datepicker" class="datepicker" name="from" value="{{date("Y-m-d")}}">
									</div>
							
								
									<div class="form-group">
									<label for="to"><b>To :</b></label>
										<input id="end_date" type="text" style="" placeholder="click to show datepicker" class="datepicker" name="to" value="{{date("Y-m-d")}}">
									</div>
									 <div class="form-group">
									<div class="col-md-offset-2 col-md-2">
										<input type="submit" class="btn btn-success btn-md" value="Search" id="btnSearch">
									</div>
								</div>
							
								</div>
						</div>
					</div>
					
					<hr />
					<label><b>View Invoice :</b></label>
					<table  class="table table-bordered" width="100%">
							<thead>
								<tr>
									<th>#{{trans('user.sl_no')}}</th>
									<th>{{trans('user.user_name')}}</th>
									<th>{{trans('user.mob_no')}}</th>
									<th>{{trans('user.order_invoice')}}</th>
									<th>{{trans('user.sub_total')}}</th>
									<th>{{trans('user.shipping_cost')}}</th>
									<th>{{trans('user.discount')}}</th>
									<th>{{trans('user.total_amount')}}</th>
									<th>{{trans('user.total_paid')}}</th>
									<th>{{trans('user.order_date')}}</th>
									<th>{{trans('user.payment_date')}}</th>
									<th>{{trans('user.action')}}</th>
								</tr>
							</thead>
							<tbody class="tableContent">
								
							</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
var tableContent = $(".tableContent");
     $(document).ready(function() {
     	var start_date = $("#start_date").val();
     	var end_date   = $("#end_date").val();
     	getOrderDetailsReports(start_date,end_date);
	});

    $("#btnSearch").on('click',function(){
    	var start_date = $("#start_date").val();
     	var end_date   = $("#end_date").val();
     	getOrderDetailsReports(start_date,end_date);
    });

     function getOrderDetailsReports(start_date,end_date){
     	tableContent.empty();
     	$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
		  url: "{{URL::to('viewAllInvoiceAjax')}}",
		  type: "GET",
		  cache: false,
		  dataType:'json',
		  data :{'start_date':start_date,'end_date' : end_date},
		  success  : function(data){
		  	var i=1;
		  	content = '';
		  	// console.log(data);
		  	$.each(data,function(key,value){
		  		content +='<tr>'+
  						  '<td>'+(i++)+'</td>'+
  						  '<td>'+value.user_name+'</td>'+
  						  '<td>'+value.mobile_no+'</td>'+
  						  '<td>'+value.invoice_no+'</td>'+
  						  '<td>'+value.total_amount+'</td>'+
  						  '<td>'+value.shipping_cost+'</td>'+
  						  '<td>'+value.discount+'</td>'+
  						  '<td>'+
  						  		((value.total_amount+value.shipping_cost) - value.discount) +
  						  '</td>'+
  						  '<td>'+value.paid+'</td>'+
  						  '<td>'+value.order_date+'</td>'+
  						  '<td>'+value.payment_date+'</td>'+
  						  '<td>'+
							'<a href="{{URL::to("printInvoice")}}/'+value.order_id+'" id="print_'+value.order_id +'" class="btn btn-info btn-xs btn-print"> Print</a> '+
							'<a href="{{URL::to("emailInvoice")}}/'+value.order_id+'" id="email_to_'+ value.order_id +'" class="btn btn-success btn-xs btn-email-to"> Email Invoice &nbsp;<i class="icon-long-arrow-right"></i></a> '+
						'</td>'+
  						  '</tr>';
		  	});
		  	tableContent.append(content);
		  }
		});
     }


     /*$(".btn-print").on('click', function(){
     	alert('a');

     	var data	  = $(this).attr("id");
     	var arr       = data . split("_");
     	var ordeId    = arr[1];
     	alert(orderId);
     });*/



    </script>

@endsection('content')