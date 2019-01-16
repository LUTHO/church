<?php

function display_errors($errors){
	$display = '';
	$display .= '<ul class="bg-danger text-center">';
	foreach($errors as $error) {
		$display .= '<li class="text-danger">'.$error.'</li>';
	}
	$display .= '</ul>';
	return $display;
}
function uploadsImag($file,$roleidImg,$desc){
	include '../core/connect.php';

	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTempName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpeg', 'jpg', 'png', 'pdf');
	if (in_array($fileActualExt, $allowed)) { // checks if the file extention
		if($fileError === 0){
			if($fileSize < 1000000000000){

				$fileNewName = uniqid('', true).".".$fileActualExt;
				//$fileDesination = '/images/'.$fileNewName;
				$fileDesination = '../upload/images/'.$fileNewName;				
				//$fileDesination = $_SERVER['DOCUMENT_ROOT'].'/church/upload/images/'.$fileNewName; not working
				//$fileDesination = BASEURL.'/upload/images/'.$fileNewName;not working
				move_uploaded_file($fileTempName, $fileDesination);

				$sql = "INSERT INTO `image`(`name`, `url`, `descip`, `role`) VALUES
							 ('$fileName','$fileDesination','$desc','$roleidImg')";
				$sqlUpload = $con->query($sql);

				header("Location: activities.php?uploadSuccess");


			}else{
				echo "Your file is too big!";
			}

		}else{
			echo "There was an error when uploading this file!";
		}

	}else{
		echo "You cant upload this file!";
	}

}

   function videoUpoad($file,$desc,$roleidImg){
   		include '../core/connect.php';

   	 	/*$name = $_FILES['file']['name'];
	    $temp = $_FILES['file']['tmp_name'];

	    $destname = 'videos/'.$name;
	    move_uploaded_file($temp, $destname);
	    

	    mysqli_query($con,"INSERT INTO `video`(`name`, `url`, `descip`, `role`) 
	    				VALUES ('$name','$destname','$desc','$roleidImg')");
	    header("Location: videos.php?VideoSuccess");
		*/
	    $file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTempName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('mp4', 'avi', 'ogg', '3gp');
		if (in_array($fileActualExt, $allowed)) { // checks if the file extention
			if($fileError === 0){
				if($fileSize < 900000000000000000){

					$fileNewName = uniqid('', true).".".$fileActualExt;
					$fileDesination = '../videos/'.$fileNewName;
					move_uploaded_file($fileTempName, $fileDesination);

					mysqli_query($con,"INSERT INTO `video`(`name`, `url`, `descip`, `role`) 
	    				VALUES ('$fileName','$fileDesination','$desc','$roleidImg')");
	    			header("Location: videos.php?VideoSuccess");

				}else{
					echo "<div class='bg-danger'> Your file is too big!</div>";
				}

			}else{
				echo "<div class='bg-danger'> There was an error when uploading this file!</div>";
			}

		}else{
			echo "<div class='bg-danger'> You cant upload this file dd!</div>";

		}	  
   }

   function redirectVid(){
   	header("Location: videos.php?deleteSuccess");
   }

    function redirectImg(){
   	header("Location: activities.php?deleteSuccess");
   }

    function redirectIspire(){
   	header("Location: Inspiration.php");
   }


   function modal(){
   echo "<div class='modal' id='terms'>
		  <div class='modal-content'>
		    <h4>Body</h4>
		    <p>bra yam put anything you want</p>
		  </div>
		  <div class='modal-footer'>
		  	<a href='#' class='modal-close btn orange'> Close</a>
		  </div>
		</div>";
   }
?>

