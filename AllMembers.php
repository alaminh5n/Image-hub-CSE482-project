<?php
    session_start();
    	if(isset($_SESSION['uname'])==FALSE){
                header('Location:SignIn.html');
            }
?>
<!DOCTYPE html>
<htmL>
	<head>
		<title>All Members</title>
		<style>
			#l{
                float: right;
                padding-left: 10px;
                padding-right: 10px;
                box-shadow: 0px 0px 10px black;
            }
            a{
                text-decoration: none;
                color: aliceblue;
            }
            h2{
            	text-align: center;
                font-family: cursive;
                font-size: 30px;
                color: white;
            }
            th{
            	padding: 10px;
            	padding-right: 15px;
            	padding-left: 15px;
            	font-weight: bolder;
            	text-decoration: underline;
            }
            td{
            	padding: 10px;
            	padding-right: 15px;
            	padding-left: 15px;
                font-family: sans-serif;
            }
            table{
            	box-shadow: 0 0 70px white;
            }
		</style>
	</head>
	<body background="all.jpg">
	<div id="l"><a id="a1" href="logout.php">Log out</a></div><br>
	<center>
	<h2>Image Hub Contributors</h2>
	<?php
		include('config.php');
		$sql5="SELECT *FROM user";
		$res=mysqli_query($con,$sql5);
		$row=mysqli_fetch_assoc($res);
		$c=1;
		echo "<table><tr><th>Sl.</th><th>Name</th><th>Email</th></tr>";
		while ($row!=null) {
			$fn=$row['first_name'];
			$ln=$row['last_name'];
			$e=$row['email'];
		echo "<tr><td>$c</td><td>$fn $ln</td><td>$e</td></tr>";
		$row=mysqli_fetch_assoc($res);
		$c++;
		}
		echo"</table>"
	?>
	</center>
	</body>
</htmL>