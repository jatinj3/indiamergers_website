<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start(); 
include "config.php";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST['submit']))
{
	//echo "<pre>"; print_r($_POST);die;
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$category=$_POST['category'];
	
	$sql="SELECT * FROM users WHERE email='$email' and phone='$phone'";
	



$result = mysqli_query($link,$sql); 
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
	  	  
 if($count > 0)
 {
	 echo '<script>alert("Record already exists!")</script>'; 
	 $URL="tellus.php";
	 echo "<script>location.href='$URL'</script>";
	//$userid=$row['id'];
 }
 else
 {
//echo "hello here";die;

//$file='C:/xampp/htdocs/indiamergers/';

 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
// echo "<pre>";
// print_r($check);

// die;

	if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
	} else {
	  echo '<script>alert("File is not an image.")</script>'; 
    //echo "File is not an image.";
    $uploadOk = 0;
	}
// Check if file already exists
if (file_exists($target_file)) {
  echo '<script>alert("Sorry, file already exists.")</script>'; 
  //echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  //echo "Sorry, your file is too large.";
  echo '<script>alert("Sorry, your file is too large.")</script>'; 
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>'; 
 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo '<script>alert("Sorry, your file was not uploaded.")</script>';
  //echo "Sorry, your file was not uploaded.";
  
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	  
	$upload_file_name=basename($_FILES["fileToUpload"]["name"]);
	  
    //$show_msg="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	$query=mysqli_query($link,"INSERT INTO `users` (`name`,`email`,`phone`,`city`,`pincode`,`category`,`img_name`) VALUES ('$name','$email', '$phone','$city','$pincode','$category','$upload_file_name')"); 
	$userid=mysqli_insert_id($link);
	echo '<script>alert("Entry Submitted Successfully.")</script>';
		//header("Location: index.html"); 
		$URL="index.html";
		echo "<script>location.href='$URL'</script>";
	 //window.location=$url;
	//echo '<script>alert("'.$show_msg.'")</script>';
  } else {
	echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
    //echo "Sorry, there was an error uploading your file.";
  }
}

	 
	 
	 
	 
	 
	/* to be uncomment 
	$query=mysqli_query($link,"INSERT INTO `users` (`name`,`email`,`phone`,`city`,`pincode`) VALUES ('$name','$email', '$phone','$city','$pincode')"); 
	$userid=mysqli_insert_id($link);*/
 }
	
	
	
	//$url='seejobs.php?id='.$userid;

/*echo "<script language='javascript'>
window.location='".$url."';
</script>";*/
}

?>