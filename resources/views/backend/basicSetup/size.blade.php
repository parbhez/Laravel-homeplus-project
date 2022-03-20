@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Size
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->

						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewSize" aria-controls="viewSize" role="tab" data-toggle="tab">View Size</a></li>
						    <li role="presentation"><a href="#addSize" aria-controls="addSize" role="tab" data-toggle="tab">Add Size</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewSize">
						     	<table id="sizeDataTable" class="table table-bordered" width="100%">
									<thead>	
										<tr>
											<th># Serial No</th>
											<th>Size Name English</th>
											<th>Size Name Bangla</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										@foreach($sizes as $size)
										<tr>
											<td class="">{{++$i}}</td>
											<td class="">
												<span>{{$size->size_title_lang1}}</span>
												<input id="sizeNameEn{{ $size->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$size->size_title_lang1}}" />
											</td>
											<td class="">
												<span>{{$size->size_title_lang2}}</span>
												<input id="sizeNameBn{{ $size->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$size->size_title_lang2}}" />
											</td>
											
											<td class="">
					      						@if($size->status==1)
					         	 					<label class="label label-success"> Active</label>
					      						@else
					          						<label class="label label-warning"> Inactive</label>
					     						@endif
					    					</td>
					    					<td>
					        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_{{ $size->id }}"><span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span></a>

					        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upTitle_{{ $size->id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
					        					&nbsp; | &nbsp;
					        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $size->id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  		&nbsp; | &nbsp;
					                  			@if($size->status==1)
					        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('{{ $size->id }}')" id="sizeId{{ $size->id }}"><span class="fa fa-ban">&nbsp;{{ trans('common.inactive') }}</span></a>
					                  			
					                  			@else
					                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('{{ $size->id }}')" id="sizeId{{ $size->id }}"><span class="fa fa-check-square-o">{{ trans('common.active') }}</span></a>
					                  			@endif
					    					</td>
										</tr>
										@endforeach
									</tbody>						
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addSize">
						    	{!!Form::open(array('rout'=>'size.post','class'=>'form-horizontal form-wrp sizeForm'))!!}
								<div class="form-group">
									<label class="col-md-2"> Size Name English </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="size_title_lang1" placeholder="Ex: Large...">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Size Name English </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="size_title_lang2" placeholder="উদাঃ বড়...">
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

		$('.sizeForm').validate({
			onkeyup: false,		
			rules: {
				size_title_lang1: {
					required: true
				},
				size_title_lang2: {
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
		var sizeId    = arr[1];
		var btn_update  = $(this);  
		var btn_edit    = $(this).prev();
		var size_title_lang1  =  $("#sizeNameEn"+sizeId).val();
		var size_title_lang2  =  $("#sizeNameBn"+sizeId).val();
		//alert(category_name_en);
		if(sizeId == '' || size_title_lang1 == '' || size_title_lang2 == ''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "{{URL::to('saveEditSize')}}",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'size_id': sizeId, 'size_title_lang1': size_title_lang1, 'size_title_lang2': size_title_lang2}, // serializes the form's elements.
			beforeSend: function(){
				loading.show(); 
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show();  //show Edit bottom
					btn_update.hide();//hide update bottom
					$('#sizeNameEn'+sizeId).hide().prev().show().html(size_title_lang1); // convert input field to text mode
			   		$('#sizeNameBn'+sizeId).hide().prev().show().html(size_title_lang2); // convert input field to text mode
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
		$("#sizeNameEn"+id).hide().prev().show();
		$("#sizeNameBn"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======


//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveSize/"+id,
	    dataType:'json',
	    success : function(data){
		    if(data.success == true){
		    	info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);

			 	$("#sizeId"+id).removeClass('btn btn-warning btn-xs');
				$("#sizeId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="sizeId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
			    $("#sizeId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
	  	url: "activeSize/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);
				
			 	$("#sizeId"+id).removeClass('btn btn-success btn-xs');
			 	$("#sizeId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="sizeId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
		     	$("#sizeId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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
    $('#sizeDataTable').DataTable();
} );

</script>

@endsection