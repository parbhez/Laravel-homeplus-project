@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
        	<div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Merchants
					</span>
			    </span>
            </div>	
			<!-- START Block: Start Here -->
			<div class="block" style=" margin-top: 10px; ">
				<div class="block-content-outer">
					<div class="block-content-inner">
					<!-- =======Start Page Content======= -->
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#viewProduct" aria-controls="viewProduct" role="tab" data-toggle="tab"> View Merchants </a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active table-responsive" id="viewProduct">
						     	<table id="productDataTable" class="table table-bordered table-hover" width="100%">
						     	    <thead>
										<tr>
											<th># Sl No</th>
											<th>Merchant Name</th>
											<th>Total Products</th>
											<th>Action</th>
										</tr>
								    </thead>
									<tbody>
										<?php $i=0; $lang=Session::get('last_login_lang'); ?>
										
										@if(isset($getMerchants))
											@foreach($getMerchants as $merchants)
											<tr>
												<td>{{++$i}} </td>
												<td>
													<a href="{{URL::to('merchantProductsView').'/'.$merchants->id}}">
														{{$merchants->company_name}}
													</a>
												</td>
												<td>{{$merchants->total_products}}</td>
												<td align="center">
													<a href="{{URL::to('merchantProductsView').'/'.$merchants->id}}" class="btn btn-success btn-sm fa fa-table">
													 View Products
													</a>	
												</td>
											</tr>
											@endforeach
										@endif

									</tbody>						
								</table>
						    </div>
						    
						</div>
						<!-- =======End Page Content======= -->
					</div>
				</div>
			</div>
			<!-- END Block -->
        </div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
	    $('#productDataTable').DataTable();
	});

</script>

@endsection