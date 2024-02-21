<?php
// echo $_POST['subject']."<br>";
// echo $_POST['faculty']."<br>";
// echo $_POST['room']."<br>";
// echo $_POST['time']."<br>";
// echo $_POST['days']."<br>";


include '../db_con.php';


if (isset($_POST['enroll'])) {


   $nextyear =  date("Y") + 1;
   $currentyear =  date("Y");


   $subject = $_POST['subject'];
   $room = $_POST['room'];
   $faculty = $_POST['faculty'];
   $starttime = $_POST['starttime'];
   $endtime = $_POST['endtime'];
   $days = $_POST['days'];
   // $schools = $_POST['schools'];

   $GRADE_LEVEL_ID = $_POST['GRADE_LEVEL_ID'];
   $sched_semester = $_POST['sched_semester'];
   $sched_sy = $currentyear . '-' . $nextyear;
   $SECTION = $_POST['SECTION'];


   // $query = "Select * from schedule where subject_id = {$subject}";
   // $row = mysqli_query($conn, $query);
   // $try =  mysqli_num_rows($row);

   $checkTime = "Select * from schedule where subject_id = '$subject' AND start_time = '$starttime' AND end_time = '$endtime'";
   $checkTimeResult = $conn->query($checkTime);

   //check if the subject is already exist in a day that is set
   $checkDay = "Select * from schedule where day  = '$days'";
   $checkDayResult = $conn->query($checkDay);


   $checkSubject = "Select * from schedule where (subject_id = '$subject' AND day = '$days') AND (start_time = '$starttime' AND end_time = '$endtime')";
   $checkSubjectResult = $conn->query($checkSubject);







   if ($checkSubjectResult->num_rows > 0) {
      header("Location: schedule.php?sceduleExist=1");
   } else {
      $query =  "SELECT `room_id`, `faculty_id`, `start_time`, `end_time`, `day`  FROM `schedule` WHERE start_time >=  '" . $_POST['starttime'] . "'
		AND  end_time <=  '" . $_POST['endtime'] . "'
		AND  start_time <=  end_time AND day ='" . $_POST['days'] . "' 
		AND (room_id ='" . $_POST['room'] . "' OR faculty_id ='" . $_POST['faculty'] . "')";
      $try = mysqli_query($conn, $query);
      $numrow = mysqli_num_rows($try);

      if ($numrow > 0) {
         # code...
         header("Location:schedule.php?sold=1");
      } else {
         $setSched = mysqli_query($conn, "INSERT INTO schedule (subject_id,room_id,faculty_id,start_time,end_time,day, GRADE_LEVEL_ID,sched_semester,sched_sy,SECTION) VALUES ('$subject','$room','$faculty','$starttime','$endtime','$days','$GRADE_LEVEL_ID','$sched_semester','$sched_sy','$SECTION')");
         if ($setSched) {
            header("Location:schedule.php?scedAdded=1");
         } else {
            echo error_reporting(E_ALL);
         }
      }
   }








   // if ($try > 0) {
   //    echo ("Subject exists!");
   // } else {
   //    $setSched = mysqli_query($conn, "INSERT INTO schedule (subject_id,room_id,faculty_id,start_time,end_time,day,school_year_id) VALUES ('$subject','$room','$faculty','$starttime','$endtime','$days','$schools')");

   //    if ($setSched) {
   //       header("Location:schedule_table.php?");
   //    } else {
   //       echo error_reporting(E_ALL);
   //    }
   // }
}



// $subjective = isset($_POST['subjective']) ? $_POST['subjective'] : "";

if (isset($_POST['bulbol'])) {


   $nextyear =  date("Y") + 1;
   $currentyear =  date("Y");

   $schedule_id = $_GET['schedule_id'];
   $subject = $_POST['subject'];
   $room = $_POST['room'];
   $faculty = $_POST['faculty'];
   $starttime = $_POST['starttime'];
   $endtime = $_POST['endtime'];
   $days = $_POST['days'];
   // $schools = $_POST['schools'];

   $GRADE_LEVEL_ID = $_POST['GRADE_LEVEL_ID'];
   $sched_semester = $_POST['sched_semester'];
   $sched_sy = $currentyear . '-' . $nextyear;
   $SECTION = $_POST['SECTION'];

   $query = "UPDATE schedule SET subject_id = '$subject' , room_id = '$room' ,faculty_id = '$faculty' ,start_time = '$starttime' ,
   end_time = '$endtime', day = '$days', GRADE_LEVEL_ID = '$GRADE_LEVEL_ID', sched_semester = '$sched_semester',  SECTION = '$SECTION' WHERE schedule_id = '$schedule_id'";
   $result = mysqli_query($conn, $query);
   if ($result) {
      header("Location:schedule.php?sag=1");
   } else {
      echo error_reporting(E_ALL);
   }
}




if (isset($_POST['sad'])) {
   $query = "DELETE FROM schedule WHERE schedule_id =" . $_GET['schedule_id'];
   $result = mysqli_query($conn, $query);
   if ($result) {
      header("Location:schedule.php?del=1");
   } else {
      echo mysqli_query();
   }
}
