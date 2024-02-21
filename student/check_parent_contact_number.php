<?php
session_start();
include '../db_con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $contactNumber = $_POST['contactNumber'];

  if ($contactNumber === '') {
    echo 'empty';
    exit;
  }

  // Perform a database query to check if the contact number exists
  $query = "SELECT COUNT(*) AS count FROM student WHERE parent_contact_no = '$contactNumber'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row['count'] > 0) {
    echo 'exists';
  } else {
    echo 'not_exists';
  }
}
?>
