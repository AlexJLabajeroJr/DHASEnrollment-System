<?php include_once "../db_con.php";


$emai = $_SESSION['emai'];
$pass = $_SESSION['pass'];



$sql = "Select * from student where student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
