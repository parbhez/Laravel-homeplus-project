@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Product :: Total  Products
					</span>
					<a href="{{URL::to('product')}}" class="pull-right fa fa-hand-o-left btn btn-success btn-sm">
						Go Back
					</a>
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
						    <li role="presentation"><a href="#addProduct" aria-controls="addProduct" role="tab" data-toggle="tab"> Add Product </a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active table-responsive" id="viewProduct">
						     	<table id="productDataTable" class="table table-bordered table-hover" width="100%">
						     	    <thead>
										<tr>
											<th>SL</th>
											<th>Category</th>
											<th>Product Name</th>
											<th>Image</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Available</th>
											<th>Commission</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
								    </thead>
									<tbody>
										<?php $i=0; $lang=Session::get('last_login_lang'); ?>
										
										@if(isset($viewProducts))
											@foreach($viewProducts as $product)
											<tr class="" id="row_{{ $product->id}}">
												<td>{{++$i}} </td>
												<td>{{$product->category_name_lang1}}</td>
												<td>{{$product->product_name_lang1}}</td>
												<td align="center">
													<img src="{{URL::to('public/images/product/').'/'.$product->image_path}}" height="55" width="55">
												</td>
												<td>{{$product->sale_price}}</td>
												<td>{{$product->discount}}</td>
												<td>{{$product->quantity}}</td>
												<td>{{$product->commission}}</td>
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
													<button class="btn btn-primary btn-xs dropdown" data-toggle="dropdown" type="button">Action
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
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
														<li><a href="#modal" data-toggle="modal" class="modal1" onclick="loadModalEdit('singleProductDetailsModal','{{ $product->id}}','view')"><span class="fa fa-list">&nbsp; Details </span></a></li>
													</ul>
												</div>
												</td>
											</tr>
											@endforeach
										@endif

									</tbody>						
								</table>
						    </div>

						    <div role="tabpanel" class="tab-pane table-responsive" id="addProduct">
						    	{!! Form::open(['route'=>'product.post','class'=>'form-horizontal','id'=>'merchantProductForm','style'=>'padding:10px;','files'=>true]) !!}
				                <input type="hidden" name="merchant_id" value="{{Session::get('merchant.id')}}">
				                <div class="form-group">
				                    <label class="col-md-2"> Select Category  </label>
				                    <div class="col-md-3">
					                    <select class="form-control" id="category-select" name="category_name_id" required>
					                        <option selected></option>
					                        @if(isset($categories))
					                            @foreach($categories as $category)
					                                <option value="{{$category->id}}">{{$category->category_name_lang1}}</option>
					                            @endforeach
					                        @endif
					                    </select>
				                    </div>
				                    <label class="col-md-2"> Select Sub Category</label>
				                    <div class="col-md-3">
				                    	<select class="form-control" id="sub-category-select" name="sub_category_name_id">
				                        	<option disabled selected></option>
				                    	</select>
				                    </div>			                    
				                </div>					                

				                <div class="form-group">
				                	<!-- <label class="col-md-2"> Select Sub Sub Category  </label>
				                    <div class="col-md-3">
					                    <select class="form-control" id="sub-category-details-select" name="sub_sub_category_name_id" required>
					                        <option disabled selected></option>
					                    </select>
				                    </div> -->
				                    <label class="col-md-2"> Select Size <span></span> </label>
				                    <div class="col-md-3">
					                    <select class="form-control chosen-select" name="size_id[]"  multiple tabindex="6">
					                        @if(isset($sizes))
					                            @foreach($sizes as $size)
					                                <option value="{{$size->id}}">{{$size->size_title_lang2}}</option>
					                            @endforeach
					                        @endif
					                    </select>
				                    </div>
				                    <label class="col-md-2"> Select Color<span></span></label>
				                    <div class="col-md-3">
					                    <select class="form-control chosen-select" name="color_id[]"  multiple tabindex="6">
					                        @if(isset($colors))
					                            @foreach($colors as $color)
					                                <option value="{{$color->id}}">{{$color->color_name_lang2}}</option>
					                            @endforeach
					                        @endif
					                    </select>
				                    </div>				                    
				                </div>
				                <div class="form-group">
				                	<label class="col-md-2">Product Name En </label>
				                    <div class="col-md-3">
				                    	<input type="text" class="form-control" name="product_name_bangla"  value="{{old('product_name_bangla')}}">
				                    </div>
				                    <label class="col-md-2">Product Name Bn </label>
				                    <div class="col-md-3">
				                    	<input type="text" class="form-control" name="product_name_english"  value="{{old('product_name_english')}}">
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label class="col-md-2">Market Price</label>
				                    <div class="col-md-3">
				                    	<input type="text"  id="market_price" class="form-control market_price_discount"  name="product_market_price"  value="{{old('product_market_price')}}">
				                    </div>
				                    <label class="col-md-2"> Discount </label>
				                    <div class="col-md-3">
				                    	<input type="text" id="discount" class="form-control market_price_discount" name="product_discount"  value="{{old('product_discount')}}">
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label class="col-md-2">Sale Price </label>
				                    <div class="col-md-3">
				                    	<input type="text" class="form-control product_sale_price" name="product_sale_price"  value="{{old('product_sale_price')}}">
				                    </div>
				                    <label class="col-md-2">Product Quantity</label>
				                    <div class="col-md-3">
				                    	<input type="text" class="form-control"  name="product_quantity"  value="100">
				                    </div>
				                </div>	

				                <div class="form-group">
				                    <label class="col-md-2">Product Code</label>
				                    <div class="col-md-3">
				                    	<input type="text" class="form-control"  name="product_code"  value="{{old('product_code')}}">
				                    </div>
				                </div>	
				                <div class="form-group">
				                    <label class="col-md-2">Product Details En </label>
				                    <div class="col-md-8">
				                    	<textarea class="form-control" name="product_details_bn" id="address" placeholder="আলাদা লাইন এর জন্য  #  ব্যাবহার  করুন  ">{{old('product_details_bn')}}</textarea>
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label class="col-md-2">Product Details Bn </label>
				                    <div class="col-md-8">
				                    	<textarea class="form-control" name="product_details_en" id="address" placeholder="আলাদা লাইন এর জন্য  #  ব্যাবহার  করুন  ">{{old('product_details_en')}}</textarea>
				                    </div>
				                </div>
				            	<div class="form-group">
					                <label class="col-md-2 product-image"> Prouduct Image  </label>
					                <div class="col-md-3">
					                    <input type="file" class="form-control" name="image[]">
					                </div>
					                <label class="col-md-2"> Image Title </label>
					                <div class="col-md-3">
					                    <input type="text"  class="form-control" name="image_title[]">
					                </div>
					                <div class="col-md-1">
					                    <button type="button" class="btn btn-xs btn-info btn-add-image" title="Add More Image"><span class="fa fa-plus" style=""></span></button>
					                </div>
					            </div>

				            	<div class="load-dynamic-image-content"> </div>

					            <div class="form-group">
					                <div class="col-md-4">
					                    <input type="submit" class="btn btn-info" style="margin-top: 5px;" value="Save Product">
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

@include('backend.ajax.ajaxGlobalVar');

<script type="text/javascript">

	$('.modal1').on('click',function(){
	   $('.modal-title').html('Product Details');
	   $('.modal-content').removeClass('modal-lg');
	   $('.modal-content').addClass('modal-lg'); 
	})


//======@@ Deny Product @@======
function inactiveConfirm(id){
	$.ajax({
	    url: "{{URL::to('denyProduct')}}/"+id,
	    dataType:'json',
	    beforeSend: function(){
	    	loading.show();
	    },
	    success : function(data){
	    	loading.hide();
		    if(data.success == true){
				$("#denied"+id).html('Denied');

		    }else{
				db_err.hide().find('label').empty();
				db_err.find('label').append(data.status);
				db_err.slideDown();
				db_err.delay(5000).slideUp(300);
			}
			loading.hide();
	    }
	});
}

//===@@ Approve Operation @@=====

function activeConfirm(id){
	$.ajax({
	  	url: "{{URL::to('activeProduct')}}/"+id,
	  	dataType:'json',
	  	success : function(data){
		  	if(data.success == true){
				$("#denied"+id).html('Approved');

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

    $(document).ready(function(){

        $('#merchantProductForm').validate({
            onkeyup: false,
            rules: {
                category_name_id: {
                    required: true
                },
                product_name_bangla: {
                    required: true
                },
                product_name_english: {
                    required: true
                },
                product_details_en: {
                    required: true
                },
                product_details_bn: {
                    required: true
                },                
                product_market_price: {
                    required: true
                },
                product_sale_price: {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

//========@@ Make Slug @@=========
    function make_slug(){
        var slug        = '';
        var arr_slug    = null;
        var madeSlug    = '';
        var i           =0;
        slug =document.getElementById("makingSlug").value;
        if(slug.length>0){
            arr_slug = slug.split(" ");
            madeSlug = arr_slug[0];
            for(i=1;i<arr_slug.length;i++){
                if(arr_slug.length>1){
                    madeSlug =madeSlug+'-'+arr_slug[i];
                }
            }
            madeSlug=madeSlug.toLowerCase();
            document.getElementById("slug").setAttribute("value", madeSlug);
        }else{
            document.getElementById("slug").setAttribute("value", "");
        }
    } 

    //======@@ Get Categroy Wise SubCategory @@======
    $("#category-select").on('change',function(e){
        var loader = $(".loader");
        var categoryId  = e.target.value;
        var groupOption = $("#sub-category-select");
        $.ajax({
            url: "{{url('categoryId')}}/"+categoryId ,
            beforeSend: function() {
                loader.show();
            },
            success: function(data) {
                groupOption.empty();
                groupOption.append('<option value="" selected disabled></option>');
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
    $("#sub-category-select").on('change',function(e){
        var loader = $(".loader1");
        var subCategoryId = e.target.value;
        var groupOption   = $("#sub-category-details-select");
        $.ajax({
            url: "{{url('getSubCategoryWiseSubCategoryDetails')}}/"+ subCategoryId ,
            processData: false,
            contentType: false,
            beforeSend: function() {
                loader.show();
            },
            success: function(data) {
                groupOption.empty();
                groupOption.append('<option value="" selected disabled></option>');
                $.each(data, function(index, value) {
                    groupOption.append('<option value="' + value.id + '">' + value.sub_sub_category_name_lang2 + '</option>');
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
        var imgCount = $('.btn-remove-image');
        var Image      = "Product Image"
        var imageTitle = "Image Title"
        var content = ''
        content +='<div class="col-md-12"><div class="form-group">'+
                '<label class="col-md-2 product-image"> '+Image+'  </label>'+
                '<div class="col-md-3">'+
                '<input type="file" class="form-control" name="image[]">'+
                '</div>'+
                '<label class="col-md-2"> '+imageTitle+' </label>'+
                '<div class="col-md-3">'+
                '<input type="text"  class="form-control" name="image_title[]">'+
                '</div>'+
                '<div class="col-md-1">'+
                '<button type="button" class="btn btn-xs btn-warning btn-remove-image" title="Add More Image"><span class="fa fa-minus"></span></button>'+
                '</div></div>'+
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
