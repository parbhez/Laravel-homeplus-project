<?php echo $__env->make('backend._partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend._partials.leftNav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="body-container">
	<div id="right-column">
		<div class="right-column-content">
			<div class="row"> 
            	<?php echo $__env->make('backend.errors.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php echo $__env->make('backend.errors.ajaxMsg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div> 
			<?php echo $__env->yieldContent('content'); ?>

			<div id="footer-container">
				<div class="footer-content">
					&copy; <a href="#"><?php echo e(date('Y')); ?></a><span style="color:#FF0000;">&#10084;</span> and Developed By: - <a href="http://uit.unitechengr.com/" target="_blank" style="font-weight:300;color:#ffffff;background:#1d1d1d;padding:0 3px;">Unitech<span style="color:#ffa733;font-weight:bold">-</span>IT</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('backend._partials.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend._partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>









