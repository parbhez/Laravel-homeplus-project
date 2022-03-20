@extends('merchantCorner.app')
@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="active" role="presentation">
            <a aria-expanded="true" href="#product_details" aria-controls="product_details" role="tab" data-toggle="tab">
                {{trans('frontend.product_details')}}
            </a>
        </li>
        <li class="" role="presentation">
            <a aria-expanded="false" href="#product_images" aria-controls="product_images" role="tab" data-toggle="tab">
                {{trans('frontend.product_image')}}
            </a>
        </li>
    </ul>
    <!-- Tab panes -->

    <?php
    $disabled = ($products->product_status == 1)? 'disabled="1"' : '' ;
    ?>
    {!! Form::open(['route'=>'merchantProductEdit.post','class'=>'','id'=>'merchantProductForm','files'=>true]) !!}
    <div class="tab-content section">
        <div role="tabpanel" class="tab-pane active" id="product_details">
            <h2>{{trans('frontend.product_form_head')}}</h2>
            <p class="remind"> {{trans('frontend.precorsion')}}</p>
            <div class="col-md-6">
                <input type="hidden" name="merchant_id" value="{{Session::get('merchant.id')}}">
                <input type="hidden" name="product_id" value="{{$products->product_id}}">
                <input type="hidden" name="product_status" value="{{$products->product_status}}">
                <div class="form-group">
                    <label for="name">
                        {{trans('frontend.product_category')}}
                        <span>*</span>
                    </label>
                    <select class="form-control" id="category-select" name="category_name_id" {{$disabled}}>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($products->id== $category->id) selected @endif >{{$category->category_name_lang2}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        {{trans('frontend.product_sub_cat')}}
                        <span>*</span>
                    </label>
                    <select class="form-control" id="sub-category-select" name="sub_category_name_id" {{$disabled}}>
                        <option value="{{$products->sub_category_id}}">{{$products->sub_category_name_lang2}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        {{trans('frontend.product_sub_sub_cat')}}
                        <span>*</span>
                    </label>
                    <select class="form-control" id="sub-category-details-select" name="sub_sub_category_name_id" {{$disabled}}>
                        <option value="{{$products->sub_sub_category_id}}">{{$products->sub_sub_category_name_lang2}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        {{trans('frontend.product_size')}}
                        <span>*</span>
                    </label>
                    <select class="form-control chosen-select" name="size_id[]" data-placeholder="স{{trans('frontend.product_size')}}" multiple tabindex="6" {{$disabled}}>
                        @if(isset($sizes))
                            @foreach($sizes as $size)
                                <?php $flag = 0; ?>
                                @foreach($products->sizes as $selectedSizes)
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

                <div class="form-group">
                    <label>
                        {{trans('frontend.product_color')}}
                        <span>*</span>
                    </label>
                    <select class="form-control chosen-select" name="color_id[]" data-placeholder="সি{{trans('frontend.product_color')}}" multiple tabindex="6" {{$disabled}}>
                        @if(isset($colors))
                            @foreach($colors as $color)
                                <?php $flag = 0; ?>
                                @foreach($products->colors as $selectedColor)
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

                <div class="form-group">
                    <label>{{trans('frontend.product_name_bn')}} <span>*</span> </label>
                    <input type="text" class="form-control" name="product_name_bangla" value="{{$products->product_name_lang2}}" {{$disabled}}>
                </div>
                <div class="form-group">
                    <label>{{trans('frontend.product_name_en')}} <span>*</span></label>
                    <input type="text" class="form-control" name="product_name_english" value="{{$products->product_name_lang1}}" {{$disabled}}>
                </div>
                <div class="form-group">
                    <label>{{trans('frontend.quantity')}} <span>*</span></label>
                    <input type="text" class="form-control"  name="product_quantity" value="{{$products->quantity}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{trans('frontend.product_code')}} <span>*</span></label>
                    <input type="text" class="form-control" name="product_code" value="{{$products->product_code}}" disabled>
                </div>
                <div class="form-group">
                    <label>{{trans('frontend.product_slug')}} <span>*</span></label>
                    <input type="text" class="form-control" name="product_slug" value="{{$products->slug}}" {{$disabled}}>
                </div>
                <div class="form-group" style="display:none;">
                    <label>{{trans('frontend.product_refund')}} <span>*</span></label>
                    <input type="text" class="form-control" style="display:none;" name="refund_policy" value="{{$products->refund_policy}}">
                </div>
                <div class="form-group">
                    <label>{{trans('frontend.market_price')}} <span>*</span></label>
                    <input type="text" id="market_price" class="form-control market_price_discount"  name="product_market_price" value="{{$products->market_price}}">
                </div>
                <div class="form-group">
                    <label>{{trans('frontend.product_discount')}} <span>*</span></label>
                    <input type="text" id="discount" class="form-control market_price_discount" name="product_discount" value="{{$products->discount}}">
                </div>
                <div class="form-group">
                    <label>{{trans('frontend.sale_price')}} <span>*</span></label>
                    <input type="text" class="form-control product_sale_price" name="product_sale_price" value="{{$products->sale_price}}">
                </div>
                <div class="form-group">
                    <label for="name">{{trans('frontend.product_commission')}}</label>
                    <input type="text" class="form-control product_commission"  name="commission_percentage" value="{{$products->commission}}">
                </div>
                <div class="form-group">
                    <label for="name">{{trans('frontend.eshopping_commission')}}</label>
                    <input type="text" class="form-control eshopping_commission"  name="commission_amount" value="{{($products->sale_price * $products->commission)/100}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{trans('frontend.product_info_bn')}} <span>*</span></label>
                    <textarea class="form-control" name="product_details_bn" id="address" placeholder="আলাদা লাইন এর জন্য  ','  ব্যাবহার  করুন  " {{$disabled}}>{{$products->details_lang2}}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{trans('frontend.product_info_en')}} <span>*</span></label>
                    <textarea class="form-control" name="product_details_en" id="address" placeholder="আলাদা লাইন এর জন্য  ','  ব্যাবহার  করুন  " {{$disabled}}>{{$products->details_lang1}}</textarea>
                </div>
            </div>
            <div class="col-md-offset-9 col-md-3">
                <button type="submit" class="btn btn-info"> <span class="fa fa-save"></span> Update </button>
                <button class="btn btn-info btn-next"> {{trans('frontend.next')}} </button>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="product_images">
            <div class="col-md-12">
                @if(isset($products->images))
                    @foreach($products->images as $productImage)
                        <div class="col-md-2" style="padding-bottom: 40px" >
                            <div class="removeImage" id="removeImage_{{$productImage->id}}" data-type="{{$productImage->type}}" data-path="{{$productImage->path}}">
                                <a href="">
                                    <i class="fa fa-remove" style="z-index: 999999; position:relative; float:right; margin-right:5px; margin-bottom: -40px;color:red;"> </i>
                                </a>
                            </div>
                            <div>
                                <img src="{{URL::to('/public/images/product').'/'.$productImage->path}}" width="150" height="150">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if($products->product_status ==0 )
                <div class="form-group">
                    <label class="col-md-2 product-image">{{trans('frontend.product_image')}}</label>
                    <div class="col-md-3">
                        <input type="file" class="" name="image[]">
                    </div>
                    <label class="col-md-2"> {{trans('frontend.image_title')}} </label>
                    <div class="col-md-3">
                        @if(isset($products->images))
                            @foreach($products->images as $productImage)
                                @if($productImage->type == 1)
                                    <input type="text"  class="form-control" name="image_title[]" value="{{$productImage->caption}}">
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-xs btn-info btn-add-image" title="Add More Image"><span class="fa fa-plus" style=""></span></button>
                    </div>
                </div>
                <div class="load-dynamic-image-content">
                </div>
            @endif
            <div class="form-group">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info" style="margin-top: 5px;" > <span class="fa fa-save"></span> {{trans('frontend.update')}} </button>
                </div>
            </div>
        </div>
    </div><!--// Tab panes -->
    {!! Form::close() !!}

    <script>
        $('.btn-next').on('click',function (e) {
            e.preventDefault();
            $('a[href="#product_images"]').tab('show');
        });

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
            var comissionPercentage =  $('.product_commission').val();
            var sale_price = $('.product_sale_price').val();
            if (! sale_price){
                $('.product_commission').val('');
                return flase;
            }
            var commission = (sale_price * comissionPercentage)/100;
            $('.eshopping_commission').val(commission);
        }

        $(document).ready(function(){
            $('#merchantProductForm').validate({
                onkeyup: false,
                rules: {
                    category_name_id: {
                        required: true
                    },
                    sub_category_name_id: {
                        required: true
                    },
                    sub_sub_category_name_id: {
                        required: true
                    },
                    product_name_bangla: {
                        required: true
                    },
                    product_name_english: {
                        required: true
                    },
                    product_details: {
                        required: true
                    },
                    product_code: {
                        required: true
                    },
                    product_slug: {
                        required: true
                    },
                    refund_policy: {
                        required: true
                    },
                    product_quantity: {
                        required: true
                    },
                    product_market_price: {
                        required: true
                    },
                    product_discount: {
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
        //======@@ Get Categroy Wise SubCategory @@======
        $("#category-select").on('change',function(e){
            var loader = $(".loader");
            var categoryId  = e.target.value;
            var groupOption = $("#sub-category-select");
            $.ajax({
                url: "{{URL::to('getCategoryWiseSubCategory')}}/"+ categoryId ,
                beforeSend: function() {
                    loader.show();
                },
                success: function(data) {
                    groupOption.empty();
                    groupOption.append('<option value="" selected disabled>সাব ক্যাটাগরি সিলেক্ট করুন</option>');
                    $.each(data, function(index, value) {
                        groupOption.append('<option value="' + value.id + '">' + value.sub_category_name_lang2 + '</option>');
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
            var subCategoryId  = e.target.value;
            var groupOption = $("#sub-category-details-select");
            $.ajax({
                url: "{{URL::to('getSubCategoryWiseSubCategoryDetails')}}/"+ subCategoryId ,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    loader.show();
                },
                success: function(data) {
                    groupOption.empty();
                    groupOption.append('<option value="" selected disabled>সাব সাব ক্যাটাগরি সিলেক্ট করুন</option>');
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
                url: "{{URL::to('mercentRemoveProductImage')}}",
                dataType:'json',
                data : {'image_id':id,'image_type':image_type,'image_path':image_path},
                success : function(data){
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

