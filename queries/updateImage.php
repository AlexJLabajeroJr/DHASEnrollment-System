<?php
include_once "randomString.php";



$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (mysqli_connect_errno()) {
	echo "failed";
	echo mysqli_connect_error();
	exit();
} else {
}

// if (isset($_POST['employerNewImageBtn'])) {

// 	unlink($_SESSION['p_p']);

// 	$filename = $_FILES["image"]["name"];
// 	$tempname = $_FILES["image"]["tmp_name"];
// 	$folder = "../dist/user-images/" . randomString(8) . "/" . $filename;


// 	mkdir(dirname($folder));

// 	if (move_uploaded_file($tempname, $folder)) {
// 		$_SESSION['p_p'] = $folder;
// 	}

// 	$updateImage =
// 		"UPDATE users SET 
// 	       p_p = '$_SESSION[p_p]' 
// 	  WHERE user_id='$_SESSION[user_id]'";

// 	$conn->query($updateImage);

// 	header("Location: ../user-account/employer-account/userProfile.php?newImage=1");
// }



if (isset($_POST['jobseekerNewImageBtn'])) {



	unlink($_SESSION['p_p']);

	$student_id = $_GET['student_id'];

	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];
	$folder = "../img/user-images/" . randomString(8) . "/" . $filename;


	mkdir(dirname($folder));

	if (move_uploaded_file($tempname, $folder)) {
		$_SESSION['p_p'] = $folder;
	}

	$updateImage =
		"UPDATE student SET 
	       p_p = '$_SESSION[p_p]' 
	  WHERE student_id='$student_id'";
	$result = mysqli_query($conn, 	$updateImage);
	header("Location: ../student/class.php?newImage=1");
}
