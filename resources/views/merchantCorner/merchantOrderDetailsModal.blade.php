<?php
$i = 1;
$j = 1;
$lang = Session::get('frontend_lang');
?>

@forelse($allInformation['details'] as $allDataForHeader)
    <table class="table table-hover table-bordered" width="100%">
        @if($j==1)
            <tbody class="">
            @if($lang == 1)
                <tr>
                    <td><b>{{trans('merchant.Invoice_No')}}. :</b> {{$allDataForHeader->invoice_no }}</td>
                    <td><b>{{trans('merchant.User_Name')}} :</b> {{$allDataForHeader->user_name}}</td>
                </tr>
                <tr>
                    <td><b>{{trans('merchant.Shipping_City')}} :</b> {{$allDataForHeader->city_name_lang1 }} </td>
                    <td width="30%"> <span>{{trans('merchant.Shipping_Cost')}}. : {{$allDataForHeader->shipping_cost}} TK</span> </td>
                </tr>
            @else
                <tr>
                    <td><b>{{trans('merchant.Invoice_No')}}.
                            :</b> {{App\Http\Helper::bnNum($allDataForHeader->invoice_no)}}</td>
                    <td><b>{{trans('merchant.User_Name')}} :</b> {{$allDataForHeader->user_name}}</td>
                </tr>
                <tr>
                    <td><b>{{trans('merchant.Shipping_City')}} :</b>
                        {{$allDataForHeader->city_name_lang2 }}
                    </td>
                    <td width="30%"> <span>{{trans('merchant.Shipping_Cost')}}. : {{App\Http\Helper::bnNum($allDataForHeader->shipping_cost)}} TK</span> </td>
                </tr>
            @endif
            </tbody>
    </table>
    <?php
    $j++;
    ?>
    @endif
@empty
<h3>Sorry ! There's no Order Information available..</h3>
@endforelse
<div style="color:red; text-align:center; font-size: 24px;" id="MAX_ERROR"></div>
<font style="font-size:24px;text-decoration:underline; color:#C37403; ">
    Order Details
</font>
<table class="table table-hover table-bordered" width="100%">
    <thead class="table-head">
    <tr>
        <th>{{trans('frontend.sl_no')}}</th>
        <th>{{trans('merchant.product_code')}}</th>
        <th>{{trans('merchant.product_name')}}</th>
        <th>{{trans('merchant.quantity')}}</th>
        <th>{{trans('merchant.size')}}</th>
        <th>{{trans('merchant.color')}}</th>
        <th>{{trans('merchant.price')}}</th>
        <th>{{trans('merchant.discount')}}</th>
        <th>{{trans('merchant.product_image')}}</th>
    </tr>
    </thead>
    @forelse($allInformation['details'] as $allData)
        @if($lang == 1)
            <tbody>
            <tr>
                <td class="">
                    <?php echo $i++; ?>
                    <input id="order_id{{$allData->order_details_id}}" class="form-control col-md-1 input-sm"
                           type="hidden" name="order_id[]" value="{{$allData->order_id}}">
                    <input id="order_wise_discount{{$allData->order_details_id}}" class="form-control col-md-1 input-sm"
                           type="hidden" name="order_wise_discount[]" value="{{$allData->order_wise_discount}}">
                    <input id="order_details_wise_ex_discount{{ $allData->order_details_id }}"
                           class="form-control col-md-1 input-sm" type="hidden" name="order_details_wise_ex_discount"
                           value="{{$allData->order_details_wise_discount}}">
                    <input id="product_wise_discount{{$allData->order_details_id}}"
                           class="form-control col-md-1 input-sm" type="hidden" name="product_wise_discount[]"
                           value="{{$allData->product_wise_discount}}">
                    <input id="total_amount{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                           type="hidden" name="total_amount" value="{{$allData->total_amount}}">
                    <input id="payable{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                           type="hidden" name="payable" value="{{$allData->payable}}">
                    <input id="product_price{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                           type="hidden" name="product_price" value="{{$allData->product_price}}">
                    <input id="product_id{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                           type="hidden" name="product_id" value="{{$allData->product_id}}">
                    <input id="ex_quantity{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                           type="hidden" name="ex_quantity" value="{{$allData->quantity}}">
                    <input id="available_quantity{{ $allData->order_details_id }}"
                           class="form-control col-md-1 input-sm" type="hidden" name="ex_quantity"
                           value="{{$allData->available_quantity}}">
                </td>
                <td class="">
                    <span>{{$allData->product_code}}</span>
                </td>
                <td class="">
                    <span>{{$allData->product_name_lang1}}</span>
                </td>

                <td class="">
                    <span>{{$allData->quantity}}</span>
                </td>

                <td class="">
                    <span>{{$allData->size_title_lang1}}</span>
                </td>

                <td class="">
                    <span>{{$allData->color_name_lang1}}</span>
                </td>

                <td class="">
                    <span>{{$allData->sale_price}}</span>
                </td>

                <td class="">
                    <span>{{$allData->order_details_wise_discount}}</span>

                </td>
                <td class="">
                    <span><img style="width: 50px; width: 50px;"
                               src="{{URL::to('public/images/product/')}}/{{$allData->path}}"></span>

                </td>
                <!-- <td class="">
                    <a href="javascript:;" class="btn-edit btn-edit-details-modal btn btn-primary btn-xs" id="editOrder_{{ $allData->order_details_id }}">
                        <span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span></a>
                    <a href="javascript:;" style="display:none;" class="btn-order-update btn btn-primary btn-xs" id="updateOrder_{{ $allData->order_details_id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $allData->order_details_id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-delete btn btn-info btn-xs" id="delete_{{ $allData->order_details_id }}"><span class="fa fa-trash" title="Refresh"></span></a>
                        
                </td> -->
            </tr>
            @else
                <tr>
                    <td class="">
                        <?php echo $i++; ?>
                        <input id="order_id{{$allData->order_details_id}}" class="form-control col-md-1 input-sm"
                               type="hidden" name="order_id[]" value="{{$allData->order_id}}">
                        <input id="order_wise_discount{{$allData->order_details_id}}"
                               class="form-control col-md-1 input-sm" type="hidden" name="order_wise_discount[]"
                               value="{{$allData->order_wise_discount}}">
                        <input id="order_details_wise_ex_discount{{ $allData->order_details_id }}"
                               class="form-control col-md-1 input-sm" type="hidden"
                               name="order_details_wise_ex_discount" value="{{$allData->order_details_wise_discount}}">
                        <input id="product_wise_discount{{$allData->order_details_id}}"
                               class="form-control col-md-1 input-sm" type="hidden" name="product_wise_discount[]"
                               value="{{$allData->product_wise_discount}}">
                        <input id="total_amount{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                               type="hidden" name="total_amount" value="{{$allData->total_amount}}">
                        <input id="payable{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                               type="hidden" name="payable" value="{{$allData->payable}}">
                        <input id="product_price{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                               type="hidden" name="product_price" value="{{$allData->product_price}}">
                        <input id="product_id{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                               type="hidden" name="product_id" value="{{$allData->product_id}}">
                        <input id="ex_quantity{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm"
                               type="hidden" name="ex_quantity" value="{{$allData->quantity}}">
                        <input id="available_quantity{{ $allData->order_details_id }}"
                               class="form-control col-md-1 input-sm" type="hidden" name="ex_quantity"
                               value="{{$allData->available_quantity}}">
                    </td>
                    <td class="">
                        <span>{{App\Http\Helper::bnNum($allData->product_code)}}</span>
                    </td>
                    <td class="">
                        <span>{{$allData->product_name_lang2}}</span>
                    </td>

                    <td class="">
                        <span>{{App\Http\Helper::bnNum($allData->quantity)}}</span>
                    </td>

                    <td class="">
                        <span>{{$allData->size_title_lang2}}</span>
                    </td>

                    <td class="">
                        <span>{{$allData->color_name_lang2}}</span>
                    </td>

                    <td class="">
                        <span>{{App\Http\Helper::bnNum($allData->sale_price)}}</span>
                    </td>

                    <td class="">
                        <span>{{App\Http\Helper::bnNum($allData->order_details_wise_discount)}}</span>
                    </td>
                    <td class="">
                        <span><img style="width: 50px; width: 50px;" src="{{URL::to('public/images/product/')}}/{{$allData->path}}"></span>
                    </td>
                    <!-- <td class="">
                    <a href="javascript:;" class="btn-edit btn-edit-details-modal btn btn-primary btn-xs" id="editOrder_{{ $allData->order_details_id }}">
                        <span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span></a>
                    <a href="javascript:;" style="display:none;" class="btn-order-update btn btn-primary btn-xs" id="updateOrder_{{ $allData->order_details_id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $allData->order_details_id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-delete btn btn-info btn-xs" id="delete_{{ $allData->order_details_id }}"><span class="fa fa-trash" title="Refresh"></span></a>
                    </td> -->
                </tr>
            @endif
            @empty
                <h3>Sorry ! There's no Order Information available..</h3>
            @endforelse
        </tbody>
</table>


<script type="text/javascript">
    //======@@ Edit btn function @@========
    $('.btn-edit-details-modal').on('click', function () {
        var data = $(".btn-order-update").attr("id");
        var arr = data.split('_');
        var orderDetailsId = arr[1];
        $(this).parent().prev().prev().prev().prev().prev().prev().children().next().show().prev().hide();
        $(this).parent().prev().prev().prev().prev().prev().children().next().show().width('35px').prev().hide();

        $(this).parent().prev().prev().children().next().show().width('58px').prev().hide();
        $(this).parent().prev().children().next().show().width('40px').prev().hide();
        $(this).next().show(); //show update bottom
        $(this).hide(); //hide update bottom

        if ($("#size_title_lang1" + orderDetailsId).val() != '') {
            $(this).parent().prev().prev().prev().prev().children().next().show().width('50px').prev().hide();
        }
        if ($("#color_name_lang1" + orderDetailsId).val() != '') {
            $(this).parent().prev().prev().prev().children().next().show().width('78px').prev().hide();
        }
    });

    //======@@ Save btn function @@========
    var loading = $('.loading');
    var info_err = $('.info-error');
    var info_suc = $('.info-suc');
    var db_err = $('.db-error');
    var inactive_msg = $('.inactive-msg');
    var active_msg = $('.active-msg');
    var delete_msg = $('.delete-msg');
    var warning_msg = $('.warning-msg');
    var fk_msg = $('.fk-msg');

    $('.btn-order-update').on('click', function () {
        var data = $(this).attr("id");
        var arr = data.split('_');
        var orderDetailsId = arr[1];
        var btn_update = $(this);
        var btn_edit = $(this).prev();
        var quantity = $("#quantity" + orderDetailsId).val();
        var ex_quantity = $("#ex_quantity" + orderDetailsId).val();
        var available_quantity = $("#available_quantity" + orderDetailsId).val();
        var price = $("#price" + orderDetailsId).val();
        var product_price = $("#product_price" + orderDetailsId).val();
        var order_id = $("#order_id" + orderDetailsId).val();
        var product_id = $("#product_id" + orderDetailsId).val();
        var size_title_lang1 = $("#size_title_lang1" + orderDetailsId).val();
        var size_title_text = $("#size_title_lang1" + orderDetailsId + " option:selected").text();
        var color_name_lang1 = $("#color_name_lang1" + orderDetailsId).val();
        var color_title_text = $("#color_name_lang1" + orderDetailsId + " option:selected").text();
        var order_wise_discount = $("#order_wise_discount" + orderDetailsId).val();
        var order_details_wise_discount = $("#order_details_wise_discount" + orderDetailsId).val();
        var order_details_wise_ex_discount = $("#order_details_wise_ex_discount" + orderDetailsId).val();
        var product_wise_discount = $("#product_wise_discount" + orderDetailsId).val();
        var total_amount = $("#total_amount" + orderDetailsId).val();
        var payable = $("#payable" + orderDetailsId).val();

        if (orderDetailsId == '' || quantity == '' || order_details_wise_discount == '') {
            alert('Warning!Blank Field must be required.');
            return false;
        }
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

        $.ajax({
            url: "{{URL::to('saveEditOrdersInfo')}}",
            type: "GET",
            cache: false,
            dataType: 'json',
            data: {
                'order_id': order_id,
                'orderDetailsId': orderDetailsId,
                'quantity': quantity,
                'ex_quantity': ex_quantity,
                'available_quantity': available_quantity,
                'price': price,
                'product_price': product_price,
                'product_id': product_id,
                'total_amount': total_amount,
                'payable': payable,
                'size_title_lang1': size_title_lang1,
                'color_name_lang1': color_name_lang1,
                'order_details_wise_discount': order_details_wise_discount,
                'order_wise_discount': order_wise_discount,
                'product_wise_discount': product_wise_discount,
                'order_details_wise_ex_discount': order_details_wise_ex_discount,
            }, // serializes the form's elements.

            success: function (data) {
                if (data.success == true) {
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();//hide update bottom
                    $("#MAX_ERROR").html('');
                    $('#product_name_lang1' + orderDetailsId).hide().prev().show();
                    $('#quantity' + orderDetailsId).hide().prev().show().html(quantity); // convert input field to text mode
                    if (size_title_text != '') {
                        $('#size_title_lang1' + orderDetailsId).hide().prev().show().html(size_title_text); // convert input field to text mode
                    }
                    if (color_title_text != '') {
                        $('#color_name_lang1' + orderDetailsId).hide().prev().show().html(color_title_text);
                    }
                    $('#price' + orderDetailsId).hide().prev().show();
                    $('#order_details_wise_discount' + orderDetailsId).hide().prev().show().html(order_details_wise_discount);
                }
                if (data.success == false) {
                    info_err.hide().find('ul').empty();
                    $.each(data.error, function (index, error) {
                        info_err.find('ul').append('<li>' + error + '</li>');
                    });
                    info_err.slideDown();
                    info_err.delay(6000).slideUp(300);
                }
                if (data.MAX_ERROR == true) {
                    $("#MAX_ERROR").html(data.status);
                }

                if (data.error == true) {
                    db_err.hide().find('label').empty();
                    db_err.find('label').append(data.status);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();
                    $('#product_name_lang1' + orderDetailsId).hide().prev().show();
                    $('#quantity' + orderDetailsId).hide().prev().show(); // convert input field to text mode
                    $('#size_title_lang1' + orderDetailsId).hide().prev().show(); // convert input field to text mode
                    $('#color_name_lang1' + orderDetailsId).hide().prev().show();
                    $('#price' + orderDetailsId).hide().prev().show();
                    $('#order_details_wise_discount' + orderDetailsId).hide().prev().show();
                    db_err.slideDown();
                    db_err.delay(5000).slideUp(300);
                }
                loading.hide();
            },
            error: function (data) {
                alert('error occurred! Please Check');
                loading.hide();
            }
        });
    });
    //======@@ Update Opration @@======


    //======@@ Delete Opration @@======

    $('.btn-delete').on('click', function () {
        var data = $(this).attr("id");
        var arr = data.split('_');
        var orderDetailsId = arr[1];
        var order_id = $("#order_id" + orderDetailsId).val();
        var order_wise_discount = $("#order_wise_discount" + orderDetailsId).val();
        var order_details_wise_discount = $("#order_details_wise_discount" + orderDetailsId).val();
        var total_amount = $("#total_amount" + orderDetailsId).val();
        var payable = $("#payable" + orderDetailsId).val();
        var price = $("#price" + orderDetailsId).val();

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

        $.ajax({
            url: "{{URL::to('deleteOrderDetails')}}",
            type: "GET",
            cache: false,
            dataType: 'json',
            data: {
                'order_id': order_id,
                'orderDetailsId': orderDetailsId,
                'total_amount': total_amount,
                'payable': payable,
                'price': price,
                'order_wise_discount': order_wise_discount,
                'order_details_wise_discount': order_details_wise_discount,
            }, // serializes the form's elements.
            beforeSend: function () {
                loading.show();
            },
            success: function (data) {
                if (data.success == true) {
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();//hide update bottom
                    //$('#product_name_lng1'+orderDetailsId).hide().prev().show();
                    //$('#quantity'+orderDetailsId).hide().prev().show().html(quantity); // convert input field to text mode
                }

                if (data.success == false) {
                    info_err.hide().find('ul').empty();
                    $.each(data.error, function (index, error) {
                        info_err.find('ul').append('<li>' + error + '</li>');
                    });
                    info_err.slideDown();
                    info_err.delay(6000).slideUp(300);
                }

                if (data.error == true) {
                    db_err.hide().find('label').empty();
                    db_err.find('label').append(data.status);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();
                    //$('#product_name_lng1'+orderDetailsId).hide().prev().show();
                    //$('#order_details_wise_discount'+orderDetailsId).hide().prev().show(); 
                    db_err.slideDown();
                    db_err.delay(5000).slideUp(300);
                }
                loading.hide();
            },
            error: function (data) {
                alert('error occurred! Please Check');
                loading.hide();
            }
        });
    });

    //======@@ Delete Opration @@======


    //======@@ Refresh Opration @@======
    $(".btn-refresh").on('click', function () {
        var data = $(this).attr("id");
        var arr = data.split('_');
        var id = arr[1];
        $("#product_name_lang1" + id).hide().prev().show();
        $("#quantity" + id).hide().prev().show();
        $("#size_title_lang1" + id).hide().prev().show();
        $("#color_name_lang1" + id).hide().prev().show();
        $("#price" + id).hide().prev().show();
        $("#order_details_wise_discount" + id).hide().prev().show();
        $(this).prev().hide().prev().show();
    })
    //======@@ Refresh Opration @@======


    $('.btn-update-shipping-cost').on('click', function () {
        var shipping_cost = $("#shipping_cost").val();
        var ex_shipping_cost = $("#ex_shipping_cost").val();
        var order_id = $("#order_id").val();

        if (shipping_cost == '') {
            alert('Warning!Blank Field must be required.');
            return false;
        }
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

        $.ajax({
            url: "{{URL::to('updateShippingCost')}}",
            type: "GET",
            cache: false,
            dataType: 'json',
            data: {
                'order_id': order_id,
                'shipping_cost': shipping_cost,
                'ex_shipping_cost': ex_shipping_cost,
            }, // serializes the form's elements.

            success: function (data) {
                if (data.success == true) {
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                }
                if (data.success == false) {
                    info_err.hide().find('ul').empty();
                    $.each(data.error, function (index, error) {
                        info_err.find('ul').append('<li>' + error + '</li>');
                    });
                    info_err.slideDown();
                    info_err.delay(6000).slideUp(300);
                }
                if (data.error == true) {
                    db_err.hide().find('label').empty();
                    db_err.find('label').append(data.status);
                    db_err.slideDown();
                    db_err.delay(5000).slideUp(300);
                }

            },
            error: function (data) {
                alert('error occurred! Please Check');
                loading.hide();
            }
        });
    });

</script>     