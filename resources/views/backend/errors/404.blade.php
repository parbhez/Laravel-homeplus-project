<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Error Page :: Base Admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 

    {!! HTML::style('public/css/bootstrap.min.css') !!}
    {!! HTML::style('public/css/bootstrap-responsive.min.css') !!}
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    {!! HTML::style('public/css/font-awesome.min.css') !!}
    {!! HTML::style('public/css/style.css') !!}
    
</head>

<body>


<div class="container">
	
	<div class="row">
		
		<div class="col-md-12">
			
			<div class="error-container">
				<h1>Oops!</h1>
				
				<h2>404 Not Found</h2>
				
				<div class="error-details">
					Sorry, an error has occured, Requested page not found!
					
				</div> <!-- /error-details -->
				
				<div class="error-actions">
					<a href="{{URL::to('/')}}" class="btn btn-primary btn-lg">
						<i class="icon-chevron-left"></i>
						&nbsp;
						Back to Dashboard						
					</a>
					
					<a href=".{{ URL::to('contactUs') }}" class="btn btn-default btn-lg">
						<i class="icon-envelope"></i>
						&nbsp;
						Contact Support						
					</a>
					
				</div> <!-- /error-actions -->
							
			</div> <!-- /error-container -->			
			
		</div> <!-- /span12 -->
		
	</div> <!-- /row -->
	
</div> <!-- /container -->


</body>
</html>
