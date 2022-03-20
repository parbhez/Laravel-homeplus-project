@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						City
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewCity" aria-controls="viewCity" role="tab" data-toggle="tab">View City</a></li>
						    <li role="presentation"><a href="#addCity" aria-controls="addCity" role="tab" data-toggle="tab">Add City</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewCity">
						     	<table id="cityDataTable" class="table table-bordered" width="100%">
									<thead>	
										<tr>
											<th># Serial No</th>
											<th>City Name English</th>
											<th>City Name Bangla</th>
											<th>Cost</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										@if(isset($cities))
											@foreach($cities as $city)
											<tr>
												<td class="">{{++$i}}</td>
												<td class="">
													<span>{{$city->city_name_lang1}}</span>
													<input id="cityNameEn{{ $city->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="city_name_lang1" value="{{$city->city_name_lang1}}" />
												</td>
												<td class="">
													<span>{{$city->city_name_lang2}}</span>
													<input id="cityNameBn{{ $city->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="city_name_lang2" value="{{$city->city_name_lang2}}" />
												</td>
												<td class="">
													<span>{{$city->cost}}</span>
													<input id="cityWiseCost{{ $city->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="city_wise_cost" value="{{$city->cost}}" />
												</td>
												<td class="">
						      						@if($city->status==1)
						         	 					<label class="label label-success"> Active</label>
						      						@else
						          						<label class="label label-warning"> Inactive</label>
						     						@endif
						    					</td>
						    					<td>
						        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_{{ $city->id }}"><i class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</i></a>
						        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upCity_{{ $city->id }}"><i class="fa fa-save">&nbsp;{{ trans('common.save') }}</i></a>
						        					&nbsp; | &nbsp;
						        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $city->id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  			&nbsp; | &nbsp;
						                  			@if($city->status==1)
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('{{ $city->id }}')" id="cityId{{ $city->id }}"><i class="fa fa-ban">&nbsp;{{ trans('common.inactive') }}</i></a>
						                  			@else
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('{{ $city->id }}')" id="cityId{{ $city->id }}"><span class="fa fa-check-square-o"> {{ trans('common.active') }}</i></a>
						                  			@endif
						    					</td>
											</tr>
											@endforeach
										@endif
									</tbody>						
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addCity">
						    	{!!Form::open(array('route'=>'city.post','class'=>'form-horizontal form-wrp cityForm','files'=>true))!!}
								<div class="form-group">
									<label class="col-md-2"> {{trans('basicSetup.city_name_en')}} </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="city_name_lang1" placeholder="Ex: Dhaka...">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> {{trans('basicSetup.city_name_bn')}}</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="city_name_lang2" placeholder="উদাঃ ঢাকা...">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> {{trans('basicSetup.city_wise_cost')}}</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="cost" placeholder="Shipment Cost">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-2">
										<input type="submit" class="btn btn-success btn-md" value="Save">
									</div>
								</div>
							    {!!Form::close()!!}
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
		$('.cityForm').validate({
			onkeyup: false,		
			rules: {
				city_name_lang1: {
					required: true
				},
				
				city_name_lang2: {
					required: true
				},
			},
		  	submitHandler: function(form) {
		  		form.submit();
		  	}
		});

	});
//======@@ Edit btn function @@========
	$('.btn-edit').on('click', function(){
	    $(this).parent().prev().prev().prev().prev().children().next().show().prev().hide();
	    $(this).parent().prev().prev().prev().children().next().show().prev().hide();
	    $(this).parent().prev().prev().children().next().show().prev().hide();
		$(this).next().show(); //show update bottom
		$(this).hide(); //hide update bottom          
	}); 

//======@@ Save btn function @@========
	var loading      = $('.loading');
	var info_err     = $('.info-error');
	var info_suc     = $('.info-suc');
	var db_err       = $('.db-error');
	var inactive_msg = $('.inactive-msg');
	var active_msg   = $('.active-msg');
	var delete_msg   = $('.delete-msg');
	var warning_msg  = $('.warning-msg');
	var fk_msg     = $('.fk-msg');

	$('.btn-update').on('click', function(){
		var data     = $(this).attr("id");
		var arr      = data.split('_');
		var cityId    = arr[1];
		var btn_update  = $(this);  
		var btn_edit    = $(this).prev();
		var city_name_lng1  =  $("#cityNameEn"+cityId).val();
		var city_name_lng2  =  $("#cityNameBn"+cityId).val();
		var city_wise_cost  =  $("#cityWiseCost"+cityId).val();

		if(cityId == '' || city_name_lng1 == '' || city_name_lng2=='' || city_wise_cost == ''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "{{URL::to('saveEditCity')}}",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'city_name_id': cityId, 'city_name_lang1': city_name_lng1, 'city_name_lang2': city_name_lng2, 'city_wise_cost': city_wise_cost},
			beforeSend: function(){
				loading.show(); 
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show();  //show Edit bottom
					btn_update.hide();//hide update bottom
					$('#cityNameEn'+cityId).hide().prev().show().html(city_name_lng1);
			   		$('#cityNameBn'+cityId).hide().prev().show().html(city_name_lng2);
			   		$('#cityWiseCost'+cityId).hide().prev().show().html(city_wise_cost);
				}
				if(data.success == false){
		 			info_err.hide().find('ul').empty();
					$.each(data.error, function(index, error){
			  		info_err.find('ul').append('<li>'+error+'</li>');
					});
					info_err.slideDown();
					info_err.delay(6000).slideUp(300);
				}
				if(data.error == true){         
					db_err.hide().find('label').empty();  
					db_err.find('label').append(data.status); 
					db_err.slideDown();
					db_err.delay(5000).slideUp(300);
				}       
				loading.hide(); 
			},
			error: function(data){
				alert('error occurred! Please Check');
				loading.hide(); 
			}
		}); 
	});

//======@@ Refresh Opration @@======
	$(".btn-refresh").on('click',function(){
		var data     = $(this).attr("id");
		var arr      = data.split('_');
		var id    = arr[1];
		$("#cityNameEn"+id).hide().prev().show();
		$("#cityNameBn"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======


//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveCity/"+id,
	    dataType:'json',
	    success : function(data){
		    if(data.success == true){
		    	info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);

			 	$("#cityId"+id).removeClass('btn btn-warning btn-xs');
				$("#cityId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="cityId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
			    $("#cityId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
	$.ajax({
	  	url: "activeCity/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);
				
			 	$("#cityId"+id).removeClass('btn btn-info btn-xs');
			 	$("#cityId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="cityId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
		     	$("#cityId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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

$(document).ready(function() {
    $('#cityDataTable').DataTable();
} );

</script>

@endsection