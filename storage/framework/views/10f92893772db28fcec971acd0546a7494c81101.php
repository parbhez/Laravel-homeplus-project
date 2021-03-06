<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Shopping</title>
	<?php echo HTML::style('public/assets/css/required/bootstrap/bootstrap.min.css'); ?>


	<?php echo HTML::style('public/assets/css/font-awesome.min.css'); ?>

	<?php echo HTML::style('public/assets/chosen/chosen.css'); ?>

	<?php echo HTML::style('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.min.css'); ?>

	<?php echo HTML::style('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.structure.min.css'); ?>

	<?php echo HTML::style('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.theme.min.css'); ?>

	<?php echo HTML::style('public/assets/css/required/mCustomScrollbar/jquery.mCustomScrollbar.min.css'); ?>

	<?php echo HTML::style('public/assets/css/required/icheck/all.css'); ?>

	<?php echo HTML::style('public/assets/fonts/metrize-icons/styles-metrize-icons.css'); ?>

	<?php echo HTML::style('public/assets/css/optional/bootstrap-datetimepicker.min.css'); ?>



	<!-- More Required CSS Files -->
	<?php echo HTML::style('public/assets/css/styles-core.css'); ?>

	<?php echo HTML::style('public/assets/css/styles-core-responsive.css'); ?>

    <?php echo HTML::style('public/assets/css/util.carousel.skins.css'); ?>



	<?php echo e(HTML::script('public/assets/js/required/jquery-1.11.1.min.js')); ?>

	<?php echo e(HTML::script('public/assets/chosen/chosen.jquery.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/bootstrap/bootstrap.min.js')); ?>

	<?php echo e(HTML::script('public/assets/validation/jquery.validate.min.js')); ?>

    <?php echo e(HTML::script('public/assets/validation/jquery.customValidation.js')); ?>


    <!-- DataTables CSS Files -->

    <?php echo HTML::style('public/assets/css/optional/datatables/css/dataTables.bootstrap.min.css'); ?>

    <?php echo HTML::style('public/assets/css/optional/datatables/css/dataTables.tableTools.min.css'); ?>

    <?php echo HTML::style('public/assets/css/optional/datatables/css/dataTables.responsive.min.css'); ?>

    <!-- <?php echo HTML::style('public/assets/css/demo-files/tables-datatables.css'); ?> -->

    <!-- DataTables CSS Files -->

</head>
<body>
	<div class="container-fluid">
		<!-- START Header Container -->
		<div id="header-container">
			<div class="header-bar navbar navbar-inverse" role="navigation"> <!-- NOTE TO READER: Accepts the following class(es) "navbar-fixed-top" class -->
				<div class="container">
					<div class="navbar-header">
						<!-- START logo -->
						<div class="logo" style="margin-top:10px">
							<a href="<?php echo e(URL::to('/dashboard')); ?>" style="color:white;font-size:20px">
								Home Plus
							</a>
						</div>
						<!-- END logo -->

						<!-- START Mobile Menu Toggle -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- END Mobile Menu Toggle -->

						<!-- START Language Selector -->
						<?php /*<div class="header-language" style="margin-top:5px">
						  <button class="language-select btn" style="background:#4596f1; border-radius:4px !important; margin-top:1px; color:white;font-weight:bolder"  data-status=<?php if(Session::get('last_login_lang') == 1): ?> 2 <?php else: ?> 1 <?php endif; ?>>
						  	<span class="fa fa-language" style="font-size:18px"> </span><?php if(Session::get('last_login_lang') == 1): ?> ??????????????? <?php else: ?> English <?php endif; ?>
						  </button>
						</div>*/ ?>
						<!-- END Language Selector -->

						<!-- END Search Bar -->

						<!-- START Header Info Container -->
						<div class="header-info">
							<!-- START Header User Profile -->
							<div class="header-profile"> <!-- NOTE TO READER: Accepts the following class(es) "animate" class -->
								<ul class="header-profile-menu">
									<li>
										<a href="#" class="top">
											<span class="header-profile-menu-icon">
												<img style="border: 3px solid #d9d9d9" class="list-thumbnail" src="<?php echo e(URL::to('/public')); ?>/assets/images/required/profile/profile-pic-4.jpg" width="39" height="39" alt="profile-pic-4" />
											</span>
											<span class="main-menu-text">
												<?php echo e(Session::get('admin.full_name')); ?>

												<i class="icon icon-arrow-down-bold-round icon-size-small"></i>
											</span>
										</a>
										<ul>
											<?php /*<li>
												<a href="<?php echo e(URL::to('profile')); ?>">
												      <span aria-hidden="true" class="icon icon-user"></span>
												      <span class="main-text" ><?php echo e(trans('dashboard.profile')); ?></span>
												</a>
											</li>

											<li>
												  <a href="<?php echo e(URL::to('systemSetting')); ?>">
												      <span aria-hidden="true" class="icon icon-settings"></span>
												      <span class="main-text" ><?php echo e(trans('dashboard.setting')); ?></span>
												  </a>
											</li>*/ ?>

											<li>
												<a href="<?php echo e(URL::to('logout')); ?>">
													<span aria-hidden="true" class="icon icon-arrow-curve-right"></span>
													<span class="main-text"><?php echo e(trans('dashboard.logout')); ?></span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<!-- END Header User Profile -->



						</div>
						<!-- END Header Info Container -->

					</div>
				</div>
			</div>
		</div>
		<!-- END Header Container -->
