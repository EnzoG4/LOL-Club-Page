<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Club Home Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script type = "text/javascript" src = "passwordRecovery.js"></script>
</head>
<?php
	function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
    }
?>
<?php function displayForm(){ ?>

	<form action = "<?php $_SERVER['PHP_SELF']; ?>" method = "GET" name = "passRecovery">
		<?php
			if (isset($_GET['Reset'])){
				$email = "";
			}
			else{
				$email = isset($_GET['email']) ? $_GET['email'] : "";
			}
		?>
		<br>
		<div class='col-xs-4'>
			<div class = "panel panel-default">
				<div class = "panel-body">
					<fieldset class="form-group">
						<label>Email address</label>
						<input type ='text' class='form-control' name = 'email' onblur = 'validateEmail()' placeholder = "Enter email" value = <?php echo "$email"; ?>>
						<small class="text-muted">We'll never share your email with anyone else.</small>
					</fieldset>
				</div>
				<div class = "form-group" align = "center">
					<input type="submit" class="btn btn-primary" value = "Submit" name = "Submit"/>
					<input type = "submit" class = "btn btn-warning" value = "Reset" name = "Reset"/>
				</div>
			</div>
		</div>
		<span id = 'emailError'></span>
</form>
<?php 
	}
	function formHandler(){
		include ("dbconn.php");
		$dbname = "guevarja";
		$dbc = connect_to_db($dbname);

		$email = $_GET['email'];

		$query = "SELECT * FROM `Login` WHERE `Email` = '$email'";
		$result = perform_query($dbc, $query);

		$query1 = "SELECT * FROM `Login` WHERE `Email` = '$email'";
		$result1 = perform_query($dbc, $query1);

		if (trim($email) == ""){
			echo("<div class='alert alert-warning'> 
							<strong>Error!</strong> Please enter your email.
							<a href='index.php'>Go back to home page.</a>
					</div>");
		}
		else if (mysqli_fetch_array($result, MYSQLI_ASSOC) == false){
				echo("<div class='alert alert-danger'> 
							<strong>Error!</strong> the email: '$email' does not exist in our database.
							<a href='index.php'>Go back to home page.</a>
					</div>");
		}
		if (mysqli_fetch_array($result1, MYSQLI_ASSOC)){
			$newPass = randomPassword();
			$message = "<html>
							<head>
								<title> New Password </title>
							</head>
							<body>
								<p> Your new password is $newPass </p>
								<a href='http://cscilab.bc.edu/~guevarja/hw10/index.php'>Return to club page.</a>
							</body>
						</html>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: $email' . "\r\n";
			$headers .= 'From: Password Generator <guevarja@bc.edu>' . "\r\n";
			$headers .= 'Cc: leagueoflegends@bc.edu' . "\r\n";
			$headers .= 'Bcc: leagueoflegends@bc.du' . "\r\n";
			$subject = "New Password";
			mail($email, $subject, $message, $headers);
			echo ("<div class = 'panel panel-default'>
					<div class = 'panel-body'>
						Success! New password has been created and sent to $email. 
						<a href='index.php'>Go back to home page.</a>
					</div>
				</div>");
			$setQUERY = "UPDATE `Login` SET `Password`= sha1('$newPass') WHERE `Email` = '$email'";
			$setQUERY2 = "UPDATE `Login` SET `Password1`= sha1('$newPass') WHERE `Email` = '$email'";
			perform_query($dbc, $setQUERY);
			perform_query($dbc, $setQUERY2);
		}

		disconnect_from_db($dbc, $result);
	}
?>


<body>
	<h1> Password Recovery</h1>
	<?php
		if (isset($_GET['Submit'])){
			displayForm();
			formHandler();
		}
		else if (isset($_GET['Reset'])){
			displayForm();
		}
		else {
			displayForm();
		}
	?>
</body>

