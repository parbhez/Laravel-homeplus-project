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
	 Loading {!! HTML::image('public/icons/loader.gif','loading') !!}
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
	<strong>Oops!</strong> &nbsp;</span><br><br>
</div>
<div class="alert alert-info alert-dismissable delete-msg" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
	<br><br>
</div>

<div class="alert alert-success info-suc-dynamic" style="display:none;">	
	<strong>Well done!</strong> &nbsp;<br><br>
</div>

<div class="alert alert-info alert-dismissable info-update-dynamic" style="display:none;">
	<strong>Well done!</strong> &nbsp;<br><br>
</div>

<div class="alert alert-success info-approve" style="display:none;">
	<strong>Well done!</strong> &nbsp; Approved Successfully .<br><br>
</div>

<div class="alert alert-success info-deny" style="display:none;">
	<strong>Well done!</strong> &nbsp; Deny Successful .<br><br>
</div>

<div class="alert alert-success info-shipment" style="display:none;">
	<strong>Well done!</strong> &nbsp; Shipment Sent Successfully .<br><br>
</div>

<div class="alert alert-warning no-record" style="display:none;">
	<strong>Warning!!!..</strong> &nbsp; No Records Found .<br><br>
</div>
<div class="alert alert-warning info-inactive" style="display:none;">
	<strong>Warning!!!..</strong> &nbsp; Item Inactivated<br><br>
</div>
<div class="alert alert-success info-active" style="display:none;">
	<strong>Warning!!!..</strong> &nbsp; Item Activated<br><br>
</div>
<div class="alert alert-info common-msg" style="display:none;">
	<span id="common-msg">Your message here</span><br><br>
</div>
