<script>
  //==== Ajax Global Variable ====

	var info_err 	= $('.info-error');
	var info_suc 	= $('.info-suc');
	var info_suc_custome 	= $('.info-suc-custome');
	var file_err 	= $('.file-error');
	var db_err 	 	= $('.db-error');
	var loading  	= $('.loading');
    var delete_msg  = $('.delete-msg');
    var warning_msg = $('.warning-msg');
    var fk_constraint_msg = $('.fk-constraint-msg');
	var info_suc_dynamic  = $('.info-suc-dynamic');
	var info_update_dynamic  = $('.info-update-dynamic');
	var raw_delete_msg    = $('.raw-delete-msg');
	
    //======CsrfToken For Ajax Request=====
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

</script>