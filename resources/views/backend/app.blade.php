@include('backend._partials.header')
@include('backend._partials.leftNav')
<div id="body-container">
	<div id="right-column">
		<div class="right-column-content">
			<div class="row"> 
            	@include('backend.errors.messages')
				@include('backend.errors.ajaxMsg')
            </div> 
			@yield('content')

			<div id="footer-container">
				<div class="footer-content">
					&copy; <a href="#">{{ date('Y')}}</a><span style="color:#FF0000;">&#10084;</span> and Developed By: - <a href="http://uit.unitechengr.com/" target="_blank" style="font-weight:300;color:#ffffff;background:#1d1d1d;padding:0 3px;">Unitech<span style="color:#ffa733;font-weight:bold">-</span>IT</a>
				</div>
			</div>
		</div>
	</div>
</div>

@include('backend._partials.modal')
@include('backend._partials.footer')









