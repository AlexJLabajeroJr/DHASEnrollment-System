<?php

session_start();

include '../db_con.php';











use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

function sendemail_verify($email)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "alexalabajero@gmail.com";

    $mail->Password   = "tfostiwsrjihhbbb";

    $mail->SMTPSecure = "TLS";
    $mail->Port       = 587;


    $mail->setFrom("alexalabajero@gmail.com");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Enrollment Confirmation from Divine Healer Academy of Sorsogon";

    $email_template = "<p>Dear Student,</p>
    
    <p>I am pleased to inform you that you have been successfully enrolled in the Divine Healer Academy of Sorsogon. Congratulations on taking the first step towards your journey to becoming a Divine Healer!</p>
    
    <p>Please be advised that your enrollment has been confirmed and your course details will be sent to you shortly. If you have any further questions or concerns, please do not hesitate to contact us at [contact information].</p>
    
    <p>Thank you for choosing the Divine Healer Academy of Sorsogon as your learning partner.</p>
    
    <h2>You</h2>
    <h5>Click the link below to login to your account</h5>
    <br/><br/>
    <a href='http://localhost/Enrollment/index.php'>Click Me</a>
    
    <p>Best regards,</p>
    <p>alexalabajero@gmail.com</p>";


    $mail->Body =  $email_template;
    $mail->send();
    // echo 'Message has been sent';

}



// if (isset($_GET['student_id'])) {
if ($_GET['action'] == 'enroll') {




    // $sy_id = $_GET['SYID'];
    // header("Location: view_enrolled_stud.php?view=1&SYID=" . urlencode($sy_id));
    // echo $_GET['user_id'];


    $stud_id = $_GET['student_id'];



    $querying = "SELECT * from account WHERE student_id = '$stud_id'";
    $resultw = mysqli_query($conn, $querying);
    $sadf = mysqli_fetch_assoc($resultw);
    $email = $sadf['email'];

    if ($email) {

        sendemail_verify("$email");


        $select = "UPDATE schoolyr SET enrollment_status = '2', DATE_ENROLLED = '" . date('Y-m-d') . "' WHERE student_id =     $stud_id  ";
        $resut = mysqli_query($conn, $select);

        if ($resut) {

            header("Location: registrar.php?enr=1");
            // ob_end_flush();
        }
    } else {
        echo error_reporting(E_ALL);
    }




    // if ($resu) {

    //     header("Location:student_copy.php?");
    //     exit();
    // } else {
    //     echo error_reporting(E_ALL);
    // }
} elseif ($_GET['action'] == 'view') {
    // echo $_SESSION['user_id'];
    $stud_id = $_GET['student_id'];
    header("Location: view_student.php?view=1&student_id=" . urlencode($stud_id));
} elseif ($_GET['action'] == 'decline') {
    // echo $_SESSION['user_id'];
    $stud_id = $_GET['student_id'];
    $select = "UPDATE student SET status = 'Decline' WHERE student_id = '{$stud_id}' ";
    $res = mysqli_query($conn, $select);


    if ($res) {
        header("Location:Pending.php?Pend=1");
    } else {
        echo error_reporting(E_ALL);
    }
}
