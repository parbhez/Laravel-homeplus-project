<!--Start Top Bar -->
<div class="top_bar">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active" style="display: none"><a href="<?php echo e(URL::to('merchantPage')); ?>"><?php echo e(trans('frontend.merchant_corner')); ?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                                    <i class="fa fa-user"></i>
                                    <?php echo e(trans('frontend.your_account')); ?><span class="caret"></span>
                                </a>
                                <?php if(Session::has('frontendUser.id')): ?>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h4 style="text-align: center;"><?php echo e(Session::get('frontendUser.full_name')); ?></h4>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo e(URL::to('manageUserProfile')); ?>">
                                                <i class="fa fa-user" style="color: #4D4D4D;"></i>
                                                <?php echo e(trans('frontend.manage_profile')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(URL::to('userLogout')); ?>">
                                                <i class="fa fa-sign-out" style="color: #4D4D4D;"></i>
                                                <?php echo e(trans('frontend.signout')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                <?php else: ?>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <?php echo Form::open(array('route'=>'checkUserLogin.post','id'=>'userLoginForm','class'=>'navbar-form navbar-left', 'style'=>'padding-left: 15px', 'files'=>true)); ?>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo e(trans('frontend.email_address')); ?></label>
                                                <input type="email" name="email" class="form-control no_radius" id="exampleInputEmail1" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo e(trans('frontend.password')); ?></label>
                                                <input type="password" name="password" class="form-control no_radius" id="exampleInputPassword1" placeholder="Password">
                                            </div>

                                            <button type="submit" class="btn btn-default"><?php echo e(trans('frontend.signin')); ?></button>
                                            <div class="forget_pass">
                                                <a href="<?php echo e(URL::to('forgotePassword')); ?>"><?php echo e(trans('frontend.forget_password')); ?> ?</a>
                                            </div>
                                            <?php echo Form::close(); ?>

                                        </li>
                                        <li>
                                            <a href="<?php echo e(URL::to('frontendUser')); ?>" style="margin-left: 10px"><?php echo e(trans('frontend.register')); ?></a>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-default language-select <?php if(Session::get('frontend_lang') == 1): ?> active <?php endif; ?>" data-status="1">ENG</button>
                                <button type="submit" class="btn btn-default language-select <?php if(Session::get('frontend_lang') == 2): ?> active <?php endif; ?>" data-status="2">বাংলা</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!--Close Top Bar -->


        