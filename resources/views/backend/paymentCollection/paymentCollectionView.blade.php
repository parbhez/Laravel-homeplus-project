@extends('backend/app')
@section('content')
<?php
	$i=0;

?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
  @if(Session::has('successFlag') && Session::get('successFlag')>0)
  <div class="alert alert-success alert-dismissable"> {{ Session::get('successFlag') }} Received Successful !..
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  </div>
  @endif

  @if(Session::has('errorFlag') && Session::get('errorFlag')>0)
  <div class="alert  alert-warning alert-dismissable "> {{ Session::get('errorFlag')}} Error Ocured !..
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  </div>
  @endif
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Payment Collection
					</span>
			    </span>
            </div>
            <div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					
					<label><b>Payment Collection :</b></label>
				
                    <div class="form-inline">&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="form-group pull-right">
                                <button id="sendAll" class="btn btn-success btn-sm"><span class="fa fa-check-square-o"> Send Selected</span></button>
                            </div>
                        </div><br/>
        {!!Form::open(array('route'=>'collectPayment','id'=>'submitForm'))!!}

					<table  class="table table-bordered" width="100%">
						<thead>
							<tr>
                <th><input type="checkbox" id="checkAll"/></th>
								<th>#Sl No. </th>
								<th>Order Invoice</th>
								<th>Mobile</th>
								<th>Shipping Contact</th>
								<th>City</th>
								<th>Sub Total</th>
                <th>Shipping Cost</th>
                <th>Discount</th>
								<th>Total Amount</th>
								<th>Total Payable</th>
								<th>Now Pay</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody class="tableContent">
						@if(isset($getOrdersForPayment))
						@foreach($getOrdersForPayment as $viewOrdersForPayment)
						@if(($viewOrdersForPayment->payable+$viewOrdersForPayment->shipping_cost) > $viewOrdersForPayment->paid)
            <? ++$i; ?>
							<tr>
                <td class="" id="check_{{ $viewOrdersForPayment->order_id}}"><input type="checkbox" name="orderId_{{ $i }}"  value="{{ $viewOrdersForPayment->order_id}}"/></td>
								<td>{{$i}}</td>
								<td>{{$viewOrdersForPayment->invoice_no}}</td>
								<td>{{$viewOrdersForPayment->mobile_no}}</td>
								<td>{{$viewOrdersForPayment->shipping_mobile_no}}</td>
								<td>{{$viewOrdersForPayment->city_name_lng1}}</td>
                <td>{{$viewOrdersForPayment->total_amount}}</td>
								<td>{{$viewOrdersForPayment->shipping_cost}}</td>
                <td>{{$viewOrdersForPayment->discount}}</td>
								<td>{{($viewOrdersForPayment->total_amount + $viewOrdersForPayment->shipping_cost) - $viewOrdersForPayment->discount}}</td>
								<td>{{($viewOrdersForPayment->payable+$viewOrdersForPayment->shipping_cost) - $viewOrdersForPayment->paid}}</td>
								<td width="10%">
									<input id="nowPay_{{ $viewOrdersForPayment->order_id }}" class="form-control col-md-1 input-sm now-pay" type="text" name="now_pay_{{$i}}">
									<input id="payable_{{ $viewOrdersForPayment->order_id }}" value="{{$viewOrdersForPayment->payable}}" class="form-control col-md-1 input-sm" type="hidden" name="payable_{{$i}}">
                  <input id="paid_{{ $viewOrdersForPayment->order_id }}" value="{{$viewOrdersForPayment->paid}}" class="form-control col-md-1 input-sm" type="hidden" name="paid_{{$i}}">
									<input id="shippingCost_{{ $viewOrdersForPayment->order_id }}" value="{{$viewOrdersForPayment->shipping_cost}}" class="form-control col-md-1 input-sm" type="hidden" name="shipping_cost_{{$i}}">
								</td>
								<td>
									<a href="javascript:;" class="btn-submit-payment btn btn-primary btn-xs" id="submitPayment_{{ $viewOrdersForPayment->order_id }}"><span class="fa fa-save">&nbsp;Submit</span></a>
								</td>
							</tr>
							@endif
							@endforeach
							@endif
						</tbody>
					</table>
          <input type="hidden" name="index" value=" {{ $i }}">
  {!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">

     $(".btn-submit-payment").on('click', function(){
        var data                = $(this).attr("id");
        var arr                 = data.split('_');    
        var orderId             = arr[1];
        var now_pay             = $("#nowPay_"+orderId).val();
        var payable             = $("#payable_"+orderId).val();
        var paid                = $("#paid_"+orderId).val();
        var shippingCost        = $("#shippingCost_"+orderId).val();
        if(now_pay == ''){
            alert('Warning!Blank Field must be required.');
            return false;
        }
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            url      : "{{URL::to('paymentCollectionSave')}}",
            type     : "GET",
            cache    : false,
            dataType : 'json',
            data     : {'orderId': orderId,
                        'payable': payable,
                        'paid' :paid,
                        'now_pay': now_pay,
                        'shippingCost': shippingCost,
                        }, // serializes the form's elements.
            success  : function(data){
                if(data.success == true){

                    $(".common-msg").slideDown().delay(3000).slideUp(300);
                    $("#common-msg").html('<b>'+now_pay+' </b> amount paid successfully.');

                }
                if(data.success == false){
                    info_err.hide().find('ul').empty();
                    $.each(data.error, function(index, error){
                    //$("#nowPay_"+orderId).parent().parent().hide(2000);	
                    info_err.find('ul').append('<li>'+error+'</li>');
                    });
                    info_err.slideDown();
                    info_err.delay(3000).slideUp(300);
                }
                if(data.error == true){         
                    db_err.slideDown();
                    db_err.delay(3000).slideUp(300);
                }       
                 
            },
            error: function(data){
                alert('error occurred! Please Check');
                 
            }
        }); 
    });


	$(document).on('keyup', '.now-pay', function(){
	   	var data           	= $(this).attr("id");
       	var arr            	= data.split('_');    
       	var orderId        	= arr[1];
       	var now_pay        	= parseFloat($("#nowPay_"+orderId).val());
       	var payable        	= parseFloat($("#payable_"+orderId).val());
        var paid            = parseFloat($("#paid_"+orderId).val());
       	var shippingCost    = parseFloat($("#shippingCost_"+orderId).val());
        var have_to_pay     = '';
        have_to_pay         = (payable + shippingCost) - paid;

          
		//alert (have_to_pay);
	   	var intRegex = /^\d+$/;
	   	var floatRegex = /^((\d+\.(\.\d *)?)|((\d*\.)?\d+))$/;
       	if(this.value==''){
            this.value=null;
       	}
       	else{
			if (intRegex.test(now_pay) || floatRegex.test(now_pay)) {
                if(now_pay>have_to_pay){
                    this.value=have_to_pay;
                }
                else if(now_pay<0){
                	this.value=0;
                }
                else{}
			}

       	else{   this.value='';
               alert("Invalid Input")
           }
       	}
	});

    /*For Check Box Process*/
       $(document).on('change', '#checkAll', function(){
           $("input:checkbox").prop('checked', $(this).prop("checked"));
       });
    /*For Check Box Process*/

    $(document).on('click', '#sendAll', function(){
      $("#submitForm").submit();
    });

    jQuery('.now-pay').keyup(function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });


</script>	

@endsection('content')

