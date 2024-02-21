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
    $mail->Subject = "Requirement Submission from Divine Healer Academy of Sorsogon";

    $email_template = "
    
    <p>Dear $student_name,</p>
    
    <p>We would like to congratulate you for fulfilling all the outstanding requirements and meeting the academic standards of the Divine Healer Academy of Sorsogon. We appreciate your dedication and hard work in completing all the necessary tasks to pass the course.</p>

    <p>Your enrollment status in the academy has been reviewed, and we are pleased to inform you that you have met the requirements to continue your studies with us. We are confident that you will continue to excel in your academic pursuits and contribute positively to the learning environment of the academy.</p>

    <p>We want to remind you that we are committed to supporting you in your academic journey, and our team is always available to provide guidance and assistance whenever you need it. We encourage you to continue reviewing the course syllabus, seeking feedback from your instructors, and actively participating in class discussions to maximize your learning experience.</p>

    <p>Thank you for choosing the Divine Healer Academy of Sorsogon as your learning partner. We are looking forward to seeing you in the upcoming academic year.</p>

    <p>Best regards,</p>

    <p>Divine Healer Academy of Sorsogon</p>
    
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






$sad = $_POST['student_id'];

$querying = "SELECT * from account WHERE student_id = '$sad'";
$resultw = mysqli_query($conn, $querying);
$sadf = mysqli_fetch_assoc($resultw);
$email = $sadf['email'];

if ($email) {

    sendemail_verify("$email");
    header("Location: registrar.php?com=1");
}







    // if ($resu) {

    //     header("Location:student_copy.php?");
    //     exit();
    // } else {
    //     echo error_reporting(E_ALL);
    // }
// } elseif ($_GET['action'] == 'view') {
//     // echo $_SESSION['user_id'];
//     $stud_id = $_GET['student_id'];
//     header("Location: view_student.php?view=1&student_id=" . urlencode($stud_id));
// } elseif ($_GET['action'] == 'decline') {
//     // echo $_SESSION['user_id'];
//     $stud_id = $_GET['student_id'];
//     $select = "UPDATE student SET status = 'Decline' WHERE student_id = '{$stud_id}' ";
//     $res = mysqli_query($conn, $select);


//     if ($res) {
//         header("Location:Pending.php?Pend=1");
//     } else {
//         echo error_reporting(E_ALL);
//     }
// }
