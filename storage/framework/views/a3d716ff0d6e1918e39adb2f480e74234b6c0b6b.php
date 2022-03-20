<?php $__env->startSection('main_container'); ?>
<?php if(isset($product)): ?>

<section class="preview_and_purchase">
    <div class="container">
        <div class="row">
        <?php if($product == false): ?>
            <div class="alert alert-danger text-center" style="padding:10px;font-size:24px;"> This Product is Not Available Now, Please See Related Product....!!</div>
        <?php else: ?>
            <div class="col-md-6">
                <div class="product_preivew">

                    <div class="product_preivew_container">
                        <a href="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($product->path); ?>" class="MagicZoom"
                           id="motorbike">
                            <img src="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($product->path); ?>">
                        </a>
                    </div>

                    <div class="product_preivew_list">
                        <?php foreach($product->productImages as $productImage): ?>
                            <a data-zoom-id="motorbike"
                                href="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($productImage->path); ?>"
                                data-image="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($productImage->path); ?>">
                                <img src="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($productImage->path); ?>">
                            </a>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


            <div class="col-md-5">
                <div class="product_purchase">
                    <h2><?php if(Session::get('frontend_lang') == 1): ?>
                            <?php echo e($product->product_name_lang1); ?>

                        <?php else: ?>
                            <?php echo e($product->product_name_lang2); ?>

                        <?php endif; ?>
                    </h2>
                    <div class="product_purchase_container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="product_price">
                                    <h1>
                                        <?php if(Session::get('frontend_lang') == 1): ?> Tk <?php echo e($product->sale_price); ?> <?php else: ?> ৳ <?php echo e(App\Http\Helper::bnNum($product->sale_price)); ?> <?php endif; ?>
                                    </h1>
                                    <p class="previous_price">
                                        <span><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.prev_price')); ?> <?php else: ?> <?php echo e(trans('frontend.prev_price')); ?> <?php endif; ?>:&nbsp;&nbsp;
                                            <s><?php if(Session::get('frontend_lang') == 1): ?> Tk <?php echo e($product->market_price); ?> <?php else: ?> ৳ <?php echo e(App\Http\Helper::bnNum($product->market_price)); ?> <?php endif; ?></s>
                                        </span>
                                    </p>
                                    <p class="dill_code">
                                        <span><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.shopping_code')); ?> <?php else: ?> <?php echo e(trans('frontend.shopping_code')); ?> <?php endif; ?>:&nbsp;&nbsp;
                                            <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($product->product_code); ?> <?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->product_code)); ?> <?php endif; ?>
                                        </span>
                                    </p>

                                </div>
                                <div class="product_quantity">
                                    <div class="sizeDiv">
                                        <?php if(count($product->productSizes) > 0): ?>
                                            <p><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.size')); ?> <?php else: ?> <?php echo e(trans('frontend.size')); ?> <?php endif; ?></p>
                                            <?php foreach($product->productSizes as $productSize): ?>
                                                <input id="size_<?php echo e($productSize->product_wise_size_id); ?>" class="product-size" name="item_size" type="radio"
                                                       value="<?php echo e($productSize->product_wise_size_id); ?>">
                                                <label id="labelForSize_<?php echo e($productSize->product_wise_size_id); ?>" for="size_<?php echo e($productSize->product_wise_size_id); ?>">
                                                    <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($productSize->size_title_lang1); ?> <?php else: ?> <?php echo e($productSize->size_title_lang2); ?> <?php endif; ?>
                                                </label>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="colorDiv">
                                        <?php if(count($product->productColors) > 0): ?>
                                            <br><p><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.color')); ?> <?php else: ?> <?php echo e(trans('frontend.color')); ?> <?php endif; ?></p>
                                            <?php foreach($product->productColors as $productColor): ?>
                                                <input class="product-color" id="color_<?php echo e($productColor->product_wise_color_id); ?>" name="item_color" type="radio"
                                                       value="<?php echo e($productColor->product_wise_color_id); ?>">
                                                <label id="labelForColor_<?php echo e($productColor->product_wise_color_id); ?>" for="color_<?php echo e($productColor->product_wise_color_id); ?>">
                                                    <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($productColor->color_name_lang1); ?> <?php else: ?> <?php echo e($productColor->color_name_lang2); ?> <?php endif; ?>
                                                </label>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="product_add_to_cart">
                                    <button class="btn btn-success add-to-cart">
                                        <i class="fa fa-cart-plus"></i>
                                        <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.add_to_cart')); ?> <?php else: ?> <?php echo e(trans('frontend.add_to_cart')); ?> <?php endif; ?>
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                    <a href="<?php echo e(URL::to('checkout')); ?>" class="btn btn-success order_now" data-status="1">
                                        <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.order_now')); ?> <?php else: ?> <?php echo e(trans('frontend.order_now')); ?> <?php endif; ?>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-5">
                <div style="padding-top: 10px;font-size: 21px;">
                    <?php echo e(trans('frontend.call_for_order')); ?>

                    <strong style="color: darkviolet">
                        <span>
                            <span class="fa fa-phone"></span>
                            <?php if(Session::get('frontend_lang') == 1): ?> 
                                01633-666 222 
                            <?php else: ?> 
                                <?php echo e(App\Http\Helper::bnNum('01633-666 222')); ?>

                            <?php endif; ?>
                        </span>
                        <br>
                        <span style="padding-left: 145px;">
                            <span class="fa fa-phone"></span>
                            <?php if(Session::get('frontend_lang') == 1): ?> 
                                01978-667 222 
                            <?php else: ?> 
                                <?php echo e(App\Http\Helper::bnNum('01978-667 222')); ?>

                            <?php endif; ?>
                        </span>                    
                    </strong>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Close Product Preview and Purchase -->


<!--Start Product Description -->
<section class="product_description">
    <div class="container">

        <div class="product_des_section_title">
            <h2>
                <i class="fa fa-tag"></i>
                <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.product_details')); ?> <?php else: ?> <?php echo e(trans('frontend.product_details')); ?> <?php endif; ?>
            </h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="product_description_list">
                    <ul>
                        <?php
                        if (Session::get('frontend_lang') == 1) {
                             $details = explode('#', $product->details_lang1);
                        }else{
                             $details = explode('#', $product->details_lang2);
                        }
                       
                        ?>
                        <?php foreach($details as $details): ?>
                            <li><?php echo e($details); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <?php /* <div class="col-md-4">
                <div class="about_buyer">
                    <h2>
                        <i class="fa fa-user"></i>
                        <?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.saler')); ?> <?php else: ?> <?php echo e(trans('frontend.saler')); ?> <?php endif; ?>
                    </h2>
                    <h3>
                        <a href="<?php echo e(URL::to('merchantAllProducts')); ?>/<?php echo e($product->merchantInformation->merchantId); ?>" target="_blank">
                            <i class="fa fa-bars"></i>
                            <?php echo e($product->merchantInformation->company_name); ?> (<?php echo e($product->merchantTotalProduct); ?>)
                        </a>
                    </h3>

                    <div class="delivery_charge">
                        <p><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.delevery_charge')); ?> <?php else: ?> <?php echo e(trans('frontend.delevery_charge')); ?> <?php endif; ?></p>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td></td>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.dhaka')); ?> <?php else: ?> <?php echo e(trans('frontend.dhaka')); ?> <?php endif; ?></td>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.out_side_dhaka')); ?> <?php else: ?> <?php echo e(trans('frontend.out_side_dhaka')); ?> <?php endif; ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.charge')); ?> <?php else: ?> <?php echo e(trans('frontend.charge')); ?> <?php endif; ?></td>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> Tk 50 <?php else: ?> ৳ ৫০ <?php endif; ?></td>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> Tk 90 <?php else: ?> ৳ ৯০ <?php endif; ?></td>
                            </tr>
                            <tr>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e(trans('frontend.speed')); ?> <?php else: ?> <?php echo e(trans('frontend.speed')); ?> <?php endif; ?></td>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> 1 Day <?php else: ?> ১ দিন <?php endif; ?></td>
                                <td><?php if(Session::get('frontend_lang') == 1): ?> 3 Days <?php else: ?> ৩ দিন <?php endif; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div> */ ?>


        </div>
    </div>
</section>
<!--Close Product Description -->

<script type="text/javascript">
    var product_id   = "<?php echo e($product->product_id); ?>";
</script>
<?php echo $__env->make('frontend.shoppingCartAjaxRequest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php endif; ?>

<!--Start Related Product -->
<?php if(count($relatedProducts) > 0): ?>
<section class="related_porduct_section">
    <div class="container">
        <div class="related_porduct_title">
            <h2><?php echo e(trans('frontend.related_product')); ?></h2>
        </div>
        <div class="row">
            
                <?php foreach($relatedProducts as $relatedProduct): ?>
                    <div class="col-md-2">
                        <div class="single_related_product">
                            <a href="<?php echo e(URL::to('product-details').'/'.$relatedProduct->product_id.'/'.$relatedProduct->slug); ?>" target="_blank">
                                <img src="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($relatedProduct->path); ?>" alt="">
                                <div class="related_porduct_price">
                                    <p>
                                        <?php if(Session::get('frontend_lang') == 1): ?> Tk <?php echo e($relatedProduct->sale_price); ?> <?php else: ?> ৳ <?php echo e(App\Http\Helper::bnNum($product->sale_price)); ?>  <?php endif; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(count($mostSaleProducts) > 0): ?>
    <section class="related_porduct_section">
        <div class="container">
            <div class="related_porduct_title">
                <h2><?php echo e(trans('frontend.most_sale_product')); ?></h2>
            </div>
            <div class="row">
                <?php foreach($mostSaleProducts as $mostSaleProduct): ?>
                    <div class="col-md-2">
                        <div class="single_related_product">
                            <a href="<?php echo e(URL::to('product-details').'/'.$mostSaleProduct->product_id.'/'.$mostSaleProduct->slug); ?>" target="_blank">
                                <img src="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($mostSaleProduct->path); ?>" alt="">
                                <div class="related_porduct_price">
                                    <p>
                                        <?php if(Session::get('frontend_lang') == 1): ?> Tk <?php echo e($mostSaleProduct->sale_price); ?> <?php else: ?> ৳ <?php echo e(App\Http\Helper::bnNum($product->sale_price)); ?>  <?php endif; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.singleProductApp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>