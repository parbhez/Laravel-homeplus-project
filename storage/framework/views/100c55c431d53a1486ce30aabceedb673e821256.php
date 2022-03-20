<?php echo HTML::style('public/frontend/assets/css/product-list.css'); ?>

<?php echo HTML::style('public/frontend/assets/css/solaiman-lipi.css'); ?>

<?php echo HTML::style('public/frontend/assets/css/single_product_view.css'); ?>


<?php echo HTML::style('public/assets/css/optional/datatables/css/dataTables.bootstrap.min.css'); ?>

<?php echo HTML::style('public/assets/css/optional/datatables/css/dataTables.tableTools.min.css'); ?>

<?php echo HTML::style('public/assets/css/optional/datatables/css/dataTables.responsive.min.css'); ?>

<style type="text/css">
    .nav-tabs li a{
        background: #2D6694;
    }
    .nav-tabs .active>a{
        color: #000 !important;
        font-weight: bold;
    }
</style>
<?php $__env->startSection('main_container'); ?>
        <!--Start Customer Dashboard -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="customer_profile">
                    <?php echo $__env->make('frontend.errors.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('frontend.errors.ajaxMsg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active" role="presentation">
                            <a aria-expanded="true" href="#new_order_list" aria-controls="new_order_list" role="tab"
                               data-toggle="tab">
                                <?php echo e(trans('frontend.new_order_list')); ?>

                            </a>
                        </li>
                        <li class="" role="presentation">
                            <a aria-expanded="true" href="#order_list" aria-controls="order_list" role="tab"
                               data-toggle="tab">
                                <?php echo e(trans('frontend.order_list')); ?>

                            </a>
                        </li>
                        <li role="presentation">
                            <a aria-expanded="false" href="#account_update" aria-controls="account_update" role="tab"
                               data-toggle="tab">
                                <?php echo e(trans('frontend.account_update')); ?>

                            </a>
                        </li>
                        <li class="" role="presentation">
                            <a aria-expanded="false" href="#change_password" aria-controls="change_password" role="tab"
                               data-toggle="tab">
                                <?php echo e(trans('frontend.password_change')); ?>

                            </a>
                        </li>
                    </ul>

                    <div class="tab-content section">

                        <div role="tabpanel" class="tab-pane active" id="new_order_list">

                            <div class="row">
                                <div class="col-md-12" style="margin-top: 20px">
                                    <?php $i = 1; $subTotal = 0; ?>
                                    <?php if(Session::has('cartInfo')): ?>
                                        <div class="cart_product_description" style="margin-top: 20px">
                                            <div class="login_section_title">
                                                <h2>
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <?php echo e(trans('frontend.cart_title')); ?>

                                                    <?php echo e(count(Session::get('cartInfo'))); ?>

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
                                                <?php foreach(Session::get('cartInfo') as $product): ?>
                                                    <tr style="height: 20px">
                                                        <td>
                                                            <p><?php echo e($i++); ?></p>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo e(URL::to('public/images/product').'/'.$product->path); ?>">
                                                        </td>
                                                        <td>
                                                            <h2><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($product->product_name_lang1); ?> <?php else: ?> <?php echo e($product->product_name_lang2); ?> <?php endif; ?></h2>
                                                            <p>
                                                                Shopping
                                                                Code:<?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->product_code); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->product_code)); ?>  <?php endif; ?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p><?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->color_name_lang1 .' / '. $product->size_title_lang1); ?><?php else: ?> <?php echo e($product->color_name_lang2 .' / '. $product->size_title_lang2); ?> <?php endif; ?></p>
                                                        </td>
                                                        <td>
                                                            <input value="<?php echo e($product->product_id); ?>" type="hidden"
                                                                   name="product_id"
                                                                   id="productId_<?php echo e($product->cart_item_id); ?>">
                                                            
                                                            <input class="text-center quantity"
                                                                   value="<?php echo e($product->quantity); ?>" type="text"
                                                                   name="quanitty"
                                                                   id="quanitty_<?php echo e($product->cart_item_id); ?>"
                                                                   style="margin-top:15px;text-align: center">
                                                        </td>
                                                        <td>
                                                            <p id="unitPrice_<?php echo e($product->cart_item_id); ?>"><?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->sale_price); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->sale_price)); ?>  <?php endif; ?></p>
                                                        </td>
                                                        <td>
                                                            <p id="toalPrice_<?php echo e($product->cart_item_id); ?>"><?php if(Session::get('frontend_lang') == 1): ?><?php echo e($product->sale_price * $product->quantity); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($product->sale_price * $product->quantity)); ?>  <?php endif; ?></p>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                <i class="fa fa-trash-o cart_quantity_delete"
                                                                   id="productDelete_<?php echo e($product->cart_item_id); ?>"></i>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <?php $subTotal += $product->sale_price * $product->quantity; ?>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <div style="margin-left:400px;padding: 10px;">
                                                <table>
                                                    <tr>
                                                        <td><b> Sub Total Amount </b></td>
                                                        <td>
                                                            <label class="sub_total"> <?php echo e($subTotal); ?> </label>
                                                            <input type="hidden" name="ex_sub_total" id="ex_sub_total" value="<?php echo e($subTotal); ?>" />
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b> Shoping Cost </b></td>
                                                        <td><label class="shipment_cost"> 0 </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b> Total Amount </b></td>
                                                        <td><label class="net_total"> <?php echo e($subTotal); ?> </label></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div> <!--Start Delivery section-->
                                    <?php endif; ?>
                                    <?php if(Session::has('cartInfo')): ?>
                                        <div class="login_section_title" style="margin-top: 20px">
                                            <h2>
                                                <i class="fa fa-truck"></i>
                                                <?php echo e(trans('frontend.save_shopping')); ?>

                                            </h2>
                                        </div>
                                        <div class="login_section">
                                            <?php echo Form::open(['route' => 'saveShoppingCartItem','id' => 'product-order-form']); ?>

                                            <p><b> <?php echo e(trans('frontend.delivery_hints')); ?></b></p>
                                            <br>
                                            <div class="form-group">
                                                <label for="address"><?php echo e(trans('frontend.mobile_no')); ?></label>
                                                <input type="text" disabled="true" class="form-control" value="<?php echo e(Session::get('frontendUser.mobile_no')); ?>">
                                            </div>
                                            <div class="form-group">                                            
                                                <label for="mobile"><?php echo e(trans('frontend.alternative_mobile_no')); ?></label>
                                                <input type="hidden" name="shipping_cost" id="shipment_cost" value="0">
                                                <input type="text" class="form-control" name="mobile_no"
                                                       data-inputmask='"mask": "99999-999999"' data-mask>
                                            </div>
                                            <div class="form-group">
                                                <label for="address"><?php echo e(trans('frontend.delivery_address')); ?></label>
                                                <textarea class="form-control" rows="5" name="address"> <?php echo e(Session::get('frontendUser.address')); ?> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="district"><?php echo e(trans('frontend.city_name')); ?></label>
                                                <select class="form-control" name="city_name_id" id="city-select">
                                                    <option selected="selected" disabled>Select City</option>
                                                    <?php if(isset($cities)): ?>
                                                        <?php foreach($cities as $citie): ?>
                                                            <option value="<?php echo e($citie->id); ?>"
                                                                    data-cost="<?php echo e($citie->cost); ?>"><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($citie->city_name_lang1); ?> <?php else: ?> <?php echo e($citie->city_name_lang2); ?>  <?php endif; ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success">
                                                <?php echo e(trans('frontend.save_shopping')); ?>

                                            </button>
                                            <?php echo Form::close(); ?>

                                        </div><!--End Delivery Section-->
                                    <?php else: ?>
                                        <p style="color: orange;padding-top: 20px;">
                                            <b><?php echo e(trans('frontend.order_tile')); ?></b>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="order_list">
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 20px">
                                    <div class="cart_product_description">

                                        <div class="login_section_title">
                                            <h2>
                                                <i class="fa fa-shopping-cart"></i>
                                                <?php echo e(trans('frontend.order_info')); ?>

                                            </h2>
                                        </div>
                                        <div style="padding: 25px">
                                            <table class="table table-bordered table-responsive table-hover"
                                                   id="datatable">
                                                <thead>
                                                <tr>
                                                    <th><p><?php echo e(trans('frontend.sl_no')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.product_image')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.product_details')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.order_date')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.address')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.company_name')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.quantity')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.unit_price')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.total_price')); ?></p></th>
                                                    <th><p><?php echo e(trans('frontend.status')); ?></p></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(isset($orderLists)): ?>
                                                    <?php $i = 1;  ?>
                                                    <?php foreach($orderLists as $orderList): ?>
                                                        <tr>
                                                            <td>
                                                                <p><?php echo e($i++); ?></p>
                                                            </td>
                                                            <td>
                                                                <img src="<?php echo e(URL::to('public/images/product').'/'.$orderList->path); ?>"
                                                                     alt="">
                                                            </td>
                                                            <td>
                                                                <h2><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($orderList->product_name_lang1); ?> <?php else: ?> <?php echo e($orderList->product_name_lang2); ?> <?php endif; ?></h2>
                                                                <p>
                                                                    Shopping
                                                                    Code:<?php if(Session::get('frontend_lang') == 1): ?><?php echo e($orderList->product_code); ?><?php else: ?> <?php echo e(App\Http\Helper::bnNum($orderList->product_code)); ?>  <?php endif; ?>
                                                                </p>
                                                                <a href="<?php echo e(URL::to('product-details').'/'.$orderList->product_id.'/'.$orderList->slug); ?>"
                                                                   class="btn btn-sm btn-success"
                                                                   style="margin-top: 5px;">আবার কিনুন</a>
                                                            </td>
                                                            <td>
                                                                <p><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($orderList->order_date); ?> <?php else: ?> <?php echo e(App\Http\Helper::bnDate($orderList->order_date)); ?> <?php endif; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo e($orderList->address); ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo e($orderList->company_name); ?></p>
                                                            </td>
                                                            
                                                            <td>
                                                                <p><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($orderList->quantity); ?> <?php else: ?> <?php echo e(App\Http\Helper::bnNum($orderList->quantity)); ?> <?php endif; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($orderList->sale_price); ?> <?php else: ?> <?php echo e(App\Http\Helper::bnNum($orderList->sale_price)); ?> <?php endif; ?></p>
                                                            </td>
                                                            <td>
                                                                <?php $offsetTotal = (($orderList->quantity * $orderList->sale_price) - $orderList->discount) + $orderList->vat ?>
                                                                <h3><?php if(Session::get('frontend_lang') == 1): ?> <?php echo e($offsetTotal); ?> <?php else: ?> <?php echo e(App\Http\Helper::bnDate($offsetTotal)); ?> <?php endif; ?></h3>
                                                            </td>
                                                            <td>
                                                                <?php if($orderList->status == 0): ?>
                                                                    <p>
                                                                        <span class="label label-warning label-sm"> <?php echo e(trans('frontend.pending')); ?> </span>
                                                                    </p>
                                                                <?php elseif($orderList->status == 1): ?>
                                                                    <p>
                                                                        <span class="label label-success label-sm"> <?php echo e(trans('frontend.approved')); ?> </span>
                                                                    </p>
                                                                <?php elseif($orderList->status == 2): ?>
                                                                    <p><span class="label label-primary label-sm"> <?php echo e(trans('frontend.shiptemnt')); ?> </span>
                                                                    </p>
                                                                <?php elseif($orderList->status == 3): ?>
                                                                    <p>
                                                                        <span class="label label-success label-sm"> <?php echo e(trans('frontend.sale')); ?> </span>
                                                                    </p>
                                                                <?php elseif($orderList->status == 4): ?>
                                                                    <p>
                                                                        <span class="label label-danger label-sm"> <?php echo e(trans('frontend.deny')); ?> </span>
                                                                    </p>
                                                                <?php elseif($orderList->status == 5): ?>
                                                                    <p>
                                                                        <span class="label label-danger label-sm"> <?php echo e(trans('frontend.deny')); ?> </span>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="account_update">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-2">

                                    <div class="customer_profile_update">
                                        <h2>এখানে পরিবর্তন করুন</h2>
                                        <?php echo Form::open(['route'=>'updateUserProfile','class'=>'form-horizontal profile-update-form']); ?>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">নাম</label>
                                            <div class="col-sm-9">
                                                <input name="full_name" value="<?php echo e($user->full_name); ?>"
                                                       class="form-control" id="name" placeholder="নাম" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">ইমেইল</label>
                                            <div class="col-sm-9">
                                                <input name="email" value="<?php echo e($user->email); ?>" class="form-control"
                                                       id="email" placeholder="ইমেইল" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile-no" class="col-sm-3 control-label">মোবাইল নম্বর</label>
                                            <div class="col-sm-9">
                                                <input name="mobile_no" value="<?php echo e($user->mobile_no); ?>"
                                                       class="form-control" id="mobile-no" placeholder="মোবাইল নম্বর"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gander" class="col-sm-3 control-label">আমি একজন</label>
                                            <div class="col-sm-9">
                                                <select name="gender" id="gender" style="width:100%;">
                                                    <option <?php if($user->id == 1): ?> selected <?php endif; ?> value="1">পুরুষ</option>
                                                    <option <?php if($user->id == 2): ?> selected <?php endif; ?> value="2">মহিলা</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="district" class="col-sm-3 control-label">জেলা</label>
                                            <div class="col-sm-9">
                                                <textarea name="address"
                                                          class="form-control"><?php echo e($user->address); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default">আপডেট করুন</button>
                                            </div>
                                        </div>
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="change_password">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-2">

                                    <div class="customer_profile_update">
                                        <h2>এখানে পাসওয়ার্ড পরিবর্তন করুন</h2>

                                        <?php echo Form::open(['route'=>'saveUserPassword.post','class'=>'form-horizontal password-chage-form']); ?>

                                        <div class="form-group">
                                            <label class="col-md-3"> পুরাতন পাসওয়ার্ড </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control prev_password"
                                                       name="prev_password" placeholder="">
                                            </div>
                                            <div class="match-status">

                                            </div>
                                        </div>

                                        <div class="form-group new-passwprd" style="display:none;">
                                            <label class="col-md-3"> নতুন পাসওয়ার্ড </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control new_password" name="new_password"
                                                       placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-offset-3 col-md-6">
                                                <input style="display:none;" type="submit"
                                                       class="btn btn-success btn-md btn-save" value="আপডেট করুন">
                                            </div>
                                        </div>
                                        <?php echo Form::close(); ?>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!--Close Customer Dashboard -->

<?php echo e(HTML::script('public/assets/js/optional/datatables/js/jquery.dataTables.min.js')); ?>

<?php echo e(HTML::script('public/assets/js/optional/datatables/js/dataTables.bootstrap.min.js')); ?>


<?php echo e(HTML::script('public/frontend/assets/js/input-mask/jquery.inputmask.js')); ?>

<?php echo e(HTML::script('public/frontend/assets/js/input-mask/jquery.inputmask.extensions.js')); ?>


<?php echo $__env->make('frontend.shoppingCartAjaxRequest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script type="text/javascript">
    $(function () {
        $("[data-mask]").inputmask();
    });

    $('#product-order-form').validate({
        onkeyup: false,
        rules: {
            address: {
                required: true
            },
            city_name_id: {
                required: true
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('.alert').delay(1500).slideUp();

    $(document).ready(function () {
        var subTotal = "<?php echo e($subTotal); ?>";
        $('.sub_total').html(subTotal);
        var shippingCost = parseFloat($('.shipment_cost').html());
        $('.net_total').html(parseFloat(subTotal) + parseFloat(shippingCost));
    });

    $('#city-select').on('change',function (e) {
        if ($('.net_total').html() == 0) {
            return false;
        }
        var city_id = e.target.value;
        var city_wise_cost = parseFloat($('option:selected', this).attr('data-cost'));
        //var subTotal = parseFloat(<?php echo e($subTotal); ?>);
        var subTotal = parseFloat($(".sub_total").html());

        $("#shipment_cost").val(city_wise_cost);
        $(".shipment_cost").html(city_wise_cost);
        var shippingCost = parseFloat($('.shipment_cost').html());
        $('.net_total').html(parseFloat(subTotal) + shippingCost);
    });
</script>

<script type="text/javascript">
    $('.profile-update-form').on('submit', function (e) {
        e.preventDefault();
        var action = $(this).attr("action");
        var method = $(this).attr("method");
        var data = $(this).serializeArray();
        $.ajax({
            url: "<?php echo e(URL::to('updateUserProfile')); ?>",
            type: method,
            dataType: 'JSON',
            data: data,
            success: function (data) {
                if (data.success == true) {
                    $('.info-suc').slideDown().delay(1500).slideUp();
                } else if (data.success == false) {
                    $('.info-error').html(data.status).slideDown().delay(1500).slideUp();
                }
            },
            error: function (data) {
                alert("Error Occured ..!!");
            }
        });
    });


    $('.password-chage-form').on('submit', function () {
        var prev_password = $('.prev_password').val();
        var new_password = $('.new_password').val();
        if (new_password == '' || prev_password == '') {
            return false;
        }
    });

    $('.prev_password').on('keyup', function (e) {
        var prev_password = e.target.value;
        if (prev_password.length < 3) {
            $('.new-passwprd').slideUp(500);
            $('.btn-save').slideUp(500);
            $('.match-status').empty();
            return false;
        }
        $.ajax({
            url: "<?php echo e(URL::to('checkUserPassword')); ?>",
            type: "GET",
            cache: false,
            dataType: 'json',
            data: {'prev_password': prev_password},
            success: function (data) {
                $('.match-status').empty();
                if (data.success == true) {
                    $('.new-passwprd').slideDown(500);
                    $('.btn-save').slideDown(500);
                    $('.match-status').append('<span style="color:green" class="fa fa-check-square-o"> &nbsp;Matched</span>');
                } else if (data.error == true) {
                    $('.match-status').append('<span style="color:red" class="fa fa-ban"> &nbsp;Not Matched</span>');
                    $('.new-passwprd').slideUp(500);
                    $('.btn-save').slideUp(500);
                }
            },
            error: function (data) {
                alert('error occurred! Please Check');
            }
        });
    });

    $(document).ready(function () {
        $('.alert').delay(1000).slideUp();
        $('#datatable').DataTable();

        <?php /*var subTotal = "<?php echo e($subTotal); ?>";*/ ?>
        $('.sub_total').html(subTotal);
        var shippingCost = parseFloat($('.shipment_cost').html());
        $('.net_total').html(parseFloat(subTotal) + parseFloat(shippingCost));
    });
    $(".city").on('change', function () {
                <?php /*var subTotal = "<?php echo e($subTotal); ?>";*/ ?>
        var cost = $('option:selected', this).attr('data-cost');
        if ($('.net_total').html() == 0) {
            return false;
        }
        $(".shipment_cost").html(cost);
        var shippingCost = parseFloat($('.shipment_cost').html());
        $('.net_total').html(parseFloat(subTotal) + parseFloat(shippingCost));
    })

</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.singleProductApp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>