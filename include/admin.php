<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Administrator Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" style = "text/css" href="admin.css">

</head>
<?php
	function displaySQL(){
		include ("dbconn.php");
		$dbname = "guevarja";
		$dbc = connect_to_db($dbname);

		$query = "SELECT `FirstName`, `LastName`, `Email`, `Division`, `Date` FROM `Login` Order By `FirstName`";
		$result = perform_query($dbc,$query);
		?>
			<br>
			<fieldset>
				<table border = 1 class="table table-bordered">
					<tr>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Email </th>
						<th> Division </th>
						<th> Date Registered </th>
					</tr>
		<?php
		while($sql = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>" . $sql['FirstName'] . "</td>";
			echo "<td>" . $sql['LastName'] . "</td>";
			echo "<td>" . $sql['Email'] . "</td>";
			echo "<td>" . $sql['Division'] . "</td>";
			echo "<td>" . $sql['Date'] . "</td>";
		}
		echo "</table>";
		echo "</fieldset>";
	disconnect_from_db($dbc, $result);

	}
?>
<?php
	function formHandler($input){
		$pass = '1785ed6ccf537856a2e5d0935a1ffb2dde2d3ab5';
		$input1 = sha1($input);
		$boolean = false;
		if ($pass == $input1){
			displaySQL();
			$boolean = true;
		}
		else{
			echo "<div class='alert alert-danger'> 
							<strong>Error!</strong> The password you've entered is incorrect. Try again.
							<a href='index.php'>Go back to home page.</a>
					</div>";
		}
		return $boolean;
	}
?>
<?php
	function displayForm(){
	?>
	<div class='col-xs-4'>
			<div class = "panel-body">
		<form method = "POST">
			<?php
				$input = isset($_POST['input']) ? $_POST['input'] : "";
			?>
				<div class = "panel panel-default">
					<div class = "panel-body">
						<fieldset>
							<label>Password:</label>
							<input type = "password" name = "input" placeholder="Enter admin password..." class='form-control' value = <?php echo "$input"; ?> > <br>
							<input type = "submit" name = "Submit" value = "Login" class="btn btn-primary">
						</fieldset>
					</div>
				</div>
		</form>
		<form method = "POST" id = "adminEmail">
				<div class = "panel panel-default">
					<div class = "panel-body">
						<fieldset>
							<legend> Send Email to Users </legend>
							<label>Subject</label><br>
							<input type = "text" name = "subject" placeholder="Subject" class='form-control'><br>
							<label> Select Division... </label><br>
							<select name = 'division' id = 'division' class='form-control input-sm' id='sel1'>
								<option value = 'challenger' selected = "selected"> Challenger </option>
								<option value = 'diamond'> Diamond </option>
								<option value = 'platinum'> Platinum </option>
								<option value = 'gold'> Gold </option>
								<option value = 'silver'> Silver </option>
								<option value = 'bronze'> Bronze </option>
								<option value = 'wood'> Wood </option>
							</select> <br>
							<label> Message </label><br>
							<textarea rows = "4" cols = "50" name = "message" form = "adminEmail" placeholder="Enter message..." class="form-control"></textarea><br>
							<label> Confirm Password: </label><br>
							<input type = "password" name = "input1" placeholder = "Confirm password" class='form-control'><br>
							<input type = "submit" name = "sendEmail" value = "Send" class="btn btn-success">
						</fieldset>
					</div>
				</div>
		</form>
		</div>
		</div>
	<?php
	} ?>
<?php
	function sendEmail($division, $message, $subject){
		$dbname = "guevarja";
		$dbc = connect_to_db($dbname);

		$query = "SELECT `Email` FROM `Login` WHERE `Division` = '$division';";
		$result = perform_query($dbc,$query);
		echo "$subject <br>";
		echo "$message <br>";
		$finalMessage = "<html>
							<head>
								<title> New Password </title>
							</head>
							<body>
								<h3>A message from the admin</h3>
								<p> $message </p>
								<a href='http://cscilab.bc.edu/~guevarja/hw10/index.php'>Return to club page.</a>
							</body>
						</html>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: $email' . "\r\n";
			$headers .= 'From: Admin' . "\r\n";
			$headers .= 'Cc: leagueoflegends@bc.edu' . "\r\n";
			$headers .= 'Bcc: leagueoflegends@bc.du' . "\r\n";
			$subject = "$subject";
		while($sql = mysqli_fetch_assoc($result)){
			echo $sql['Email'] . "<br>";
			mail($sql['Email'], $subject, $finalMessage, $headers);
		}
	}
?>
<body>
	<h1 align = "center"> Administrator Page </h1>
	<?php
		$pass = '1785ed6ccf537856a2e5d0935a1ffb2dde2d3ab5';
		if (isset($_POST['Submit'])){
			displayForm();
			formHandler($_POST['input']);
		}
		else if (isset($_POST['sendEmail'])){
			if(sha1($_POST['input1']) == $pass){
				displayForm();
				formHandler($_POST['input1']);
				sendEmail($_POST['division'], $_POST['message'], $_POST['subject']);
			}
			else{
				formHandler($pass);
				displayForm();
				echo "<div class='alert alert-danger'> 
							<strong>Error!</strong> The password you've entered is incorrect. Try again.
					</div>";
			}
		}
		else{
			displayForm();
		}
	?>
</body>
</html>