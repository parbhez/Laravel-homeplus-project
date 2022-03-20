<div class="cart_product_description">

    <table class="table table-bordered table-responsive table-hover">
        <thead>
        <tr>
            <th>
                <p>SL No.</p>
            </th>
            <th>
                <p>Image</p>
            </th>
            <th>
                <p>Product Details</p>
            </th>
            <th>
                <p>Size/Color</p>
            </th>
            <th>
                <p>Quanity</p>
            </th>
            <th>
                <p>UnitPrice</p>
            </th>
            <th>
                <p>Total Price</p>
            </th>
            <th><p><i class="fa fa-remove"></i></p></th>
        </tr>
        </thead>
        <tbody>
            <?php if(Session::has('cartInfo')): ?>
                <?php $i = 1; ?>
                <?php foreach(Session::get('cartInfo') as $product): ?>
                    <tr>
                        <td>
                            <p><?php echo e($i++); ?></p>
                        </td>
                        <td>
                            <img src="<?php echo e(URL::to('public/images/product').'/'.$product->path); ?>" alt="">
                        </td>
                        <td>
                            <h2><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($product->product_name_lang1); ?> <?php else: ?> <?php echo e($product->product_name_lang2); ?> <?php endif; ?></h2>
                            <p>
                                Shopping Code:<?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->product_code); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->product_code)); ?>  <?php endif; ?>
                            </p>
                        </td>
                        <td>
                            <p><?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->color_name_lang1 .' / '. $product->size_title_lang1); ?><?php else: ?> <?php echo e($product->color_name_lang2 .' / '. $product->size_title_lang2); ?> <?php endif; ?></p>
                        </td>
                        <td>
                            <input value="<?php echo e($product->product_id); ?>" type="hidden" name="product_id" id="productId_<?php echo e($product->cart_item_id); ?>">
                            <input class="text-center quantity" value="<?php echo e($product->quantity); ?>" type="text" name="quanitty" id="quanitty_<?php echo e($product->cart_item_id); ?>" style="margin-top:15px;text-align: center">
                        </td>
                        <td>
                            <p id="unitPrice_<?php echo e($product->cart_item_id); ?>"><?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->sale_price); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->sale_price)); ?>  <?php endif; ?></p>
                        </td>
                        <td>
                            <p id="toalPrice_<?php echo e($product->cart_item_id); ?>"><?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->sale_price * $product->quantity); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->sale_price * $product->quantity)); ?>  <?php endif; ?></p>
                        </td>
                        <td>
                            <p>
                                <i class="fa fa-trash-o cart_quantity_delete" id="productDelete_<?php echo e($product->cart_item_id); ?>"></i>
                            </p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-offset-10 col-md-6">
        <a href="<?php echo e(URL::to('checkout')); ?>"  class="btn btn-primary btn-sm"> Checkout </a>
    </div>
</div>

<?php echo $__env->make('frontend.shoppingCartAjaxRequest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>