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
{!! Form::open(['route'=>'merchantProduct','class'=>'','id'=>'merchantProductForm','files'=>true]) !!}
    <div class="tab-content section">
        <div role="tabpanel" class="tab-pane active" id="product_details">
            <h2>{{trans('frontend.product_form_head')}}</h2>
            <p class="remind"> {{trans('frontend.precorsion')}}</p>
            <div class="col-md-6">
                <input type="hidden" name="merchant_id" value="{{Session::get('merchant.id')}}">
                <div class="form-group">
                    <label for="name">
                        {{trans('frontend.product_category')}}
                        <span>*</span>
                    </label>
                    <select class="form-control" id="category-select" name="category_name_id" required>
                        <option selected disabled>{{trans('frontend.product_category')}}</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name_lang2}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        {{trans('frontend.product_sub_cat')}}
                        <span>*</span>
                    </label>
                    <select class="form-control" id="sub-category-select" name="sub_category_name_id" required>
                        <option disabled selected>{{trans('frontend.product_sub_cat')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        {{trans('frontend.product_sub_sub_cat')}}
                        <span>*</span>
                    </label>
                    <select class="form-control" id="sub-category-details-select" name="sub_sub_category_name_id" required>
                        <option disabled selected>{{trans('frontend.product_sub_sub_cat')}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        {{trans('frontend.product_size')}}
                        <span></span>
                    </label>
                    <select class="form-control chosen-select" name="size_id[]" data-placeholder="সিলেক্ট সাইজ" multiple tabindex="6" required>
                        @if(isset($sizes))
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size_title_lang2}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        {{trans('frontend.product_color')}}
                        <span></span>
                    </label>
                    <select class="form-control chosen-select" name="color_id[]" data-placeholder="সিলেক্ট কালার" multiple tabindex="6" required>
                        @if(isset($colors))
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->color_name_lang2}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>{{trans('frontend.product_name_bn')}} <span>*</span></label>
                    <input type="text" class="form-control" name="product_name_bangla" required>
                </div>

                <div class="form-group">
                    <label>{{trans('frontend.product_name_en')}} <span>*</span></label>
                    <input  onkeyup="make_slug()" id="makingSlug" type="text" class="form-control" name="product_name_english" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{trans('frontend.product_quanity')}}</label>
                    <input type="text" class="form-control"  name="product_quantity" required>
                </div>
                <div class="form-group" style="display: none;">
                    <label>{{trans('frontend.product_slug')}} <span>*</span></label>
                    <input type="text" id="slug" class="form-control" name="product_slug" required>
                </div>
                <div class="form-group">
                    <label for="name">{{trans('frontend.market_price')}} <span>*</span></label>
                    <input type="text"  id="market_price" class="form-control market_price_discount"  name="product_market_price" required>
                </div>
                <div class="form-group">
                    <label for="name"> {{trans('frontend.product_discount')}} <span>*</span></label>
                    <input type="text" id="discount" class="form-control market_price_discount" name="product_discount" required>
                </div>
                <div class="form-group">
                    <label for="name">{{trans('frontend.sale_price')}} <span>*</span></label>
                    <input type="text" class="form-control product_sale_price" name="product_sale_price" required>
                </div>
                <div class="form-group">
                    <label for="name">{{trans('frontend.product_commission')}}</label>
                    <input type="text" class="form-control product_commission"  name="commission_percentage" required>
                </div>

                <div class="form-group">
                    <label for="name">{{trans('frontend.eshopping_commission')}}</label>
                    <input type="text" class="form-control eshopping_commission"  name="commission_amount" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">{{trans('frontend.product_info_bn')}} <span>*</span></label>
                    <textarea class="form-control" name="product_details_bn" id="address" placeholder="আলাদা লাইন এর জন্য  #  ব্যাবহার  করুন  "></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">{{trans('frontend.product_info_en')}} <span>*</span></label>
                    <textarea class="form-control" name="product_details_en" id="address" placeholder="আলাদা লাইন এর জন্য  #  ব্যাবহার  করুন  "></textarea>
                </div>
            </div>
            <div class="col-md-offset-6 col-md-6">
                <a class="btn btn-info pull-right btn-next">
                    {{trans('frontend.next')}}
                </a>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="product_images">
            <div class="form-group">
                <label class="col-md-2 product-image"> {{trans('frontend.product_image')}} <span>*</span> </label>
                <div class="col-md-3">
                    <input type="file" class="" name="image[]">
                </div>
                <label class="col-md-2"> {{trans('frontend.image_title')}} <span>*</span> </label>
                <div class="col-md-3">
                    <input type="text"  class="form-control" name="image_title[]">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-xs btn-info btn-add-image" title="Add More Image"><span class="fa fa-plus" style=""></span></button>
                </div>
            </div>

            <div class="load-dynamic-image-content">
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-info" style="margin-top: 5px;" value="{{trans('frontend.save')}}">
                </div>
            </div>
        </div>
    </div><!--// Tab panes -->
{!! Form::close() !!}

<script>
    $('.btn-next').on('click',function (e) {
        //e.preventDefault();
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
                },
                commission_percentage: {
                    required: true
                },
                commission_amount: {
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
        var subCat      = "{{trans('frontend.product_sub_cat')}}";
        $.ajax({
            url: 'getCategoryWiseSubCategory/' + categoryId ,
            beforeSend: function() {
                loader.show();
            },
            success: function(data) {
                groupOption.empty();
                groupOption.append('<option value="" selected disabled>'+subCat+'</option>');
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
        var subCategoryId = e.target.value;
        var groupOption   = $("#sub-category-details-select");
        var subSubCat     = "{{trans('frontend.product_sub_sub_cat')}}";
        $.ajax({
            url: 'getSubCategoryWiseSubCategoryDetailsSelect/' + subCategoryId ,
            processData: false,
            contentType: false,
            beforeSend: function() {
                loader.show();
            },
            success: function(data) {
                groupOption.empty();
                groupOption.append('<option value="" selected disabled>'+subSubCat+'</option>');
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
        if (imgCount.length > 2) {
         alert("Maximum Product Image Is Four.");
         return flase; 
     }
        var Image      = "{{trans('frontend.product_image')}}"
        var imageTitle = "{{trans('frontend.image_title')}}"
        var content = ''
        content +='<div class="form-group">'+
                '<label class="col-md-2 product-image"> '+Image+' <span>*</span> </label>'+
                '<div class="col-md-3">'+
                '<input type="file" class="" name="image[]">'+
                '</div>'+
                '<label class="col-md-2"> '+imageTitle+' <span>*</span></label>'+
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


</script>
@endsection

