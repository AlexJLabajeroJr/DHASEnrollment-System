<?php

include '../db_con.php';

if (isset($_POST['delete_subject'])) {
    $subject_id = mysqli_real_escape_string($conn, $_POST['delete_subject']);

    $query = "DELETE FROM subject WHERE subject_id='$subject_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Faculty Deleted Successfully";
        header("Location: subject.php?subdel=1");

        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Deleted";
        header("Location: subject.php?subnot=1");
        exit(0);
    }
}

if (isset($_POST['update_subject'])) {

    $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $subject_description = mysqli_real_escape_string($conn, $_POST['subject_description']);
    $GRADE_LEVEL_ID = mysqli_real_escape_string($conn, $_POST['GRADE_LEVEL_ID']);
    $SEMESTER = mysqli_real_escape_string($conn, $_POST['SEMESTER']);


    $query = "UPDATE subject SET subject_code='$subject_code', subject_description='$subject_description', GRADE_LEVEL_ID = '$GRADE_LEVEL_ID', SEMESTER='$SEMESTER' WHERE subject_id='$subject_id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        // $_SESSION['message'] = "Faculty Updated Successfully";
        header("Location: subject.php?subedd=1");
        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Updated";
        header("Location: subject.php?subedi=1");
        exit(0);
    }
}





if (isset($_POST['save_subject'])) {


    // $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $subject_description = mysqli_real_escape_string($conn, $_POST['subject_description']);
    $GRADE_LEVEL_ID = mysqli_real_escape_string($conn, $_POST['GRADE_LEVEL_ID']);
    $SEMESTER = mysqli_real_escape_string($conn, $_POST['SEMESTER']);

    $checksub = "Select * from subject where (subject_code = '$subject_code' && subject_description = '$subject_description' && GRADE_LEVEL_ID = '$GRADE_LEVEL_ID' &&  SEMESTER = '$SEMESTER' )";
    $checksubResult = $conn->query($checksub);

    if ($checksubResult->num_rows > 0) {
        header("Location:subject.php?suc=1");
    } else {
        $setsub = mysqli_query($conn, "INSERT INTO subject (subject_code,subject_description,GRADE_LEVEL_ID,SEMESTER) VALUES ('$subject_code','$subject_description','$GRADE_LEVEL_ID','$SEMESTER')");
        if ($setsub) {
            header("Location:subject.php?subadd=1");
            exit(0);
        } else {
            header("Location:subject.php?subdont=1");
            exit(0);
        }
    }
}
