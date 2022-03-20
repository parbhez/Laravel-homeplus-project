<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Sub Category
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
						    <li role="presentation" class="active"><a href="#viewSubCategory" aria-controls="viewSubCategory" role="tab" data-toggle="tab">View Sub Category</a></li>
						    <li role="presentation"><a href="#addSubCategory" aria-controls="addSubCategory" role="tab" data-toggle="tab">Add Sub Category</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewSubCategory">
						     	<table id="subCategoryDataTable" class="table table-bordered" width="100%">
									<thead>
										<tr>
											<th># Serial No</th>
											<th>Category Name English</th>
											<th>Sub Category Name English</th>
											<th>Sub Category Name Bangla</th>
											<th>View Order</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										<?php if(isset($subCategories)): ?>
											<?php foreach($subCategories as $subCategory): ?>
											<tr>
												<td><?php echo e(++$i); ?></td>
												<td>
													<span><?php echo e($subCategory->category_name_lang1); ?></span>
													<select id="categoryNameEn<?php echo e($subCategory->id); ?>" class=" form-control col-md-1 input-sm"  name="category_name_id" style="display: none;" required>
														<?php if(isset($categories)): ?>
															<?php foreach($categories as $category): ?>
																<option value="<?php echo e($category->id); ?>" <?php if($subCategory->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e($category->category_name_lang1); ?></option>
															<?php endforeach; ?>
														<?php endif; ?>
													</select>
												</td>
												<td>
													<span><?php echo e($subCategory->sub_category_name_lang1); ?></span>
													<input id="subCategoryNameEn<?php echo e($subCategory->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($subCategory->sub_category_name_lang1); ?>" />
												</td>
												<td>
													<span><?php echo e($subCategory->sub_category_name_lang2); ?></span>
													<input id="subCategoryNameBn<?php echo e($subCategory->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($subCategory->sub_category_name_lang2); ?>" />
												</td>
												<td class="">
						      						<?php if($subCategory->status==1): ?>
						         	 					<label class="label label-success"> Active</label>
						      						<?php else: ?>
						          						<label class="label label-warning"> Inactive</label>
						     						<?php endif; ?>
						    					</td>
												<td>
													<span><?php echo e($subCategory->view_order); ?></span>
												</td>
						    					<td>
						                  			<a class="btn btn-primary btn-xs modal1"  data-toggle="modal" href="#modal" onclick="loadModalEdit('subCategoryEditModal',<?php echo e($subCategory->id); ?>,'action')"><span class="fa fa-edit">Edit</span></a>
						                  			&nbsp; | &nbsp;
						                  			<?php if($subCategory->status==1): ?>
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('<?php echo e($subCategory->id); ?>')" id="categoryId<?php echo e($subCategory->id); ?>"><span class="fa fa-ban">&nbsp;<?php echo e(trans('common.inactive')); ?></span></a>
						                  			<?php else: ?>
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('<?php echo e($subCategory->id); ?>')" id="categoryId<?php echo e($subCategory->id); ?>"><span class="fa fa-check-square-o"><?php echo e(trans('common.active')); ?></span></a>
						                  			<?php endif; ?>
						    					</td>
											</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>						
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addSubCategory">
						    	<?php echo Form::open(array('route'=>'subCategory.post','class'=>'form-horizontal form-wrp subCetagorieForm','files'=>true)); ?>

								<div class="form-group">
									<label class="col-md-2"> Select Category</label>
									<div class="col-md-3">
										<select class="form-control" name="category_name_id">
											<?php if(isset($categories)): ?>
													<option disabled>Select Category</option>
												<?php foreach($categories as $category): ?>
													<option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name_lang1); ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> Sub Category Name English</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="sub_category_name_lang1" placeholder="Ex: Light...">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2">Sub Category Name Bangla
									</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="sub_category_name_lang2" placeholder="উদাঃ লাইট...">  
									</div>
								</div>
								<div class="form-group" style="">
									<label class="col-md-2">View Order
									</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="view_order" placeholder="">  
									</div>
								</div>
								<div class="form-group" style="display: none">
									<label class="col-md-2"> Featured Image </label>
									<div class="col-md-3">
										<input type="file" class="" name="sub_category_icon">
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

		$('.subCetagorieForm').validate({
			onkeyup: false,		
			rules: {
				sub_category_name_lng1: {
					required: true
				},
				sub_category_name_lng2: {
					required: true
				},
				sub_category_icon: {
					//required: true
				},
				
			},
		  	submitHandler: function(form) {
		  		form.submit();
		  	}
		});

	});


	$('.modal1').on('click',function(){
	   $('.modal-title').html('Edit Sub-Category');
	   $('.modal-content').removeClass('modal-big');
	   $('.modal-content').addClass('modal-small'); 
	})
//======@@ Save btn function @@========
	var db_err       = $('.db-error');
	var inactive_msg = $('.inactive-msg');
	var active_msg   = $('.active-msg');

//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveSubCategory/"+id,
	    dataType:'json',
	    success : function(data){
		    if(data.success == true){
		    	inactive_msg.slideDown();
				inactive_msg.delay(3000).slideUp(300);

			 	$("#categoryId"+id).removeClass('btn btn-warning btn-xs');
				$("#categoryId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="categoryId'+id+'"><span class="fa fa-check-square-o">&nbsp;<?php echo e(trans("common.active")); ?></span></a>'); //inactive hide
			    $("#categoryId"+id).prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
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
	  	url: "activeSubCategory/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		active_msg.slideDown();
				active_msg.delay(3000).slideUp(300);
				
			 	$("#categoryId"+id).removeClass('btn btn-info btn-xs');
			 	$("#categoryId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="categoryId'+id+'"><span class="fa fa-ban">&nbsp;<?php echo e(trans("common.inactive")); ?></span></a>'); //active hide
		     	$("#categoryId"+id).prev().parent().prev().html("<label class='label label-success'>Active</label>");
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
    $('#subCategoryDataTable').DataTable();
} );

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>