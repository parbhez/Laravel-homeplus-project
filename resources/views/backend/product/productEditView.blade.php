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
													<option disabled>Select Category</option>
													@foreach($categories as $category)
													<option value="{{$category->id}}" @if($product['product']->category_id == $category->id)selected @endif >{{$category->category_name_lang1}}</option>
													@endforeach
												@endif
											</select>
										</div>
										<label class="col-md-2"> Select Sub-Category </label>
										<div class="col-md-3">
											<span class='loader' style="display:none;"><img src="{{URL::to('public/icons/ajax-loader.gif')}}" alt="loading"></span>  
											<select class="form-control" id="sub_category_select" name="sub_category_name_id">
												<option value="{{$product['product']->sub_category_id}}">{{$product['product']->sub_category_name_lang1}}</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Select Sub-Sub-Category </label>
										<div class="col-md-3">
											<span class='loader1' style="display:none;"><img src="{{URL::to('public/icons/ajax-loader.gif')}}" alt="loading"></span>  
											<select class="form-control" id="sub_category_details_select" name="sub_sub_category_name_id">
												<option value="{{$product['product']->sub_sub_category_id}}">{{$product['product']->sub_sub_category_name_lang1}}</option>
											</select>
										</div>
										<label class="col-md-2"> Product Placement </label>
										<div class="col-md-3">
											<select class="form-control" id="" name="product_placement" data-placeholder="Seelect Placement">
												<option value="1">Normal Product</option>
												<option value="2">Slider Product</option>
												<option value="3">Selected Product</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Product Name English </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="product_name_lang1" value="{{$product['product']->product_name_lang1}}">
										</div>
										<label class="col-md-2"> Product Name Bangla </label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="product_name_lang2" value="{{$product['product']->product_name_lang2}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Market Price</label>
										<div class="col-md-3">
											<input type="number" id="market_price" class="form-control market_price_discount" name="market_price" value="{{$product['product']->market_price}}">
										</div>
										<label class="col-md-2"> Discount </label>
										<div class="col-md-3">
											<input type="number" id="discount" class="form-control market_price_discount" name="discount" value="{{$product['product']->discount}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Sale Price </label>
										<div class="col-md-3">
											<input type="number" class="form-control product_sale_price" name="sale_price" value="{{$product['product']->sale_price}}">
										</div>
										<label class="col-md-2"> Commission (%)</label>
										<div class="col-md-3">
											<input type="number" class="form-control product_commission" name="commission" value="{{$product['product']->commission}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> E-shopping Commission </label>
										<div class="col-md-3">
											<input type="text" class="form-control eshopping_commission" name="commission_amount" value="{{($product['product']->sale_price * $product['product']->commission)/100}}">
										</div>
										<label class="col-md-2"> Quantity </label>
										<div class="col-md-3">
											<input type="number" class="form-control" name="quantity" value="{{$product['product']->quantity}}">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Product Details Bangla </label>
										<div class="col-md-8">
											<textarea rows="3" class="form-control" name="details_lang1">{{$product['product']->details_lang1}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Product Details English </label>
										<div class="col-md-8">
											<textarea rows="3" class="form-control" name="details_lang2">{{$product['product']->details_lang2}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-2 col-md-2">
											<input type="submit" class="btn btn-success btn-md" value="Update">
										</div>
									</div>
						   		{!!Form::close()!!}
						    </div>
						    <div role="tabpanel" class="tab-pane" id="ProductProperties">
						    	{!!Form::open(array('route'=>'editProductProperties.post','class'=>'form-horizontal form-wrp productPropertiesForm','files'=>true))!!}
						   			<input type="hidden" name="product_id" value="{{$product['product']->product_id}}">
						   			<div class="form-group">
										<label class="col-md-2"> Select Color</label>
										<div class="col-md-3">
											<select class="form-control chosen-select" id="" name="color_id[]" data-placeholder="Select Color" multiple tabindex="6">
												@if(isset($colors))
													@foreach($colors as $color)
														<?php $flag = 0; ?>
													@foreach($product['colors'] as $selectedColor)
															@if($selectedColor->color_id == $color->id)
																<option value="{{$color->id}}" selected>{{$color->color_name_lang1}}</option>
																<?php $flag = 1; break; ?>
															@endif
														@endforeach
														@if($flag == 0)
															<option value="{{$color->id}}">{{$color->color_name_lang1}}</option>
														@endif
													@endforeach
												@endif
											</select>
										</div>
										<label class="col-md-2"> Select Size </label>
										<div class="col-md-3">
											<select class="form-control chosen-select" id="" name="size_id[]" data-placeholder="Seelect Size" multiple tabindex="6">
												@if(isset($sizes))
													@foreach($sizes as $size)
														<?php $flag = 0; ?>
														@foreach($product['sizes'] as $selectedSizes)
															@if($selectedSizes->size_id == $size->id)
																<option value="{{$size->id}}" selected>{{$size->size_title_lang1}}</option>
																<?php $flag = 1; break; ?>
															@endif
														@endforeach
														@if($flag == 0)
															<option value="{{$size->id}}">{{$size->size_title_lang1}}</option>
														@endif
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
											    <div class="removeImage" id="removeImage_{{$productImage->id}}" data-type="{{$productImage->type}}" data-path="{{$productImage->path}}">
												    <a href="">
												     	<i class="fa fa-remove " style="z-index: 11; float:right; margin-right:25px; margin-bottom: -40px"> </i>
												    </a>
												    
											     </div>
											     <a href="{{URL::to('/public/images/product').'/'.$productImage->path}}" class="fa fa-download" download> Download</a>
											    <div> 
												   <img src="{{URL::to('/public/images/product').'/'.$productImage->path}}" width="150" height="150">
											    </div>
											</div>
										@endforeach
									@endif
						    	</div>
						    	{!!Form::open(array('route'=>'editProductImage.post','class'=>'form-horizontal form-wrp productImageForm','files'=>true))!!}
						   			<input type="hidden" name="product_id" value="{{$product['product']->product_id}}">
						   			<input type="hidden" name="merchant_id" value="{{$product['product']->fk_merchant_id}}">
						   			<div class="form-group">
										<label class="col-md-2 product-image"> Product Image </label>
										<div class="col-md-3">
											<input type="file" class="" name="image[]">
										</div>
										<label class="col-md-2"> Image Title </label>
										<div class="col-md-3">
											@if(isset($product['images']))
												@foreach($product['images'] as $productImage)
													@if($productImage->type == 1)
														<input type="text"  class="form-control" name="image_title[]" value="">
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

	$('.market_price_discount').on('keyup',function(){
		var market_price = $('#market_price').val();
		var discount     = $('#discount').val();
		if (!market_price){
			calculateCommission();
			return false;
		}
		if (!discount){
			discount = 0;
		}
		var net_sale_price = market_price - discount;
		$('.product_sale_price').val(net_sale_price);
		calculateCommission();
	});

	$('.product_commission').on('keyup',function(e){
		calculateCommission();
	});

	function calculateCommission() {
		var comissionPercentage = $('.product_commission').val();
		var sale_price = $('.product_sale_price').val();
		if (! sale_price){
			$('.product_commission').val('');
			return flase;
		}
		var commission = (sale_price * comissionPercentage)/100;
		$('.eshopping_commission').val(commission);
	}
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
                url: "{{URL::to('categoryId')}}"+'/'+categoryId ,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    loader.show();
                },
                success: function(data) {
                    groupOption.empty();
                    groupOption.append('<option value="" selected disabled>Select Sub Category</option>');
                    $.each(data, function(index, value) {
                        groupOption.append('<option value="' + value.id + '">' + value.sub_category_name_lang1 + '</option>');
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
                        groupOption.append('<option value="' + value.id + '">' + value.sub_sub_category_name_lang1 + '</option>');
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