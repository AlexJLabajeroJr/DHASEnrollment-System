<?php
session_start();
include 'db_con.php';



if (isset($_SESSION['account_id'])) {
	header("Location:index.php");
}

if (isset($_POST['login_now_btn'])) {
	$_SESSION['emai'] = $_POST['email'];
	$_SESSION['pass'] = $_POST['password'];

	if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$login_query = "SELECT * FROM account WHERE email = '$email' LIMIT 1";
		$login_query_run = mysqli_query($conn, $login_query);

		if (mysqli_num_rows($login_query_run) > 0) {
			$row =  mysqli_fetch_array($login_query_run);

			if (password_verify($password, $row['password'])) {
				if ($row['verify_status'] == "1") {
					$_SESSION['authenticated'] = TRUE;
					$_SESSION['auth_user'] = [
						'username' => $row['name'],
						'role' => $row['role'],
						'email' => $row['email'],
					];

					$_SESSION['email'] = $email;

					if ($row['role'] == 'student') {
						$_SESSION['user_id'] = $row['account_id'];
						$_SESSION['student_id'] = $row['student_id'];
						echo $_SESSION['user_id'];
					header("Location:student/dashboard.php?studa=1");
					} else if ($row['role'] == 'admin') {
						$_SESSION['admin_id'] = $row['account_id'];
						// $_SESSION['student_id'] = $row['student_id'];
						echo $_SESSION['admin_id'];
	

						header("Location:admin/Dashboard_admin.php?admon=1");
					} else if ($row['role'] == 'registrar') {
						$_SESSION['registrar_id'] = $row['account_id'];
					// $_SESSION['student_id'] = $row['student_id'];
					echo $_SESSION['registrar_id'];
					header("Location:registrar/registrar.php?reggi=1");
					}
				} else {
					$_SESSION['status'] = "Please verify your email address to login";
					header("Location: index.php");
					exit(0);
				}
			} else {
				$_SESSION['status'] = "Invalid Email or Password";
				header("Location: index.php");
				exit(0);
			}
		} else {
			$_SESSION['status'] = "Invalid Email or Password";
			header("Location: index.php");
			exit(0);
		}
	} else {
		$_SESSION['status'] = "All fields are mandatory";
		header("Location: index.php");
		exit(0);
	}
}



?>

<!-- may mali hayassssssasa -->






















<!-- 

  
// include('db_con.php');
// session_start();


// if (isset($_POST['login_btn'])) {

// 	$_SESSION['emai'] = $_POST['email'];
// 	$_SESSION['pass'] = $_POST['password'];

// 	$email = $_POST['email'];
// 	$password = $_POST['password'];


// 	$login = mysqli_query($conn, "SELECT * FROM account WHERE email= '$email' AND password = '$password'");

// 	$row = mysqli_fetch_assoc($login);
// 	if ($row >= 1) {
// 		$_SESSION['email'] = $email;

// 		if ($row['role'] == 'student') {
// 			// $_SESSION['user_id'] = $row['student_id'];
// 			$_SESSION['user_id'] = $row['account_id'];
// 			$_SESSION['student_id'] = $row['student_id'];
// 			echo $_SESSION['user_id'];
// 			header("Location: dashboard.php");
// 		} else if ($row['role'] == 'admin') {
// 			header("Location: Dashboard_admin.php");
// 		} else if ($row['role'] == 'registrar') {
// 			header("Location: registrar.php");
// 		}
// 	} else {
// 		header("Location: login.php?error=error");
// 	}