@extends('backend.app')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<ol class="breadcrumb">
			<li>
				<a href="#">Home</a>
			</li>
			<li class="active">
				<a href="#">Dashboard </a>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<h1>
			<span aria-hidden="true" class="icon icon-grid-big"></span>
			<span class="main-text">
				Sale Deshboard
			</span>
		</h1>
	</div>
	<div class="col-md-6">
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-3">
		<div class="c-widget c-widget-quick-info c-widget-size-small highlight-color-blue">
			<div class="c-widget-icon">
				<span class="icon icon-user"></span>
			</div>
			<div class="c-wdiget-content-block">
				<div class="c-widget-content-heading">
					296
				</div>
				<div class="c-widget-content-sub">
					Total Customer
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="c-widget c-widget-quick-info c-widget-size-small highlight-color-green" data-url="#">
			<div class="c-widget-icon">
				<span class="icon  icon-list-square"></span>
			</div>
			<div class="c-wdiget-content-block">
				<div class="c-widget-content-heading">
					2,094
				</div>
				<div class="c-widget-content-sub">
					Today's Order
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="c-widget c-widget-quick-info c-widget-size-small highlight-color-red" data-url="#">
			<div class="c-widget-icon">
				<span class="icon icon-off"></span>
			</div>
			<div class="c-wdiget-content-block">
				<div class="c-widget-content-heading">
					14
				</div>
				<div class="c-widget-content-sub">
					Pending Order
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="c-widget c-widget-quick-info c-widget-size-small highlight-color-yellow" data-url="#">
			<div class="c-widget-icon">
				<span class="icon icon-air-plane"></span>
			</div>
			<div class="c-wdiget-content-block">
				<div class="c-widget-content-heading">
					32
				</div>
				<div class="c-widget-content-sub">
					Today's Shipment
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">
				<!-- START Block: Overview Graph -->
				<div class="block overview-block">
					<div class="block-heading">
						<div class="main-text h2">
							Overview
						</div>
						<div class="block-controls">
							<span aria-hidden="true" class="icon icon-cross icon-size-medium block-control-remove"></span>
							<span aria-hidden="true" class="icon icon-arrow-down icon-size-medium block-control-collapse"></span>
						</div>
					</div>
					<div class="block-content-outer">
						<div class="block-content-inner">
							<div class="graph-range">
								<form role="form" class="form-inline">
									<div class="form-group graph-controls">
										<label for="date-range-select" class="control-label">Date Range</label>
										<select class="date-range-select form-control input-sm" id="date-range-select">
											<option value="today">Today</option>
											<option value="yesterday">Yesterday</option>
											<option value="this_week">This Week</option>
											<option value="last_week">Last Week</option>
											<option value="this_month">This Month</option>
											<option value="this_year" selected="selected">This Year</option>
											<option value="last_year">Last Year</option>
											<option value="custom">Custom</option>
										</select>
									</div>
									<div class="form-group graph-controls">
										<div class="date-picker-connected">
											<div class="input-group input-group-sm date-picker-start">
												<input type="text" class="form-control" autocomplete="off" size="10" placeholder="DD/MM/YYYY" data-date-format="DD/MM/YYYY">
												<span class="input-group-addon input-group-icon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
											to 
											<div class="input-group input-group-sm date-picker-end">
												<input type="text" class="form-control" autocomplete="off" size="10" placeholder="DD/MM/YYYY" data-date-format="DD/MM/YYYY">
												<span class="input-group-addon input-group-icon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
											<a class="btn btn-info btn-sm">
												<span class="glyphicon glyphicon-refresh"></span>
											</a>
										</div>
									</div>
									<div class="form-group graph-controls">
										<label for="overview-order-status" class="control-label">Order Status</label>
										<select class="form-control input-sm" id="overview-order-status">
											<option value="all">All</option>
											<option value="canceled">Canceled</option>
											<option value="complete">Complete</option>
											<option value="denied">Denied</option>
											<option value="pending">Pending</option>
										</select>
									</div>
								</form>
							</div>
							<div id="overview" class="graph graph-size-normal" data-graph-colors="#4596f1,#f17d45"></div>
						</div>
					</div>
				</div>
				<!-- END Block: Overview Graph -->
			</div>
			<div class="col-md-4">
			</div>
		</div>
		
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<!-- START Widget: Graph -->
				<div class="c-widget c-widget-graph c-widget-size-medium highlight-color-blue">
					<div class="c-widget-icon">
						<span class="icon icon-arrow-down-bold-round"></span>
					</div>
					
					<div class="c-wdiget-content-block">
						<div class="c-widget-content-heading">
							Payment Collection
						</div>
						<div class="c-widget-content-sub highlight-color-red-link">
							
								<span class=" glyphicon glyphicon-usd"></span>
								Today [ {{ date('Y-m-d') }} ]
							
						</div>
					</div>
				</div>
				<!-- END Widget: Graph -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- START Widget: Graph -->
				<div class="c-widget c-widget-graph c-widget-size-medium highlight-color-blue">
					<div class="c-widget-icon">
						<span class="icon icon-star"></span>
					</div>
					
					<div class="c-wdiget-content-block">
						<div class="c-widget-content-heading">
							Vouchers Used
						</div>
						<div class="c-widget-content-sub">
							76 of 200 Used
						</div>
					</div>
				</div>
				<!-- END Widget: Graph -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- START Widget: Graph -->
				<div class="c-widget c-widget-graph c-widget-size-medium highlight-color-blue">
					<div class="c-widget-icon">
						<span class="icon icon-coins"></span>
					</div>
					<div class="c-wdiget-content-block">
						<div class="c-widget-content-heading">
							Today's Sales
						</div>
						<div class="c-widget-content-sub">
							<span class="glyphicon glyphicon-arrow-left"></span> Hover over chart for details
						</div>
					</div>
				</div>
				<!-- END Widget: Graph -->
			</div>
		</div>
	</div>
</div>
@endsection

