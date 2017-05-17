<?php
    session_start();
    	if(isset($_SESSION['uname'])==FALSE){
                header('Location:SignIn.html');
            }
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="gallary.css">
		<script src="gallary.js"></script>
        <style>
            body{
                background-image: url(w2.jpg);
                margin-left: 17%;
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
                font-family: cursive;
                font-size: 30px;
                color: white;
            }
            #gallery img:hover{
	           box-shadow: 0 0 40px white;
	           cursor:pointer;
            }
            #imageWindow{
	           position: relative;
	           background-image: url(images/background.jpg);
	           width: 75%;
	           height: 90%;
	           margin-left: 10%;
	           border: 4px ridge gray;
	           border-radius: ;
	           display: none;
            }
        </style>
		<title>Photo Album</title>

	</head>

	<body>
        <h2>World of Pictures</h2>
		<section id="gallery">

			<?php

				$imageFiles = scandir("images/nature_stock/");

				$imageList = "";

				for($i = 2; $i < count($imageFiles); $i++){

					$imageList = $imageList . "<img src =  'images/nature_stock/"  . (string)$imageFiles[$i] . "' width = 25% height = 25% onclick='loadImage(this)'>";
 
				}

					echo $imageList;


			?>



		</section>

		<section id="imageWindow">
			<div id="imageFrame"></div>
			<img id="closeButton" src="images/close-button.png" onclick="closeWindow()">
			<img src="images/left.png" id="left" onclick="moveLeft()">
			<img src="images/right.png" id="right" onclick="moveRight()">
		</section>	

	</body>


</html>