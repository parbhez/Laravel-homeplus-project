<?php $__env->startSection('main_container'); ?>
    <?php echo $__env->make('frontend._partials.leftNavigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-md-9">
        <?php $lang = Session::get('frontend_lang');
           $data = count($products);
         ?>
         <?php if($data <= 0): ?>
            <?php if($lang == 1 ): ?>
                <div class="container" style="font-size: 20px; margin:100px; padding: 15px; color: purple">No Product Found.</div>
            <?php else: ?>
                <div class="container" style="font-size: 20px; margin:100px; padding: 15px;color: purple">কোন পন্য পাওয়া যায়নি.</div>

            <?php endif; ?>
         <?php endif; ?>
        <?php if(isset($products)): ?>
            <?php foreach($products as $product): ?>
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="product_unit">
                        <a href="<?php echo e(URL::to('product-details').'/'.$product->product_id.'/'.$product->slug); ?>"
                           target="">
                            <img src="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($product->path); ?>" alt="">
                        </a>
                        <?php if($lang==1): ?>
                            <div class="product_unit_content">
                                <a href="<?php echo e(URL::to('product-details').'/'.$product->product_id.'/'.$product->slug); ?>"
                                   target="">
                                    <h2><?php echo e($product->product_name_lang1); ?></h2>
                                </a>
                                <div class="price_and_order">
                                    <div class="price">
                                        <h3>৳ <?php echo e($product->sale_price); ?>/-</h3>
                                    </div>
                                    <div class="order">
                                        <?php /*<button class="btn btn-success"><a href="<?php echo e(URL::to('product-details').'/'.$product->product_id.'/'.$product->slug); ?>" target="" style="color: #FFFFFF;">Order</a></button>*/ ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="product_unit_content">
                                <a href="<?php echo e(URL::to('product-details').'/'.$product->product_id.'/'.$product->slug); ?>"
                                   target="">
                                    <h2><?php echo e($product->product_name_lang2); ?></h2>
                                </a>
                                <div class="price_and_order">
                                    <div class="price">
                                        <h3>৳ <?php echo e(App\Http\Helper::bnNum($product->sale_price)); ?>/-</h3>
                                    </div>
                                    <div class="order">
                                        <?php /*<button class="btn btn-success"><a href="<?php echo e(URL::to('product-details').'/'.$product->product_id.'/'.$product->slug); ?>" target="" style="color: #FFFFFF;">অর্ডার দিন</a></button>*/ ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</div>
</section>
    <br><br><br><br><br><br><br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>