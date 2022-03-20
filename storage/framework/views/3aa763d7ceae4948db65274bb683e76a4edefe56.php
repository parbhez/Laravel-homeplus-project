
<!-- Required JS Files -->
	<?php echo e(HTML::script('public/assets/js/required/jquery.easing.1.3-min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/jquery.mCustomScrollbar.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/misc/jquery.mousewheel-3.0.6.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/misc/retina.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/icheck.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/misc/jquery.ui.touch-punch.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/required/circloid-functions.js')); ?>


	<!-- Optional JS Files -->
	<?php echo e(HTML::script('public/assets/js/optional/circloid-functions-optional.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.JUMlib.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.resize.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.tooltip.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.pie.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.stack.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.time.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/flot/jquery.flot.orderBars.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/easy-pie-chart/jquery.easypiechart.min.js')); ?>

	<?php echo e(HTML::script('public/assets/js/optional/misc/moment.js')); ?>

	<!-- add optional JS plugin files here -->

	<!-- REQUIRED: User Editable JS Files -->
	<?php echo e(HTML::script('public/assets/js/script.js')); ?>

	<!-- add additional User Editable files here -->

	<!-- Demo JS Files -->
	<?php echo e(HTML::script('public/assets/js/demo-files/index.js')); ?>

    <!-- Start of StatCounter Code for Default Guide -->

   <!-- DataTables JS -->
    <?php echo e(HTML::script('public/assets/js/optional/datatables/js/jquery.dataTables.min.js')); ?>

    <?php echo e(HTML::script('public/assets/js/optional/datatables/js/dataTables.bootstrap.min.js')); ?>

    
   <!-- DataTables JS -->
</div>
</body>

<script type="text/javascript">
	
/* Selected Active menu code*/
	  var url = window.location;
        
        if(($('ul li a[href="' + url + '"]').parent().attr('class'))==undefined){
             $('ul li a[href="' + url + '"]').parent().parent().parent().addClass('selected'); //for sub menu
        }else{
            $('ul li a[href="' + url + '"]').parent().addClass('selected'); //for main menu
        }
/* Selected Active menu code end*/

        //=======Session Msg SlideUp=========
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);

        //===@@ Date Format @@======
        $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
</script>

 <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

  <script type="text/javascript">
  	$(".language-select").on('click',function(){
      var langType = $(this).data("status");
  		$.get( "<?php echo e(URL::to('langChange')); ?>/"+langType, function( data ) {
  			if (data.success == true) {
		  		location.reload();
  			}
		  });
  	});
  </script>
  
  </div>
<body>

