@extends('frontend.app')
@section('main_container')

@include('frontend._partials.leftNavigation')
@include('frontend._partials.slider')
<script>
//for solving slider image loading
    var mainSlider = document.getElementsByClassName('item');
    for(var i = 0; i < mainSlider.length; i++){
        if (i > 0){
            mainSlider[i].style.display = 'none';
        }
    }
    $('.product_unit').hide();
    $('body').ready(function() {
        $('.item').show();
        $('.product_unit').show();
    });
</script>
@if(isset($categoryForLeftRight['left']))
    @foreach($categoryForLeftRight['left'] as $leftCategory => $leftCategories)
        <section class="product_one">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 extra-wide">
                        <div class="side_menu">
                            <?php
                            $leftSubCatName = explode('-', $leftCategory);
                            $categoryName = str_replace(' ', '-', $leftSubCatName[0])
                            ?>
                            <a href="{{URL::to('category').'/'.$leftSubCatName[1].'/'.$categoryName}}"
                               target="">
                                <h2>
                                    {{$leftSubCatName[0]}}
                                </h2>
                            </a>
                            <ul>
                                @if(count($leftCategories) > 0 && ! empty($leftCategories[0]))
                                    @foreach($leftCategories as $subCategory)
                                        <?php
                                        $subCategoryArr = explode('-', $subCategory);
                                        $subCategoryName = str_replace(' ', '-', $subCategoryArr[0]);
                                        ?>
                                        <li>
                                            <a href="{{URL::to('sub-category').'/'.$subCategoryArr[1].'/'.$subCategoryName}}"
                                               target="">
                                                {{$subCategoryArr[0]}}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9">
                        <div class="row product_list">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <?php
                                    $x = 0;
                                    $categoryForLeftRight['right'][$leftCategory] = array_values($categoryForLeftRight['right'][$leftCategory]);
                                    ?>
                                    @foreach($categoryForLeftRight['right'][$leftCategory] as $products)
                                        <div class="col-md-3 col-sm-3">
                                            <? $x++;?>
                                            <div class="product_unit"
                                                 style="margin-bottom: <? if ($x <= 4) echo '10px;'; ?>">
                                                <a href="{{ URL::to('product-details').'/'.$products->product_id.'/'.$products->slug}}"
                                                   target="_blank">
                                                    <img src="{{URL::to('public/images/product')}}/{{$products->path}}"
                                                         alt="">
                                                </a>
                                                <div class="product_unit_content">
                                                    <a href="" target="_blank">
                                                        <h2>@if(Session::get('frontend_lang') == 1) {{$products->product_name_lang1}} @else {{$products->product_name_lang2}}@endif</h2>
                                                    </a>
                                                    <h3>@if(Session::get('frontend_lang') == 1)
                                                            Tk {{$products->sale_price}} @else
                                                            ৳ {{App\Http\Helper::bnNum($products->sale_price)}}@endif</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif
<!--Close Product Section One-->

@endsection
