@extends('backend.app')
@section('content')
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
										@if(isset($subCategories))
											@foreach($subCategories as $subCategory)
											<tr>
												<td>{{++$i}}</td>
												<td>
													<span>{{$subCategory->category_name_lang1}}</span>
													<select id="categoryNameEn{{ $subCategory->id }}" class=" form-control col-md-1 input-sm"  name="category_name_id" style="display: none;" required>
														@if(isset($categories))
															@foreach($categories as $category)
																<option value="{{$category->id}}" @if($subCategory->category_id == $category->id) selected @endif>{{$category->category_name_lang1}}</option>
															@endforeach
														@endif
													</select>
												</td>
												<td>
													<span>{{$subCategory->sub_category_name_lang1}}</span>
													<input id="subCategoryNameEn{{ $subCategory->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$subCategory->sub_category_name_lang1}}" />
												</td>
												<td>
													<span>{{$subCategory->sub_category_name_lang2}}</span>
													<input id="subCategoryNameBn{{ $subCategory->id }}" class=" form-control col-md-1 input-sm" required style="display: none;" type="text" name="session_name" value="{{$subCategory->sub_category_name_lang2}}" />
												</td>
												<td class="">
						      						@if($subCategory->status==1)
						         	 					<label class="label label-success"> Active</label>
						      						@else
						          						<label class="label label-warning"> Inactive</label>
						     						@endif
						    					</td>
												<td>
													<span>{{$subCategory->view_order}}</span>
												</td>
						    					<td>
						                  			<a class="btn btn-primary btn-xs modal1"  data-toggle="modal" href="#modal" onclick="loadModalEdit('subCategoryEditModal',{{ $subCategory->id}},'action')"><span class="fa fa-edit">Edit</span></a>
						                  			&nbsp; | &nbsp;
						                  			@if($subCategory->status==1)
						        					 <a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('{{ $subCategory->id }}')" id="categoryId{{ $subCategory->id }}"><span class="fa fa-ban">&nbsp;{{ trans('common.inactive') }}</span></a>
						                  			@else
						                    		<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('{{ $subCategory->id }}')" id="categoryId{{ $subCategory->id }}"><span class="fa fa-check-square-o">{{ trans('common.active') }}</span></a>
						                  			@endif
						    					</td>
											</tr>
											@endforeach
										@endif
									</tbody>						
								</table>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="addSubCategory">
						    	{!!Form::open(array('route'=>'subCategory.post','class'=>'form-horizontal form-wrp subCetagorieForm','files'=>true))!!}
								<div class="form-group">
									<label class="col-md-2"> Select Category</label>
									<div class="col-md-3">
										<select class="form-control" name="category_name_id">
											@if(isset($categories))
													<option disabled>Select Category</option>
												@foreach($categories as $category)
													<option value="{{$category->id}}">{{$category->category_name_lang1}}</option>
												@endforeach
											@endif
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
							    {!!Form::close()!!}
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
				$("#categoryId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="categoryId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
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
			 	$("#categoryId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="categoryId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
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

@endsection