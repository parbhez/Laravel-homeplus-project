<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box_body">
                <div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Photo Slider
					</span>
			    </span>
                </div>
                <div class="block" style=" margin-top: 10px; ">
                    <div class="block-content-outer">
                        <div class="block-content-inner">
                            <!-- =======Start Page Content======= -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#viewPhotoSlider"
                                                                          aria-controls="viewPhotoSlider" role="tab"
                                                                          data-toggle="tab"> View Photo Slider</a></li>
                                <li role="presentation"><a href="#addPhotoSlider" aria-controls="addPhotoSlider"
                                                           role="tab" data-toggle="tab">Add Photo Slider</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="viewPhotoSlider">
                                    <table id="menuDataTable" class="table table-bordered" width="100%">
                                        <thead>
                                        <tr>
                                            <th># SL No</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Image Caption</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        <?php if(isset($sliders)): ?>
                                            <?php foreach($sliders as $sliders): ?>
                                                <tr>
                                                    <td class=""><?php echo e(++$i); ?></td>
                                                    <td class="">
                                                        <img class=""
                                                             src="<?php echo e(URL::to('public/images/photoSlider').'/'.$sliders->image_path); ?>"
                                                             width="150px" height="50px">
                                                    </td>
                                                    <td class="">
                                                        <span><?php echo e($sliders->category_name_lang1); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <span><?php echo e($sliders->sub_category_name_lang1); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <span><?php echo e($sliders->image_caption); ?></span>
                                                    </td>
                                                    <td class="">
                                                        <?php if($sliders->status == 1): ?>
                                                            <label class="label label-success"> Active</label>
                                                        <?php elseif($sliders->status == 0): ?>
                                                            <label class="label label-warning"> Inactive</label>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-xs modal1" data-toggle="modal"
                                                           href="#modal"
                                                           onclick="loadModalEdit('photoSlider',<?php echo e($sliders->photo_slider_id); ?>,'edit')"><span
                                                                    class="fa fa-edit">Edit</span></a>
                                                        &nbsp; | &nbsp;
                                                        <?php if($sliders->status==1): ?>
                                                            <a href="javascript:;" class="btn btn-warning btn-xs"
                                                               onclick="inactiveConfirm('<?php echo e($sliders->photo_slider_id); ?>')"
                                                               id="menuId<?php echo e($sliders->photo_slider_id); ?>"><span
                                                                        class="fa fa-ban">&nbsp;<?php echo e(trans('common.inactive')); ?></span></a>
                                                        <?php else: ?>
                                                            <a href="javascript:;" class="btn btn-success btn-xs"
                                                               onclick="activeConfirm('<?php echo e($sliders->photo_slider_id); ?>')"
                                                               id="menuId<?php echo e($sliders->photo_slider_id); ?>"><span
                                                                        class="fa fa-check-square-o"> <?php echo e(trans('common.active')); ?></span></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="addPhotoSlider">
                                    <?php echo Form::open(array('route'=>'photoSlider.post','class'=>'form-horizontal form-wrp photoSlider','files'=>true)); ?>


                                    <div class="form-group">
                                        <label class="col-md-2"> Chose An Image </label>
                                        <div class="col-md-4">
                                            <input type="file" name="image" class="form-control input-sm">
                                            <span>Image Size Must Be Height = 211 , Widh = 848</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Chose Category </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="category_id" id="category_name_id">
                                                <?php if(isset($getActiveCategory)): ?>
                                                    <?php foreach($getActiveCategory as $category): ?>
                                                        <option value="<?php echo e($category->category_id); ?>">
                                                            <?php echo e($category->category_name_lang1); ?>

                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Select Sub Category </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="sub_category_name_id" id="sub_category_name_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2"> Image Caption </label>
                                        <div class="col-md-4">
                                            <input type="text" name="image_caption" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-2">
                                            <button type="submit" class="btn btn-success btn-sm product-image-btn"
                                                    value="Save"><i class="fa fa-save"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                            <!-- =======End Page Content======= -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $('.modal1').on('click', function () {
            $('.modal-title').html('Edit Photo Slider Photo');
            $('.modal-content').removeClass('modal-big');
            $('.modal-content').addClass('modal-lg');
        })

        $(document).ready(function () {
            $('.photoSlider').validate({
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
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });

        $('#category_name_id').on('change', function(e) {
            var categoryId = e.target.value;
            var loader = $('.loader');
            var sub_category_name_id = $('#sub_category_name_id');

            $.ajax({
                url: 'categoryId/' + categoryId ,
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

        //======@@ Save btn function @@========
        var db_err = $('.db-error');
        var inactive_msg = $('.inactive-msg');
        var active_msg = $('.active-msg');
        var loading = $('.loading');
        //===@@ Inactive Operation @@=====

        function inactiveConfirm(id) {
            $.ajax({
                url: "<?php echo e(URL::to('inactivePhotoSlider')); ?>/" + id,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function () {
                    loading.show();
                },
                success: function (data) {
                    if (data.success == true) {
                        inactive_msg.slideDown().delay(3000).slideUp(300);
                        $("#menuId" + id).removeClass('btn btn-warning btn-xs');
                        $("#menuId" + id).html('<a href="javascript:;" class="btn btn-success btn-xs" onclick="activeConfirm(' + id + ')" id="menuId' + id + '"><span class="fa fa-check-square-o">&nbsp;<?php echo e(trans("common.active")); ?></span></a>'); //inactive hide
                        $("#menuId" + id).prev().parent().prev().html("<label class='label label-warning'>Inactive</label>");
                    } else {
                        db_err.hide().find('label').empty();
                        db_err.find('label').append(data.status);
                        db_err.slideDown();
                        db_err.delay(5000).slideUp(300);
                    }
                    loading.hide();
                }
            });
            return true;
        }

        //===@@ Active Operation @@=====

        function activeConfirm(id) {
            $.ajax({
                url: "<?php echo e(URL::to('activePhotoSlider')); ?>/" + id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.success == true) {
                        active_msg.slideDown().delay(3000).slideUp(300);
                        active_msg.hide();
                        $("#menuId" + id).removeClass('btn btn-success btn-xs');
                        $("#menuId" + id).html('<a href="javascript:;" class="btn btn-warning btn-xs" onclick="inactiveConfirm(' + id + ')" id="menuId' + id + '"><span class="fa fa-ban">&nbsp;<?php echo e(trans("common.inactive")); ?></span></a>'); //active hide
                        $("#menuId" + id).prev().parent().prev().html("<label class='label label-success'>Active</label>");
                    } else {
                        db_err.hide().find('label').empty();
                        db_err.find('label').append(data.status);
                        db_err.slideDown();
                        db_err.delay(5000).slideUp(300);
                    }
                }
            });
            return true;
        }

        $(document).ready(function () {
            $('#menuDataTable').DataTable();
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>