<?php
$i=1;
$j=1;
// print "<pre>";
// print_r($allInformation);
// return;
?>

    @forelse($allInformation['details'] as $allDataForHeader)
    <table class="table table-hover table-bordered" width="100%">
        @if($j==1)
        <tbody class="">
            <tr>
                <td><b>Inviece No. :</b> {{$allDataForHeader->invoice_no }}</td>
                <td><b>Shipping Address :</b> {{$allDataForHeader->address }}</td>
            </tr>
            <tr>
                <td><b>User Name :</b> {{$allDataForHeader->user_name}}</td>
                <td><b>Shipping Contact :</b> {{$allDataForHeader->shipping_mobile_no }}</td>
            </tr>
            <tr>
                <td><b>Email :</b> {{$allDataForHeader->email}}</td>
                <td><b>Shipping City :</b> {{$allDataForHeader->city_name_lng1 }}</td>
            </tr>
            <tr>
                <td colspan="2"><b>Mobile No. :</b> {{$allDataForHeader->mobile_no}}</td>
                
            </tr>

        </thead>
    </table>
        <?php $j++ ; ?>
        @endif

    @empty
        <h3>Sorry ! There's no Order Information available..</h3>
    @endforelse
        <font style="font-size:24px;text-decoration:underline; color:#C37403; ">
            Order Details
        </font>

           <table class="table table-hover table-bordered" width="100%">

            <thead class="table-head">
            <tr>
                <th>#SL No</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Disc.</th>
                <th>Action</th>
            </tr>
            </thead>

        @forelse($allInformation['details'] as $allData)
            <tbody>
            <tr>
                <td class=""><?php echo  $i++; ?></td>
                <td class="">
                   <span>{{$allData->product_name_lng1}}</span>
                    <input id="product_name_lng1{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="product_name_lng1" value="{{$allData->product_name_lng1}}" readonly="readonly">
                </td>

                <td class="">
                    <span>{{$allData->quantity}}</span>
                    <input id="quantity{{$allData->order_details_id}}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="quantity" value="{{$allData->quantity}}">
                </td>

                <td class="">

                    <span>{{$allData->size_title_lng1}}</span>
                    <select class="form-control col-md-1 input-sm" style="display: none;" id="size_title_lng1{{$allData->order_details_id}}" name="size_title_lng1">
                            <option value="{{$allData->product_wise_size_id}}" selected="selected">{{$allData->size_title_lng1}}</option>
                            @foreach($allInformation['sizes'] as $sizes)
                                <option value="{{$sizes->product_wise_size_id}}">{{$sizes->size_title_lng1}}</option>
                            @endforeach
                                                       
                    </select>
               
                </td>

                <td class="">
                
                    <span>{{$allData->color_name_lng1}}</span>
                    <select class="form-control col-md-1 input-sm" style="display: none;" id="color_name_lng1{{$allData->order_details_id}}" name="color_name_lng1">
                            <option value="{{$allData->product_wise_color_id}}" selected="selected">{{$allData->color_name_lng1}}</option>
                            @foreach($allInformation['colors'] as $color)
                                <option value="{{$color->product_wise_color_id}}">{{$color->color_name_lng1}}</option>
                            @endforeach
                                                       
                    </select>
                
                </td>

                <td class="">
                    <span>{{$allData->price}}</span>
                    <input id="price{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="price" value="{{$allData->price}}" readonly="readonly">
                </td>
                   
                <td class="">
                    <span>{{$allData->now_discount}}</span>
                    <input id="now_discount{{ $allData->order_details_id }}" class="form-control col-md-1 input-sm" style="display: none;" type="text" name="now_discount" value="{{$allData->now_discount}}">
                </td>

                <td class="">
                    <a href="javascript:;" class="btn-edit btn-edit-details-modal btn btn-primary btn-xs" id="editOrder_{{ $allData->order_details_id }}">
                        <span class="fa fa-edit">&nbsp;{{ trans('common.edit') }}</span></a>
                    <a href="javascript:;" style="display:none;" class="btn-order-update btn btn-primary btn-xs" id="updateOrder_{{ $allData->order_details_id }}"><span class="fa fa-save">&nbsp;{{ trans('common.save') }}</span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-refresh btn btn-info btn-xs" id="refresh_{{ $allData->order_details_id }}"><span class="fa fa-refresh" title="Refresh"></span></a>
                        &nbsp;
                    <a href="javascript:;" class="btn-delete btn btn-info btn-xs" id="delete{{ $allData->order_details_id }}"><span class="fa fa-trash" title="Refresh"></span></a>
                        
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
        var data                = $(".btn-order-update").attr("id");
        var arr                 = data.split('_');    
        var orderDetailsId      = arr[1];
        $(this).parent().prev().prev().prev().prev().prev().prev().children().next().show().prev().hide();
        $(this).parent().prev().prev().prev().prev().prev().children().next().show().width('35px').prev().hide();
    
        $(this).parent().prev().prev().children().next().show().width('58px').prev().hide();
        $(this).parent().prev().children().next().show().width('40px').prev().hide();
        $(this).next().show(); //show update bottom
        $(this).hide(); //hide update bottom

        if($("#size_title_lng1"+orderDetailsId).val()!='') {       
            $(this).parent().prev().prev().prev().prev().children().next().show().width('50px').prev().hide();
        }
        if($("#color_name_lng1"+orderDetailsId).val()!=''){
            $(this).parent().prev().prev().prev().children().next().show().width('78px').prev().hide();
        }
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
        var data                = $(this).attr("id");
        var arr                 = data.split('_');    
        var orderDetailsId      = arr[1];
        var btn_update          = $(this);  
        var btn_edit            = $(this).prev();
        var quantity            = $("#quantity"+orderDetailsId).val();
        var size_title_lng1     = $("#size_title_lng1"+orderDetailsId).val();
        var size_title_text     = $("#size_title_lng1"+orderDetailsId+" option:selected").text();
        var color_name_lng1     = $("#color_name_lng1"+orderDetailsId).val();
        var color_title_text    = $("#color_name_lng1"+orderDetailsId+" option:selected").text();
        var now_discount        = $("#now_discount"+orderDetailsId).val();

        if(orderDetailsId == '' || quantity == '' || now_discount ==''){
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
            data     : {'orderDetailsId': orderDetailsId,'quantity': quantity, 'size_title_lng1': size_title_lng1, 'color_name_lng1': color_name_lng1,'now_discount' : now_discount,}, // serializes the form's elements.
            beforeSend: function(){
                loading.show(); 
            },
            success  : function(data){
                if(data.success == true){
                    info_suc.slideDown();
                    info_suc.delay(3000).slideUp(300);
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();//hide update bottom
                    $('#product_name_lng1'+orderDetailsId).hide().prev().show();
                    $('#quantity'+orderDetailsId).hide().prev().show().html(quantity); // convert input field to text mode
                if(size_title_text !=''){
                    $('#size_title_lng1'+orderDetailsId).hide().prev().show().html(size_title_text); // convert input field to text mode
                }
                if(color_title_text !=''){
                    $('#color_name_lng1'+orderDetailsId).hide().prev().show().html(color_title_text);
                }
                    $('#price'+orderDetailsId).hide().prev().show();
                    $('#now_discount'+orderDetailsId).hide().prev().show().html(now_discount);
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
                    btn_edit.show();  //show Edit bottom
                    btn_update.hide();
                    $('#product_name_lng1'+orderDetailsId).hide().prev().show();
                    $('#quantity'+orderDetailsId).hide().prev().show(); // convert input field to text mode
                    $('#size_title_lng1'+orderDetailsId).hide().prev().show(); // convert input field to text mode
                    $('#color_name_lng1'+orderDetailsId).hide().prev().show();
                    $('#price'+orderDetailsId).hide().prev().show();
                    $('#now_discount'+orderDetailsId).hide().prev().show(); 
                    db_err.slideDown();
                    db_err.delay(5000).slideUp(300);
                }       
                loading.hide(); 
            },
            error: function(data){
                alert('error occurred! Please Check');
                loading.hide(); 
            }
        }); 
    });

//======@@ Refresh Opration @@======
    $(".btn-refresh").on('click',function(){
        var data     = $(this).attr("id");
        var arr      = data.split('_');
        var id    = arr[1];
        $("#fullName"+id).hide().prev().show();
        $("#email"+id).hide().prev().show();
        $("#mobileNo"+id).hide().prev().show();
        $(this).prev().hide().prev().show();
    })
//======@@ Refresh Opration @@======


//===@@ Inactive Operation @@=====

function inactiveConfirm(id){
$.ajax({
  url: "inactiveUser/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
    $("#userId"+id).removeClass('btn btn-warning btn-xs');
    $("#userId"+id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm('+id+')" id="userId'+id+'"><span class="fa fa-check-square-o">&nbsp;{{ trans("common.active") }}</span></a>'); //inactive hide
   $("#userId"+id).prev().prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
    } 
  }
});
return true;

}

//===@@ Active Operation @@=====

function activeConfirm(id){
$.ajax({
  url: "activeUser/"+id,
  dataType:'json',
  success : function(data){
  if(data.success == true){
    $("#userId"+id).removeClass('btn btn-info btn-xs');
    $("#userId"+id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm('+id+')" id="userId'+id+'"><span class="fa fa-ban">&nbsp;{{ trans("common.inactive") }}</span></a>'); //active hide
   $("#userId"+id).prev().prev().parent().prev().html("<label class='label label-success'>Active</label>");
    } 
  }
});
return true;

}

/*$(document).ready(function() {
    $('#UsersdataTables').DataTable();
} );*/

</script>     