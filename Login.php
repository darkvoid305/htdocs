<?php
		$db_host = 'localhost';
	$db_user = 'root';
    $db_password = 'root';
	$db_db = 'login';
	$db_port = 8889;

	$conn = new mysqli($db_host, $db_user, $db_password ,$db_db);
	
	if ($conn->connect_error) 
	{
		echo "1: connection to database failed"; //error code 1 connection failed
	    exit();
	}

	$UserName = $_POST['UserName'];
	$Password = $_POST['Password'];


	$nameCheckQuery = "SELECT Username FROM registered WHERE Username='" .$UserName . "';";

	$nameCheck = mysqli_query($conn, $nameCheckQuery) or die("2: name check query failed");//error code #2 name check query failed

	if(mysqli_num_rows($nameCheck) > 0)
	{
		echo "0"; // no error!! - query executed succesful!!! [ send 0 to main program as confirmation]
		exit();
	}else {
		echo "5"; //error #5 - query executed succesful
		exit();
    }
?>

