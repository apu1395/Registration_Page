<?php

if(isset($_POST['submit']) && isset($_FILES['uploadfile']) )
{

// echo "<pre>";
// print_r($_FILES['my_image']);
// echo "</pre>";

$img_name = $_FILES['uploadfile']['name'];
$img_size = $_FILES['uploadfile']['size'];
$tmp_name = $_FILES['uploadfile']['tmp_name'];
$error = $_FILES['uploadfile']['error'];

$target_path = "C:\wamp64\www\uploads";  
$target_path = $target_path.basename( $uploadfile);   
  
if(move_uploaded_file($tmp_name, $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
}
?>