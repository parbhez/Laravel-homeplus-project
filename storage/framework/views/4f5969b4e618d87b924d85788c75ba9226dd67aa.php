<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box_body">
                <div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Orders
					</span>
			    </span>
                </div>
                <div class="block" style=" margin-top: 10px; ">
                    <div class="block-content-outer">
                        <div class="block-content-inner">
                            <!-- =======Start Page Content======= -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#viewUser" aria-controls="viewUser"
                                                                          role="tab" data-toggle="tab">View Order</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="viewUser">
                                    <table id="UsersdataTables" class="table table-bordered"
                                           style="width: 100%; font-size: 13px">
                                        <thead>
                                        <tr>
                                            <th># SL no</th>
                                            <th>Customer Name</th>
                                            <th>Invoice</th>
                                            <th>Order Date</th>
                                            <th>Sub Total</th>
                                            <th>Shipping Cost</th>
                                            <th>Total Payable</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                            <th width="50px">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        $lang = Session::get('last_login_lang');
                                        ?>
                                        <?php if(isset($allOrder)): ?>
                                            <?php foreach($allOrder as $orders): ?>
                                                <tr>
                                                    <td><?php echo e(++$i); ?></td>
                                                    <td>
                                                        <span><?php echo e($orders->name); ?></span>
                                                    </td>
                                                    <td>
                                                        <a href="#modal" data-toggle="modal" class="modal2" onclick="loadModalEdit('loadOrderDetailsModal','<?php echo e($orders->order_id); ?>','view')"><span style="font-size: 12px;"><?php echo e($orders->invoice_no); ?></span></a>
                                                    </td>
                                                    <td>
                                                        <span><?php echo e($orders->order_date); ?></span>
                                                    </td>
                                                    <td>
                                                        <span><?php echo e($orders->total_amount); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <span><?php echo e($orders->shipping_cost); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <span><?php echo e(($orders->total_amount + $orders->shipping_cost) - $orders->discount); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <span><?php echo e($orders->payable); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <?php if($orders->status == 0): ?>
                                                            <label class="label label-info">Pending</label>
                                                        <?php elseif($orders->status == 1): ?>
                                                            <label class="label label-primary">Approved</label>
                                                        <?php elseif($orders->status == 2): ?>
                                                            <label class="label label-warning">Shipment</label>
                                                        <?php elseif($orders->status == 3): ?>
                                                            <label class="label label-success">Sale Product</label>
                                                        <?php elseif($orders->status == 4): ?>
                                                            <label class="label label-danger">Admin Cancel</label>
                                                        <?php elseif($orders->status == 5): ?>
                                                            <label class="label label-danger">Merchant Cancel</label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($orders->status == 0): ?>
                                                            <a href="javascript:;" onclick="approveConfirm(<?php echo e($orders->order_id); ?>)" class="btn btn-primary btn-sm" id="approveOrder_<?php echo e($orders->order_id); ?>"><span class="fa fa-check"><?php echo e(trans('common.approve')); ?></span></a></br>
                                                            <a href="javascript:;" onclick="denyConfirm(<?php echo e($orders->order_id); ?>)" class="btn-update btn btn-primary btn-sm" id="denyOrder_<?php echo e($orders->order_id); ?>"><span class="fa fa-times"><?php echo e(trans('common.deny')); ?></span></a>
                                                        <?php elseif($orders->status == 1): ?>
                                                            <a href="javascript:;" onclick="shiftmentConfirm(7)" class="btn btn-primary btn-xs" id="shiftmetOrder_7"><span class="fa fa-check">Shipment</span></a>
                                                        <?php elseif($orders->status == 2): ?>
                                                            <a href="javascript:;" onclick="saleConfirm(<?php echo e($orders->order_id); ?>)" class="btn btn-primary btn-xs" id="approveOrder_<?php echo e($orders->order_id); ?>"><span class="fa fa-check"> Sale</span></a></br>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- =======End Page Content======= -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#UsersdataTables').DataTable();
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            $('.modal-title').html('Edit Order');
            $('.modal-dialog').removeClass('modal-small');
            $('.modal-dialog').addClass('modal-lg');
        });

    </script>

<?php $__env->stopSection(); ?>


<script type="text/javascript">

    
    //===@@ Approve Operation @@=====

    function approveConfirm(orderId) {
        $.ajax({
            url: "approveOrder/" + orderId,
            type: "GET",
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                $('.loading').hide();
                if (data.success == true) {
                    $('.info-approve').slideDown().delay(1000).slideUp();
                    $("#approveOrder_" + orderId).parent().parent().hide();
                    location.reload();
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                }
            },
            error: function () {
                $('.loading').hide();
                alert("Error Occured..!!");
            }
        });
        return true;
    }

    //Sale Confirm Section

    function saleConfirm(orderId) {
        $.ajax({
            url: "saleConfirm/" + orderId,
            type: "GET",
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                $('.loading').hide();
                if (data.success == true) {
                    $('.info-approve').slideDown().delay(1000).slideUp();
                    $("#approveOrder_" + orderId).parent().parent().hide();
                    location.reload();
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                }
            },
            error: function () {
                $('.loading').hide();
                alert("Error Occured..!!");
            }
        });
        return true;
    }

    //===@@ Shiftment Operation @@=====
    function shiftmentConfirm(id) {
        $.ajax({
            url: "merchantShiftmentOrder/" + id,
            dataType: 'json',
            success: function (data) {
                if (data.success == true) {
                    $('.info-approve').slideDown().delay(1000).slideUp();
                    $("#approveOrder_" + id).parent().parent().hide(1500);
                    location.reload();
                    return false;
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                    return false;
                }

            }
        });
        return true;
    }
    //===@@ Deny Operation @@=====


    function denyConfirm(orderId) {
        $.ajax({
            url: "denyOrder/" + orderId,
            dataType: 'json',
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (data) {
                $('.loading').hide();
                if (data.success == true) {
                    $('.info-deny').slideDown().delay(1000).slideUp();
                    $("#denyOrder_" + orderId).parent().prev().html("<label class='label label-danger'>Admin Cancel</label>");
                    location.reload();
                }
                else {
                    $('.info-error').slideDown().delay(500).slideUp();
                }

            },
            error: function () {
                $('.loading').hide();
                alert("Error Occured..!!");
            }
        });
        return true;

    }

</script> 
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>