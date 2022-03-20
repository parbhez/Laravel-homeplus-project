@extends('backend.app')
@section('content')
<?php $i=0;?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Product Edit
					</span>
			    </span>
            </div>	
			<!-- START Block: Start Here -->
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
					<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#productDetails" aria-controls="productDetails" role="tab" data-toggle="tab">Product Details</a></li>
						    <li role="presentation"><a href="#ProductProperties" aria-controls="ProductProperties" role="tab" data-toggle="tab"> Product Properties </a></li>
						    <li role="presentation"><a href="#productImage" aria-controls="productImage" role="tab" data-toggle="tab"> Product Image </a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="productDetails">
						   		{!!Form::open(array('route'=>'editProductDetails.post','class'=>'form-horizontal form-wrp productDetailsForm','files'=>true))!!}
						   			<input type="hidden" name="product_id" value="{{$product['product']->product_id}}">
						   			<div class="form-group">
										<label class="col-md-2"> Select Category </label>
										<div class="col-md-3">
											<select class="form-control" id="category_select" name="category_name_id" >
												@if(isset($categories))
													<option disabled>Select Categorysdafasf</option>
													@foreach($categories as $category)
													<option value="{{$category->id}}" @if($product['product']->category_id == $category->id)selected @endif >{{$category->category_name_lng1}}</option>
													@endforeach
												@endif
											</select>
										</div>
										<label class="col-md-2"> Select Sub-Category </label>
										<div class="col-md-3">
											<span class='loader' style="display:none;"><img src="{{URL::to('public/icons/ajax-loader.gif')}}" alt="loading"></span>  
											<select class="form-control" id="sub_category_select" name="sub_category_name_id">
												<option value="{{$product['product']->sub_category_id}}">{{$product['product']->sub_category_name_lng1}}</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Select Sub-Category Details </label>
										<div class="col-md-3">
											<span class='loader1' style="display:none;"><img src="{{URL::to('public/icons/ajax-loader.gif')}}" alt="loading"></span>  
											<select class="form-control" id="sub_category_details_select" name="sub_category_details_name_id">
												<option value="{{$product['product']->sub_details_category_id}}">{{$product['product']->sub_category_details_lng1}}</option>
											</select>
										</div>
										<label class="col-md-2"> Select Brand </label>
										<div class="col-md-3">
											<select class="form-control" name="brand_name_id">
												@if(isset($brands))
													<option disabled>Select Category</option>
													@foreach($brands as $brand)
														<option value="{{$brand->id}}" @if($product['product']->brand_id == $brand->id)selected @endif>{{$brand->brand_name_lng1}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Product Name English </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="product_name_lng1" value="{{$product['product']->product_name_lng1}}">
										</div>
										<label class="col-md-2"> Product Name Bangla </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="product_name_lng2" value="{{$product['product']->product_name_lng2}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Product Title English </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="title_lng1" value="{{$product['product']->title_lng1}}">
										</div>
										<label class="col-md-2"> Product Title Bangla </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="title_lng2" value="{{$product['product']->title_lng2}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Features English </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="features_lng2" value="{{$product['product']->features_lng1}}">
										</div>
										<label class="col-md-2"> Features Bangla </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="features_lng1" value="{{$product['product']->features_lng2}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Supports English</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="supports_lng2" value="{{$product['product']->features_lng1}}">
										</div>
										<label class="col-md-2"> Support Bangla </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="supports_lng1" value="{{$product['product']->features_lng2}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Price </label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="amount" value="{{$product['product']->amount}}">
										</div>
										<label class="col-md-2"> Ex-Price</label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="ex_amount" value="{{$product['product']->ex_amount}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Discount </label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="discount" value="{{$product['product']->discount}}">
										</div>
										<label class="col-md-2"> Available </label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="available" value="{{$product['product']->available}}">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-2 col-md-2">
											<input type="submit" class="btn btn-success btn-md" value="Save">
										</div>
									</div>
						   		{!!Form::close()!!}
						    </div>
						    <div role="tabpanel" class="tab-pane" id="ProductProperties">
						    	{!!Form::open(array('route'=>'editProductProperties.post','class'=>'form-horizontal form-wrp productPropertiesForm','files'=>true))!!}
						   			<input type="hidden" name="product_id" value="{{$product['product']->product_id}}">
						   			<div class="form-group">
										<label class="col-md-2"> Select Color </label>
										<div class="col-md-3">
											<select class="form-control chosen-select" id="" name="color_id[]" data-placeholder="Select Color" multiple tabindex="6">
												@if(isset($colors))
													@foreach($product['colors'] as $selectedColor)
														@foreach($colors as $color)
															<option value="{{$color->id}}" @if($selectedColor->color_id == $color->id) selected @endif>{{$color->color_name_lng1}}</option>
														@endforeach
													@endforeach
												@endif
											</select>
										</div>
										<label class="col-md-2"> Select Size </label>
										<div class="col-md-3">
											<select class="form-control chosen-select" id="" name="size_id[]" data-placeholder="Seelect Size" multiple tabindex="6">
												@if(isset($sizes))
													@foreach($product['sizes'] as $selectedSizes)
														@foreach($sizes as $size)
															<option value="{{$size->id}}" @if($selectedSizes->size_id == $size->id) selected @endif>{{$size->size_title_lng1}}</option>
														@endforeach
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Specification </label>
										<div class="col-md-3" style="width: 290px; height: 300px; overflow-y: scroll; overflow-x: hidden;">
											<table class="table table-stripped">
												<tr>
													<th>Select</th>
													<th>Title</th>
													<th>Desciption</th>
												</tr>
												<tbody>
												@if(isset($sizes))
													@foreach($product['specifications'] as $selectedSpecifications)
														@foreach($specifications as $specification)
														<? ++$i; ?>
															<tr>
																<td><input type="checkbox" name="specification_id_{{$i}}" value="{{$specification->id}}" @if($selectedSpecifications->specification_id == $specification->id)checked @endif></td>
																<td>{{$specification->title_name_lng1}}</td>
																<td><input type="text" name="details_{{$i}}" class="form-control" @if($selectedSpecifications->specification_id == $specification->id) value="{{$selectedSpecifications->details}}" @else value="" @endif></td>
															</tr>
														@endforeach
													@endforeach
												@endif
												 <input type="hidden" name="index" value=" {{ $i }}">
												</tbody>
											</table>
										</div>
										<label class="col-md-2"> Select Tag</label>
										<div class="col-md-3">
											<select class="form-control chosen-select" id="" name="tag_name_id[]" data-placeholder="Select Tag" multiple tabindex="6">
												@if(isset($tags))
													@foreach($product['tags'] as $selectedTag)
														@foreach($tags as $tag)
															<option value="{{$tag->id}}" @if($selectedTag->tag_id == $tag->id) selected @endif>{{$tag->tag_name_lng1}}</option>
														@endforeach
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-2 col-md-2">
											<input type="submit" class="btn btn-success btn-md product-properties-btn" value="Save">
										</div>
									</div>
						   		{!!Form::close()!!}
						    </div>
						    <div role="tabpanel" class="tab-pane" id="productImage">
						    	<div class="row">
						    		@if(isset($product['images']))
										@foreach($product['images'] as $productImage)
											<div class="col-md-2" style="padding-bottom: 40px" >
											    <div class="removeImage" id="removeImage_{{$productImage->id}}" data-type="{{$productImage->image_type}}" data-path="{{$productImage->image_path}}">
												    <a href="">
												     	<i class="fa fa-remove " style="z-index: 11; float:right; margin-right:25px; margin-bottom: -40px"> </i>
												    </a>
											     </div>
											    <div> 
												   <img src="{{URL::to('/public/images/product').'/'.$productImage->image_path}}" width="150" height="150">
											    </div>
											</div>
										@endforeach
									@endif
						    	</div>
						    	{!!Form::open(array('route'=>'editProductImage.post','class'=>'form-horizontal form-wrp productImageForm','files'=>true))!!}
						   			<input type="hidden" name="product_id" value="{{$product['product']->product_id}}">
						   			<div class="form-group">
										<label class="col-md-2 product-image"> Product Image </label>
										<div class="col-md-3">
											<input type="file" class="" name="image[]">
										</div>
										<label class="col-md-2"> Image Title </label>
										<div class="col-md-3">
											@if(isset($product['images']))
												@foreach($product['images'] as $productImage)
													@if($productImage->image_type == 1)
														<input type="text"  class="form-control" name="image_title[]" value="{{$productImage->image_title}}">
													@endif
												@endforeach
											@endif
										</div>
										<div class="col-md-1">
											<button type="button" class="btn btn-xs btn-success btn-add-image" title="Add More Image"><span class="fa fa-plus" style=""></span></button>
										</div>
									</div>
									<!-- Start load Dynamic Image -->
										<div class="load-dynamic-image-content"></div>
									<!-- End load Dynamic Image -->
									<div class="form-group">
										<div class="col-md-offset-2 col-md-2">
											<input type="submit" class="btn btn-success btn-md product-image-btn" value="Save">
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

$(".product-properties-btn").on('click',function(e){
	e.preventDefault();
	$(".productPropertiesForm").submit();
})
$(".product-image-btn").on('click',function(e){
	e.preventDefault();
	$(".productImageForm").submit();
	
})

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


//======@@ Get Categroy Wise SubCategory @@======
	$("#category_select").on('change',function(e){
		var loader = $(".loader");
		var categoryId  = e.target.value;
		var groupOption = $("#sub_category_select");
		$.ajax({
                url: "{{URL::to('getCategoryWiseSubCategory')}}"+'/'+categoryId ,
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
                url: '{{URL::to('getSubCategoryWiseSubCategoryDetails')}}/' + subCategoryId ,
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

	$('.removeImage').on('click',function(e){
		e.preventDefault();

		var data = $(this).attr('id');
		var dataArr = data.split('_');
		var id = dataArr[1];
		image_type = $('#removeImage_'+id).attr("data-type");
		image_path = $('#removeImage_'+id).attr("data-path");

		if (parseInt(image_type) == 1) {
			alert("Main Image Condn't Deleted");
			return false;
		}

		$.ajax({
		  	url: "{{URL::to('removeImage')}}",
		  	dataType:'json',
		  	data : {'image_id':id,'image_type':image_type,'image_path':image_path},
		  	beforeSend: function() {
                $('.loading').show();
            },
		  	success : function(data){
		  		$('.loading').hide();
			  	if(data.success == true){
			  		$('#removeImage_'+id).parent().remove();
			  	}else{
			  		alert("Error Occurred");
			  	}
		  	}
		});
	})

</script>

@endsection