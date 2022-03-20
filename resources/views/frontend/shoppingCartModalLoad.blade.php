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
            @if(Session::has('cartInfo'))
                <?php $i = 1; ?>
                @foreach(Session::get('cartInfo') as $product)
                    <tr>
                        <td>
                            <p>{{$i++}}</p>
                        </td>
                        <td>
                            <img src="{{URL::to('public/images/product').'/'.$product->path}}" alt="">
                        </td>
                        <td>
                            <h2>@if(Session::get('frontend_lang') == 1) {{$product->product_name_lang1}} @else {{$product->product_name_lang2}} @endif</h2>
                            <p>
                                Shopping Code:@if(Session::get('frontend_lang') == 1){{$product->product_code}}@else {{App\Http\Helper::bnNum($product->product_code)}}  @endif
                            </p>
                        </td>
                        <td>
                            <p>@if(Session::get('frontend_lang') == 1){{$product->color_name_lang1 .' / '. $product->size_title_lang1}}@else {{$product->color_name_lang2 .' / '. $product->size_title_lang2}} @endif</p>
                        </td>
                        <td>
                            <input value="{{$product->product_id}}" type="hidden" name="product_id" id="productId_{{$product->cart_item_id}}">
                            <input class="text-center quantity" value="{{$product->quantity}}" type="text" name="quanitty" id="quanitty_{{$product->cart_item_id}}" style="margin-top:15px;text-align: center">
                        </td>
                        <td>
                            <p id="unitPrice_{{$product->cart_item_id}}">@if(Session::get('frontend_lang') == 1){{$product->sale_price}}@else {{App\Http\Helper::bnNum($product->sale_price)}}  @endif</p>
                        </td>
                        <td>
                            <p id="toalPrice_{{$product->cart_item_id}}">@if(Session::get('frontend_lang') == 1){{$product->sale_price * $product->quantity}}@else {{App\Http\Helper::bnNum($product->sale_price * $product->quantity)}}  @endif</p>
                        </td>
                        <td>
                            <p>
                                <i class="fa fa-trash-o cart_quantity_delete" id="productDelete_{{$product->cart_item_id}}"></i>
                            </p>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-offset-10 col-md-6">
        <a href="{{URL::to('checkout')}}"  class="btn btn-primary btn-sm"> Checkout </a>
    </div>
</div>

@include('frontend.shoppingCartAjaxRequest')