<?php
	include('config.php');
	$uname=$_POST['uname'];
	$pass=$_POST['pword'];

	if(empty($uname)||empty($pass)){
		include('SignIn.html');
		echo "<script type='text/javascript'>alert('Fill Up the Username and Password Fields')</script>";
	}
	else{
		$sql3="SELECT username,password FROM user WHERE username='$uname' and password='$pass'";
		$res=mysqli_query($con,$sql3);
		$row=mysqli_num_rows($res);
		if($row!=1){
			include('SignIn.html');
			echo "<script type='text/javascript'>alert('Invalid Username or Password')</script>";
		}
		else{
			header("Location: Home.php");
            session_start();
            $_SESSION['uname']=$uname;
		}
	}
?>