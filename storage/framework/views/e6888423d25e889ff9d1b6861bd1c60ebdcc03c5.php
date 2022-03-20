<?php if(Session::has('flash_success')): ?>
	<div class="alert alert-success <?php echo e(Session::has('flash_msg_important') ? 'alert-important' : ''); ?>"> 
		<?php if(Session::has('flash_msg_important')): ?>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php endif; ?>
		<?php echo e(Session('flash_success')); ?> 
	</div>
<?php endif; ?>

<?php if(Session::has('flash_error')): ?>
	<div class="alert  alert-warning alert-dismissable <?php echo e(Session::has('flash_msg_important') ? 'alert-important' : ''); ?>"> 
		<?php if(Session::has('flash_msg_important')): ?>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php endif; ?>
		<strong>Warning!</strong> 
		<?php echo e(Session('flash_error')); ?> 
	</div>
<?php endif; ?>

 <?php if(session('success')): ?>
    <div class="alert alert-success">
        <strong><i class="icon-check"></i> <?php echo e(session('success')); ?>.</strong>
    </div>
 <?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <strong><i class="icon-check"></i> <?php echo e(session('error')); ?>.</strong>
    </div>
<?php endif; ?>

 <?php if(count($errors) > 0): ?>
	<div class="error">
		<ul class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
             <?php endforeach; ?>
		</ul>
	</div>
 <?php endif; ?>

