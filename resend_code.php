<?php
session_start();
include 'db_con.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function resend_email_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "alexalabajero@gmail.com";
    $mail->Password   = "tfostiwsrjihhbbb";

    $mail->SMTPSecure = "TLS";
    $mail->Port       = 587;


    $mail->setFrom("alexalabajero@gmail.com", $name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = " Resend - Email verification from DHAS";

    $email_template = " <h2>You have registered with DHAS_Enrollment_system</h2>
                     <h5>Verify your Email Address to login with the below given links</h5>
                     <br/><br/>
         <a href = 'http://localhost/Enrollment/verify-email.php?token=$verify_token'>Click Me</a>
                                    
                     ";

    $mail->Body =  $email_template;
    $mail->send();
}





if (isset($_POST['resend_email_verify_btn'])) {
    if (!empty(trim($_POST['email']))) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $checkemail_query = "SELECT * FROM account WHERE email = '$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($conn, $checkemail_query);

        if (mysqli_num_rows($checkemail_query_run) > 0) {
            $row = mysqli_fetch_array($checkemail_query_run);
            if ($row['verify_status'] == 0) {

                $name  = $row['name'];
                $email  = $row['email'];
                $verify_token  = $row['verify_token'];



                resend_email_verify($name, $email, $verify_token);
                $_SESSION['status'] = "Verification Email link has been sent to your email address!";
                header("Location:index.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Email already verified .Please Login!";
                header("Location:resend-email-verification.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Email is not registered. Please Register now!";
            header("Location:registration.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "Please enter the email field";
        header("Location: resend-email-verification.php");
        exit(0);
    }
}
