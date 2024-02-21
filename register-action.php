<?php
session_start();
include 'db_con.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token)
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
  $mail->addAddress($email, $name);

  $mail->isHTML(true);
  $mail->Subject = "Email verification from DHAS Enrollment_System";

  $email_template = "
    <p> Dear  $name,</p>
    <p>Thank you for registering with DHAS_Enrollment_system. As part of our enrollment process, we require all users to verify their email addresses in order to access their accounts.</p>
    <p>To complete the verification process, please use the links below to confirm your email address:</p>
    <p> <a href='http://localhost/Enrollment/verify-email.php?token=$verify_token'>Click Here</a></p>
    <p>Once you have verified your email address, you will be able to login to the DHAS_Enrollment_system using your account credentials. Please keep your login details safe and secure.</p>
    <p>Should you encounter any issues or require any assistance with the verification process, please do not hesitate to reach out to our support team at [contact information].</p>
    <p>Thank you for choosing DHAS_Enrollment_system. We look forward to supporting you throughout your academic journey.</p>
    <br/>
    <p>Best regards,</p>
    <p>alexalabajero@gmail.com</p>
    <br/><br/>
  
 
  ";

  $mail->Body =  $email_template;
  $mail->send();
  // echo 'Message has been sent';
}


if (isset($_POST['register_btn'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $role = 'student';
  $verify_token = md5(rand());

  $findExistingEmail = "SELECT * FROM account WHERE email LIKE '%$email%' LIMIT 1";
  $findExistingEmailResult = $conn->query($findExistingEmail);

  if ($findExistingEmailResult->num_rows > 0) {
      $_SESSION['status'] = "Email Address is already used!";
      header("Location:registration.php");
  } else {
      // Hash the password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $register = mysqli_query($conn, "INSERT INTO account (name,password,role,email,verify_token) VALUES ('$name','$hashedPassword','$role','$email','$verify_token')");

      if ($register) {
          sendemail_verify("$name", "$email", "$verify_token");
          $_SESSION['status'] = "Registration Successful,Please verify your Email Address!";
          header("Location:registration.php");
          exit(0);
      } else {
          $_SESSION['status'] = "Verification Failed!";
          header("Location:registration.php");
          exit(0);
      }
  }
}

 





// <?php

// include 'db_con.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require 'vendor/autoload.php';


// function sendemail_verify($username, $email, $verify_token)
// {
//   $mail = new PHPMailer(true);

//   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//   $mail->isSMTP();
//   $mail->SMTPAuth   = true;
//   //Send using SMTP
//   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send 
//   $mail->Username   = 'xelabjoven@gmail.com';                     //SMTP username
//   $mail->Password   = '1213EJLDA';

//   $mail->SMTPSecure = "tls";       //Enable implicit TLS encryption
//   $mail->Port       = "587";                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//   //Recipients
//   $mail->setFrom('xelabjoven@gmail.com', '$username');
//   $mail->addAddress('$email');     //Add a recipient



//   //Attachments
//   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//   //Content
//   $mail->isHTML(true);                                  //Set email format to HTML
//   $mail->Subject = 'Email verification from DHAS';

//   $email_template = " <h2>You have registered with DHAS_Enrollment_system</h2>
//                      <h5>Verify your Email email address to login with the below given links</h5>
//                     <a href = 'http://localhost/Enrollment/verify-email.php?token=$verify_token'
                                    
//                      ";

//   $mail->Body =  $email_template;
//   $mail->send();
//   // echo 'Message has been sent';

// }






// if (isset($_POST['submit'])) {

//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   $email = $_POST['email'];
//   // $role = $_POST['role'];
//   $verify_token = md5(rand());
//   // $created_at = $_POST['created_at'];




//   sendemail_verify("$username", "$email", "$verify_token");
//   echo "sent or not ?";


//   $query = "Select * from account";

//   $result = mysqli_query($conn, $query);


//   $findExistingUser = "SELECT * FROM account WHERE username LIKE '%$username%' AND password = '$password'";
//   $findExistingUserResult = $conn->query($findExistingUser);



//   $findExistingEmail = "SELECT * FROM account WHERE email LIKE '%$email%'";
//   $findExistingEmailResult = $conn->query($findExistingEmail);



//   if ($findExistingEmailResult->num_rows > 0) {
//     $_SESSION['status'] =  header("Location: registration.php?EmailAlreadyUsed=1");
//   } else {

//     if ($findExistingUserResult->num_rows > 0) {
//       // header("location:registration.php?register_action=Username already taken!");
//       header("Location: registration.php?alreadyUsed=1");
//     } else {
//       $register = mysqli_query($conn, "INSERT INTO account (username,password,role,email,verify_token) VALUES ('$username','$password','$role','$email','$verify_token')");

//       if ($register) {
//          sendemail_verify("$name", "$email", "$verify_token");
//         header("Location: registration.php?success=1");
//       } else {
//         header("Location: registration.php?failed=1");
//       }
//     }
//   }
// }


















// if($result){
//   while ($row = mysqli_fetch_assoc($result)) {
//     if($username == $row['username']){
//       header("location:registration.php?register_action=Username already taken!");
//     }
//     else {
//       $register = mysqli_query($conn, "INSERT INTO account (username,password,role) VALUES ('$username','$password','$role')");

//       if($register){
//         break;
//       }
//       else {
//         echo error_reporting(E_ALL);
//       }
//     }
//   }
//   mysqli_free_result($result);
//   header("location:registration.php?register_action=success");
// }


// function test_input($data)
// {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
// echo htmlspecialchars($_SERVER["PHP_SELF"]);
