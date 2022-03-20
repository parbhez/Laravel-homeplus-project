<style>
	.alert{
		margin-bottom: 10px;
		padding-bottom: 0;
	}
	.alert ul li{
		margin-top: -15px; 
		padding-bottom: 10px;
	}
</style>
<div class="loading" style="display:none;">
	 Loading <?php echo HTML::image('public/icons/loader.gif','loading'); ?>

</div>	

<div class="alert alert-danger info-error" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul></ul>
</div>

<div class="alert alert-success info-suc" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Well done!</strong> &nbsp;Save Changes successfully.<br><br>
</div>

<div class="alert alert-danger file-error" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Oh snap!</strong> There were some problem because your old existing file not found. <br/><br/>
</div>

<div class="alert alert-warning db-error" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Oops!</strong> &nbsp;<label></label></span><br><br>
</div>
<div class="alert alert-info alert-dismissable delete-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Well done!</strong> Delete Record Successfully.<br><br>
</div>
<div class="alert alert-info alert-dismissable raw-delete-msg" style="display:none;">
  <strong>Well done!</strong> Delete Record Successfully.<br><br>
</div>
<div class="alert alert-info alert-dismissable inactive-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Well done!</strong> Inactive Record Successfully.<br><br>
</div>
<div class="alert alert-info alert-dismissable active-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Well done!</strong> Active Record Successfully.<br><br>
</div>
<div class="alert alert-warning alert-dismissable warning-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> Something wrong! Please try again.<br><br>
</div>
<div class="alert alert-warning alert-dismissable fk-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> Already Used! You can't Delete it.<br><br>
</div>
<div class="alert alert-warning alert-dismissable fk-constraint-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> Already Used! You can't Delete it.<br><br>
</div>
<div class="alert alert-success info-suc-custome" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<label></label><br><br>
</div>

<div class="alert alert-success info-suc-dynamic" style="display:none;">	
	<strong>Well done!</strong> &nbsp;<label></label><br><br>
</div>

<div class="alert alert-info alert-dismissable info-update-dynamic" style="display:none;">
	<strong>Well done!</strong> &nbsp;<label></label><br><br>
</div>

<div class="alert alert-success info-approve" style="display:none;">
	<strong>Well done!</strong> &nbsp; Approved Successfully .<label></label><br><br>
</div>

<div class="alert alert-success info-deny" style="display:none;">
	<strong>Well done!</strong> &nbsp; Deny Successful .<label></label><br><br>
</div>

<div class="alert alert-success info-shipment" style="display:none;">
	<strong>Well done!</strong> &nbsp; Shipment Sent Successfully .<label></label><br><br>
</div>