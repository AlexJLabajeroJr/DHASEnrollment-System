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
    
    <p>Dear Student,</p>

    <p>I am writing to inform you that we have reviewed your enrollment status in the Divine Healer Academy of Sorsogon.</p>
    
    <p>As you are aware, the Divine Healer Academy of Sorsogon has strict academic standards to maintain the quality of education that we provide. Unfortunately, based on our assessment, you have not met these standards at this time. We understand that this news may be disappointing, but we want to assure you that we are committed to helping you succeed in your academic pursuits.</p>
    
    <p>In order to pass the course and continue your enrollment, you will need to fulfill the outstanding requirements as soon as possible. We encourage you to review the course syllabus and consult with your instructors to identify areas where you may need additional support. Our team is also available to provide guidance and assistance to help you overcome any academic challenges you may be facing.</p>
    
    <p>Please be advised that failure to complete the outstanding requirements may result in the cancellation of your enrollment in the Divine Healer Academy of Sorsogon.</p>
    
    <p>We appreciate your understanding and commitment to your academic success. Please do not hesitate to contact us if you have any questions or concerns regarding your enrollment status or academic progress.</p>
    
    <p>Sincerely,</p>
    
    <p>[Your Name]</p>
    
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
    header("Location: registrar.php?sub=1");
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
