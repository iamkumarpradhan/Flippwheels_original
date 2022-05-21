<?php
	$username=$_POST['Username'];
	$password=md5($_POST['password']);
	$email=$_POST['Email'];
	$phonenumber=$_POST['phone'];
	$address=$_POST['address'];
	$fullname=$_POST['FullName'];
	$type=$_POST['idtype'];

	$conn=mysqli_connect('localhost','root','');
	if(!$conn)
	{
		die("connection error".mysqli_error());
	}
	else
	{
		mysqli_select_db($conn,"flippwheels");
		$query=mysqli_query($conn,"INSERT INTO `users`(`fullname`, `username`, `email`, `phone`, `password`, `address`, `type`) VALUES ('$fullname','$username','$email','$phonenumber','$password','$address','$type')");
		if(!$query)
		{
			die("error in inserting data".mysqli_error());
		}
		else
		{
			header('location:index.php');
			exit();
		}
	}
		mysqli_close($conn);
?>