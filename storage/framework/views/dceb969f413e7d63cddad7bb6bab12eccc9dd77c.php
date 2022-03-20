<?php echo $__env->make('frontend._partials.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend._partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend._partials.topNavigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->yieldContent('main_container'); ?>
<?php echo $__env->make('frontend._partials.btmHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend._partials.btm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend._partials.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     
