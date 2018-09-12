<?php 
	error_reporting(0);
	session_start();
	include 'dbconnect.php';
	$s = "Error. Some fields are empty. ";
	if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['contact'] == "" || $_POST['message'] == "" )
	{
		if($_POST['name'] == "")
			$s .= "Name, ";
		if($_POST['email'] == "")
			$s .= "Email, ";
		if($_POST['contact'] == "")
			$s .= "Contact, ";
		if($_POST['message'] == "")
			$s .= "Message ";
		
		
		echo $s;
	}
	else
	{
		
		$conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
		$query = "insert into feedback(name, email, contact, description) values('".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['contact'])."','".mysqli_real_escape_string($conn,$_POST['message'])."')";
		$q = mysqli_query($conn, $query);
		$lat_id=-1;

		if($q )
		{
			echo 1;
		}
		else
		{
			echo "Server error. Pls try after sometime.";
			//echo mysqli_error($conn);
		}
	}
?>	