@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Showing Products for Merchant : 
						<span class="marchant-name" style="color: blue;"></span>
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
						    <li role="presentation" class="active"><a href="#viewProduct" aria-controls="viewProduct" role="tab" data-toggle="tab"> View Product </a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active table-responsive" id="viewProduct">
						     	<table id="productDataTable" class="table table-bordered table-hover" width="100%">
						     	    <thead>
										<tr>
											<th># Sl No</th>
											<th>Category Name</th>
											<th>Code</th>
											<th>Name</th>
											<th>Product Picture</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Available</th>
											<th>Commission</th>
											<th>Placement</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
								    </thead>
									<tbody>
										<?php 
											$i=0;
											$lang=Session::get('last_login_lang'); 
										?>
										
										@if(isset($merchantProduct))
											@foreach($merchantProduct as $product)
											<tr>
												<td>{{++$i}} </td>
												<td>{{$product->category_name_lang1}}</td>
												<td>{{$product->product_code}}</td>
												<td>{{$product->product_name_lang1}}</td>
												<td align="center">
													<img height="55" width="55" src="{{URL::to('public/images/product').'/'.$product->image_path}}">
												</td>
												<td>{{$product->sale_price}}</td>
												<td>{{$product->discount}}</td>
												<td>{{$product->quantity}}</td>
												<td>{{$product->commission}}</td>
												<td>
													@if($product->placement_type == 1)
														<label class="label label-success"> Normal</label>
													@elseif($product->status == 2)
														<label class="label label-primary"> Slider</label>
													@elseif($product->status == 3)
														<label class="label label-danger"> Selected</label>
													@endif
												</td>
												<td>
													@if($product->status == 0)
														<label class="label label-warning" id="pending{{$product->id}}"> Pending</label>
													@elseif($product->status == 1)
														<label class="label label-success product-status" id="pending{{$product->id}}"> Approved</label>
													@elseif($product->status == 2)
														<label class="label label-danger product-status" id="denied{{$product->id}}"> Denied</label>
													@endif
												</td>
												<td>
													<div class="btn-group btn-xs ">
													<button class="btn btn-primary btn-xs dropdown" data-toggle="dropdown" type="button">
														Action
														<span class="caret"></span>
														<span class="sr-only">
															Toggle Dropdown
														</span>
													</button>
													<ul role="menu" class="dropdown-menu">
														<li>
															<a href="{{URL::to('productEditView').'/'.$product->id}}">
																<span class="fa fa-edit">&nbsp; Edit</span>
															</a>
														</li>
														@if($product->status == 0)
															<li id="productActiveId{{$product->id}}">
																<a href="{{URL::to('activeProduct').'/'.$product->id}}">
																	<span class="fa fa-check-square-o">
																		&nbsp; Approve
																	</span>
																</a>
															</li>
															<li id="productActiveId{{$product->id}}">
																<a href="{{URL::to('denyProduct').'/'.$product->id}}">
																	<span class="fa fa-times">
																		&nbsp; Deny
																	</span>
																</a>
															</li>
														@elseif($product->status == 2)
															<li id="productActiveId{{$product->id}}">
																<a href="{{URL::to('activeProduct').'/'.$product->id}}">
																	<span class="fa fa-check-square-o">
																		&nbsp; Approve
																	</span>
																</a>
															</li>
														@elseif($product->status == 1)
															<li id="productActiveId{{$product->id}}">
																<a href="{{URL::to('denyProduct').'/'.$product->id}}">
																	<span class="fa fa-check-square-o">
																		&nbsp; Deny
																	</span>
																</a>
															</li>
														@endif
														<li>
															<a href="#modal" data-toggle="modal" class="modal1" onclick="loadModalEdit('singleProductDetailsModal','{{ $product->id}}','view')">
																<span class="fa fa-list">&nbsp; Details </span>
															</a>
														</li>
													</ul>
												</div>
												</td>
											</tr>
												@if($i < 2)
													<script type="text/javascript">
														$(".marchant-name").html('{{$product->company_name}}'); 
													</script>
												@endif
											@endforeach
										@endif

									</tbody>						
								</table>
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

@include('backend.ajax.ajaxGlobalVar');

<script type="text/javascript">

$(document).ready(function(){	
		$('.productForm').validate({
			onkeyup: false,		
			rules: {
				amount: {
					required: true
				},
				sub_category_name_id: {
					required: true
				},
				sub_category_details_name_id: {
					required: true
				},
				product_name_lng1: {
					required: true
				},
				product_name_lng2: {
					required: true
				},
				title_lng1: {
					required: true
				},
				title_lng2: {
					required: true
				},
				features_lng1: {
					required: true
				},
				features_lng2: {
					required: true
				},
				supports_lng1: {
					required: true
				},
				supports_lng2: {
					required: true
				},
				available: {
					required: true
				},
			},
		  	submitHandler: function(form) {
		  		form.submit();
		  	}
		});

	});

	$('.modal1').on('click',function(){
	   $('.modal-title').html('Product Details');
	   $('.modal-content').removeClass('modal-lg');
	   $('.modal-content').addClass('modal-lg'); 
	})


//======@@ Get Categroy Wise SubCategory @@======
	$("#category_select").on('change',function(e){
		var loader = $(".loader");
		var categoryId  = e.target.value;
		var groupOption = $("#sub_category_select");
		$.ajax({
                url: 'getCategoryWiseSubCategory/' + categoryId ,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    loader.show();
                },
                success: function(data) {
                    groupOption.empty();
                    groupOption.append('<option value="" selected disabled>Select Sub Category</option>');
                    $.each(data, function(index, value) {
                        groupOption.append('<option value="' + value.id + '">' + value.sub_category_name_lng1 + '</option>');
                    });
                    loader.hide();

                },
                error: function(data) {
                    alert('error occurred! Please Check');
                    loader.hide();
                }
            });
	})
//======@@ Get Categroy Wise SubCategory @@======

//======@@ Get Categroy Wise SubCategory @@======
	$("#sub_category_select").on('change',function(e){
		var loader = $(".loader1");
		var subCategoryId  = e.target.value;
		var groupOption = $("#sub_category_details_select");
		$.ajax({
                url: 'getSubCategoryWiseSubCategoryDetails/' + subCategoryId ,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    loader.show();
                },
                success: function(data) {
                    groupOption.empty();
                    groupOption.append('<option value="" selected disabled>Select Sub Category</option>');
                    $.each(data, function(index, value) {
                        groupOption.append('<option value="' + value.id + '">' + value.sub_category_details_lng1 + '</option>');
                    });
                    loader.hide();

                },
                error: function(data) {
                    alert('error occurred! Please Check');
                    loader.hide();
                }
            });
	})

	$(".btn-add-image").on('click',function(e){
		var content = ''
		 content +='<div class="form-group">'+
						'<label class="col-md-2 product-image"> Product Image </label>'+
						'<div class="col-md-3">'+
							'<input type="file" class="" name="image[]">'+
						'</div>'+
						'<label class="col-md-2"> Image Title </label>'+
						'<div class="col-md-3">'+
							'<input type="text"  class="form-control" name="image_title[]">'+
						'</div>'+
						'<div class="col-md-1">'+
							'<button type="button" class="btn btn-xs btn-warning btn-remove-image" title="Add More Image"><span class="fa fa-minus"></span></button>'+
						'</div>'+
					'</div>';
		$(".load-dynamic-image-content").append(content);
	});

	$(document).on('click', '.btn-remove-image', function(){
		$(this).parent().prev().prev().prev().prev().parent().remove();
	});

	$(document).ready(function(){
    $('#productDataTable').DataTable();
});

</script>

@endsection