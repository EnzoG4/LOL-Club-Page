<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Club Home Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" style = "text/css" href="index.css">
</head>
<h1> Welcome to Lorenzo's League of Legends Club! </h1> <br>
<body>
	<h4> New Aurelion Sol Champion Reveal </h4>
	<br>
	<div align = "center">
	<iframe width="560" height="315" src="https://www.youtube.com/embed/CAAnY_L4Pp4" frameborder="0" allowfullscreen></iframe>
	</div><br>
	<form action = "dboperation.php" method = "get">
		<div align = "center">
			<input type = "submit" class="btn btn-success btn-lg" value = "Join Now" name = "Start"/>
			<button type = "submit" class="btn btn-danger btn-lg" name = "passwordRecovery" formaction = "passwordRecovery.php">Forgot Password?</button>
			<button type = "submit" class = "btn btn-info btn-lg" name = "admin" formaction = "admin.php" >Admin Access</button>
		</div>
	</form>
</body>
</html>
