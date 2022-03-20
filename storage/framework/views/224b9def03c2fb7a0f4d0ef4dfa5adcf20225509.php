
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Sub Category Details
					</span>
			    </span>
            </div>	
			<!-- START Block: Start Here -->
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewSubCategoryDetails" aria-controls="viewSubCategoryDetails" role="tab" data-toggle="tab">View Sub Category Details</a></li>
						    <li role="presentation"><a href="#addSubCategoryDetails" aria-controls="addSubCategoryDetails" role="tab" data-toggle="tab">Add Sub Category Details</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewSubCategoryDetails">
						     	<table id="subCategoryDetailsDataTable"  class="table table-bordered" width="100%">
									<thead>
									<tr>
										<th># Serial No</th>
										<th>Category Name English</th>
										<th>Sub Category Name English</th>
										<th>Sub Category Detail English</th>
										<th>Sub Category Detail Bangla</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										<?php if(isset($subCategoriesDetail)): ?>
											<?php foreach($subCategoriesDetail as $subCategoryDetails): ?>
											<tr>
												<td><?php echo e(++$i); ?></td>
												<td>
													<span><?php echo e($subCategoryDetails->category_name_lang1); ?></span>
													<select id="categoryName<?php echo e($subCategoryDetails->id); ?>" class=" form-control col-md-1 input-sm"  name="category_name_id" style="display: none;" required>
														<?php if(isset($categories)): ?>
															<?php foreach($categories as $category): ?>
																<option value="<?php echo e($category->id); ?>" <?php if($subCategoryDetails->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e($category->category_name_lang1); ?></option>
															<?php endforeach; ?>
														<?php endif; ?>
													</select>
												</td>
												<td>
													<span><?php echo e($subCategoryDetails->sub_category_name_lang1); ?></span>
													<select id="subCategoryName<?php echo e($subCategoryDetails->id); ?>" class=" form-control col-md-1 input-sm"  name="sub_category_name_id" style="display: none;" required>
														<?php if(isset($subCategories)): ?>
															<?php foreach($subCategories as $subCategory): ?>
																<option value="<?php echo e($subCategory->id); ?>" <?php if($subCategoryDetails->sub_category_id == $subCategory->id): ?> selected <?php endif; ?>><?php echo e($subCategory->sub_category_name_lang1); ?></option>
															<?php endforeach; ?>
														<?php endif; ?>
													</select>
												</td>
												<td>
													<span><?php echo e($subCategoryDetails->sub_sub_category_name_lang1); ?></span>
													<input id="subCategoryDetailsNameEn<?php echo e($subCategoryDetails->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($subCategoryDetails->sub_sub_category_name_lang1); ?>" />
												</td>
												<td>
													<span><?php echo e($subCategoryDetails->sub_sub_category_name_lang2); ?></span>
													<input id="subCategoryDetailsNameBn<?php echo e($subCategoryDetails->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($subCategoryDetails->sub_sub_category_name_lang1); ?>" />
												</td>
												<td class="">
						      						<?php if($subCategoryDetails->status==1): ?>
						         	 					<label class="label label-success"> Active</label>
						      						<?php else: ?>
						          						<label class="label label-warning"> Inactive</label>
						     						<?php endif; ?>
						    					</td>
						    					<td>
						        					<a href="javascript:;" class="btn-edit btn btn-primary btn-xs" id="editTitle_<?php echo e($subCategoryDetails->id); ?>"><span class="fa fa-edit">&nbsp;<?php echo e(trans('common.edit')); ?></span></a>
						        					<a href="javascript:;" style="display:none;" class="btn-update btn btn-primary btn-xs" id="upTitle_<?php echo e($subCategoryDetails->id); ?>"><span class="fa fa-save">&nbsp;<?php echo e(trans('common.save')); ?></span></a>
						        					&nbsp; | &nbsp;
						        					<a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_<?php echo e($subCategoryDetails->id); ?>"><span class="fa fa-refresh" title="Refresh"></span></a>
						                  			&nbsp; | &nbsp;
						                  			<?php if($subCategoryDetails->status==1): ?>
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('<?php echo e($subCategoryDetails->id); ?>')" id="categoryDetailsId<?php echo e($subCategoryDetails->id); ?>"><span class="fa fa-ban">&nbsp;<?php echo e(trans('common.inactive')); ?></span></a>
						                  			<?php else: ?>
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('<?php echo e($subCategoryDetails->id); ?>')" id="categoryDetailsId<?php echo e($subCategoryDetails->id); ?>"><span class="fa fa-check-square-o"><?php echo e(trans('common.active')); ?></span></a>
						                  			<?php endif; ?>
						    					</td>
											</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>						
								</table>
						    </div>


						    <div role="tabpanel" class="tab-pane" id="addSubCategoryDetails">
						    	<?php echo Form::open(array('route'=>'subCategoryDetails.post','class'=>'form-horizontal form-wrp subCetagoryDetails','files'=>true)); ?>

								<div class="form-group">
									<label class="col-md-2"> Select Category </label>
									<div class="col-md-3">
										<select class="form-control" name="category_name_id" id="category_name_id">
											<?php if(isset($categories)): ?>
													<option disabled>Select Sub Category</option>
												<?php foreach($categories as $category): ?>
													<option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name_lang1); ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Select Sub Category </label>
									<div class="col-md-3">
										<select class="form-control" name="sub_category_name_id" id="sub_category_name_id">
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2">Sub Category Detail English </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="sub_category_details_lng1" placeholder="Ex: Charger Light... ">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Sub Category Detail Bangla </label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="sub_category_details_lng2" placeholder="উদাঃ চার্জার লাইট...">
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
			<!-- END Block -->
        </div>

	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){	
		//Custom validation Rules
		//alphaspace allowed

		$('.subCetagoryDetails').validate({
			onkeyup: false,		
			rules: {
				sub_category_name_id: {
					required: true
				},
				sub_category_details_lng1: {
					required: true
				},
				sub_category_details_lng2: {
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
		var data                       = $(this).attr("id");
		var arr                        = data.split('_');
		var categoryDetailsId          = arr[1];
		var btn_update                 = $(this);  
		var btn_edit                   = $(this).prev();
		var category_name_id           =  $("#categoryName"+categoryDetailsId).val();
		var sub_category_name_id       =  $("#subCategoryName"+categoryDetailsId).val();
		var sub_category_details_lng1    =  $("#subCategoryDetailsNameEn"+categoryDetailsId).val();
		var sub_category_details_lng2    =  $("#subCategoryDetailsNameBn"+categoryDetailsId).val();

		if(categoryDetailsId == '' || sub_category_details_lng1 == '' || sub_category_details_lng2 == '' || category_name_id == ''){
			alert('Warning!Blank Field must be required.');
			return false;
		}
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

		$.ajax({
			url      : "<?php echo e(URL::to('saveEditSubCategoryDetails')); ?>",
			type     : "GET",
			cache    : false,
			dataType : 'json',
			data     : {'sub_category_details_id': categoryDetailsId ,'category_id':category_name_id ,'sub_category_id':sub_category_name_id,'sub_category_details_lng1': sub_category_details_lng1, 'sub_category_details_lng2': sub_category_details_lng2},
			beforeSend: function(){
				loading.show(); 
			},
			success  : function(data){
				if(data.success == true){
					info_suc.slideDown();
					info_suc.delay(3000).slideUp(300);
					btn_edit.show(); 
					btn_update.hide();

		$("#categoryName"+categoryDetailsId).hide().prev().show().html();
		$("#subCategoryName"+categoryDetailsId).hide().prev().show().html();
		$("#subCategoryDetailsNameEn"+categoryDetailsId).hide().prev().show().html(sub_category_details_lng1);
		$("#subCategoryDetailsNameBn"+categoryDetailsId).hide().prev().show().html(sub_category_details_lng2)
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
		var id    	 = arr[1];

		$("#categoryName"+id).hide().prev().show();
		$("#subCategoryName"+id).hide().prev().show();
		$("#subCategoryDetailsNameEn"+id).hide().prev().show();
		$("#subCategoryDetailsNameBn"+id).hide().prev().show();
		$(this).prev().hide().prev().show();
	})
//======@@ Refresh Opration @@======
//=======on change sub category======
$('#category_name_id').on('change', function(e) {
	var categoryId = e.target.value;
	var loader = $('.loader');
	var sub_category_name_id = $('#sub_category_name_id');

	$.ajax({
		url: 'categoryId/' + categoryId ,
		beforeSend: function() {
			loader.show();
		},
		success: function(data) {
			sub_category_name_id.empty();
			sub_category_name_id.append('<option selected disabled>Please select</option>');
			$.each(data, function(index, value) {
				sub_category_name_id.append('<option value="' + value.id + '">' + value.sub_category_name_lang1 + '</option>');
			});
			loader.hide();
		},
		error: function(data) {
			alert('error occurred! Please Check');
			loader.hide();
		}
	});

});

//===
//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveSubCategoryDetails/"+id,
	    dataType:'json',
	    success : function(data){
		    if(data.success == true){
		    	info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);

			 	$("#categoryDetailsId"+id).removeClass('btn btn-warning btn-xs');
				$("#categoryDetailsId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="categoryDetailsId'+id+'"><span class="fa fa-check-square-o">&nbsp;<?php echo e(trans("common.active")); ?></span></a>'); //inactive hide
			    $("#categoryDetailsId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
	  	url: "activeSubCategoryDetails/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		info_suc.slideDown();
				info_suc.delay(3000).slideUp(300);
				
			 	$("#categoryDetailsId"+id).removeClass('btn btn-info btn-xs');
			 	$("#categoryDetailsId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="categoryDetailsId'+id+'"><span class="fa fa-ban">&nbsp;<?php echo e(trans("common.inactive")); ?></span></a>'); //active hide
		     	$("#categoryDetailsId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
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
    $('#subCategoryDetailsDataTable').DataTable();
} );

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>