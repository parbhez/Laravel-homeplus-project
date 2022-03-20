<?php
$i=1;
$j=1;
$lang  = Session::get('last_login_lang');
// print "<pre>";
// print_r($allInformation);
// return;
?>
    @forelse($allInformation['details'] as $allDataForHeader)
    <table class="table table-hover table-bordered" width="100%">
        @if($j==1)
        <tbody class="">
            <tr>
                <td width="300px"> <b>Invoice No. :</b> {{$allDataForHeader->invoice_no }}</td>
                <td><b>Shipping Address :</b> {{$allDataForHeader->address }}</td>
            </tr>
            <tr>
                <td><b>User Name :</b> {{$allDataForHeader->user_name}}</td>
                <td><b>Shipping Contact :</b> {{$allDataForHeader->shipping_mobile_no }}</td>
            </tr>   
            <tr>
                <td><b>Email :</b> {{$allDataForHeader->email}}</td>
                <td><b>Shipping City :</b> 
                        {{$allDataForHeader->city_name_lang1 }}
                   
                </td>
            </tr>
            <tr>
                <td><b>Mobile No. :</b> {{$allDataForHeader->mobile_no}}</td>
                <td>
                    <table width="80%">
                        <tr>
                            <td width="30%"><b>Shipping Cost. :</b></td>
                            <td width="30%">
                            <span>{{$allDataForHeader->shipping_cost}} TK</span>
                                <!-- <input id="shipping_cost" type="number" class="form-control col-md-1 input-sm" name="shipping_cost" value="{{$allDataForHeader->shipping_cost}}">
                                <input id="ex_shipping_cost" type="hidden" class="form-control col-md-1 input-sm" name="ex_shipping_cost" value="{{$allDataForHeader->shipping_cost}}">
                                <input id="order_id" type="hidden" class="form-control col-md-1 input-sm" name="order_id" value="{{$allDataForHeader->order_id}}"> -->
                            </td>
                            <!-- <td width="20%">
                                &nbsp;&nbsp;<input type="submit" class="btn btn-success btn-sm btn-update-shipping-cost" value="Update">
                            </td> -->
                        </tr>
                    </table>
                </td>
                
            </tr>

        </thead>
    </table>
        <?php 
            $j++ ;
            
        ?>
        @endif

    @empty
        <h3>Sorry ! There no Order Information available..</h3>
    @endforelse
    <div style="color:red; text-align:center; font-size: 24px;" id="MAX_ERROR"></div>
        <font style="font-size:24px;text-decoration:underline; color:#C37403; ">
            Order Details
        </font>

           <table class="table table-hover table-bordered" width="100%">

            <thead class="table-head">
            <tr>
                <th>#SL No</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Disc.</th>
                <th>Action</th>
                <!-- <th>Action</th> -->
            </tr>
            </thead>

        @forelse($allInformation['details'] as $allData)
            <tbody>
            <tr>
                <td class="">
                    <?php echo  $i++; ?>
                    <input id="order_id{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" type="hidden" name="order_id[]" value="{{$allData->order_id}}">
                    <input id="order_wise_discount{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" type="hidden" name="order_wise_discount[]" value="{{$allData->order_wise_discount}}">
                    <input id="order_details_wise_ex_discount{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="order_details_wise_ex_discount" value="{{$allData->order_details_wise_discount}}">
                    <input id="product_wise_discount{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" type="hidden" name="product_wise_discount[]" value="{{$allData->product_wise_discount}}">
                    <input id="total_amount{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="total_amount" value="{{$allData->total_amount}}">
                    <input id="payable{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="payable" value="{{$allData->payable}}">
                    <input id="product_price{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="product_price" value="{{$allData->product_price}}">
                    <input id="product_id{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="product_id" value="{{$allData->product_id}}">
                    <input id="ex_quantity{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="ex_quantity" value="{{$allData->quantity}}">
                    <input id="available_quantity{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" type="hidden" name="ex_quantity" value="{{$allData->available_quantity}}">
                </td>
                <td class="">
                   <span>{{$allData->product_name_lang1}}</span>
               
                    <input id="product_name_lang1{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="product_name_lang1" value="{{$allData->product_name_lang1}}" readonly="readonly">
                </td>
                <td class="">
                   <span>{{$allData->product_code}}</span>
                </td>
                <td class="">
                    <span>{{$allData->quantity}}</span>
                    <input id="quantity{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="quantity" value="{{$allData->quantity}}">
                </td>

                <td class="">
                        <span>{{$allData->size_title_lang1}}</span>
                   
                    <select class="form-control col-md-1 input-sm" style="display: none;" id="size_title_lang1{{$allData->order_details_id}}" name="size_title_lang1">
                            <option value="{{$allData->product_wise_size_id}}" selected="selected">{{$allData->size_title_lang1}}</option>
                            @foreach($allInformation['sizes'] as $sizes)
                                <option value="{{$sizes->product_wise_size_id}}">
                                        {{$sizes->size_title_lang1}}
                                    
                                </option>
                            @endforeach
                                                       
                    </select>
               
                </td>

                <td class="">
                        <span>{{$allData->color_name_lang1}}</span>
                    
                    <select class="form-control col-md-1 input-sm" style="display: none;" id="color_name_lang1{{$allData->order_details_id}}" name="color_name_lang1">
                            <option value="{{$allData->product_wise_color_id}}" selected="selected">{{$allData->color_name_lang1}}</option>
                            @foreach($allInformation['colors'] as $color)
                                <option value="{{$color->product_wise_color_id}}">
                                        {{$color->color_name_lang1}}
                                    
                                </option>
                            @endforeach
                                                       
                    </select>
                
                </td>

                <td class="">
                    <span>{{$allData->sale_price}}</span>
                    <input id="price{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="price" value="{{$allData->sale_price}}" readonly="readonly">
                </td>
                   
                <td class="">
                    <span>{{$allData->order_details_wise_discount}}</span>
                    <input id="order_details_wise_discount{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="order_details_wise_discount" value="{{$allData->order_details_wise_discount}}">
                </td>

                <td width="200px">
                    <a href="javascript:;" class="btn-edit btn-edit-details-modal btn btn-primary btn-xs" id="editOrder_{{ $allData->order_details_id }}">
                        <span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span></a>
                    <a href="javascript:;" style="display:none;" class="btn-order-update btn btn-primary btn-xs" id="updateOrder_{{ $allData->order_details_id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $allData->order_details_id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
                        &nbsp;
                    
                    <a href="javascript:;" class="btn-edit btn-delete btn btn-primary btn-xs" id="editOrder_{{ $allData->order_details_id }}">
                        <span class="fa fa-edit">&nbsp;Delete</span>
                    </a>
                </td>

            </tr>
            @empty
                <h3>Sorry ! There's no Order Information available..</h3>
            @endforelse

            </tbody>
    </table>


<script type="text/javascript">
//======@@ Edit btn function @@========
    $('.btn-edit-details-modal').on('click', function(){
        $(this).hide().next().show();
        $(this).parent().prev().prev().prev().prev().prev().children().next().show().prev().hide();    
    }); 

//======@@ Save btn function @@========
    var loading      = $('.loading');
    var info_err     = $('.info-error');
    var info_suc     = $('.info-suc');
    var db_err       = $('.db-error');
    var inactive_msg = $('.inactive-msg');
    var active_msg   = $('.active-msg');
    var delete_msg   = $('.delete-msg');
    var warning_msg  = $('.warning-msg');
    var fk_msg     = $('.fk-msg');

    $('.btn-order-update').on('click', function(){
        var orderDetailsId = $(this).attr("id").split('_')[1];
        var btn_update     = $(this);  
        var btn_edit       = $(this).prev();
        var quantity       = $("#quantity"+orderDetailsId).val(); 
        var order_id       = $("#order_id"+orderDetailsId).val();       

        if(orderDetailsId == '' || quantity == ''){
            alert('Warning!Blank Field must be required.');
            return false;
        }
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            url      : "{{URL::to('saveEditOrdersInfo')}}",
            type     : "GET",
            cache    : false,
            dataType : 'json',
            data     : {'order_id': order_id,'orderDetailsId': orderDetailsId,'quantity': quantity, },            
            success  : function(data){
                if(data.success == true){
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();//hide update bottom
                    $("#MAX_ERROR").html('');
                    $('#quantity'+orderDetailsId).hide().prev().show().html(quantity); // convert input field to text mode
                    loading.hide(); 
                }
                if(data.error == true){
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();//hide update bottom
                    $("#MAX_ERROR").html('');
                    $('#quantity'+orderDetailsId).hide().prev().show().html(quantity); // convert input field to text mode
                    loading.hide(); 
                }
            }
        }); 
    });
//======@@ Update Opration @@======


//======@@ Delete Opration @@======

    $('.btn-delete').on('click', function(){
        var self           = $(this); 
        var orderDetailsId = $(this).attr("id").split('_')[1];
        var order_id       = $("#order_id"+orderDetailsId).val();
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            url     : "{{URL::to('deleteOrderDetails')}}",
            type    : "GET",
            dataType: 'json',
            data    : {'order_id' : order_id,'orderDetailsId': orderDetailsId},
            beforeSend: function(){
                loading.show(); 
            },
            success  : function(data){
                if(data.success == true){
                    self.parent().parent().parent().remove();
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                    location.reload();
                }
                if(data.error == true){         
                    db_err.hide().find('label').empty();  
                    db_err.find('label').append(data.status); 
                    db_err.slideDown();
                    db_err.delay(5000).slideUp(300);
                }       
                loading.hide(); 
            },
            error: function(data){
                loading.hide(); 
            }
        }); 
    });

//======@@ Delete Opration @@======



//======@@ Refresh Opration @@======
    $(".btn-refresh").on('click',function(){
        var data    = $(this).attr("id");
        var arr     = data.split('_');
        var id      = arr[1];
        $("#product_name_lang1"+id).hide().prev().show();
        $("#quantity"+id).hide().prev().show();
        $("#size_title_lang1"+id).hide().prev().show();
        $("#color_name_lang1"+id).hide().prev().show();
        $("#price"+id).hide().prev().show();
        $("#order_details_wise_discount"+id).hide().prev().show();
        $(this).prev().hide().prev().show();
    })
//======@@ Refresh Opration @@======



$('.btn-update-shipping-cost').on('click', function(){
        var shipping_cost      = $("#shipping_cost").val();
        var ex_shipping_cost   = $("#ex_shipping_cost").val();
        var order_id           = $("#order_id").val();

        if(shipping_cost == ''){
            alert('Warning!Blank Field must be required.');
            return false;
        }
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            url      : "{{URL::to('updateShippingCost')}}",
            type     : "GET",
            cache    : false,
            dataType : 'json',
            data     : {'order_id' : order_id,
                        'shipping_cost' :shipping_cost,
                        'ex_shipping_cost' :ex_shipping_cost,
                        }, // serializes the form's elements.
            
            success  : function(data){
                if(data.success == true){
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300); 
                }
                if(data.success == false){
                    info_err.hide().find('ul').empty();
                    $.each(data.error, function(index, error){
                    info_err.find('ul').append('<li>'+error+'</li>');
                    });
                    info_err.slideDown();
                    info_err.delay(6000).slideUp(300);
                }
                if(data.error == true){         
                    db_err.hide().find('label').empty();  
                    db_err.find('label').append(data.status);
                    db_err.slideDown();
                    db_err.delay(5000).slideUp(300);
                }       
                 
            },
            error: function(data){
                alert('error occurred! Please Check');
                loading.hide(); 
            }
        }); 
    });

/*$(document).ready(function() {
    $('#UsersdataTables').DataTable();
} );*/

</script>     