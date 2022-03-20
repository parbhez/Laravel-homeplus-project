<!-- START Left Column -->
<div id="left-column" class=""> <!-- NOTE TO READER: Accepts the following class(es) "menu-icon-only", "fixed" class -->
    <div id="mainnav">
        <ul class="mainnav"> <!-- NOTE TO READER: Accepts the following class(es) "animate" class -->
            <li class="menu-item-top">
                <a href="<?php echo e(URL::to('dashboard')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-grid-big"></span>
								</span>
                    <span class="main-menu-text">Dashboard</span>
                </a>
            </li>

            <li class="menu-item-top">
                <a href="#" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-dollar"></span>
								</span>
                    <span class="main-menu-text">Basic Setup</span>
                </a>
                <ul>
                    <li><a href="<?php echo e(URL::to('category')); ?>">Category</a></li>
                    <li><a href="<?php echo e(URL::to('subCategory')); ?>">Sub Category</a></li>
                    <li><a href="<?php echo e(URL::to('subCategoryDetails')); ?>">Sub Category Details</a></li>
                    <li><a href="<?php echo e(URL::to('color')); ?>">Color</a></li>
                    <li><a href="<?php echo e(URL::to('size')); ?>">Size</a></li>
                    <li><a href="<?php echo e(URL::to('city')); ?>">City</a></li>
                </ul>
            </li>
            <li class="menu-item-top">
                <a href="<?php echo e(URL::to('photoSlider')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-layers"></span>
								</span>
                    <span class="main-menu-text">Photo Slider</span>
                </a>
            </li>
            <!-- <li class="menu-item-top">
                <a href="<?php echo e(URL::to('merchant')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-layers"></span>
								</span>
                    <span class="main-menu-text">Marchent</span>
                </a>
            </li> -->

            <li class="menu-item-top">
                <a href="<?php echo e(URL::to('product')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-star"></span>
								</span>
                    <span class="main-menu-text">Products</span>
                </a>
            </li>
            <li class="menu-item-top">
                <a href="<?php echo e(URL::to('orders')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-star"></span>
								</span>
                    <span class="main-menu-text">Orders</span>
                </a>
            </li>
            <!-- <li class="menu-item-top">
                <a href="<?php echo e(URL::to('report')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-star"></span>
								</span>
                    <span class="main-menu-text">Report</span>
                </a>
            </li> -->
            <li class="menu-item-top">
                <a href="<?php echo e(URL::to('user')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-layers"></span>
								</span>
                    <span class="main-menu-text">Users</span>
                </a>
            </li>
            <li class="menu-item-top">
                <a href="<?php echo e(URL::to('admin')); ?>" class="top">
								<span class="main-menu-icon">
									<span aria-hidden="true" class="icon icon-layers"></span>
								</span>
                    <span class="main-menu-text">Admin</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- END Left Column -->
