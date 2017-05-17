      var request = new XMLHttpRequest();

      function upload(){

               
               var file = document.getElementById('fileUploaded').files[0];
               var data = new FormData();
               data.append('fileUploaded',file);
               
               console.log(document.getElementById('fileUploaded').files[0].name);
               request.onreadystatechange = update;
               request.open("POST","upload.php",true);
               

               request.send(data);
      }


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

