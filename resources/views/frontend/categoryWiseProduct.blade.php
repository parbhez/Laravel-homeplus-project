@extends('frontend.singleProductApp')

@section('main_container')
<div class="row">
    <!--Start Listing Banner -->
    <section class="listing_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(count($category) > 0)
                        <img src="{{URL::to('public/images/category/featured_image').'/'.$category->featured_image}}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--Close Listing Banner -->


    <!--Start Product Sub Category -->
    <section class="product_sub_category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product_title_and_list">

                        <div class="sub_category_list">
                            <ul class="list-inline">
                                <li>
                                    <p>{{trans('frontend.category')}}</p>
                                </li>
                                @if(isset($subCategories))
                                    @foreach($subCategories as $subCategory)
                                        <li>
                                            <a class="sub_category" id="subCategory_{{$subCategory->id}}" data-status="0">
                                                @if(Session::get('frontend_lang') == 1)
                                                    {{$subCategory->sub_category_name_lang1}}
                                                @else
                                                    {{$subCategory->sub_category_name_lang2}}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Close Product Sub Category -->


    <!--Start Total Product Part-->
    <section class="total_and_sort_product">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="total_product">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-8">
                </div>
            </div>

            <div class="row">
                <div class="pricing_list">
                    <div class="col-md-3">
                        <p>
                            <label for="amount">{{trans('frontend.price')}}</label>
                            <input type="button" id="amount"/>
                        </p>
                    </div>
                    <div class="col-md-9">
                        <div class="demo">
                            <div id="slider-range"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Clsoe Total Product Part-->

    <!--Start Category Load Content Div-->
    <div class="loading" style="position: fixed; top: 50%;left: 40%; width:70px; height:70px;display: none;">
        <img src="{{URL::to('public/frontend/assets/img/loading.gif')}}" >
    </div>
    <div id="categoryContentDiv"></div>
    <!--Clsoe Category Load Content Div-->
    <div class="product_list_pagination">
        <div class="row">
            <div class="col-md-12">
                <div class="pagination_div text-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var startAmount   = 0;
    var endAmount     = 0;
    var subCategoryId = 0;
    var linkShowNum   = 20;
    var jsonData      = {};
    var pagination    = $('.pagination');
    var categoryContentDiv    = $('#categoryContentDiv');
    $('.sub_category').on('click',function(){
        var data = $(this).attr('id');
        var dataArr = data.split('_');
        subCategoryId = dataArr[1];
        $('.sub_category').parent().css({'background-color':'white'});
        $('#subCategory_'+subCategoryId).parent().css({'background-color':'gray'});
        $('#subCategory_'+subCategoryId).attr('data-status','1');
        loadContent(subCategoryId,endAmount,startAmount);
    })

    $("#slider-range").on('click',function (e) {
        var data = $("#amount").val();
        var dataArr = data.split('-');
        startAmount = parseInt(dataArr[0].substring(1));
        endAmount   = parseInt(dataArr[1].substring(2));
        loadContent(subCategoryId,endAmount,startAmount);
    });

    $(document).ready( function () {
        loadContent(subCategoryId,startAmount,endAmount)

    });

    function loadContent(subCategoryId,startRange,endRange) {
        var categoryId = "@if(isset($category)){{$category->id}}@endif";
        if (!categoryId){
            categoryContentDiv.empty();
            categoryContentDiv.append('<div class="container" style="font-size: 20px; background-color:white; padding: 15px; text-align: center; color: purple">No Product Found.</div>');
            return false;
        }
        $.ajax({
            url  : "{{URL::to('categoryWiseProductLoad')}}",
            type : 'GET',
            dataType : 'json',
            data : {'categoryId':categoryId,'subCategoryId':subCategoryId,'startRange':startRange,'endRange':endRange},
            beforeSend: function() {
                $('.loading').show();
                categoryContentDiv.empty();
            },
            success: function(data) {
                loadContentStatus(data);
                linkGenerate(data,linkShowNum);
                var data = data.map(function(k) { return k });
                var data = data.chunk_inefficient(linkShowNum);
                jsonData = data;
                appendDataProcess(0);
            },
            error: function(data) {
                //alert('error occurred! Please Check');
                $('.loading').hide();
            }
        });
    }
    function linkGenerate(data,linkShowNum) {
        $('.loading').hide();
        pagination.empty();
        var ulContent = '';
        var i = 1;
        if(data.length > linkShowNum){
            for (var count = 0; count < data.length; count += linkShowNum){
                var active = (i==1) ? 'active': '' ;
                ulContent += '<li class="'+active+'"><a>'+i+'</a></li>';
                i++;
            }
            pagination.append(ulContent);
        }
    }


    Object.defineProperty(Array.prototype, 'chunk_inefficient', {
        value: function(chunkSize) {
            var array=this;
            return [].concat.apply([],
                    array.map(function(elem,i) {
                        return i%chunkSize ? [] : [array.slice(i,i+chunkSize)];
                    })
            );
        }
    });

    $(document).on("click",".pagination li",function(e) {
        e.preventDefault();
        $('.pagination li').removeClass('active');
        $(this).addClass('active');
        var linkNumber = parseInt($(this).text()) - 1;
        appendDataProcess(linkNumber);
    });
    
    function appendDataProcess(linkNumber) {
        var frontendLang = "{{Session::get('frontend_lang')}}";
        var productName;
        var baseUrl = "{{URL::to('/')}}";
        var divContent = '';
        divContent = '<section class="product_listing_part">'+
                '<div class="container">'+
                '<div class="product_listing">'+
                '<div class="row">';
        $.each(jsonData[linkNumber], function(index, value) {
            if(frontendLang == 1){
                productName = value.product_name_lang1;
            } else {
                productName = value.product_name_lang1;
            }
            divContent += '<div class="col-md-3" style="margin-bottom: 10px">'+
                    '<div class="product_unit">'+
                        '<a href="'+baseUrl+'/product-details/'+value.product_id+'/'+value.slug+'" target="_blank">'+
                            '<img src="'+baseUrl+'/public/images/product/'+value.path+'">'+
                        '</a>'+
                    '<div class="product_unit_content">'+
                        '<a href="'+baseUrl+'/product-details/'+value.product_id+'/'+value.slug+'" target="_blank">'+
                            '<h2>'+productName+'</h2>'+
                        '</a>'+
                        '<h3>৳ '+value.sale_price+'</h3>'+
                    '</div>'+
                    '</div>'+
                    '</div>';

        });
        divContent += '</div>'+
                '</div>'+
                '</div>'+
                '</section>';
        categoryContentDiv.empty();
        categoryContentDiv.append(divContent);
    }

    function loadContentStatus(data) {
        var checkLang = "{{Session::get('frontend_lang')}}";
        var totalProduct = parseInt(data.length);
        if (checkLang != 1){
            totalProduct = toBangla(totalProduct);
        }
        var title = "{{trans('frontend.product_found_title')}}"
        $('.total_product p').html(title+'<strong>'+totalProduct+'</strong>');
    }

    function toBangla (str)
    {
        if(!isNaN(str)){
            str = String(str);
        }
        var convert = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
        var splitArray = str.split("");
        var newString = "";
        for (i = 0; i < splitArray.length; i++) {
            if(isNaN(splitArray [i])){
                newString += splitArray [i];
            }else{
                newString += convert[splitArray [i]];
            }
        }
        return newString;
    }

</script>
@endsection