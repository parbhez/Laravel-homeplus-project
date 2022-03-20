@if(Session::has('flash_success'))
	<div class="alert alert-success {{ Session::has('flash_msg_important') ? 'alert-important' : '' }}"> 
		@if(Session::has('flash_msg_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif
		{{ Session('flash_success') }} 
	</div>
@endif

@if(Session::has('flash_error'))
	<div class="alert  alert-warning alert-dismissable {{ Session::has('flash_msg_important') ? 'alert-important' : '' }}"> 
		@if(Session::has('flash_msg_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif
		<strong>Warning!</strong> 
		{{ Session('flash_error') }} 
	</div>
@endif

 @if (session('success'))
    <div class="alert alert-success" id="success">
        <strong><i class="icon-check"></i> {{session('success')}}.</strong>
    </div>
 @endif
@if (session('error'))
    <div class="alert alert-danger">
        <strong><i class="icon-check"></i> {{session('error')}}.</strong>
    </div>
@endif

 @if (count($errors) > 0)
	<div class="error">
		<ul class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
		</ul>
	</div>
 @endif

