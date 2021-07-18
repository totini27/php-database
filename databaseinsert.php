  
<?php 
	

	include "dbconnection.php";
	
	function register($fname, $lname, $gender, $dob, $religion, $paddress, $peraddress, $phone, $email, $website, $username, $password)
	{
		$conn = connect(); // from include dbconnection
		$statement = $conn->prepare("INSERT INTO users (fname,lname,gender,dob,religion,paddress,peraddress,phone,email,websitelink,username,password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"); //prepaired statement.
	 	$statement->bind_param("sssssssissss",$fname,$lname,$gender,$dob,$religion,$paddress,$peraddress,$phone,$email,$website,$username,$password);//bind ss->for data type string->s
		return $statement->execute();
  }

 ?>