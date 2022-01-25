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
		echo "3: name already exists"; //error code 3 name already exists
		exit();
	}

	//add user to table
	//$salt = "\$5\$rounds=5000" . "steamedhams" . $UserName . "\$"; // encryption method for the Passwords
	//$hash = crypt($Password,$salt);
	$insertUserQuery = "INSERT INTO registered (Username, Password) VALUES ('" . $UserName . "' , '" . $Password . "')";
	mysqli_query($conn, $insertUserQuery) or die("4: insert of new user failed"); //error code #4  insert of new data failed

	echo("0") // no error!! - query executed succesful!!! [ send 0 to main program as confirmation]

?>

