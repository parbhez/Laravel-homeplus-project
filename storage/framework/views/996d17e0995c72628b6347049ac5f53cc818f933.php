<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Category
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						 <!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewCategory" aria-controls="viewCategory" role="tab" data-toggle="tab">View Category</a></li>
						    <li role="presentation"><a href="#addCategory" aria-controls="addCategory" role="tab" data-toggle="tab">Add Category</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="viewCategory">
						     	<table id="categoryDataTable"  class="table table-bordered" width="100%">
						     	    <thead>
										<tr>
											<th># Serial No</th>
											<th>Category Name English</th>
											<th>Category Name Bangla</th>
											<th>Icon Image</th>
											<th>Is Selected</th>
											<th>View Order</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										<?php if(isset($categories)): ?>
											<?php foreach($categories as $category): ?>
											<tr>
												<td class=""><?php echo e(++$i); ?></td>
												<td class="">
													<span><?php echo e($category->category_name_lang1); ?></span>
													<input id="categoryNameEn<?php echo e($category->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($category->category_name_lang1); ?>" />
												</td>
												<td class="">
													<span><?php echo e($category->category_name_lang2); ?></span>
													<input id="categoryNameBn<?php echo e($category->id); ?>" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="<?php echo e($category->category_name_lang2); ?>" />
												</td>
												
										        <td class="">
												<?php echo HTML::image("public/images/category/icon/$category->icon", "Logo",array('class' => 'img img-thumbnail','style'=>'height:40px;width:40px;padding:0px')); ?>

										        </td>
												<td class="">
						      						<?php if($category->is_selected==1): ?>
						         	 					<label class="label label-success"> Selected</label>
						      						<?php else: ?>
						          						<label class="label label-warning"> Not Selected</label>
						     						<?php endif; ?>
						    					</td>
						    					<td class="">
						      						<?php if($category->status==1): ?>
						         	 					<label class="label label-success"> Active</label>
						      						<?php else: ?>
						          						<label class="label label-warning"> Inactive</label>
						     						<?php endif; ?>
						    					</td>
												<td class="">
													<span><?php echo e($category->view_order); ?></span>
												</td>
						    					<td>
						        					<a class="btn btn-primary btn-xs modal1"  data-toggle="modal" href="#modal" onclick="loadModalEdit('categoryEditModal','<?php echo e($category->id); ?>','action')"><span class="fa fa-edit">Edit</span></a>
						                  			&nbsp; | &nbsp;
						                  			<?php if($category->status==1): ?>
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('<?php echo e($category->id); ?>')" id="categoryId<?php echo e($category->id); ?>"><span class="fa fa-ban">&nbsp;<?php echo e(trans('common.inactive')); ?></span></a>
						                  			<?php else: ?>
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('<?php echo e($category->id); ?>')" id="categoryId<?php echo e($category->id); ?>"><span class="fa fa-check-square-o"> <?php echo e(trans('common.active')); ?></span></a>
						                  			<?php endif; ?>
						                  			
						    					</td>
						    					
											</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>						
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addCategory">
						    	<?php echo Form::open(array('route'=>'category.post','class'=>'form-horizontal form-wrp categoryForm','files'=>true)); ?>

								
								<div class="form-group">
									<label class="col-md-2"> Category Name English </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="category_name_lang1" placeholder="Ex: Electronics...">
										</div>
									</div>
								<div class="form-group">
									<label class="col-md-2"> Category Name Bangla </label>

										<div class="col-md-3">
											<input type="text" class="form-control" name="category_name_lang2" placeholder="উদাঃ ইলেক্ট্রনিক্স...">
										</div>
									</div>
								<div class="form-group">
									<label class="col-md-2"> Featured Image</label>
										<div class="col-md-3">
											<input type="file" class="" name="featured_image">
										<label>Image Must be 848 X 211 pixel</label>
									</div>
								</div>
								<div class="form-group">
										<label class="col-md-2"> Icon Image </label>
										<div class="col-md-3">
											<input type="file" class="" name="icon_image">
										<label>Image Must be 20 X 20 pixel</label>
									</div>
								</div>
								<div class="form-group">
										<label class="col-md-2"> Is Selected </label>
										<div class="col-md-3">
										<select name="is_selected" class="form-control">
											<option value="0" selected>Not Selected</option>
											<option value="1">Selected</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2"> View Order </label>
									<div class="col-md-3">
										<input type="number" class="form-control" name="view_order">
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
		$('.categoryForm').validate({
			onkeyup: false,		
			rules: {
				category_name_lng1: {
					required: true
				},
				category_name_lng2: {
					required: true
				},
				featured_image: {
					required: true
				},
				icon_image: {
					//required: true
				}
			},
		  	submitHandler: function(form) {
		  		form.submit();
		  	}
		});

	});

	$('.modal1').on('click',function(){
	   $('.modal-title').html('Edit Category');
	   $('.modal-content').removeClass('modal-big');
	   $('.modal-content').addClass('modal-small'); 
	})

//======@@ Save btn function @@========
	var db_err       = $('.db-error');
	var inactive_msg = $('.inactive-msg');
	var active_msg   = $('.active-msg');
	var loading   = $('.loading');
//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
	$.ajax({
	    url: "inactiveCategory/"+id,
	    dataType:'json',
	    beforeSend: function(){
	    	loading.show();
	    },
	    success : function(data){
		    if(data.success == true){
		    	inactive_msg.slideDown().delay(3000).slideUp(300);

			 	$("#categoryId"+id).removeClass('btn btn-warning btn-xs');
				$("#categoryId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="categoryId'+id+'"><span class="fa fa-check-square-o">&nbsp;<?php echo e(trans("common.active")); ?></span></a>'); //inactive hide
			    $("#categoryId"+id).prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
		    }else{         
				db_err.hide().find('label').empty();
				db_err.find('label').append(data.status); 
				db_err.slideDown();
				db_err.delay(5000).slideUp(300);
			}
			loading.hide();
	    }
	});
	return true;
}

//===@@ Active Operation @@=====

function activeConfirm(id){
	$.ajax({
	  	url: "activeCategory/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
		  		active_msg.slideDown().delay(3000).slideUp(300);
				active_msg.hide();
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

$(document).ready(function(){
    $('#categoryDataTable').DataTable();
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>