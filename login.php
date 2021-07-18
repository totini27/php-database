<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
</head>
<body>
	<h1>Login Page</h1>


	<?php 
	

	include "dbconnection.php";

 
 	
	 function login($username, $password)
	 {
 		$conn = connect(); // from include dbconnection
 		$statement = $conn->prepare("SELECT * FROM users WHERE username = ? and password = ?");  //prepaired statement.
	 	$statement->bind_param("ss",$username,$password);
		$statement->execute(); 
		$records = $statement->get_result();


		return $records->num_rows == 1;
	}
 

 ?>

	<?php 

 		$username = $password = "";
		$usernameErr = $passwordErr = "";
		$isvalid = true;	
		$successfulMessage = $errorMessage = "";

		if ($_SERVER['REQUEST_METHOD'] == "POST") 
		{
			 $username = $_POST['username'];
			 $password = $_POST['password'];

			 if(empty($username))
			 {
			 	$usernameErr = "username can not be empty";
			 	$isvalid = false;
			 }

			 if(empty($password))
			 {
			 	$passwordErr = "password can not be empty";
			 	$isvalid = false;
			 }

			 if ($isvalid) 
			 {
			 	$res = login($username, $password);
			 	if($res)
			 	{
			 		session_start();
			 		$_SESSION['username'] = $username;
			 		 
			 		header("Location: welcome.php");

			 	}
			 	else $errorMessage = "Login Failed.";
			 	 
			 }
		}

		function basicValidation($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;

		}


	 ?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
		<fieldset>
			<legend>Login Page</legend>

			<label for="username">User Name:</label>
			<input type="text" name="username" id="username">
			<span style="color: blue"> <?php echo $usernameErr; ?> </span><br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color: blue"> <?php echo $passwordErr; ?> </span><br><br>

			<input type="submit" name="submit" value="Registration">


		</fieldset>
	</form>
	<br>
	<p style="color: yellow;"> <?php echo $successfulMessage; ?> </p>
	<p style="color: blue"> <?php echo $errorMessage; ?> </p>

	<a href="signup.php">Go to Registration</a>

	<?php include_once 'header.php' ?>


	
</body>
</html>