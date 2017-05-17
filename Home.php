<?php
            session_start();
            if(isset($_SESSION['uname'])==FALSE){
                header('Location:SignIn.html');
            }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="Css/Home.css">
        <style>
            h2{
                color:darkblue;  
                font-family:sans-serif;
                }
        </style>
    </head>
    <body background="home.jpg">
        <div id="l"><a id="a1" href="logout.php">Log out</a></div>
        <br>
        <center>
        <img src="Image/aaaaaaaaaaaaaaaaaaaaaaasssaaaasa.png" height="100%" width="">
        <h2>Hi,
        <?php
            include('config.php');
            $un=$_SESSION['uname'];
            $sql="SELECT *FROM user where username='$un'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            if($row!=null){
                $fn=$row['first_name'];
            }
            echo "$fn !!!</h2>";
            $row=mysqli_fetch_assoc($res);
        ?>
        <h1>Welcome</h1>
        <h3>To</h3>
        <p>Image Hub</p>
        <ul>
            <li><a id="a" href="worldofimage/gallary.php" target="_self">World of Pictures</a></li>
            <li><a id="a" href="AllMembers.php" target="_self">All Members</a></li>
            <li><a id="a" href="UploadPic.php" target="_self">Upload Pictures</a></li>
            <li><a id="a" href="PersonalInfo.php" target="_self">Personal Info</a></li>
        </ul>
        </center>
    </body>
</html>