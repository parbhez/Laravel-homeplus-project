<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Admin
					</span>
			    </span>
            </div>
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewAdmin" aria-controls="viewAdmin" role="tab" data-toggle="tab">View Admin</a></li>
						    <li role="presentation"><a href="#addAdmin" aria-controls="addAdmin" role="tab" data-toggle="tab">Add Admin</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewAdmin">
						     	<table id="usersdataTables"  class="table table-bordered" width="100%">
						     	<thead>
										<tr>
											<th>Sl No </th>
											<th>Name</th>
											<th>Email</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
								</thead>
									<tbody>
										<?php $i=0; ?>
										<?php if(isset($admins)): ?>
											<?php foreach($admins as $admin): ?>
											<tr>
												<td class=""><?php echo e(++$i); ?></td>
												<td class="">
													<span><?php echo e($admin->full_name); ?></span>
													<input id="name<?php echo e($admin->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($admin->full_name); ?>" />
												</td>
												<td class="">
													<span><?php echo e($admin->email); ?></span>
													<input id="email<?php echo e($admin->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($admin->email); ?>" />
												</td>

												<td class="">
						      						<?php if($admin->status==1): ?>
						         	 					<label class="label label-success"> Active</label>
						      						<?php else: ?>
						          						<label class="label label-warning"> Inactive</label>
						     						<?php endif; ?>
						    					</td>
						    					<td>
						        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_<?php echo e($admin->id); ?>"><span class="fa fa-edit">&nbsp;<?php echo e(trans('common.edit')); ?></span></a>
						        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upTitle_<?php echo e($admin->id); ?>"><span class="fa fa-save">&nbsp;<?php echo e(trans('common.save')); ?></span></a>
						        					&nbsp; | &nbsp;
						        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_<?php echo e($admin->id); ?>"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  			&nbsp; | &nbsp;
						                  			<?php if($admin->status==1): ?>
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('<?php echo e($admin->id); ?>')" id="adminId<?php echo e($admin->id); ?>"><span class="fa fa-ban">&nbsp;<?php echo e(trans('common.inactive')); ?></span></a>
						                  			<?php else: ?>
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('<?php echo e($admin->id); ?>')" id="adminId<?php echo e($admin->id); ?>"><span class="fa fa-check-square-o"><?php echo e(trans('common.active')); ?></span></a>
						                  			<?php endif; ?>
						    					</td>
											</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addAdmin">
						    	<?php echo Form::open(array('route'=>'admin.post','class'=>'form-horizontal form-wrp adminForm','files'=>true)); ?>

								<div class="form-group">
									<label class="col-md-2"> Full Name :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="name" >
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> Email :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="email">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> Password :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="password">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-offset-2 col-md-2">
										<input type="submit" class="btn btn-success btn-md" value="Save">
									</div>
								</div>
							    <?php echo Form::close(); ?>

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
})
		//Custom validation Rules                                       
		//alphaspace allowed                                             

		$('.adminForm').validate({
			onkeyup: false,
			rules: {
				name: {
					required: true
				},
				email: {
					required: true
				},
				password: {
					required: true
				},
				admin_type: {
					required: true
				},
				last_login_lang: {
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
		var adminId      = arr[1];
		var btn_update  = $(this);
		var btn_edit    = $(this).prev();
		var name        = $("#name"+adminId).val();
		var email       = $("#email"+adminId).val();
		var adminType   = $("#adminType"+adminId).val();
		var adminTypeselectedText   = $("#adminType"+adminId+ " option:selected").text();
		var language    = $("#language"+adminId).val();
		var languageSelectedText    = $("#language"+adminId+ " option:selected").text();

		if(name == '' || email == '' || email == '' || adminType =='' || 'language' == ''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "<?php echo e(URL::to('saveEditAdmin')); ?>",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'admin_id': adminId, 'name': name, 'email': email,'admin_type' : adminType,'language' : language}, // serializes the form's elements.
			beforeSend: function(){
				loading.show();
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show();  //show Edit bottom
					btn_update.hide();//hide update bottom
					$('#name'+adminId).hide().prev().show().html(name); // convert input field to text mode
			   		$('#email'+adminId).hide().prev().show().html(email); // convert input field to text mode
			   		$('#adminType'+adminId).hide().prev().show().html(adminTypeselectedText);
			   		$('#language'+adminId).hide().prev().show().html(languageSelectedText);
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
		$("#name"+id).hide().prev().show();
		$("#email"+id).hide().prev().show();
		$("#adminType"+id).hide().prev().show();
		$("#language"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======


//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
$.ajax({
  url: "inactiveAdmin/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){

  	info_suc.slideDown();
	info_suc.delay(3000).slideUp(300);

		$("#adminId"+id).removeClass('btn btn-warning btn-xs');
		$("#adminId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="adminId'+id+'"><span class="fa fa-check-square-o">&nbsp;<?php echo e(trans("common.active")); ?></span></a>'); //inactive hide
		$("#adminId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
  url: "activeAdmin/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
  	info_suc.slideDown();
	info_suc.delay(3000).slideUp(300);

    $("#adminId"+id).removeClass('btn btn-info btn-xs');
    $("#adminId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="adminId'+id+'"><span class="fa fa-ban">&nbsp;<?php echo e(trans("common.inactive")); ?></span></a>'); //active hide
   $("#adminId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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
    $('#usersdataTables').DataTable();
} );



</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>