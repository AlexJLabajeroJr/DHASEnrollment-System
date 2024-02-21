<?php

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




session_start();


$student_id = $_SESSION['student_id'];
$date_of_registration = $_POST['date_of_registration'];
$school_last_attended = $_POST['school_last_attended'];
$school_year = $_POST['school_year'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle_name = $_POST['middle_name'];
$suffix_name = $_POST['suffix_name'];
$contact_number = $_POST['contact_number'];
$age = $_POST['age'];
// $email = $_POST['email'];
$unit_number = $_POST['unit_number'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$district = $_POST['district'];
$zip_code = $_POST['zip_code'];
$gender = $_POST['gender'];
$birthdate = $_POST["birthdate"];
$birthplace = $_POST["birthplace"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$religion = $_POST["religion"];
$civil_status = $_POST["civil_status"];
$parent_name = $_POST["parent_name"];
$parent_occupation = $_POST["parent_occupation"];
$parent_contact_no = $_POST["parent_contact_no"];
$guardian_name = $_POST["guardian_name"];
$guardian_occupation = $_POST["guardian_occupation"];
$guardian_contact_no = $_POST["guardian_contact_no"];
// $GRADE_LEVEL_ID = $_POST["GRADE_LEVEL"];
$LRN = $_POST["LRN"];
// $strand = $_POST["strand"];
// $student_type = $_POST["student_type"];
// $image = $_POST["image"];

$query = " UPDATE student SET ";


$query .= "date_of_registration = '{$date_of_registration}',";
$query .= "school_last_attended = '{$school_last_attended}',";
$query .= "school_year = '{$school_year}',";
$query .= "first_name = '{$first_name}',";
$query .= "last_name = '{$last_name} ',";
$query .= "middle_name = '{$middle_name} ',";
$query .= "suffix_name = '{$suffix_name} ',";
$query .= "contact_number = '{$contact_number} ',";
$query .= "age = '{$age} ',";
// $query .= "email = '{$email} ',";
$query .= "unit_number = '{$unit_number} ',";
$query .= "street = '{$street} ',";
$query .= "barangay = '{$barangay} ',";
$query .= "city = '{$city} ',";
$query .= "district = '{$district} ',";
$query .= "zip_code = '{$zip_code} ',";
$query .= "gender = '{$gender} ',";
$query .= "birthdate =  '{$birthdate}', ";
$query .= "birthplace = '{$birthplace}',";
$query .= "height=  {$height}, ";
$query .= "weight=  {$weight}, ";
$query .= "religion =  '{$religion}' ,";
$query .= "civil_status =  '{$civil_status}', ";
$query .= "parent_name =  '{$parent_name} ',";
$query .= "parent_occupation =  '{$parent_occupation}', ";
$query .= "parent_contact_no =  '{$parent_contact_no}', ";
$query .= "guardian_name =  '{$guardian_name}', ";
$query .= "guardian_occupation = '{$guardian_occupation}' ,";
$query .= "guardian_contact_no = '{$guardian_contact_no}', ";
// $query .= "GRADE_LEVEL_ID =  '{$GRADE_LEVEL_ID}', ";
$query .= "LRN =  '{$LRN}' ";
// $query .= "strand =  '{$strand}', ";
// $query .= "student_type =  '{$student_type}' ";
// $query .= "image =  '{$image}' ";
$query .= " WHERE student_id = {$student_id}";
$result = mysqli_query($conn, $query);


header("Location: ../dashboard.php?edited=1");
