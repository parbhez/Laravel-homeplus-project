<!--Start Slider-->
<div class="col-md-10 col-sm-9">
    <div class="main_slider">
        <?php if(isset($topSlider)): ?>
            <?php foreach($topSlider as $slider): ?>
                <?php if(! empty($slider->fk_sub_category_id)): ?>
                    <?php
                    $subCategoryName = (Session::get('frontend_lang') == 1) ? $slider->sub_category_name_lang1 : $slider->sub_category_name_lang1;
                    $subCategoryName = str_replace(' ','-',$subCategoryName)
                    ?>

                    <div class="item">
                        <a href="<?php echo e(URL::to('sub-category').'/'.$slider->sub_category_id .'/'.$subCategoryName); ?>" target="_blank">
                            <img src="<?php echo e(URL::to('public/images/photoSlider').'/'.$slider->image_path); ?>">
                        </a>
                    </div>
                <?php else: ?>
                    <?php
                    $categoryName = (Session::get('frontend_lang') == 1) ? $slider->category_name_lang1 : $slider->category_name_lang1;
                    $categoryName = str_replace(' ','-',$categoryName)
                    ?>
                    <div class="item">
                        <a href="<?php echo e(URL::to('category').'/'.$slider->category_id .'/'.$categoryName); ?>" target="_blank">
                            <img src="<?php echo e(URL::to('public/images/photoSlider').'/'.$slider->image_path); ?>">
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="second_slider">
        <?php if(isset($selectedProducts)): ?>
            <?php foreach($selectedProducts as $selectedProduct): ?>
                <div class="product_unit">
                    <a href="<?php echo e(URL::to('product-details').'/'.$selectedProduct->product_id.'/'.$selectedProduct->slug); ?>" target="_blank">
                        <img src="<?php echo e(URL::to('public/images/product/').'/'.$selectedProduct->path); ?>">
                    </a>
                    <div class="product_unit_content">
                        <a href="" target="_blank">
                            <h2><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($selectedProduct->product_name_lang1); ?> <?php else: ?> <?php echo e($selectedProduct->product_name_lang2); ?><?php endif; ?></h2>
                        </a>
                        <h3>
                            <?php if(Session::get('frontend_lang') == 1): ?>
                                ৳ <?php echo e($selectedProduct->sale_price); ?>

                            <?php else: ?>
                                ৳ <?php echo e(App\Http\Helper::bnNum($selectedProduct->sale_price)); ?>

                            <?php endif; ?>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!--Start Slider-->

</div>
</div>
</section>
<!--Close Menu Menu & Slider-->