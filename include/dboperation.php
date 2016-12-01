<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Club Home Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" style = "text/css" href="dboperation.css">
	<script type = "text/javascript" src = "dbvalidation.js"></script>
</head>
<body>
	<h2> Sign up for the Lorenzo's League Database! </h2>
	<?php
		if (isset($_POST['Submit'])){
			formHandler();
			displayForm();
		}
		else {
			displayForm();
		}
	?>

<?php function displayForm(){ ?>
		<form action = "<?php $_SERVER['PHP_SELF']; ?>" method = "POST" name = "myForm">
			<?php
		
				$first = isset($_POST['first']) ? $_POST['first'] : "";
				$last = isset($_POST['last']) ? $_POST['last'] : "";
				$username = isset($_POST['username']) ? $_POST['username'] : "";
				$email = isset($_POST['email']) ? $_POST['email'] : "";
				$division = isset($_POST['division']) ? $_POST['division'] : "";
				?>
				<div class='col-xs-4'>
				<br>First Name: * <br> <input type = 'text' class='form-control' name = 'first' onblur = "validateFirst()" value = <?php echo " $first "; ?>> 
				<span id = "firstError" class="text-danger"></span> <br>
				Last Name: *  <br> <input type = 'text' class='form-control' name = 'last' onblur = "validateLast()" value = <?php echo "$last"; ?>> 
				<span id = 'lastError' class="text-danger"></span> <br>
				User Name: * <br> <input type = 'text' class='form-control' name = 'username' onblur = "validateUser()" value = <?php echo "$username"; ?>>
				<span id = 'userError'></span> <br>
				Email: * <br> <input type ='text' class='form-control' name = 'email' onblur = "validateEmail()" value = <?php echo "$email"; ?>>
				<span id = 'emailError'></span> <br>
				Password: * <br> <input type = 'password' class='form-control' name = 'password' onblur = "validatePass()">
				<span id = 'passError1'></span> <br>
				Confirm Password: * <br> <input type = 'password' class='form-control' name = 'password1' onblur = "validatePass1()">
				<span id = 'passError2'></span> <br>
				Which division are you in?
				<select name = 'division' id = 'division' class='form-control input-sm' id='sel1'>
					<option selected = 'selected' value = 'bronze' > Select...</option>
					<option value = 'challenger'> Challenger </option>
					<option value = 'diamond'> Diamond </option>
					<option value = 'platinum'> Platinum </option>
					<option value = 'gold'> Gold </option>
					<option value = 'silver'> Silver </option>
					<option value = 'bronze'> Bronze </option>
					<option value = 'wood'> Wood </option>
				</select> <br>
			<br>
			<input type = "reset" name = "Reset" class="btn btn-danger btn-md" value = "Reset"/>
			<input type = "submit" name = "Submit" class="btn btn-success btn-md" value = "Submit"/>
			<br><br><br><br><br>
			</div>
		</form>
		<?php
		}
			?>
		<?php
			function formHandler(){
				include ("dbconn.php");
				$dbname = "guevarja";
				$dbc = connect_to_db($dbname);
				
				$first = $_POST['first'];
				$last = $_POST['last'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$password1 = $_POST['password1'];
				$division = $_POST['division'];
				$username = $_POST['username'];
				
				$query = "SELECT * FROM `Login` WHERE `Email` = '$email'";
				$result = perform_query($dbc, $query);
				
				$query2 = "SELECT * FROM `Login` WHERE `Username` = '$username'";
				$result2 = perform_query($dbc, $query2);
								
				if ($userPass = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
					echo ("<fieldset class = 'error'> The username $username has already been taken. </fieldset>");
				}
				else if (trim($username) == ""){
					echo("<fieldset class = 'error'> Please enter a username.</fieldset>");
				}
				else if ($pass = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo("<fieldset class = 'error'> The email: $email already exists. </fieldset>");
				}
				else if($password !== $password1){
					echo("<fieldset class = 'error'> The passwords you entered do not match. </fieldset>");
				}
				else if($password == ""){
					echo("<fieldset class = 'error'> Enter a password. </fieldset>");
				}
				else{
					$query = "INSERT INTO `Login` (FirstName, LastName, Username, Email, Date,Password, Password1, Division) VALUES ('$first', '$last', '$username', '$email', now(), sha1('$password'), sha1('$password1'), '$division')";
					perform_query($dbc, $query);
					echo " <fieldset class = 'good'> Your account has been created. <br>";
					echo "<a href = 'index.php'> Sign Another User Up </a> </fieldset>";
				}
				disconnect_from_db($dbc, $result);
			}
		?>
	
</body>
</html>
 
