<?php $__env->startSection('main_container'); ?>

<?php echo $__env->make('frontend._partials.leftNavigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend._partials.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
//for solving slider image loading
    var mainSlider = document.getElementsByClassName('item');
    for(var i = 0; i < mainSlider.length; i++){
        if (i > 0){
            mainSlider[i].style.display = 'none';
        }
    }
    $('.product_unit').hide();
    $('body').ready(function() {
        $('.item').show();
        $('.product_unit').show();
    });
</script>
<?php if(isset($categoryForLeftRight['left'])): ?>
    <?php foreach($categoryForLeftRight['left'] as $leftCategory => $leftCategories): ?>
        <section class="product_one">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 extra-wide">
                        <div class="side_menu">
                            <?php
                            $leftSubCatName = explode('-', $leftCategory);
                            $categoryName = str_replace(' ', '-', $leftSubCatName[0])
                            ?>
                            <a href="<?php echo e(URL::to('category').'/'.$leftSubCatName[1].'/'.$categoryName); ?>"
                               target="">
                                <h2>
                                    <?php echo e($leftSubCatName[0]); ?>

                                </h2>
                            </a>
                            <ul>
                                <?php if(count($leftCategories) > 0 && ! empty($leftCategories[0])): ?>
                                    <?php foreach($leftCategories as $subCategory): ?>
                                        <?php
                                        $subCategoryArr = explode('-', $subCategory);
                                        $subCategoryName = str_replace(' ', '-', $subCategoryArr[0]);
                                        ?>
                                        <li>
                                            <a href="<?php echo e(URL::to('sub-category').'/'.$subCategoryArr[1].'/'.$subCategoryName); ?>"
                                               target="">
                                                <?php echo e($subCategoryArr[0]); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9">
                        <div class="row product_list">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <?php
                                    $x = 0;
                                    $categoryForLeftRight['right'][$leftCategory] = array_values($categoryForLeftRight['right'][$leftCategory]);
                                    ?>
                                    <?php foreach($categoryForLeftRight['right'][$leftCategory] as $products): ?>
                                        <div class="col-md-3 col-sm-3">
                                            <? $x++;?>
                                            <div class="product_unit"
                                                 style="margin-bottom: <? if ($x <= 4) echo '10px;'; ?>">
                                                <a href="<?php echo e(URL::to('product-details').'/'.$products->product_id.'/'.$products->slug); ?>"
                                                   target="_blank">
                                                    <img src="<?php echo e(URL::to('public/images/product')); ?>/<?php echo e($products->path); ?>"
                                                         alt="">
                                                </a>
                                                <div class="product_unit_content">
                                                    <a href="" target="_blank">
                                                        <h2><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($products->product_name_lang1); ?> <?php else: ?> <?php echo e($products->product_name_lang2); ?><?php endif; ?></h2>
                                                    </a>
                                                    <h3><?php if(Session::get('frontend_lang') == 1): ?>
                                                            Tk <?php echo e($products->sale_price); ?> <?php else: ?>
                                                            ৳ <?php echo e(App\Http\Helper::bnNum($products->sale_price)); ?><?php endif; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
<!--Close Product Section One-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>