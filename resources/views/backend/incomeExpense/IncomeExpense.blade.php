@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Income-Expense
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#addIncome" aria-controls="addIncome" role="tab" data-toggle="tab">Add Incomes</a></li>
						    <li role="presentation"><a href="#addExpense" aria-controls="addExpense" role="tab" data-toggle="tab">Add Expenses</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    
						    <div role="tabpanel" class="tab-pane active" id="addIncome">
						    	{!!Form::open(array('route'=>'income.post','class'=>'form-horizontal form-wrp','files'=>true))!!}
								<div class="form-group">
									<label class="col-md-2"> Income Head </label>
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
									<label class="col-md-2"> Note </label>
									<div class="col-md-3">
										<textarea class="form-control" id="comment" name="note"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> Amount </label>
									<div class="col-md-3">
										<input type="number" class="form-control" name="amount" >
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> Date </label>
									<div class="col-md-3">
										<input  type="text" style="width:100%;padding:6px 6px;" placeholder="click to show datepicker"  id="example2">
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

						    <div role="tabpanel" class="tab-pane" id="addExpense">
						    	{!!Form::open(array('route'=>'Expense.post','class'=>'form-horizontal form-wrp','files'=>true))!!}

								<div class="form-group">
									<label class="col-md-2" > Expense Head</label>
									<div class="col-md-3">
										<select class="form-control" name="expenseHead">
											@if(isset($incomeHeads))
													<option disabled>Select Expense</option>
												@foreach($incomeHeads as $incomeHead)
													<option value="{{$incomeHead->id}}">{{$incomeHead->title_lng2}}</option>
												@endforeach
											@endif
										</select>
									</div>
								</div>


								<div class="form-group">
									<label class="col-md-2"> Note </label>
									<div class="col-md-3">
										<textarea class="form-control" id="comment" name="note"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> Amount </label>
									<div class="col-md-3">
										<input type="number" class="form-control" name="amount">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> Date </label>
									<div class="col-md-3">
										<input  type="text" style="width:100%;padding:6px 6px;" placeholder="click to show datepicker"  class="datepicker" name="date">
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
//======@@ Edit btn function @@========
	$('.btn-edit').on('click', function(){
	    $(this).parent().prev().prev().prev().prev().prev().children().next().show().prev().hide();
	    $(this).parent().prev().prev().prev().prev().children().next().show().prev().hide();
	    $(this).parent().prev().prev().prev().children().next().show().prev().hide();
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
		var userId      = arr[1];
		var btn_update  = $(this);  
		var btn_edit    = $(this).prev();
		var full_name   = $("#fullName"+userId).val();
		var email       = $("#email"+userId).val();
		var mobile_no   = $("#mobileNo"+userId).val();

		if(userId == '' || full_name == '' || email == '' || mobile_no ==''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "{{URL::to('saveEditUser')}}",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'user_id': userId, 'full_name': full_name, 'email': email,'mobile_no' : mobile_no,}, // serializes the form's elements.
			beforeSend: function(){
				loading.show(); 
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show();  //show Edit bottom
					btn_update.hide();//hide update bottom
					$('#fullName'+userId).hide().prev().show().html(full_name); // convert input field to text mode
			   		$('#email'+userId).hide().prev().show().html(email); // convert input field to text mode
			   		$('#mobileNo'+userId).hide().prev().show().html(mobile_no);
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
		$("#fullName"+id).hide().prev().show();
		$("#email"+id).hide().prev().show();
		$("#mobileNo"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======


//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
$.ajax({
  url: "inactiveUser/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
    $("#userId"+id).removeClass('btn btn-warning btn-xs');
    $("#userId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="userId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
   $("#userId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
    } 
  }
});
return true;

}

//===@@ Active Operation @@=====

function activeConfirm(id){
$.ajax({
  url: "activeUser/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
    $("#userId"+id).removeClass('btn btn-info btn-xs');
    $("#userId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="userId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
   $("#userId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
    } 
  }
});
return true;

}

$(document).ready(function() {
    $('#UsersdataTables').DataTable({
        "ajax": "data.txt"
    });
} );

</script>

@endsection