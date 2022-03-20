<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Password Reset</title>
	<style type="text/css">

		/* General styling */
		* {
			font-family: Helvetica, Arial, sans-serif;
		}

		body {
			-webkit-font-smoothing: antialiased;
			-webkit-text-size-adjust: none;
			width: 100% !important;
			margin: 0 !important;
			height: 100%;
			color: #676767;
		}


	</style>
</head>

<body bgcolor="#f7f7f7">
	<p>Hi {{$userInformation->full_name}}..</p>
	<p> Your Password is reset..</p>
	<p> Please login to Eshoping BD using the new Password..</p>
	<p><b>Your Password is : <span style="color:red;">{{$newPassword}}</span></b></p>
	<br /><br />
	<strong>Thanks for being with us..!</strong>
</body>
</html>