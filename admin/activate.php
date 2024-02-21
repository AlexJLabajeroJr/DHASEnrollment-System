<?php

// Connect to database

session_start();




include '../db_con.php';
// Check if id is set or not if true toggle,
// else simply go back to the page
if (isset($_GET['id'])) {

    // Store the value from get to a
    // local variable "course_id"
    $school_year_id = $_GET['id'];

    // SQL query that sets the status
    // to 1 to indicate activation.
    $sql = "UPDATE `school_year` SET
			`school_year_status`= 1 WHERE school_year_id='$school_year_id'";

    // Execute the query
    mysqli_query($conn, $sql);
}

// Go back to course-page.php
header('location: school_year.php?activi=1');
