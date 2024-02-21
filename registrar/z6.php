<?php
include_once "randomString.php";



$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();

// $registrar_id = $_SESSION['registrar_id'];
// $searcPassword = "SELECT * FROM users WHERE password LIKE '%$_POST[email_address]%'";


if ($_POST['passwordRetype'] == $_SESSION['password']) {
	if ($_POST['email'] == "") {
		$_SESSION['name'] = ($_POST['name'] == "") ? $_SESSION['name'] : $_POST['name'];
		$_SESSION['password'] = ($_POST['password'] == "") ? $_SESSION['password'] : $_POST['password'];

		$_SESSION['password'] = ($_POST['password'] == "") ? $_SESSION['password'] : $_POST['password'];

		$updateUserInfo =
			"UPDATE account SET 
		   name = '$_SESSION[name]',
		   password = '$_SESSION[password]'
		--    contact_number = '$_SESSION[contact_number]'
	  WHERE account_id='$_SESSION[account_id]'";

		$conn->query($updateUserInfo);
	} else {
		$searchEmail = "SELECT * FROM account WHERE email LIKE '%$_POST[email]%'";
		$searchEmailQuery  = $conn->query($searchEmail);

		if ($searchEmailQuery->num_rows > 0) {
			//if email has been use throw this error
			http_response_code(500);
		} else {
			//if email has not been used execute this line of code
			$_SESSION['name'] = ($_POST['name'] == "") ? $_SESSION['name'] : $_POST['name'];

			$_SESSION['email'] = ($_POST['email'] == "") ? $_SESSION['email_address'] : $_POST['email'];


			$_SESSION['password'] = ($_POST['password'] == "") ? $_SESSION['password'] : $_POST['password'];

			$updateUserInfo =
				"UPDATE account SET 
	       email = '$_SESSION[email_address]',
		   name = '$_SESSION[name]',
		   password = '$_SESSION[password]'
		
	  WHERE account_id='$_SESSION[account_id]'";

			$conn->query($updateUserInfo);
		}
	}
} else {
	http_response_code(400);
}









<?php
include_once "randomString.php";



$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();

$registrar_id = $_SESSION['registrar_id'];
// $searcPassword = "SELECT * FROM users WHERE password LIKE '%$_POST[email_address]%'";


if ($_POST['passwordRetype'] == $_SESSION['password']) {
	if ($_POST['email'] == "") {
		$_SESSION['name'] = ($_POST['name'] == "") ? $_SESSION['name'] : $_POST['name'];
		$_SESSION['password'] = ($_POST['password'] == "") ? $_SESSION['password'] : $_POST['password'];

		$_SESSION['password'] = ($_POST['password'] == "") ? $_SESSION['password'] : $_POST['password'];

		$updateUserInfo =
			"UPDATE account SET 
		   name = '$_SESSION[name]',
		   password = '$_SESSION[password]'
		--    contact_number = '$_SESSION[contact_number]'
	  WHERE account_id='$registrar_id'";

		$conn->query($updateUserInfo);
	} else {
		$searchEmail = "SELECT * FROM account WHERE email LIKE '%$_POST[email]%'";
		$searchEmailQuery  = $conn->query($searchEmail);

		if ($searchEmailQuery->num_rows > 0) {
			//if email has been use throw this error
			http_response_code(500);
		} else {
			//if email has not been used execute this line of code
			$_SESSION['name'] = ($_POST['name'] == "") ? $_SESSION['name'] : $_POST['name'];

			$_SESSION['email'] = ($_POST['email'] == "") ? $_SESSION['email'] : $_POST['email'];


			$_SESSION['password'] = ($_POST['password'] == "") ? $_SESSION['password'] : $_POST['password'];

			$updateUserInfo =
				"UPDATE account SET 
	       email = '$_SESSION[email]',
		   name = '$_SESSION[name]',
		   password = '$_SESSION[password]'
		
	  WHERE account_id='$registrar_id'";

			$conn->query($updateUserInfo);
		}
	}
} else {
	http_response_code(400);
}
