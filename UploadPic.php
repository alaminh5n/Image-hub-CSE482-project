<?php
            session_start();
            if(isset($_SESSION['uname'])==FALSE){
                header('Location:SignIn.html');
            }
        ?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			var request = new XMLHttpRequest();

      		function upload(){   
               var file = document.getElementById('fileUploaded').files[0];
               var data = new FormData();
               data.append('fileUploaded',file);
               
               console.log(document.getElementById('fileUploaded').files[0].name);
               request.onreadystatechange = update;
               request.open("POST","Upload.php",true);
               

               request.send(data);
      }

     	 function update(){
            if(request.status == 200 && request.readyState == 4){
               document.getElementById('gallery').innerHTML = request.responseText;
            }

        }
		</script>
		<style type="text/css">
			body{
				background-image: url("up.jpg");
			}
			#d1{
				margin-top: 10%;
				box-shadow: 0 0 50px black;
				width: 30%;
				padding-top: 20px;
				padding-bottom: 20px;
			}
			h2{
				font-family: sans-serif;
				text-decoration: underline;
			}
			input[type=file]{
				width: 100%;
				padding: 12px 20px;	
			}
			input[type=button]{
				width: 60%;
    			background-color: #ff9966;
    			color: white;
    			padding: 14px 20px;
    			margin: 8px 0;
    			border: none;
    			border-radius: 4px;
    			cursor: pointer;
    			font-family:cursive;
    			font-size: 15px;
			}
			input[type=button]:hover {
 			   background-color: #cc6600;
			}
			#l{
                float: right;
                padding-left: 10px;
                padding-right: 10px;
                box-shadow: 0px 0px 10px black;
            }
            a{
                text-decoration: none;
                color: black;
            }
		</style>
		<title>Upload</title>
	</head>
	<body>
		<div id="l"><a id="a1" href="logout.php">Log out</a></div><br>
		<center>
		<div id="d1">
		<h2>Upload Image</h2>
		<input type="file" name="fileUploaded" id="fileUploaded">
		<br>
		<input type="button" value="Upload" onclick="upload()">
		</div>
		</center>
	</body>
</html>
