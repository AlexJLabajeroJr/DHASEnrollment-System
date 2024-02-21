<?php
session_start();
include_once "db_con.php";

echo $_SESSION['user_id'];
$user_id = $_SESSION['student_id'];

if (isset($_POST['try'])) {



    $currentyear = date('Y');
    $nextyear =  date('Y') + 1;
    $sy = $currentyear . '-' . $nextyear;
    $_SESSION['SY'] = $sy;



    $student_id = $_POST['student_id'];
    $select = "UPDATE student SET status = 'approved' WHERE student_id = '$student_id' ";
    $resut = mysqli_query($conn, $select);

    header("location:registrar.php");




    $sqli = "INSERT INTO `schoolyr`
    (`AY`,  `student_id`, `category`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`)
VALUES ('" . $_SESSION['SY'] . "',{$user_id},'ENROLLED','" . date('Y-m-d') . "','" . date('Y-m-d') . "','New');";
    $resu = mysqli_query($conn, $sqli);


    if ($resu) {

        header("Location:student_copy.php?");
    } else {
        echo mysql_error();
    }
}

    // $sql = "SELECT * FROM student WHERE student_id =" . $_GET['student_id'];
    // $des = mysqli_query($conn, $query);
    // $result = mysqli_fetch_assoc($des);




    //     $sql = "SELECT * FROM `subject` s, `student` c 
    //     WHERE s.student_id=c.student_id AND s.student_id=" . $result['student_id'] . "";
    //     $resSubject = mysqli_query($conn, $query);

    //     while ($row = mysqli_fetch_array($resSubject)) {


    //         $sql = "INSERT INTO `enrollment`
    //     (``, `enrollment_date`, ``, `enrollment_status`, `student_id`, `subject_id`, `enroll_subject_status`)
    // VALUES ('" . date('Y-m-d') . "','" . date('Y-m-d') . "','" .  $result['student_id']  . "','" . $_GET['subject_id'] . "','enrolled');";
    //         $res = mysqli_query($conn, $query);
    //     }

// access - refers to instuction /communicaytion or storing data or or other wise making use of computer system
// alteration - refers to modifivaton or change of form or substance of an existing compute datra
// communicatino this refers to transfromaino of informatinonthrough  ICT media in a form of  video ,and otehr form of dat

// computer - refers to electronic , magnetic ,optical , electrochemical that performs algorithm logical ,aritmetical

// compute -data -refers to representation of facts ,information suitable for processing in a computer system

// computer program - refert set of instuction executed by the computer to aachieve intended outcome /result .
// computer system refers to anty device or interconnected device whiich purpsuant to performs automated processing data.
//without right - conduct undertaken without or in excesss of authorty 
// Cyber refers to compputer or computer network ,the electronic medium in which the communication takes place 

// Critical infrastructurrs - refers to comuter network wherhter phsical or virtual

// database refers to representation of information fact, knowlege that was stored in the computr system

// interception means listerning monitoring or surveillance of the contend of the communcation throgu aceccesand use of compute system or indirectily eavesdropping or tapping devices at the same time iscommunication is occurring 

// hacker intercet tap or eaves dropping / bypass ad intercept 

// Subcribers inforamtion refers to any information contained in a form of comptuer d