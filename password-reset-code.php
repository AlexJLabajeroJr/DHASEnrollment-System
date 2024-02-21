<?php
session_start();
include 'db_con.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "alexalabajero@gmail.com";
    $mail->Password   = "tfostiwsrjihhbbb";

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;


    $mail->setFrom("alexalabajero@gmail.com", $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = " Reset Password Notification";

    $email_template = " <h2>Hello</h2>
                        <h5>You are receiving this email because we receive a password request for  your account.</h5>
                        <br/><br/>
                        <a href = 'http://localhost/Enrollment/password-change.php?token=$token&email=$get_email'> Click Me </a>
                                    
                     ";

    $mail->Body =  $email_template;
    $mail->send();
}



if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM account WHERE email = '$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE account SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "We e-mailed you a password reset link";
            header("Location: password-reset.php");
            exit(0);
        } else {
            $_SESSION['status'] = "Something went wrong. Please try again!";
            header("Location: password-reset.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No Email Found!";
        header("Location: password-reset.php");
        exit(0);
    }
}

if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password  = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            // Check if the token is valid
            $check_token = "SELECT verify_token, password FROM account WHERE verify_token = '$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                $row = mysqli_fetch_array($check_token_run);
                $hashed_password = $row['password'];

                if ($new_password == $confirm_password) {
                    if (password_verify($new_password, $hashed_password)) {
                        $_SESSION['status'] = "New password cannot be the same as the old password!";
                        header("Location:password-change.php?token=$token&email=$email");
                        
                    } else {
                        // Update the password
                        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                        $update_password = "UPDATE account SET password = '$new_hashed_password' WHERE verify_token = '$token' LIMIT 1";
                        $update_password_run = mysqli_query($conn, $update_password);

                        if ($update_password_run) {
                            $new_token = md5(rand()) . "DHAS";
                            $update_to_new_token = "UPDATE account SET verify_token = '$new_token' WHERE verify_token = '$token' LIMIT 1";
                            $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);

                            $_SESSION['status'] = "New Password Successfully Updated!";
                            header("Location:index.php");
                            exit(0);
                        } else {
                            $_SESSION['status'] = "Did not update password. Something went wrong!";
                            header("Location:password-change.php?token=$token&email=$email");
                            exit(0);
                        }
                    }
                } else {
                    $_SESSION['status'] = "Password and Confirm Password do not match!";
                    header("Location:password-change.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = "Invalid Token!";
                header("Location:password-change.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "All fields are mandatory!";
            header("Location:password-change.php?token=$token&email=$email");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No Token available!";
        header("Location:password-change.php");
        exit(0);
    }
}
