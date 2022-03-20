@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						{{trans('incomeExpense.income')}}
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewIncome" aria-controls="viewIncome" role="tab" data-toggle="tab">{{trans('incomeExpense.view_income')}}</a></li>
						    <li role="presentation"><a href="#addIncome" aria-controls="addIncome" role="tab" data-toggle="tab">{{trans('incomeExpense.add_income')}}</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewIncome">
						     	<table id="incomeDataTable"  class="table table-bordered" width="100%">
						     	    <thead>
											<tr>
												<th>#{{trans('incomeExpense.serial_no')}}</th>
												<th>{{trans('incomeExpense.income_head')}}</th>
												<th>{{trans('incomeExpense.note')}}</th>
												<th>{{trans('incomeExpense.amount')}}</th>
												<th>{{trans('incomeExpense.status')}}</th>
												<th>{{trans('incomeExpense.action')}}</th>
											</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										@if(isset($getIncomeData))
											@foreach($getIncomeData as $getIncome)
											<tr>
												<td class="">{{++$i}}</td>
												<td class="">
													<span>{{$getIncome->title_lng1}}</span>
													<select class=" form-control" name="incomeHead" id="incomeExpenseHead{{$getIncome->income_id}}" style="display:none">
														@if(isset($incomeHeads))
															@foreach($incomeHeads as $incomeHead)
																<option @if($incomeHead->id == $getIncome->income_head_id)selected @endif value="{{$incomeHead->id}}">{{$incomeHead->title_lng1}}</option>
															@endforeach
														@endif
												    </select>
												</td>
												<td class="">
													<span>{{$getIncome->comments}}</span>
													<input id="incomeComments{{ $getIncome->income_id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$getIncome->comments}}" />
												</td>

												<td class="">
													<span>{{$getIncome->amount}}</span>
													<input id="incomeAmount{{ $getIncome->income_id }}" class="incomeAmount form-control col-md-1 input-sm" required style="display: none;" type="text" maxlength="10" name="session_name" value="{{$getIncome->amount}}" />
												</td>

												<td class="">
						      						@if($getIncome->status==1)
						         	 					<label class="label label-success">Active</label>
						      						@else
						          						<label class="label label-warning">Inactive</label>
						     						@endif
						    					</td>
						    					<td>
						        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_{{ $getIncome->income_id }}"><span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span ></a>

						        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upTitle_{{ $getIncome->income_id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
						        					&nbsp; | &nbsp;
						        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $getIncome->income_id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  			&nbsp; | &nbsp;
						                  			@if($getIncome->status==1)
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('{{ $getIncome->income_id }}')" id="incomeId{{ $getIncome->income_id }}"><span class="fa fa-ban">&nbsp;{{ trans('common.inactive') }}</span></a>
						                  			@else
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('{{ $getIncome->income_id }}')" id="incomeId{{ $getIncome->income_id }}"><span class="fa fa-check-square-o">{{ trans('common.active') }}</span></a>
						                  			@endif
						    					</td>
											</tr>
											@endforeach
										@endif
									</tbody>						
								</table>
						    </div>

						    <div role="tabpanel" class="tab-pane" id="addIncome">
						    	{!!Form::open(array('route'=>'income.post','class'=>'form-horizontal form-wrp incomeForm','files'=>true))!!}

								<div class="form-group">
									<label class="col-md-2"> {{trans('incomeExpense.income_head')}}</label>
									<div class="col-md-3">
										<select class=" form-control" name="incomeHead">
											@if(isset($incomeHeads))
													<option disabled>Select Income</option>
												@foreach($incomeHeads as $incomeHead)
													<option value="{{$incomeHead->id}}">{{$incomeHead->title_lng1}}</option>
												@endforeach
											@endif
										</select>
								    </div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('incomeExpense.note')}} </label>
									<div class="col-md-3">
										<textarea class="form-control" id="comment" name="note"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('incomeExpense.amount')}} </label>
									<div class="col-md-3">
										<input type="text" maxlength="10" class="incomeAmount form-control" name="amount" >
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('incomeExpense.date')}} </label>
									<div class="col-md-3">
										<input  type="text" style="width:100%;padding:6px 6px;" placeholder="click to show datepicker" class="datepicker" name="date">
									</div>
								</div>

								<input type="hidden" class="form-control" name="username" value="{{Session::get('admin.id')}}">

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
    $('#incomeDataTable').DataTable();
});


jQuery('.incomeAmount').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$(document).ready(function(){	
		//Custom validation Rules
		//alphaspace allowed


		$('.incomeForm').validate({
			onkeyup: false,		
			rules: {
				fk_income_expense_head_id: {
					required: true
				},
				note: {
					required: true
				},
				amount: {
					required: true
				},
				date: {
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
		var data        = $(this).attr("id");
		var arr         = data.split('_');
		var incomeId    = arr[1];
		var btn_update  = $(this);  
		var btn_edit    = $(this).prev();
		var incomeExpenseHead  =  $("#incomeExpenseHead"+incomeId).val();
		var comments           =  $("#incomeComments"+incomeId).val();
		var amount             =  $("#incomeAmount"+incomeId).val();
		var selected_expense_head_text = $("#incomeExpenseHead"+incomeId+" option:selected").text();

		if(incomeId == '' || incomeExpenseHead == '' || comments == '' || amount == ''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "{{URL::to('saveEditIncome')}}",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'income_id' : incomeId,'income_expense_head_id': incomeExpenseHead, 'comments': comments, 'amount': amount}, // serializes the form's elements.
			beforeSend: function(){
				loading.show(); 
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show();  //show Edit bottom
					btn_update.hide();//hide update bottom

					$('#incomeExpenseHead'+incomeId).hide().prev().show().html(selected_expense_head_text); // convert input field to text mode
					$('#incomeComments'+incomeId).hide().prev().show().html(comments); // convert input field to text mode
			   		$('#incomeAmount'+incomeId).hide().prev().show().html(amount); // convert input field to text mode
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
		$("#incomeExpenseHead"+id).hide().prev().show();
		$("#incomeComments"+id).hide().prev().show();
		$("#incomeAmount"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======

//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveIncome/"+id,
	    dataType:'json',
	    success : function(data){
		    if(data.success == true){
		    	info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);

			 	$("#incomeId"+id).removeClass('btn btn-warning btn-xs');
				$("#incomeId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="incomeId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
			    $("#incomeId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
	  	url: "activeIncome/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);
				
			 	$("#incomeId"+id).removeClass('btn btn-info btn-xs');
			 	$("#incomeId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="incomeId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
		     	$("#incomeId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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

@endsection