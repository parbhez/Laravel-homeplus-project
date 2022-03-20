@if($getMerchantIncomeReport != null)
    <?php $totalIncome = 0 ?>
    <hr />
    <label><b>Income Details Reports :</b></label><br><br>
    <div class="row" >
        <div class="col-md-6">
            <div class="col-md-4">
                Merchant Name :
            </div>
            <div class="col-md-6">
                {{$getMerchantIncomeReport->full_name}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                Merchant Email :
            </div>
            <div class="col-md-6">
                {{$getMerchantIncomeReport->email}}
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-4">
                Company Name :
            </div>
            <div class="col-md-6">
                {{$getMerchantIncomeReport->company_name}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                Merchant location :
            </div>
            <div class="col-md-6">
                {{$getMerchantIncomeReport->location}}
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-4">
                Total Sale  :
            </div>
            <div class="col-md-6">
                @if($getMerchantIncomeReport->total_quantity) {{$getMerchantIncomeReport->total_quantity}} @else 0.0 @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                Total commission :
            </div>
            <div class="col-md-6">
                @if($getMerchantIncomeReport->merchant_wise_income) {{$getMerchantIncomeReport->merchant_wise_income}} @else 0.0 @endif
            </div>
        </div>
    </div>
@endif
<hr/>
@if(isset($saleProducts))
    <?php $i = 1; ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Product Code</th>
                <th>Order Number</th>
                <th>Color</th>
                <th>Size</th>
                <th>Sale Price</th>
                <th>Discount</th>
                <th>Commission(%)</th>
            </tr>
        </thead>
        <tbody>
        @foreach($saleProducts as $saleProduct)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$saleProduct->product_name_lang1}}</td>
                <td>
                    <img src="{{URL::to('public/images/product').'/'.$saleProduct->path}}" width="70px";height="50px">
                </td>
                <td>{{$saleProduct->product_code}}</td>
                <td>{{$saleProduct->master_invoice_no}}</td>
                <td>{{$saleProduct->size_title_lang1}}</td>
                <td>{{$saleProduct->color_name_lang1}}</td>
                <td>{{$saleProduct->sale_price}}</td>
                <td>{{$saleProduct->discount}}</td>
                <td>{{$saleProduct->commission}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endif
