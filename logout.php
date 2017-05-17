<?php
	session_start();
	session_unset();
	session_destroy();
	include("SignIn.html");
	exit();
?>