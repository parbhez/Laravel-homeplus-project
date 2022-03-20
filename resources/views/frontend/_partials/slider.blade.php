<!--Start Slider-->
<div class="col-md-10 col-sm-9">
    <div class="main_slider">
        @if(isset($topSlider))
            @foreach($topSlider as $slider)
                @if (! empty($slider->fk_sub_category_id))
                    <?php
                    $subCategoryName = (Session::get('frontend_lang') == 1) ? $slider->sub_category_name_lang1 : $slider->sub_category_name_lang1;
                    $subCategoryName = str_replace(' ','-',$subCategoryName)
                    ?>

                    <div class="item">
                        <a href="{{URL::to('sub-category').'/'.$slider->sub_category_id .'/'.$subCategoryName}}" target="_blank">
                            <img src="{{URL::to('public/images/photoSlider').'/'.$slider->image_path}}">
                        </a>
                    </div>
                @else
                    <?php
                    $categoryName = (Session::get('frontend_lang') == 1) ? $slider->category_name_lang1 : $slider->category_name_lang1;
                    $categoryName = str_replace(' ','-',$categoryName)
                    ?>
                    <div class="item">
                        <a href="{{URL::to('category').'/'.$slider->category_id .'/'.$categoryName}}" target="_blank">
                            <img src="{{URL::to('public/images/photoSlider').'/'.$slider->image_path}}">
                        </a>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    <div class="second_slider">
        @if(isset($selectedProducts))
            @foreach($selectedProducts as $selectedProduct)
                <div class="product_unit">
                    <a href="{{URL::to('product-details').'/'.$selectedProduct->product_id.'/'.$selectedProduct->slug}}" target="_blank">
                        <img src="{{URL::to('public/images/product/').'/'.$selectedProduct->path}}">
                    </a>
                    <div class="product_unit_content">
                        <a href="" target="_blank">
                            <h2>@if(Session::get('frontend_lang') == 1) {{$selectedProduct->product_name_lang1}} @else {{$selectedProduct->product_name_lang2}}@endif</h2>
                        </a>
                        <h3>
                            @if(Session::get('frontend_lang') == 1)
                                ৳ {{$selectedProduct->sale_price}}
                            @else
                                ৳ {{App\Http\Helper::bnNum($selectedProduct->sale_price)}}
                            @endif
                        </h3>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<!--Start Slider-->

</div>
</div>
</section>
<!--Close Menu Menu & Slider-->