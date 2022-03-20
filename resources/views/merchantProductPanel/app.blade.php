@include('merchantProductPanel._partials.header')
<div id="body-container">
	<div id="right-column">
		<div class="right-column-content">
			@include('merchantProductPanel._partials.leftNavBar')
			<div class="row"> 
            	@include('merchantProductPanel.errors.messages')
				@include('merchantProductPanel.errors.ajaxMsg')
            </div> 
			@yield('content')
		</div>
	</div>
</div>

@include('merchantProductPanel._partials.modal')
@include('merchantProductPanel._partials.btm')









