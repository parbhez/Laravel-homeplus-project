<?php
    $totalTaka = 0;
    $totalQty  = 0;
    $totalItem = (Session::has('cartInfo'))?count(Session::get('cartInfo')):0;
    if (Session::has('cartInfo')) {
        foreach (Session::get('cartInfo') as $key => $value) {
            $totalTaka += $value->sale_price * $value->quantity;
            $totalQty  += $value->quantity;
        }
    }
?>
<!--Start Fixed Box-->
<div class="fixed_box loadModal" data-toggle="modal" href="#modal" onclick="loadModal('shoppingCartModal')">
    <div class="fixed_box_icon">
        <i class="fa fa-shopping-basket"></i>
    </div>
    <div class="item_list">
        <p>
            <b>{{trans('frontend.product')}} :</b>
        </p>
        <p ><span id="shooping_cart_item">{{$totalItem}}</span> টি</p>
        <p>
            <b>{{trans('frontend.quantity')}} :</b>
        </p>
        <p><span id="shooping_cart_quantity">{{$totalQty}}</span> টি</p>
        <p>
            <b>{{trans('frontend.total')}} :</b>
        </p>
        <p><span class="count" id="shooping_cart_price">{{$totalTaka}}</span> টাকা</p>
    </div>
</div>

<!--Close Fixed Box-->
<script>
    $('.loadModal').on('click',function (e) {
        e.preventDefault();
        var heading = '<div class="login_section_title"> <h2><i class="fa fa-shopping-cart"></i> আপনার অর্ডার সম্পর্কিত তথ্য <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h2></div>';
        $('.modal-header').html(heading);
        $('.modal-content').removeClass('modal-small');
        $('.modal-dialog').addClass('modal-lg');
    });
</script>

{{ HTML::script('public/frontend/assets/js/magiczoom.js') }}
{{ HTML::script('public/frontend/assets/js/jquery-ui.js') }}
{{ HTML::script('public/frontend/assets/js/custom.js') }}
{{ HTML::script('public/frontend/assets/js/jquery.scrollUp.min.js') }}
{{ HTML::script('public/frontend/assets/js/jquery.scrollUp.min.js') }}
{{ HTML::script('public/frontend/assets/js/modernizr.min.js') }}
{{ HTML::script('public/frontend/assets/js/jquery.bxslider.min.js') }}
{{ HTML::script('public/frontend/assets/js/jquery.meanmenu.js') }}
{{ HTML::script('public/frontend/assets/js/owl.carousel.min.js') }}
{{ HTML::script('public/frontend/assets/js/jquery.nivo.slider.js') }}
{{ HTML::script('public/frontend/assets/js/bootstrap.min.js') }}
{{ HTML::script('public/frontend/assets/js/wow.js') }}
{{ HTML::script('public/frontend/assets/js/main.js') }}
{{ HTML::script('public/frontend/assets/js/fastclick.min.js') }}
{{ HTML::script('public/frontend/assets/js/handlebars.min.js') }}
   <!-- /snippets/ajax-cart-template.liquid -->

   <script>
      new WOW().init();
   </script>

   <script type="text/javascript">
        
      $(".language-select").on('click',function(e){
         e.preventDefault();
         var langType = $(this).data("status");
         $.ajax({
            url: "{{URL::to('frontendLangChange')}}/"+langType,
            type: 'GET',
            dataType : 'json',
            success: function(data){
               if (data.success == true) {
                  location.reload();
               }
            }
          });
      });
  </script>

    </body>
</html>
