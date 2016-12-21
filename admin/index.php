<!doctype html>
	<html lang="en"> 
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../asset/css/base.css">
	<link rel="stylesheet" href="../asset/css/skeleton.css">
	<link rel="stylesheet" href="../asset/css/layout.css">
	<link rel="stylesheet" href="../asset/css/queryLoader.css" type="text/css">
    <script type="text/javascript" src="../asset/js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="../asset/js/queryLoader.js"></script>
	
</head>
<body>

	
	<!-- Primary Page Layout -->

	<div class="container">
		
		<div class="form-bg">
			<form action="login.php" method="post">
				<h2>Login</h2>
				<p><input type="text" placeholder="Username" name="username"></p>
				<p><input type="password" placeholder="Password" name="password"></p>
				<button type="submit"></button>
			<form>
		</div>

	</div><!-- container -->

	<!-- JS  -->
	<script src="../asset/js/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='../asset/js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="../asset/js/app.js"></script>
	
<!-- End Document -->

</div>
    <script>
		QueryLoader.selectorPreload = "body";
		QueryLoader.init();
	</script>
    
</div>
</body>
</html>
