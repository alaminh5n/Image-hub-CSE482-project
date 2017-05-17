<?php
    session_start();
            if(isset($_SESSION['uname'])==FALSE){
                header('Location:SignIn.html');
            }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Personal Info</title>
        <style>
            body{
            background-image: url("PI.jpg");
            background-repeat:repeat;
            }
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
                text-decoration:underline;
                font-family: cursive;
                font-size: 30px;
            }
            #t1{
                color:darkslategray;
                font-weight: bolder;
                font-family: sans-serif;
                padding:10px;
            }
            #t2{
                color:black;
                font-weight: bolder;
                font-family:sans-serif;
                padding: 10px;
            }
            table{
                box-shadow: 0 0 50px black;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div id="l"><a id="a1" href="logout.php">Log out</a></div><br>
        <h2>Personal Details</h2>
        <?php
            include('config.php');
            $na=$_SESSION['uname'];
            $sql4="SELECT *FROM user where username='$na'";
            $res=mysqli_query($con,$sql4);
            $row=mysqli_fetch_assoc($res);
        
            if($row!=null){
                $un=$row['username'];
                $fn=$row['first_name'];
                $ln=$row['last_name'];
                $em=$row['email'];
                $pw=$row['password'];
                    
                echo "<center><table><tr><td id='t1'>First Name:</td><td id='t2'>$fn</td></tr>
                             <tr><td id='t1'>Last Name:</td><td id='t2'>$ln</td></tr>
                             <tr><td id='t1'>Username:</td><td id='t2'>$un</td></tr>
                             <tr><td id='t1'>Email:</td><td id='t2'>$em</td></tr>
                             <tr><td id='t1'>Password:</td><td id='t2'>$pw</td></tr>
                    </table></center>";
                $row=mysqli_fetch_assoc($res);
            }
        ?>  
    </body>
</html>