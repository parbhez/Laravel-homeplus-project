@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Color
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewColor" aria-controls="viewColor" role="tab" data-toggle="tab">View Color</a></li>
						    <li role="presentation"><a href="#addColor" aria-controls="addColor" role="tab" data-toggle="tab">Add Color</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewColor">
						     	<table id="colorDataTable" class="table table-bordered" width="100%">
									<thead>	
										<tr>
											<th># Serial No</th>
											<th>Color Name English</th>
											<th>Color Name Bangla</th>
											<th style="width: 15%;">Color</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										@if(isset($colors))
											@foreach($colors as $color)
											<tr>
												<td class="">{{++$i}}</td>
												<td class="">
													<span>{{$color->color_name_lang1}}</span>
													<input id="colorNameLang1{{ $color->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$color->color_name_lang1}}" />
												</td>
												<td class="">
													<span>{{$color->color_name_lang2}}</span>
													<input id="colorNameLang2{{ $color->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$color->color_name_lang2}}" />
												</td>
												<td class="">
													<div style="height: 20px; width: 20px; border-radius: 100% !important;  background-color: {{$color->color_code}} ; "></div>
												 &nbsp; <input type="color" id="coloredit{{ $color->id}}" class="colorpicker" onchange="clickColorEdit(0, -1, -1, 5, {{  $color->id}})" value="#ff0000" style="display: none;">
														<input type="text" id="colorCode{{ $color->id}}" class="form-control col-md-1 input-sm" value="{{$color->color_code}}" name="color_code" readonly style="display: none; width: 85px;">
												</td>
												<td class="">
						      						@if($color->status==1)
						         	 					<label class="label label-success"> Active</label>
						      						@else
						          						<label class="label label-warning"> Inactive</label>
						     						@endif
						    					</td>
						    					<td>
						        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_{{ $color->id }}"><span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span></a>
						        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upTitle_{{ $color->id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
						        					&nbsp; | &nbsp;
						        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $color->id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  			&nbsp; | &nbsp;
						                  			@if($color->status==1)
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('{{ $color->id }}')" id="colorId{{ $color->id }}"><span class="fa fa-ban">&nbsp;{{ trans('common.inactive') }}</span></a>
						                  			@else
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('{{ $color->id }}')" id="colorId{{ $color->id }}"><span class="fa fa-check-square-o"> {{ trans('common.active') }}</span></a>
						                  			@endif
						    					</td>
											</tr>
											@endforeach
										@endif
									</tbody>						
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addColor">
						    	{!!Form::open(array('route'=>'color.post','class'=>'form-horizontal form-wrp colorForm','files'=>true))!!}
								<div class="form-group">
									<label class="col-md-2"> {{trans('basicSetup.color_name_en')}} </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="color_name_lang1" placeholder="Ex: Blue...">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> {{trans('basicSetup.color_name_bn')}} </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="color_name_lang2" placeholder="উদাঃ নীল...">
									</div>
								</div>

								<div class="form-group">
								<label class="col-md-2"> {{trans('basicSetup.select_color')}} </label>
									<div class="col-md-3">
										<input type="color" id="html5colorpicker" onchange="clickColor(0, -1, -1, 5)" value="#ff0000" >
										<input type="text" id="color" class="form-control color" name="color_code" readonly=""></input>
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

		$('.colorForm').validate({
			onkeyup: false,		
			rules: {
				color_name_lng1: {
					required: true
				},
				color_name_lng2: {
					required: true
				},
				color_code: {
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
	    $(this).parent().prev().prev().children().next().show().next().show().prev().prev().hide();
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
		var colorId    = arr[1];
		var btn_update  = $(this);  
		var btn_edit    = $(this).prev();
		var color_name_lng1  =  $("#colorNameLang1"+colorId).val();
		var color_name_lng2  =  $("#colorNameLang2"+colorId).val();
		var color  =  $("#colorCode"+colorId).val();

		if(colorId == '' || color_name_lng1 == '' || color_name_lng2 == '' || color==''){
			if (colorId == '') {
			alert('Warning!Color id is blank. This Field must be required.');
			return false;
			}

			if (color_name_lng1 == '') {
			alert('Warning!Color name English is blank. This Field must be required.');
			return false;
			}

			if (color_name_lng2 == '') {
			alert('Warning!Color name Bangla is blank. This Field must be required.');
			return false;
			}

			if (color == '') {
			alert('Warning!Color is blank. This Field must be required.');
			return false;
			}
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "{{URL::to('saveEditColor')}}",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'color_name_id': colorId, 'color_name_lang1': color_name_lng1, 'color_name_lang2': color_name_lng2, 'color': color},
			beforeSend: function(){
				loading.show(); 
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show();  //show Edit bottom
					btn_update.hide();//hide update bottom
					$('#colorNameLang1'+colorId).hide().prev().show().html(color_name_lng1);
			   		$('#colorNameLang2'+colorId).hide().prev().show().html(color_name_lng2);
			   		$('#colorCode'+colorId).hide().prev().hide().prev().show().attr('style','height: 20px; width: 20px; border-radius: 100% !important;  background-color:'+color);
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
		$("#colorNameLang1"+id).hide().prev().show();
		$("#colorNameLang2"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
		$("#colorCode"+id).hide().prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======


//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveColor/"+id,
	    dataType:'json',
	    success : function(data){
		    if(data.success == true){
		    	info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);

			 	$("#colorId"+id).removeClass('btn btn-warning btn-xs');
				$("#colorId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="colorId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
			    $("#colorId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
	  	url: "activeColor/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);
				
			 	$("#colorId"+id).removeClass('btn btn-info btn-xs');
			 	$("#colorId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="colorId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
		     	$("#colorId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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
</script>



<script type="text/javascript">

function clickColor(hex, seltop, selleft, html5) {

    var c = document.getElementById("html5colorpicker").value;
    $(".color").val(c);
 
}


function clickColorEdit(hex, seltop, selleft, html5, colorId){
	//alert(colorId);
	var c = document.getElementById("coloredit"+colorId).value;
	$("#colorCode"+colorId).val(c);
}

$(document).ready(function() {
    $('#colorDataTable').DataTable();
} );

</script>
@endsection