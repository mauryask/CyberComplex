<?php

if(isset($_POST['upload']))
{
    $file_name = basename($_FILES['file_name']['name']);
    $file_type = $_FILES['file_name']['type'];
    $tmp_name = $_FILES['file_name']['tmp_name'];
    $file_size = $_FILES['file_name']['size'];

    // Black listing the unwanted files
    // if file name contains these extensions then block
    /*
    * Just use capital letter or other valid php file supported
    * extensions (e.g pht) to by pass such validations

    * Here we are checking that the file should not contain
    * these extension in the start , middle, end whatever
    */
    if(preg_match('/(.*)\.(php|php1|php2|php3|php4|php5|php6|php7|phtm|exe)$/i',$file_name))
    {
         echo "Invalid File";
    }
    else
    {
        echo "Proceed to upload";
    }
}

?>