<!-- SA PART NA INI AN NAKA CHECK BOX BAGA SA NA IIENROLL NI STUDENT NASA FORM CONTROL INI NA PHP HALI SA ENROLL.PHP DIDI IINSERT SA ENROLLMENT TABLE SA DATABASE AN ININROLL NI STUDENT -->
<!-- SA PART NA INI AN NAKA CHECK BOX BAGA SA NA IIENROLL NI STUDENT NASA FORM CONTROL INI NA PHP HALI SA ENROLL.PHP DIDI IINSERT SA ENROLLMENT TABLE SA DATABASE AN ININROLL NI STUDENT -->
<!-- SA PART NA INI AN NAKA CHECK BOX BAGA SA NA IIENROLL NI STUDENT NASA FORM CONTROL INI NA PHP HALI SA ENROLL.PHP DIDI IINSERT SA ENROLLMENT TABLE SA DATABASE AN ININROLL NI STUDENT -->
<!-- SA PART NA INI AN NAKA CHECK BOX BAGA SA NA IIENROLL NI STUDENT NASA FORM CONTROL INI NA PHP HALI SA ENROLL.PHP DIDI IINSERT SA ENROLLMENT TABLE SA DATABASE AN ININROLL NI STUDENT -->
<?php


print_r($_POST['selectedSubjects']);


session_start();




include_once "../db_con.php";



$stud_id = $_GET['student_id'];

foreach ($_POST['selectedSubjects'] as $subject) {
	$query = "INSERT INTO enrollment (";
	$query .= "enrollment_date, enrollment_status, student_id, subject_id, enroll_subject_status";
	$query .= ") Values (";
	$query .= " '" . date('Y-m-d') . "','pending','{$stud_id}','{$subject}', 'enrolled'";
	$query .= ")";

	echo $query;

	$result = mysqli_query($conn, $query);




	//   AMO INI ANG ENROLL MENT FORM PAKATO SA STUDENT COPY WHITE IS DIDTO NA IPIPIRONT IF RESULT AN QUERY SA TAAS 
	if ($result) {
		header("Location: student_copy.php?adstud=1&student_id=$stud_id");
	} else {
		echo mysql_error();
	}
}
