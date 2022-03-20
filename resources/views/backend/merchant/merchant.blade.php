@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						{{trans('user.user')}}
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewUser" aria-controls="viewUser" role="tab" data-toggle="tab">{{trans('user.view_user')}}</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewUser">
						     	<table id="UsersdataTables"  class="table table-bordered" width="100%">
						     	<thead>
										<tr>
											<th># Sl No </th>
											<th>Company Name</th>
											<th>Full Name</th>
											<th>Mobile No</th>
											<th>Email</th>
											<th>Address</th>
											<th>Bank Account Info</th>
											<th>Business Type</th>
											<th>Distric</th>
											<th>Location</th>
											<th>Logo</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										</thead>
									<tbody>
										<?php $i=0; ?>
										@if(isset($merchants))
											@foreach($merchants as $merchant)
											<tr>
												<td class="">{{++$i}}</td>
												<td class="">
													<span><a href="{{URL::to('adminTOMerchantLogin')}}/{{$merchant->id}}">{{$merchant->company_name}}</a></span>
												</td>
												<td class="">
													<span>{{$merchant->full_name}}</span>
												</td>
												<td class="">
													<span>{{$merchant->mobile_no}}</span>
												</td>
												<td class="">
													<span>{{$merchant->email}}</span>
													<input id="fullName{{ $merchant->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$merchant->web_address}}" />
												</td>
												<td class="">
													<span>{{$merchant->address}}</span>
												</td>
												
												<td class="">
													<span>{{$merchant->bank_ac_number}}</span>
												</td>
												<td class="">
													<span>{{$merchant->business_type}}</span>
												</td>

												<td class="">
													<span>{{$merchant->district}}</span>
												</td>

												<td class="">
													<span>{{$merchant->location}}</span>
												</td>
												<td class="">
												{!! HTML::image("public/images/merchants/$merchant->logo", "Logo",array('class' => 'img img-thumbnail','style'=>'height:40px;width:40px;padding:0px')) !!}
										        </td>
												<td id="merchantStatus{{ $merchant->id }}">
						      						@if($merchant->status==0)
														<label id="marchent{{$merchant->id}}" class="label label-primary"> Pending </label>
													@elseif($merchant->status==1)
														<label id="marchent{{$merchant->id}}" class="label label-success"> Approved</label>
													@elseif($merchant->status==2)
						          						<label id="marchent{{$merchant->id}}" class="label label-danger"> Deny</label>
						     						@endif
						    					</td>
						    					<td>
						                  			@if($merchant->status == 0)
														<a href="javascript:;" class="btn btn-info btn-xs" onclick="approvedConfirm('{{ $merchant->id }}')" id="merchantId{{ $merchant->id }}"><span class="fa fa-check-square-o">Approved</span></a>
						                  			@elseif($merchant->status == 2)
														<a href="javascript:;" class="btn btn-danger btn-xs " onclick="activeConfirm('{{ $merchant->id }}')" id="merchantId{{ $merchant->id }}"><span class="fa fa-ban">&nbsp;Active</span></a>
						                  			@elseif($merchant->status == 1)
						                    			<a href="javascript:;" class="btn btn-success btn-xs" onclick="inactiveConfirm('{{ $merchant->id }}')" id="merchantId{{ $merchant->id }}"><span class="fa fa-ban"> Deny </span></a>
						                  			@endif
													<a href="{{URL::to('merchantAdminEdit').'/'.$merchant->id}}" class="btn btn-success btn-xs"><span class="fa fa-edit"> Edit </span></a>
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

$(document).ready(function(){	
		//Custom validation Rules
		//alphaspace allowed

		$('.userForm').validate({
			onkeyup: false,		
			rules: {
				full_name: {
					required: true
				},
				email: {
					required: true
				},
				mobile_no: {
					required: true
				},
				image: {
					required: true
				},
			},
		  	submitHandler: function(form) {
		  		form.submit();
		  	}
		});

	});

//===@@ Approved Operation @@=====

function approvedConfirm(id){
	var info_suc = $('.info-suc');
	$.ajax({
		url : "approvedMerchant/"+id,
		dataType :'json',
		success : function(data){
			var succ=data.success;
			if(succ == true){
				info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);
				$("#merchantId"+id).removeClass('btn btn-danger btn-xs');
				$("#merchantId"+id).html('<a href="javascript:;" class="btn btn-danger btn-xs" onclick="inactiveConfirm('+id+')" id="merchantId'+id+'"><span class="fa fa-ban">&nbsp;Deny</span></a>'); //inactive hide
				$("#merchantStatus"+id).html("");
				$("#merchantStatus"+id).html("<label class='label label-success'>Active</label>");
			}else{
				db_err.hide().find('label').empty();
				db_err.find('label').append(data.status);
				db_err.slideDown();
				db_err.delay(5000).slideUp(300);
			}
		}
	});
	return true;
}

//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	var info_suc     = $('.info-suc');
	$.ajax({
	  url: "inactiveMerchant/"+id,
	  dataType:'json',
	  success : function(data){
		var succ=data.success;
	  if(succ == true){
		info_suc.slideDown();
		info_suc.delay(3000).slideUp(300);

			$("#merchantId"+id).removeClass('btn btn-danger btn-xs');
			$("#merchantId"+id).html('<a href="javascript:;" class="btn btn-danger btn-xs" onclick="activeConfirm('+id+')" id="merchantId'+id+'"><span class="fa fa-check-square-o">&nbsp;Active</span></a>'); //inactive hide$("#merchantStatus"+id).html("");
			$("#merchantStatus"+id).html("");
			$("#merchantStatus"+id).html("<label class='label label-danger'>Inactive</label>");
		}else{
			db_err.hide().find('label').empty();
			db_err.find('label').append(data.status);
			db_err.slideDown();
			db_err.delay(5000).slideUp(300);
		}
	  }
	});
	return true;
}

//===@@ Active Operation @@=====

function activeConfirm(id){
	var info_suc     = $('.info-suc');
$.ajax({
  url: "activeMerchant/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
	  info_suc.slideDown();
	  info_suc.delay(3000).slideUp(300);

	  $("#merchantId"+id).removeClass('btn btn-success btn-xs');
	  $("#merchantId"+id).html('<a href="javascript:;" class="btn btn-danger btn-xs" onclick="inactiveConfirm('+id+')" id="merchantId'+id+'"><span class="fa fa-ban">&nbsp;Inactive</span></a>'); //active hide
	  $("#merchantStatus"+id).html("");
	  $("#merchantStatus"+id).html("<label class='label label-success'>Active</label>");
	}else{
		db_err.hide().find('label').empty();
		db_err.find('label').append(data.status);
		db_err.slideDown();
		db_err.delay(5000).slideUp(300);

	}
  }
});
return true;

}

$(document).ready(function(){
    $('#UsersdataTables').DataTable(); 
} );



</script>

@endsection