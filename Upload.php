<?php
	if(isset($_FILES['fileUploaded'])==TRUE){
		$fileName=$_FILES['fileUploaded']['name'];
		$tempName=$_FILES['fileUploaded']['tmp_name'];
		$size=$_FILES['fileUploaded']['size'];

		if(move_uploaded_file($tempName,"worldofimage/images/nature_stock/".$fileName)){
			echo "Success";
			}
		else{
			echo "Failed";
		}
	}

?>