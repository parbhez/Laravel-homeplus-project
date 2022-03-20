<?php if(isset($products)): ?>
    <div class="row">
        <div class="col-md-12" style="">
            <div class="form-group row">
                <label class="col-md-2"> Merchant name :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->company_name); ?></label>
                </div>

                <label class="col-md-2"> Product Code :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->product_code); ?></label>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2"> Category Name English :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->category_name_lang1); ?></label>
                </div>

                <label class="col-md-2"> Category Name Bangla :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->category_name_lang2); ?></label>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2"> Sub Category Name English :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->sub_category_name_lang1); ?></label>
                </div>

                <label class="col-md-2"> Sub Category Name Bangla :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->sub_category_name_lang2); ?></label>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2"> Sub Sub Category Name English :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->sub_sub_category_name_lang1); ?></label>
                </div>

                <label class="col-md-2"> Sub Sub Category Name Bangla :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->sub_sub_category_name_lang2); ?></label>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2"> Product Name English :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->product_name_lang1); ?></label>
                </div>

                <label class="col-md-2"> Product Name Bangla :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->product_name_lang2); ?></label>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2"> Product Details English :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->details_lang1); ?></label>
                </div>
                <label class="col-md-2"> Product Details English :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->details_lang2); ?></label>
                </div>
            </div>

            <div class="form-group row">


                <label class="col-md-2"> Quantity :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->quantity); ?></label>
                </div>
                <label class="col-md-2"> Market Price :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->market_price); ?></label>
                </div>

            </div>

            <div class="form-group row">


                <label class="col-md-2"> Discount :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->discount); ?></label>
                </div>

                <label class="col-md-2"> Sale Price :</label>
                <div class="col-md-4">
                    <label><?php echo e($products->sale_price); ?></label>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-2"> Commission (%):</label>
                <div class="col-md-4">
                    <label><?php echo e($products->commission); ?></label>
                </div>
                <label class="col-md-2"> Eshop Commission :</label>
                <div class="col-md-4">
                    <label><?php echo e((($products->market_price - $products->discount) * $products->commission)/100); ?></label>
                </div>

            </div>

        </div>
        <div class="col-md-4">

        </div>
    </div>












    <!-- <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label class="col-md-2"> Select News Category </label>
                    <div class="col-md-3">

                    </div>
                <label class="col-md-2"> Select News Sub-Category </label>
                    <div class="col-md-3">
                        <span class='loader' style="display:none;"><img src="public/icons/ajax-loader.gif" alt="loading"></span>

                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-2"> News Title English </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="title_english" name="news_title_lang1">
                    </div>
                <label class="col-md-2"> News Title Bangla </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm"  id="title_bangla" name="news_title_lang2">
                    </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label> News Description English </label>
                    <textarea name="news_description_lang1" class="textarea form-control"></textarea>
                </div>
                <div class="col-md-5">
                    <label> News Description Bangla </label>
                    <textarea name="news_description_lang2" class="textarea form-control " ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2"> News Slug English </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="news_slug_lang1">
                    </div>
                <label class="col-md-2"> News Slug Bangla </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="news_slug_lang2">
                    </div>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <label class="product-image"> Product Image </label>
                        <input type="file" class="" name="news_image[]">
                </div>
                <div class="col-md-4">
                    <label> Image Title English </label>
                    <input type="text"  class="form-control" name="image_title_lang1[]">
                </div>
                <div class="col-md-4">
                    <label> Image Title Bangla</label>
                    <input type="text"  class="form-control" name="image_title_lang2[]">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-xs btn-success btn-add-image" title="Add More Image" style="margin-top:35px"><span class="fa fa-plus" style=""></span></button>
                </div>
            </div>
            <div class="load-dynamic-image-content">

            </div>
            <div class="form-group">
                <label class="col-md-2"> Select Division </label>
                <div class="col-md-3">

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-2">
                    <button type="submit" class="btn btn-success btn-sm product-image-btn" value="Save"><i class="fa fa-save"></i> Save Change</button>
                </div>
            </div>

        </div>
    </div> -->
<?php endif; ?>
