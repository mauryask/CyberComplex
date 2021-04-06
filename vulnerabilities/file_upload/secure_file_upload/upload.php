<?php
if(isset($_POST['submit']))
{
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$tmpName  = $_FILES['file']['tmp_name'];
	$fileType = $_FILES['file']['type'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error']; 
	
	//$fileExt = strtolower(end(explode('.',$fileName)));
	$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
	$allowedExt = array('jpg', 'jpeg', 'png', 'gif');
	
	if(in_array($fileExt, $allowedExt))
	{
	   if($fileError === 0)//no error
	   {
		   if($filesize < 1024000) # 1MB size 
		   {

			   # this line fixes a vulnerability
			   # since the file is being renamed here
			   # if someone wil upload a malicious file
			   # still he colud not be able access it
			   
			   /*
			   * let shubham.jpg //original file
			   * and after by passing the file name >> shubham.php.jpg
			   * but file is further renamed and the last extension is
			   * being taken hence the resulted file will be as following
			   * 15fffj565.15444.jpg
			   * which is harmless
			   */
			   
			   $newFileName = uniqid('', true).".".$fileExt;
			   $fileDest = 
			   './uploads/'.$newFileName;
			   
			   if(move_uploaded_file($tmpName, $fileDest))
			   {
				   echo "file uploaded sucessfully..";
				   header('Location: index.php?success');
			   }
		   }
		   else
		   {
			   echo  "file size too large..";
		   }
	   }
	   else
	   {
		   echo "an error occured while uploading the file..";
	   }
	} 
	else
	{
		echo  "this type of file can't be uploaded..";
	}
}
?>