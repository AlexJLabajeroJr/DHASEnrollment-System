<?php

include '../db_con.php';

if (isset($_POST['delete_grade_Level'])) {
    $GRADE_LEVEL_ID = mysqli_real_escape_string($conn, $_POST['delete_grade_Level']);

    $query = "DELETE FROM grade_level WHERE GRADE_LEVEL_ID='$GRADE_LEVEL_ID' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Faculty Deleted Successfully";
        header("Location:grade_level.php?gubdel=1");

        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Deleted";
        header("Location:grade_level.php?gubnot=1");
        exit(0);
    }
}


if (isset($_POST['update_grade_level'])) {

    $GRADE_LEVEL_ID = mysqli_real_escape_string($conn, $_POST['GRADE_LEVEL_ID']);
    $GRADE_LEVEL = mysqli_real_escape_string($conn, $_POST['GRADE_LEVEL']);
    $GRADE_NAME = mysqli_real_escape_string($conn, $_POST['GRADE_NAME']);
    $GRADE_DESC = mysqli_real_escape_string($conn, $_POST['GRADE_DESC']);



    $query = "UPDATE grade_level SET GRADE_LEVEL='$GRADE_LEVEL', GRADE_NAME='$GRADE_NAME', GRADE_DESC = '$GRADE_DESC' WHERE GRADE_LEVEL_ID='$GRADE_LEVEL_ID'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        // $_SESSION['message'] = "Faculty Updated Successfully";
        header("Location:grade_level.php?gubedd=1");
        exit(0);
    } else {
        // $_SESSION['message'] = "Faculty Not Updated";
        header("Location: grade_level.php?gubedi=1");
        exit(0);
    }
}





if (isset($_POST['save_grade_level'])) {


    // $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $GRADE_LEVEL = mysqli_real_escape_string($conn, $_POST['GRADE_LEVEL']);
    $GRADE_NAME = mysqli_real_escape_string($conn, $_POST['GRADE_NAME']);
    $GRADE_DESC = mysqli_real_escape_string($conn, $_POST['GRADE_DESC']);


    $checkgub = "Select * from grade_level where (GRADE_LEVEL = '$GRADE_LEVEL' && GRADE_NAME = '$GRADE_NAME' && GRADE_DESC = '$GRADE_DESC')";
    $checkgubResult = $conn->query($checkgub);

    if ($checkgubResult->num_rows > 0) {
        header("Location:grade_level.php?guc=1");
    } else {
        $setgub = mysqli_query($conn, "INSERT INTO grade_level (GRADE_LEVEL,GRADE_NAME,GRADE_DESC) VALUES ('$GRADE_LEVEL','$GRADE_NAME','$GRADE_DESC')");
        if ($setgub) {
            header("Location:grade_level.php?gubadd=1");
            exit(0);
        } else {
            header("Location:grade_level.php?gubdont=1");
            exit(0);
        }
    }
}
