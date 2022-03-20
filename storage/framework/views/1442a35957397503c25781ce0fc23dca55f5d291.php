<?php $__env->startSection('main_container'); ?>
    <div class="row">
        <!--Start Listing Banner -->
        <section class="listing_banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(count($subCategory) > 0): ?>
                            <img style="display: none" src="<?php echo e(URL::to('public/images/subCategory').'/'.$subCategory->featured_image); ?>" alt="">
                        <?php endif; ?>
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
                                        <p><?php echo e(trans('frontend.sub_sub_category')); ?></p>
                                    </li>
                                    <?php if(isset($subSubCategories)): ?>
                                        <?php foreach($subSubCategories as $subSubCategory): ?>
                                            <li>
                                                <a class="sub_category" id="subCategory_<?php echo e($subSubCategory->id); ?>" data-status="0">
                                                    <?php if(Session::get('frontend_lang') == 1): ?>
                                                        <?php echo e($subSubCategory->sub_sub_category_name_lang1); ?>

                                                    <?php else: ?>
                                                        <?php echo e($subSubCategory->sub_sub_category_name_lang2); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
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
                                <label for="amount"><?php echo e(trans('frontend.price')); ?></label>
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

        <div class="loading" style="position: fixed; top: 50%;left: 40%; width:70px; height:70px;display: none;">
            <img src="<?php echo e(URL::to('public/frontend/assets/img/loading.gif')); ?>" >
        </div>
        <!--Start Category Load Content Div-->
        <div id="subCategoryContentDiv"></div>
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
        // Global Variable
        var startAmount   = 0;
        var endAmount     = 0;
        var subSubCategoryId = "<?php if(isset($subCategory)): ?><?php echo e($subCategory->sub_sub_category_id); ?><?php endif; ?>";
        var linkShowNum   = 20;
        var jsonData      = {};
        var pagination    = $('.pagination');
        var subCategoryContentDiv = $('#subCategoryContentDiv');

        $('.sub_category').on('click',function(){
            var data = $(this).attr('id');
            var dataArr = data.split('_');
            subSubCategoryId = dataArr[1];
            $('.sub_category').parent().css({'background-color':'white'});
            $('#subCategory_'+subSubCategoryId).parent().css({'background-color':'gray'});
            $('#subCategory_'+subSubCategoryId).attr('data-status','1');
            loadContent(subSubCategoryId,endAmount,startAmount);
        })

        $("#slider-range").on('click',function (e) {
            var data = $("#amount").val();
            var dataArr = data.split('-');
            startAmount = parseInt(dataArr[0].substring(1));
            endAmount   = parseInt(dataArr[1].substring(2));
            //alert(endAmount);
            loadContent(subSubCategoryId,endAmount,startAmount);
        });

        $(document).ready( function () {
            loadContent(subSubCategoryId,startAmount,endAmount)

        });

        function loadContent(subSubCategoryId,startRange,endRange) {
            var subCategoryId = "<?php if(isset($subCategory)): ?><?php echo e($subCategory->sub_category_id); ?><?php endif; ?>";
            if (!subCategoryId){
                subCategoryContentDiv.empty();
                subCategoryContentDiv.append('<div class="container" style="font-size: 20px; background-color:white; padding: 15px; text-align: center; color: purple">No Product Found.</div>');
                return false;
            }
            $.ajax({
                url  : "<?php echo e(URL::to('subSubCategoryWiseProductLoad')); ?>",
                type : 'GET',
                dataType : 'json',
                data : {'sub_category_id' : subCategoryId,'sub_sub_category_id' : subSubCategoryId,'start_range' : startRange,'end_range' : endRange},
                beforeSend: function() {
                    $('.loading').show();
                    subCategoryContentDiv.empty();
                },
                success: function(data) {
                    console.log(data);
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
            var frontendLang = "<?php echo e(Session::get('frontend_lang')); ?>";
            var productName;
            var baseUrl = "<?php echo e(URL::to('/')); ?>";
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
            subCategoryContentDiv.empty();
            subCategoryContentDiv.append(divContent);
        }

        function loadContentStatus(data) {
            var checkLang = "<?php echo e(Session::get('frontend_lang')); ?>";
            var totalProduct = parseInt(data.length);
            if (checkLang != 1){
                totalProduct = toBangla(totalProduct);
            }
            var title = "<?php echo e(trans('frontend.product_found_title')); ?>"
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.singleProductApp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>