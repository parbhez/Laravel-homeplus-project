@if(count($slider) > 0)

    {!!Form::open(array('route'=>'saveEditPhotoSlider.post','class'=>'form-horizontal form-wrp photoSliderEditForm','files'=>true))!!}
    <div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="form-group">
                <label class="col-md-4"> Chose An Image </label>
                <div class="col-md-8">
                    <input type="file" name="image" class="form-control input-sm">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"> Image Category </label>
                <div class="col-md-8">
                    <select class="form-control category_name_id" name="category_id" id="category_name_id">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->category_id}}" @if($category->category_id == $slider->fk_category_id) selected @endif>
                                    {{$category->category_name_lang1}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"> Image Sub Category </label>
                <div class="col-md-8">
                    <select class="form-control sub_category_name_id" name="sub_category_name_id" id="sub_category_name_id">
                        <option value="{{$slider->fk_sub_category_id}}">{{$slider->sub_category_name_lang1}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4"> Image Caption </label>
                <div class="col-md-8">
                    <input type="text" name="image_caption" class="form-control input-sm" value="{{$slider->image_caption}}">
                    <input type="hidden" name="photo_slider_id" value="{{$slider->id}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-4 col-md-2">
                    <button type="submit" class="btn btn-success btn-sm product-image-btn" value="Save"><i class="fa fa-save"></i> Update</button>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="text-align: center;">
               <span style="text-decoration: underline;">Current Image</span><br />
               <img src="{{URL::to('public/images/photoSlider/'.'/'.$slider->image_path)}}" height="150" width="280" />
        </div>
    </div>
    </div>
    {!!Form::close()!!}
    <script>
        $(document).ready(function(){
            $('.photoSliderEditForm').validate({
                onkeyup: false,
                rules: {
                    sister_concern_name_id: {
                        required: true
                    },
                    image_type: {
                        required: true
                    },
                    image: {
                        required: true
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        $('.category_name_id').on('change', function(e) {
            var categoryId = e.target.value;
            var loader = $('.loader');
            var sub_category_name_id = $('.sub_category_name_id');

            $.ajax({
                url: "{{URL::to('categoryId')}}/" + categoryId ,
                beforeSend: function() {
                    loader.show();
                },
                success: function(data) {
                    sub_category_name_id.empty();
                    sub_category_name_id.append('<option selected disabled>Please select</option>');
                    $.each(data, function(index, value) {
                        sub_category_name_id.append('<option value="' + value.id + '">' + value.sub_category_name_lang1 + '</option>');
                    });
                    loader.hide();
                },
                error: function(data) {
                    alert('error occurred! Please Check');
                    loader.hide();
                }
            });
        });
    </script>
@endif
