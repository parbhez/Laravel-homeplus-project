<script type="text/javascript">

    $(".product-size").on('click', function (e) {
        var data = $(this).attr("id");
        var sizeId = data.split('_');
        var sizeId = sizeId[1];
        //$('.product-size').attr('checked',false);
        $("#size_"+sizeId).attr('checked',true);
        $("#labelForSize_" + sizeId).parent().find('label').css({"background-color": "white","color":"black"});
        if ($(this).is(':checked')) {
            $("#labelForSize_" + sizeId).css({"background-color": "green","color":"white"});
        }
    });

    $(".product-color").on('click', function (e) {
        var data = $(this).attr("id");
        var colorId = data.split('_');
        var colorId = colorId[1];
        //$('.product-color').attr('checked',false);
        $("#color_"+colorId).attr('checked',true);
        $("#labelForColor_" + colorId).parent().find('label').css({"background-color": "white","color":"black"});
        if ($(this).is(':checked')) {
            $("#labelForColor_" + colorId).css({"background-color": "green","color":"white"});
        }
    });

    //===== Add Item Into Cart=====
    $(document).on('click','.order_now',function (e) {
        e.preventDefault();
        var obj = {};
        var oldTotalPrice = parseInt($("#shooping_cart_price").html());
        var product_size_id = $( ".product-size:checked" ).val();
        var product_color_id = $( ".product-color:checked" ).val();
        if (product_size_id == undefined && product_color_id == undefined){
            obj = {
                product_id: product_id,
            }
        }else if (product_color_id == undefined){
            obj = {
                product_id: product_id,
                product_size_id: product_size_id,
            }
        }else if(product_size_id == undefined){
            obj = {
                product_id: product_id,
                product_color_id: product_color_id
            }
        }else{
            obj = {
                product_id:product_id,
                product_size_id:product_size_id,
                product_color_id:product_color_id
            }
        }
        $.ajax({
            url:"<?php echo e(URL::to('addToCart')); ?>",
            type: 'GET',
            dataType: 'JSON',
            data: obj,
            success:function (data) {
                if(data.check == true){
                    alert(data.status);
                    return false;
                }
                if (data.success == true) {
                    $("#shooping_cart_item").html(data.total_item);
                    $("#shooping_cart_quantity").html(data.total_qty);
                    $("#shooping_cart_price").html(data.total_taka);
                    $('.count').each(function () {
                        $(this).prop('Counter',oldTotalPrice).animate({
                            Counter: $(this).text()
                        },{
                            duration: 300,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });
                    window.open("<?php echo e(URL::to('checkout')); ?>",'_self');
                }
                else if(data.error == true){
                    alert(data.status);
                }
            },
            error:function (data) {

            }
        });
    });

    $(document).on('click','.add-to-cart',function (e) {        
        addToCart();        
    });

    function addToCart(){  
        var oldTotalPrice = parseInt($("#shooping_cart_price").html());      
        var product_size_id = $( ".product-size:checked" ).val();
        var product_color_id = $( ".product-color:checked" ).val();
        $.ajax({
            url:"<?php echo e(URL::to('addToCart')); ?>",
            type: 'GET',
            dataType: 'JSON',
            data: {
                product_id:product_id,
                product_size_id:product_size_id,
                product_color_id:product_color_id
            },
            success:function (data) {
                if(data.check == true){
                    alert(data.status);
                    return false;
                }
                if (data.success == true) {
                    $("#shooping_cart_item").html(data.total_item);
                    $("#shooping_cart_quantity").html(data.total_qty);
                    $("#shooping_cart_price").html(data.total_taka).css({"font-size": "16px","font-weight":"bolder"});;
                    $('.count').each(function () {
                        $(this).prop('Counter',oldTotalPrice).animate({
                            Counter: $(this).text()
                        },{
                            duration: 300,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });

                }
                else if(data.error == true){
                    alert(data.status);
                }
            },
            error:function (data) {

            }
        });
    }

    //===== Update Quantity In Cart=====
    $(".quantity").on('change',function(e){
        var data       = $(this).attr('id');
        var data       = data.split('_');
        var id         = data[1];
        var newQty     = e.target.value;
        newQty         = parseFloat(newQty);
        var productId  = $("#productId_"+id).val();
        var availableQuantity = 0;
        $.ajax({
            url      : "<?php echo e(URL::to('getProductQuantity')); ?>/"+productId,
            type     : "GET",
            cache    : false,
            dataType : 'json',
            success  : function(data){
                if (data.status == true) {
                    availableQuantity = data.availableQuantity;
                }
            },
            async: false
        });

        if(newQty < availableQuantity){
            $(this).val(newQty);
            newQty = newQty;
        }else if (newQty > availableQuantity) {
            $(this).val(availableQuantity);
            newQty = availableQuantity;
        }else if (newQty <= 0) {
            $(this).val(1);
            newQty = 1;
        }
        var unitPrice = parseFloat($("#unitPrice_"+id).html());
        var shipmentCost = parseFloat($(".shipment_cost").html());
        $("#toalPrice_"+id).html(unitPrice*newQty);
        var oldTotalPrice = $("#shooping_cart_price").html();

        $.ajax({
            url      : "<?php echo e(URL::to('editQuantity')); ?>",
            type     : "GET",
            cache    : false,
            dataType : 'json',
            data     : {product_id:productId,quantity:newQty},
            success  : function(data){
                if (data.success == true) {
                    $("#shooping_cart_item").html(data.total_item);
                    $("#shooping_cart_quantity").html(data.total_qty);
                    $("#shooping_cart_price").html(data.total_taka);
                    $(".sub_total").html(data.total_taka);
                    $('.net_total').html(data.total_taka + shipmentCost);
                    $('.count').each(function () {
                        $(this).prop('Counter',oldTotalPrice).animate({
                            Counter: $(this).text()
                        },{
                            duration: 400,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });

                }else{
                    alert(data.status);
                }
            },
            async: false
        });
    });

    //===== Drop item From Cart=====
    $(".cart_quantity_delete").on('click',function(e){
        var data         = $(this).attr('id');
        var data         = data.split('_');
        var cart_item_id = data[1];
        var shipmentCost = parseFloat($(".shipment_cost").html());
        $.ajax({
            url     : "<?php echo e(URL::to('dropFromCart')); ?>",
            type    : 'GET',
            dataType: 'JSON',
            data    : {cart_item_id : cart_item_id},
            success : function (data) {
                if (data.success == true) {
                    $("#productDelete_"+cart_item_id).parent().parent().parent().remove();
                    $("#shooping_cart_item").html(data.total_item);
                    $("#shooping_cart_quantity").html(data.total_qty);
                    $("#shooping_cart_price").html(data.total_taka);
                    $(".sub_total").html(data.total_taka);
                    $('.net_total').html(data.total_taka + shipmentCost);
                    if (data.total_item == 0) {
                        location.reload();
                    }
                }
            },
            error   : function (data) {
                alert("Error Occured..!!");
            }
        });
    })
</script>
