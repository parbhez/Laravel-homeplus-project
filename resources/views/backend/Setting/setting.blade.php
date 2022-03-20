@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						{{trans('dashboard.setting')}}
					</span>
			    </span>
            </div>	
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
					
					  <span class="main-text">
						  <h3> Company Setting </h3>
					  </span>
                            
                                  &nbsp;
						    
						    <div role="tabpanel" class="tab-pane" id="addUser"> 
						    	{!!Form::open(array('route'=>'systemSetting.post','class'=>'form-horizontal form-wrp userForm','files'=>true))!!}
								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.company_names')}} :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="company_names" value="{{$contact->company_name}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.address')}} :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="address" value="{{$contact->address}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.mobile')}} :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="mobile_no" value="{{$contact->mobile_no}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.company_slogan')}} :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="slogan" value="{{$contact->company_slogan}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.company_logo')}} :</label>
									<div class="col-md-3">
										<input type="file" name="company_logo">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.currency')}} :</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="currency" value="{{$contact->currency}}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2"> {{trans('dashboard.language')}} : </label>
										<div class="col-md-3">
											<tr>
                                                <td align="left">
												{{ Form::select('language', array('0' => 'Bangla', '1' => 'English'), null, ['id' => 'language', 'class' => 'form-control txtBox']) }}
                                                </td>
                                                <td align="left"><span id="msg_firstname"></span>&nbsp;</td>
                                            </tr>
										</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-2">
										<input type="submit" class="btn btn-success btn-md" value="Save">
									</div>
								</div>
							    {!!Form::close()!!}
						    </div>
					<!-- =======End Page Content======= -->
					</div>
				</div>
			</div>
	    </div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function(){	
		//Custom validation Rules
		//alphaspace allowed

		$('.userForm').validate({
			onkeyup: false,		
			rules: {
				company_names: {
					required: true
				},
				address: {
					required: true
				},
				mobile_no: {
					required: true
				},
				slogan: {
					required: true
				},
				logo: {
					required: true
				},
			},
		  	submitHandler: function(form) {
		  		form.submit();
		  	}
		});

	});

</script>

@endsection