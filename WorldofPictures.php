<?php
            session_start();
            if(isset($_SESSION['uname'])==FALSE){
                header('Location:SignIn.html');
            }
?>
<!DOCTYPE htmL>
<html>
	<head>
		<title>World of Pictures</title>
		<script type="text/javascript">
			var request = new XMLHttpRequest();

			function update(){
            	if(request.status == 200 && request.readyState == 4){
               	document.getElementById('gallery').innerHTML = request.responseText;
            	}

        	}


			function closeWindow(){
				var id = document.getElementById('closeButton').parentElement;
				id.style = "display: none";

			}

			function loadImage(imageRef){

				var imageHTML = "<img src =  '"  + imageRef.src + "' width = " + 90 +  "% height = " + 90  +"% >";


				document.getElementById('imageFrame').innerHTML = imageHTML;
				document.getElementById('imageWindow').style = "display:block;";
			}

			function moveRight(){

				var currImage = document.getElementById('imageFrame').firstChild.src;
				var imageList = document.getElementById('gallery').querySelectorAll("img");

				var i = 0;

				for(i = 0; i < imageList.length; i++)
				if(currImage == imageList[i].src)
				break;

				if(i == imageList.length - 1)	
				i = -1;

				document.getElementById('imageFrame').innerHTML = "<img src =  '"  + imageList[i + 1].src + "' width = " + 90 +  "% height = " + 90  +"% >";	
			}

			function moveLeft(){

				var currImage = document.getElementById('imageFrame').firstChild.src;
				var imageList = document.getElementById('gallery').querySelectorAll("img");

				var i = 0;

				for(i = 0; i < imageList.length; i++)
					if(currImage == imageList[i].src)
		   			break;

				if(i == 0)	
					i = imageList.length;

				document.getElementById('imageFrame').innerHTML = "<img src =  '"  + imageList[i - 1].src + "' width = " + 90 +  "% height = " + 90  +"% >";	
			}
		</script>

		<style>
			body{
				background-image: url("w2.jpg");
			}
			#l{
    			float: right;
  			  	padding-left: 10px;
    			padding-right: 10px;
    			box-shadow: 0px 0px 10px black;
			}
			#a1{
    			text-decoration: none;
    			color: aliceblue;
    		}
    		#imageWindow{
				position: relative;
				background-image: url("Image/background.jpg");
				width: 75%;
				height: 90%;
				margin-left: 10%;
				border: 4px ridge gray;
				border-radius: 15px;
				display:none;
	
			}
			#closeButton{
				position: absolute;
				top: 0px;
				right: 0px;

			}	

			img#closeButton:hover{
				cursor:pointer; 
			}

			#left{
				position: absolute;
				top: 50%;
				left: 0;
				cursor:pointer;
			}		

			#right{
				position: absolute;
				top: 50%;
				right: 0;
				cursor:pointer;
			}

			#gallery{

				float: left;
			}

			#gallery img{
				padding: 2%;
			}
			#gallery img:hover{
				box-shadow: 0 0 60px yellow;
				cursor:pointer;
			}
			#imageFrame{
				position: absolute;
				left: 7.5%;
				top:7.5%;
				width: 90%;
				height: 90%;
			}

		</style>
	</head>
	<body>
		<div id="l"><a id="a1" href="logout.php">Log out</a></div>
        <br>
        <section id="gallery">

			<?php

				$imageFiles = scandir("uploads/");

				$imageList = "";

				for($i = 2; $i < count($imageFiles); $i++){

					$imageList = $imageList . "<img src =  'uploads/"  . (string)$imageFiles[$i] . "' width = 25% height = 25% onclick='loadImage(this)'>";
 
				}

					echo $imageList;

			?>
		</section>

		<section id="imageWindow">
			<div id="imageFrame"></div>
			<img id="closeButton" src="Image/close-button.png" onclick="closeWindow()">
			<img src="Image/left.png" id="left" onclick="moveLeft()">
			<img src="Image/right.png" id="right" onclick="moveRight()">
		</section>
	</body>
</html>