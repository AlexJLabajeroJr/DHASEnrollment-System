
<?php
include '../db_con.php';


if (isset($_POST['Fuck'])) {


    $faculty_id = $_GET['faculty_id'];
    $fac_name = $_POST['fac_name'];
    $fac_contact = $_POST['fac_contact'];
    $email = $_POST['email'];



    $checkfac = "Select * from faculty where (faculty_id = '$fac_name' AND fac_contact = '$fac_contact') AND (email = '$email')";
    $checkFacResult = $conn->query($checkfac);





    if ($checkFacResult->num_rows > 0) {
        header("Location: faculty.php?fac=1");
    } else {
        $setfac = mysqli_query($conn, "INSERT INTO faculty (fac_name,fac_contact,email) VALUES ('$fac_name','$fac_contact','$email')");
        if ($setfac) {
            header("Location:faculty.php?facAdded=1");
        } else {
            echo error_reporting(E_ALL);
        }
    }
}








// if ($try > 0) {
// echo ("Subject exists!");
// } else {
// $setSched = mysqli_query($conn, "INSERT INTO schedule (subject_id,room_id,faculty_id,start_time,end_time,day,school_year_id) VALUES ('$subject','$room','$faculty','$starttime','$endtime','$days','$schools')");

// if ($setSched) {
// header("Location:schedule_table.php?");
// } else {
// echo error_reporting(E_ALL);
// }
// }





// if (isset($_POST['bulbol'])) {


//     $nextyear = date("Y") + 1;
//     $currentyear = date("Y");

//     $schedule_id = $_GET['schedule_id'];
//     $subject = $_POST['subject'];
//     $room = $_POST['room'];
//     $faculty = $_POST['faculty'];
//     $starttime = $_POST['starttime'];
//     $endtime = $_POST['endtime'];
//     $days = $_POST['days'];
//     // $schools = $_POST['schools'];

//     $GRADE_LEVEL_ID = $_POST['GRADE_LEVEL_ID'];
//     $sched_semester = $_POST['sched_semester'];
//     $sched_sy = $currentyear . '-' . $nextyear;
//     $SECTION = $_POST['SECTION'];

//     $query = "UPDATE schedule SET subject_id = '$subject' , room_id = '$room' ,faculty_id = '$faculty' ,start_time = '$starttime' ,
//     end_time = '$endtime', day = '$days', GRADE_LEVEL_ID = '$GRADE_LEVEL_ID', sched_semester = '$sched_semester', SECTION = '$SECTION' WHERE schedule_id = '$schedule_id'";
//     $result = mysqli_query($conn, $query);
//     if ($result) {
//         header("Location:schedule.php?sag=1");
//     } else {
//         echo error_reporting(E_ALL);
//     }
// }


// if (isset($_POST['sad'])) {
//     $query = "DELETE FROM schedule WHERE schedule_id =" . $_GET['schedule_id'];
//     $result = mysqli_query($conn, $query);
//     if ($result) {
//         header("Location:schedule.php?del=1");
//     } else {
//         echo mysqli_query();
//     }
// }

?>