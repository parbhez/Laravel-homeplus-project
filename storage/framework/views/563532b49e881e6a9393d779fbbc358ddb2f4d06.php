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
                            <li class="active" style="display: none">
                                <a href="<?php echo e(URL::to('merchantPage')); ?>"><?php echo e(trans('frontend.merchant_corner')); ?></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">
                                    <i class="fa fa-user"></i>
                                    <?php echo e(trans('frontend.your_account')); ?> <span class="caret"></span>
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
                                <button type="submit" class="btn btn-default language-select <?php if(Session::get('frontend_lang') == 2): ?> active <?php endif; ?>" data-status="2">???????????????</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!--Close Top Bar -->

<!--Start Header -->
<header class="header">
    <div class="container">
        <div class="row" >
            <!--Start Logo-->
            <div class="col-md-3">
                <a href="<?php echo e(URL::to('/')); ?>" class="logo">
                    <img src="<?php echo e(URL::to('/')); ?>/public/frontend/assets/img/logo.png" alt="">
                </a>
            </div>
            <!--Close Logo-->
            <!--Start Search-->
            <div class="col-md-9">
                <div class="search_wrapper">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="search_box">
                                <?php echo Form::open(['route'=>'serachProduct']); ?>

                                    <div class="row">
                                        <div class="col-md-9 col-sm-9">
                                            <div class="search_input_box">
                                                <input type="text" name="search_content" placeholder="<?php echo e(trans('frontend.search_product')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <ul class="select_input_category">
                                                <li style=" float: left;">
                                                    <select name="search_type" id="SearchSelect">
                                                        <option value="1"><?php echo e(trans('frontend.all')); ?></option>
                                                        <option value="2"><?php echo e(trans('frontend.product')); ?></option>
                                                        <?php /*<option value="3">trans('frontend.merchant')</option>*/ ?>
                                                    </select>
                                                </li>
                                                <li style=" float: left;">
                                                    <button type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php echo Form::close(); ?>

                            </div><!--search_box -->
                        </div><!--col-md-10 -->
                        <div class="col-md-2">
                            <div class="shopping_cart">
                                <a class="loadModal" data-toggle="modal" href="#modal" onclick="loadModal('shoppingCartModal')">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div><!--col-md-2 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Close Header -->

<!--Start Top Menu -->
<section class="top_menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline">
                    <li class="shopping_category">
                        <a href="">
                            Shopping Category
                            <span class="caret"></span>
                        </a>
                        <div class="shopping_mega_menu">
                            <ul>
                            <?php if(Session::has('menus')): ?>
                                <?php foreach(Session::get('menus') as $menuKey=>$menu): ?>
                                <?php
                                    $menuNameWithIconAndId = explode('#', $menuKey);
                                    $menuName = $menuNameWithIconAndId[0];
                                    $categoryName = str_replace(' ','-',$menuName);
                                    $menuIcon = $menuNameWithIconAndId[1];
                                    $menuId   = $menuNameWithIconAndId[2];
                                ?>
                                <li class="gents_collection">
                                    <i class=""><img src="<?php echo e(URL::to('public/images/category/icon')); ?>/<?php echo e($menuIcon); ?>"></i>
                                    <a href="<?php echo e(URL::to('category').'/'.$menuId.'/'.$categoryName); ?>">
                                        <?php echo e($menuName); ?>

                                    </a>
                                        <?php if($menu != 'null'): ?>
                                        <div class="gents_mega_menu">
                                            <div class="row">
                                            <?php $i=1; ?>
                                            <?php foreach($menu as $subMenuKey=>$subMenu): ?>

                                                <div class="col-md-4 col-sm-4">
                                                <?php if(($i%3)==0): ?>
                                                </div><div class="col-sm-4">
                                                <?php endif; ?>
                                                <?php
                                                    $subMenuName = explode('-', $subMenuKey);
                                                    $subcategoryName = str_replace(' ','-',$subMenuName[0]);
                                                ?>
                                                    <a href="<?php echo e(URL::to('sub-category').'/'.$subMenuName[1].'/'.$subcategoryName); ?>">
                                                        <h2>
                                                    <?php echo e($subMenuName[0]); ?>

                                                        </h2>
                                                    </a>
                                                    <?php if($subMenu != 'null'): ?>
                                                    <ul>
                                                        <?php foreach($subMenu as $subSubMenu): ?>
                                                            <?php $subSubcategoryName = str_replace(' ','-',$subSubMenu->sub_sub_category_name_lang1) ?>
                                                            <li>
                                                                <a href="<?php echo e(URL::to('sub-sub-category').'/'.$subSubMenu->id.'/'.$subSubcategoryName); ?>">
                                                                    <?php if(Session::get('frontend_lang') == 1): ?><?php echo e($subSubMenu->sub_sub_category_name_lang1); ?> <?php else: ?> <?php echo e($subSubMenu->sub_sub_category_name_lang2); ?> <?php endif; ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                    <?php endif; ?>
                                                </div>
                                                <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                       <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                    &nbsp;
                    <?php if(Session::has('top_menus')): ?>
                        <?php foreach(Session::get('top_menus') as $topMenu): ?>
                            <?php $categoryName = str_replace(' ','-',$topMenu->category_name_lang1) ?>
                            <li>
                                <a href="<?php echo e(URL::to('category').'/'.$topMenu->id.'/'.$categoryName); ?>">
                                <?php if(Session::get('frontend_lang') == 1): ?>
                                    <?php echo e($topMenu->category_name_lang1); ?>

                                <?php else: ?>
                                    <?php echo e($topMenu->category_name_lang2); ?>

                                <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Close Top Menu -->