<?php

if(isset($_POST['upload']))
{
    $file_name = basename($_FILES['file_name']['name']);
    $file_type = $_FILES['file_name']['type'];
    $tmp_name = $_FILES['file_name']['tmp_name'];
    $file_size = $_FILES['file_name']['size'];

    // White listing the wanted files
    // if file name contains these extensions then allow else block
    
    /*
    * Just change the file name (shell.php  -> shell.php.jpg)
    * and content type (application-xt/php -> image/jpeg) 
    * if file type is also beng verified
    
    * Here we are making suere that the file must contain these allowed
    * extension but not checking that it should be at the end of the file
    */

   $except = array("jpg", "jpeg", "png", "gif");
   $imp = implode("|", $except);
    
    if(preg_match('/^.*\('.$imp.')$', $file_name))
    {
        echo "Proceed to upload!";
    }
    else
    {
        echo "Invalid File!";
    }
   
}
?>