<?php

    $fn=$_POST['fname'];
    $ln=$_POST['lname'];
    $em=$_POST['email'];
    $un=$_POST['uname'];
    $pw=$_POST['pword'];
    $cpw=$_POST['cpword'];

    if(empty($fn)||empty($ln)||empty($em)||empty($un)||empty($pw)||empty($cpw)){
    	include('SignUp.html');
    	echo "<script type='text/javascript'>alert('Please fillup all the fields.')</script>";
    }
    else if(strlen($pw)<6){
    	include('SignUp.html');
    	echo "<script type='text/javascript'>alert('Password Must be 6 characters long')</script>";
    }
    else if($pw!=$cpw){
    	include('SignUp.html');
    	echo "<script type='text/javascript'>alert('Password and confirm password don't match')</script>";
    }
    else if(isset($un)){
    	include('config.php');
    	$sql1="SELECT *FROM user WHERE username='$un'";
    	$res=mysqli_query($con,$sql1);
    	$row=mysqli_num_rows($res);
    	if($row==1){
    		include('SignUp.html');
    		echo "<script type='text/javascript'>alert('User Exist!!! Try new Username.')</script>";
    	}
    	else
    	{
    	$sql2 = "INSERT INTO user(username,first_name,last_name,email,password,confirm_password)
    	VALUES ('$un','$fn','$ln','$em','$pw','$cpw')";
    	mysqli_query($con,$sql2);
    	include('Confirm.html');
    	}
    }
?>