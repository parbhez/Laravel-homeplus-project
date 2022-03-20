<?php $__env->startSection('main_container'); ?>
    <?php echo $__env->make('frontend._partials.leftNavigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <?php echo $__env->make('frontend.errors.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('frontend.errors.ajaxMsg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="row">
                <div class="col-md-offset-2 col-md-10" style="margin-top: 20px">
                    <!--Start Login-->
                    <div class="login_section_title">
                        <h2>
                            <i class="fa fa-user"></i>
                            <?php echo e(trans('frontend.signin_pannel')); ?>

                        </h2>
                    </div>
                    <div class="login_section">
                        <?php echo Form::open(array('route'=>'checkUserLogin.post','id'=>'userLoginForm',)); ?>

                        <div class="form-group primary-form-group">
                            <label for="Email"><?php echo e(trans('frontend.email_address')); ?> *</label>
                            <input type="email" name="email" id="Email" class="form-control input-feild" required="">
                        </div>
                        <div class="form-group primary-form-group">
                            <label for="CreatePassword"><?php echo e(trans('frontend.password')); ?> *</label>
                            <input type="password" name="password" id="CreatePassword" class="form-control input-feild"
                                   required="">
                        </div>
                        <div class="forget_pass">
                            <a href="<?php echo e(URL::to('/')); ?>/forgotePassword"><?php echo e(trans('frontend.forget_password')); ?></a>
                        </div>
                        <button type="submit" class="btn btn-success"><?php echo e(trans('frontend.signin')); ?></button>
                        <?php echo Form::close(); ?>

                        <div class="without_login">
                            <p class="">-<?php echo e(trans('frontend.or')); ?>-</p>
                            <a href="<?php echo e(URL::to('frontendUser')); ?>" class="btn btn-warning btn-lg">
                                <?php echo e(trans('frontend.with_out_login')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(Session::has('cartInfo')): ?>
                <div class="row">
                    <div class="col-md-offset-2 col-md-10" style="margin-top: 30px">
                        <div class="cart_product_description">
                            <div class="login_section_title">
                                <h2>
                                    <i class="fa fa-shopping-cart"></i>
                                    <?php echo e(trans('frontend.cart_title')); ?>

                                </h2>
                            </div>

                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <p><?php echo e(trans('frontend.sl_no')); ?></p>
                                    </th>
                                    <th>
                                        <p><?php echo e(trans('frontend.image')); ?></p>
                                    </th>
                                    <th>
                                        <p><?php echo e(trans('frontend.product_detail')); ?></p>
                                    </th>
                                    <th>
                                        <p><?php echo e(trans('frontend.size_color')); ?></p>
                                    </th>
                                    <th>
                                        <p><?php echo e(trans('frontend.quantity')); ?></p>
                                    </th>
                                    <th>
                                        <p><?php echo e(trans('frontend.unit_price')); ?></p>
                                    </th>
                                    <th>
                                        <p><?php echo e(trans('frontend.total_price')); ?></p>
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
                    </div>
                </div>
            <?php endif; ?>
            <!--Start Login-->

        </div>
    </div>

</section>
</div>
</div>

    <?php echo $__env->make('frontend.shoppingCartAjaxRequest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript">
        $('#userLoginForm').validate({
            onkeyup: false,
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.alert').delay(1500).slideUp();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>