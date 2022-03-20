
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						User
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewUser" aria-controls="viewUser" role="tab" data-toggle="tab">View User</a></li>
						    
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewUser">
						     	<table id="UsersdataTables"  class="table table-bordered" width="100%">
						     	<thead>
										<tr>
											<th># SL No </th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Mobile No</th>
											<th>Address</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										</thead>
									<tbody>
										<?php $i=0; ?>
										<?php if(isset($users)): ?>
											<?php foreach($users as $user): ?>
											<tr>
												<td class=""><?php echo e(++$i); ?></td>
												<td class="">
													<span><?php echo e($user->full_name); ?></span>
													<input id="fullName<?php echo e($user->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($user->full_name); ?>" />
												</td>
												<td class="">
													<span><?php echo e($user->email); ?></span>
													<input id="email<?php echo e($user->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($user->email); ?>" />
												</td>

												<td class="">
													<span><?php echo e($user->mobile_no); ?></span>
													<input id="mobileNo<?php echo e($user->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($user->mobile_no); ?>" />
												</td>
												<td class="">
													<span><?php echo substr($user->address, 0,50); ?>...</span>
													<input id="address<?php echo e($user->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($user->address); ?>" />
												</td>
												<td class="">
						      						<?php if($user->status==1): ?>
						         	 					<label class="label label-success"> Active</label>
						      						<?php else: ?>
						          						<label class="label label-warning"> Inactive</label>
						     						<?php endif; ?>
						    					</td>
						    					<td>
						        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_<?php echo e($user->id); ?>"><span class="fa fa-edit">&nbsp;<?php echo e(trans('common.edit')); ?></span></a>
						        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upTitle_<?php echo e($user->id); ?>"><span class="fa fa-save">&nbsp;<?php echo e(trans('common.save')); ?></span></a>
						        					&nbsp; | &nbsp;
						        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_<?php echo e($user->id); ?>"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  			&nbsp; | &nbsp;
						                  			<?php if($user->status==1): ?>
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('<?php echo e($user->id); ?>')" id="userId<?php echo e($user->id); ?>"><span class="fa fa-ban">&nbsp;<?php echo e(trans('common.inactive')); ?></span></a>
						                  			<?php else: ?>
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('<?php echo e($user->id); ?>')" id="userId<?php echo e($user->id); ?>"><span class="fa fa-check-square-o"><?php echo e(trans('common.active')); ?></span></a>
						                  			<?php endif; ?>
						    					</td>
											</tr>
											<?php endforeach; ?>
										<?php endif; ?>
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
//======@@ Edit btn function @@========
	$('.btn-edit').on('click', function(){
	    $(this).parent().prev().prev().prev().prev().prev().children().next().show().prev().hide();
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
		var userId      = arr[1];
		var btn_update  = $(this);  
		var btn_edit    = $(this).prev();
		var full_name   = $("#fullName"+userId).val();
		var email       = $("#email"+userId).val();
		var mobile_no   = $("#mobileNo"+userId).val();
		var address 	= $("#address"+userId).val();

		if(userId == '' || full_name == '' || email == '' || mobile_no ==''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "<?php echo e(URL::to('saveEditUser')); ?>",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'user_id': userId, 'full_name': full_name, 'email': email,'mobile_no' : mobile_no, 'address' : address}, // serializes the form's elements.
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
			   		$('#address'+userId).hide().prev().show().html(address);
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

  	info_suc.slideDown();
	info_suc.delay(3000).slideUp(300);

		$("#userId"+id).removeClass('btn btn-warning btn-xs');
		$("#userId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="userId'+id+'"><span class="fa fa-check-square-o">&nbsp;<?php echo e(trans("common.active")); ?></span></a>'); //inactive hide
		$("#userId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
  url: "activeUser/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
  	info_suc.slideDown();
	info_suc.delay(3000).slideUp(300);

    $("#userId"+id).removeClass('btn btn-success btn-xs');
    $("#userId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="userId'+id+'"><span class="fa fa-ban">&nbsp;<?php echo e(trans("common.inactive")); ?></span></a>'); //active hide
   $("#userId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>