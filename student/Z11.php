<?php



session_start();





if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
}


include '../db_con.php';
include_once "randomString.php";
include('includes/header.php');


$emai = $_SESSION['emai'];
$pass = $_SESSION['pass'];



$sql = "Select * from student where student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



$findIfEnroll = "SELECT * from student WHERE status = 'pending'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);


if ($row == null) {

    $row['date_of_registration'] = '';
    $row['school_last_attended'] = '';
    $row['school_year'] = '';
    $row['first_name'] = '';
    $row['last_name'] = '';
    $row['first_name'] = '';
    $row['middle_name'] = '';
    $row['suffix_name'] = '';
    $row['contact_number'] = '';
    $row['age'] = '';
    // $row['email'] = '';
    $row['unit_number'] = '';
    $row['street'] = '';
    $row['barangay'] = '';
    $row['city'] = '';
    $row['district'] = '';
    $row['zip_code'] = '';
    $row['gender'] = '';
    $row['birthdate'] = '';
    $row['birthplace'] = '';
    $row['height'] = '';
    $row['weight'] = '';
    $row['religion'] = '';
    $row['civil_status'] = '';
    $row['parent_name'] = '';
    $row['parent_occupation'] = '';
    $row['parent_contact_no'] = '';
    $row['guardian_name'] = '';
    $row['guardian_occupation'] = '';
    $row['guardian_contact_no'] = '';
    $row['student_type'] = '';
    $row['GRADE_LEVEL_ID'] = '';
    $row['LRN'] = '';
    $row['strand'] = '';
    $row['image'] = '';
} else {

    $sql = "Select * from student where student_id = '$_SESSION[student_id]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}


$sql1 = "Select * from account where student_id = '$_SESSION[student_id]'";
$result1 = $conn->query($sql1);

$row1 = $result1->fetch_assoc();




if (isset($_POST['add_user'])) {

    $_SESSION['date_of_registration'] = $_POST['date_of_registration'];
    $_SESSION['unique_id'] = $ran_id = rand(time(), 100000000);
    $_SESSION['school_last_attended']  = $_POST['school_last_attended'];
    $_SESSION['school_year']  = $_POST['school_year'];
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['middle_name'] = $_POST['middle_name'];
    $_SESSION['suffix_name'] = $_POST['suffix_name'];
    $_SESSION['contact_number'] = $_POST['contact_number'];
    $_SESSION['age'] = $_POST['age'];
    // $_SESSION['email'] =  $_POST['email'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['unit_number'] = $_POST['unit_number'];
    $_SESSION['street'] = $_POST['street'];

    $_SESSION['barangay'] = $_POST['barangay'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['district'] = $_POST['district'];


    $_SESSION['zip_code'] = $_POST['zip_code'];

    $_SESSION['birthdate'] = $_POST['birthdate'];

    $_SESSION['birthplace'] = $_POST['birthplace'];
    $_SESSION['height'] = $_POST['height'];
    $_SESSION['weight'] = $_POST['weight'];
    $_SESSION['religion'] = $_POST['religion'];

    // education Doctoral
    $_SESSION['civil_status'] = $_POST['civil_status'];
    $_SESSION['parent_name'] = $_SESSION['parent_name'];
    $_SESSION['parent_occupation'] = $_POST['parent_occupation'];

    $_SESSION['parent_contact_no'] = $_POST['parent_contact_no'];
    $_SESSION['guardian_name'] = $_POST['guardian_name'];
    $_SESSION['guardian_occupation'] = $_POST['guardian_occupation'];
    $_SESSION['guardian_contact_no'] = $_POST['guardian_contact_no'];
    $_SESSION['GRADE_LEVEL'] = $_POST['GRADE_LEVEL'];
    $_SESSION['LRN'] = $_POST['LRN'];
    $_SESSION['strand'] = $_POST['strand'];

    $_SESSION['student_type'] = $_POST['student_type'];



    $searchCont = "SELECT * FROM student WHERE contact_number LIKE '%$_SESSION[contact_number]%'";
    $searchContQuery  = $conn->query($searchCont);

    if ($searchContQuery->num_rows > 0) {
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../img/user-images/" . randomString(8) . "/" . $filename;

        mkdir(dirname($folder));

        if (move_uploaded_file($tempname, $folder)) {
            $_SESSION["p_p"] = $folder;
        }
        header("Location: togo.php");
    } else {

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../img/user-images/" . randomString(8) . "/" . $filename;

        mkdir(dirname($folder));

        if (move_uploaded_file($tempname, $folder)) {
            $_SESSION["p_p"] = $folder;
        }
        $query = "INSERT INTO student(";
        $query .= "date_of_registration,unique_id,school_last_attended,school_year,first_name, last_name, middle_name, suffix_name, contact_number, age,gender, unit_number, street, barangay, city, district, zip_code, birthdate, birthplace, height, weight, religion, civil_status, parent_name, parent_occupation, parent_contact_no, guardian_name, guardian_occupation, guardian_contact_no,GRADE_LEVEL_ID,LRN,strand,status,student_type,NewEnrollees,p_p";
        $query .= ") Values (";
        $query .= " '{$_SESSION['date_of_registration']}','{$_SESSION['unique_id']}', '{$_SESSION['school_last_attended']}','{$_SESSION['school_year']}','{$_SESSION['first_name']}','{$_SESSION['last_name']}','{$_SESSION['middle_name']}','{$_SESSION['suffix_name']}','{$_SESSION['contact_number']}','{$_SESSION['age']}', '{$_SESSION['gender']}','{$_SESSION['unit_number']}','{$_SESSION['street']}','{$_SESSION['barangay']}','{$_SESSION['city']}','{$_SESSION['district']}','{$_SESSION['zip_code']}','{$_SESSION['birthdate']}','{$_SESSION['birthplace']}','{$_SESSION['height']}','{$_SESSION['weight']}','{$_SESSION['religion']}','{$_SESSION['civil_status']}','{$_SESSION['parent_name']}','{$_SESSION['parent_occupation']}','{$_SESSION['parent_contact_no']}','{$_POST['guardian_name']}','{$_SESSION['guardian_occupation']}','{$_SESSION['guardian_contact_no']}','{$_SESSION['GRADE_LEVEL']}','{$_SESSION['LRN']}','{$_SESSION['strand']}','Pending ','{$_SESSION['student_type']}','1','{$_SESSION['p_p']}'";

        $query .= ")";


        // FUNCTION PARA MAKUHA ANG ID SAN STUDENT PARA SAN PAG CREATE NYA ACCOUNT TAS PAG FILL UP NYA SAN FORM MAKIKITA SA ACCOUNT ANG STUDENT_ID
        $result = mysqli_query($conn, $query);
        if ($result) {
            $query = "SELECT student_id from student WHERE first_name = '$_POST[first_name]' and last_name = '$_POST[last_name]'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $sql = "UPDATE account SET student_id=$row[student_id] ";
            $sql .= " WHERE email='{$emai}' and password='{$pass}'";
            $result = mysqli_query($conn, $sql);
            $_SESSION['user_id'] = $row['student_id'];


            header("Location: goto.php");

            // header ("location: Enroll.php");
        } else {
            echo mysqli_error();
        }
    }
}






$date_of_registration =  $school_last_attended =   $school_year =  $first_name = $last_name = $middle_name = $suffix_name = $contact_number = $age  =  $gender = $unit_number = $street = $barangay = $city = $district = $zip_code =  $birthdate = $birthplace = $height = $weight = $religion = $civil_status = $parent_name = $parent_occupation = $parent_contact_no = $guardian_name = $guardian_occupation = $guardian_contact_no = $GRADE_LEVEL_ID = $LRN =   $strand = $student_type =  $name =  "";




$action = "add_user";
$btn_value = "Save info";




















//print($_SESSION['user_id']);




$currentyear = date('Y');
$nextyear =  date('Y') + 1;
$sy = $currentyear . '-' . $nextyear;
$_SESSION['School_year'] = $sy;



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();


$stud = "Select * from student where status = 'Pending' || status = 'Approved' and  student_id = '$_SESSION[student_id]'";
$searchstudResult = $conn->query($stud);
$searchstudResultRow = $searchstudResult->fetch_assoc();


// $stude = "Select * from student where student_type = 'student_type' and  student_id = '$_SESSION[student_id]'";
// $searchstypeResult = $conn->query($stude);
// $searchstudResultRow = $searchstypeResult->fetch_assoc();

$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();






if (isset($row['p_p'])) {
    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
    $searchIMResult = $conn->query($setIM);
    $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
}


if (isset($_POST['refresh'])) {
    header('location:dashboard.php');
}


// $findIfEnrollan = "SELECT * from student WHERE status = ''";
// $find = mysqli_query($conn, $findIfEnrollan);
// $findef = mysqli_fetch_assoc($find);



$stat = "SELECT * from student WHERE  status = 'Approved' && student_id = '$_SESSION[student_id]'";
$des = mysqli_query($conn, $stat);
$statko = mysqli_fetch_assoc($des);



$station = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
$desu = mysqli_query($conn, $station);
$Penny = mysqli_fetch_assoc($desu);


$stator = "SELECT * from student WHERE  status = 'Decline' && student_id = '$_SESSION[student_id]'";
$desk = mysqli_query($conn, $stator);
$Delly = mysqli_fetch_assoc($desk);





$sql = "SELECT count(*) as 'enrollees' FROM schoolyr WHERE enrollment_status = '2' && student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();




?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- CSS -->
<!-- <link rel="stylesheet" type="text/css" href="../template-files/vendors/styles/core.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="../template-files/vendors/styles/icon-font.min.css"> -->
<link rel="stylesheet" type="text/css" href="../template-files/src/plugins/jquery-steps/jquery.steps.css">
<link rel="stylesheet" type="text/css" href="../template-files/vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="../template-files/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">


<div class="wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/aa.png" alt="AdminLTELogo" height="60" width="60">
   </div> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a> -->
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
               <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
               <form class="form-inline">
                  <div class="input-group input-group-sm">
                     <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                           <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </li> -->

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- <i class="far fa-comments"></i>
               <span class="badge badge-danger navbar-badge">3</span> -->
                </a>
                <div class="">
                    <!-- <a href="#" class="dropdown-item"> -->
                    <!-- Message Start -->
                    <!-- <div class="media">
                     <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                     <div class="media-body">
                        <h3 class="dropdown-item-title">
                           Brad Diesel
                           <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                     </div>
                  </div> -->
                    <!-- Message End -->
                    <!-- </a> -->
                    <div class=""></div>
                    <a href="#" class="">
                        <!-- Message Start -->
                        <!-- <div class="media">
                     <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                     <div class="media-body">
                        <h3 class="dropdown-item-title">
                           John Pierce
                           <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                     </div>
                  </div> -->
                        <!-- Message End -->
                    </a>
                    <div class=""></div>
                    <a href="#" class="">
                        <!-- Message Start -->
                        <!-- <div class="media">
                     <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                     <div class="media-body">
                        <h3 class="dropdown-item-title">
                           Nora Silvester
                           <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                     </div>
                  </div> -->
                        <!-- Message End -->
                    </a>
                    <div class=""></div>
                    <!-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> -->
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8 "> -->

                    <?php
                    if (isset($row['p_p'])) {
                        echo '<img src="' . $searchIMResultRow['p_p'] . '"  height = "35px">';
                    }
                    ?>


                    <?php
                    if (isset($row['first_name'])) {
                        echo '<b>' . $row['first_name'] . ' ' . $row['last_name'] . '</b>';
                    }
                    ?>
                    <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                    <div class="container text-light" style="background-color: #00008b">
                        <div class="row">
                            <div class="col-sm-12 text-center text-light">
                                <br>


                                <?php
                                if (isset($row['p_p'])) {
                                    echo '<img src="' . $row['p_p'] . '" class="bg-light brand-image img-circle elevation-3" style="opacity: .8; height: 100px;">';
                                }
                                ?>


                            </div>

                            <div class="col-sm-12 text-center">
                                <div class="pull-left info">





                                    <?php
                                    if (isset($row['first_name'])) {
                                        echo '<p style="font-size:15px; font-size:20px;
                                        font-family:Segoe Script;" class="text-light text-bold"><b> Hello! ' . $row['first_name'] . ' ' . $row['last_name'] . '</b></p>';
                                    }
                                    ?>

                                    <p class="text-light" style="font-size:15px">Student</p>
                                </div>

                            </div>

                            <div class="col-sm-12 text-center mt-3">

                                <a href="logoutStudent.php" class="nav-link text-dark">


                                    <p class="bg-primary"> <i class="nav-icon fas fa-sign-out-alt text-light"></i>Logout</p>
                                </a>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                </div>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
               <i class="fas fa-expand-arrows-alt"></i>
            </a>
         </li> -->
            <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
               <i class="fas fa-th-large"></i>
            </a>
         </li> -->
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-0-primary elevation-4 " style="background-color:#00008b">
        <!-- Brand Logo -->
        <!-- Brand Logo -->
        <a href="Dashboard_admin.php" class="brand-link">
            <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-bold text-warning text-center" style="font-size:9px;
font-family:Segoe Script;  font-weight: bold;"><b>Divine Healer Academy of Sorsogon</b>

            </span>

        </a>

        <!-- Sidebar -->
        <div class=" sidebar " style=" height: auto;">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-2  mb-1 d-flex">
                <div class="pull-left image">
                    <?php
                    if (isset($row['p_p'])) {
                        echo '<img src="' . $searchIMResultRow['p_p'] . '" class="brand-image img-circle elevation-3" style="opacity: .8">';
                    }
                    ?>
                </div>
                <div class="pull-left info">
                    <?php
                    if (isset($row['first_name'])) {
                        echo '<p style="font-family: Segoe UI;" class="text-light">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>';
                    }
                    ?>
                </div>

            </div>
        </div>





        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar  border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-dark border border-1">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item header text-light" style="font-size:14px;">

                    <a href="#" class="nav-link text-light ">
                        <p>
                            &nbsp &nbsp &nbspMAIN NAVIGATION
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>

                <li class="nav-item ">
                    <a href="dashboard.php" class="nav-link text-light ">
                        <i class="nav-icon fas nav-icon fas fa-copy"></i>
                        <p>
                            Pre-Registration Form
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Enrollment
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Enroll.php" class="nav-link text-light ">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p>My Enrollment Form</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="class.php" class="nav-link active bg-light text-dark">
                                <i class="far fa-dot-circle nav-icon text-dark"></i>
                                <p>My Class</p>
                            </a>
                        </li>


                    </ul>

                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Notification
                            <i class="right fas fa-angle-left text-light"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="notification.php" class="nav-link text-light">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p>View Notifications</p>
                            </a>
                        </li>

                    </ul>



                </li>


                <li class="nav-item">
                    <a href="logoutStudent.php" class="nav-link text-light">
                        <i class="nav-icon fas fa-sign-out-alt text-light"></i>
                        <p>Logout</p>
                    </a>




                </li>


            </ul>
        </nav>


        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">My Class</li> -->
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>




        <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-5">
                        <img src="template-files/vendors/images/employer (2).png" alt="" style="  mix-blend-mode: darken;">
                    </div>
                    <div class="col-md-1 col-lg-1">
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="register-box bg-white  border-radius-15">
                            <div class="wizard-content">

                                <div class="form-container">
                                    <form class="tab-wizard2 wizard-circle wizard" method="POST" enctype="multipart/form-data">
                                        <h5>Personal Information (pt.1)</h5>
                                        <section>
                                            <div class="form-wrap max-width-600 mx-auto">
                                                <div class="form-group row">

                                                    <label class="col-sm-4 col-form-label">Profile Image*</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" name="image" class="form-control-file form-control height-auto" accept="image/*" required>
                                                    </div>



                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">First_name <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Juan" name="first_name" class="form-control form-control-sm " value="<?= $row['first_name'] ?>" <?php

                                                                                                                                                                                            if ($row['first_name'] != '') {
                                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                                            }

                                                                                                                                                                                            ?> required>
                                                    </div>
                                                </div>









                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Last_name <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Dela Cruz" name="last_name" class="form-control form-control-sm" value="<?= $row['last_name'] ?>" <?php

                                                                                                                                                                                                if ($row['last_name'] != '') {
                                                                                                                                                                                                    echo "disabled ";
                                                                                                                                                                                                }

                                                                                                                                                                                                ?> required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Middle_name <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex. J" maxlength="1" name="middle_name" class="form-control form-control-sm " value="<?= $row['middle_name'] ?>" <?php

                                                                                                                                                                                                            if ($row['middle_name'] != '') {
                                                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                                                            }

                                                                                                                                                                                                            ?> required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">suffix_name</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex. Jr, Sr, III or II" name="suffix_name" class="form-control form-control-sm" value="<?= $row['suffix_name'] ?>" maxlength="2" <?php

                                                                                                                                                                                                                        if ($row['suffix_name'] != '') {
                                                                                                                                                                                                                            echo "disabled ";
                                                                                                                                                                                                                        }

                                                                                                                                                                                                                        ?>>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Birthdate<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="birthdate" class="form-control form-control-sm" value="<?= $row['birthdate'] ?>" <?php
                                                                                                                                                                    if ($row['birthdate'] != '') {
                                                                                                                                                                        echo "disabled";
                                                                                                                                                                    }
                                                                                                                                                                    ?> required max="2033-12-31">
                                                    </div>
                                                </div>








                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Birthplace <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="birthplace" placeholder="Ex.Sorsogon" class="form-control form-control-sm " value="<?= $row['birthplace'] ?>" <?php

                                                                                                                                                                                                if ($row['birthplace'] != '') {
                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                }

                                                                                                                                                                                                ?> required>
                                                    </div>
                                                </div>









                                            </div>
                                        </section>
                                        <!-- Step 2 -->
                                        <h5>Personal Information (pt.2)</h5>
                                        <section>
                                            <div class="form-wrap max-width-600 mx-auto">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Age <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="number" placeholder="Ex.13" name="age" class="form-control form-control-sm" value="<?= $row['age'] ?>" maxlength="2" <?php if ($row['age'] != '') {
                                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                                            } ?> required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Gender <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <?php if ($row['gender'] != '') : ?>
                                                            <select id="gender" name="gender" class="form-control " class="form-control bg-light" disabled required>
                                                                <option value="new"><?= $row['gender']; ?></option>
                                                            </select>
                                                        <?php else : ?>
                                                            <select id="gender" name="gender" class="form-control" class="form-control bg-light" required>
                                                                <option value="">--Select--</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>

                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Contact No <B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="contact_number" placeholder="Ex.09021013245" class="form-control form-control-sm" value="<?= $row['contact_number'] ?>" <?php if ($row['contact_number'] != '') {
                                                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                                                            } ?>required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Height(cm)</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" placeholder="Ex.167" name="height" class="form-control" value="<?= $row['height'] ?>" maxlength="3" <?php if ($row['height'] != '') {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?> oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Weight(kg)</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" placeholder="Ex.100" name="weight" class="form-control" value="<?= $row['weight'] ?>" maxlength="3" <?php if ($row['weight'] != '') {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?> oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Religion<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="religion" placeholder="Ex.Roman Catholic" class="form-control form-control-sm " value="<?= $row['religion'] ?>" maxlength="" <?php

                                                                                                                                                                                                                if ($row['religion'] != '') {
                                                                                                                                                                                                                    echo "disabled ";
                                                                                                                                                                                                                }

                                                                                                                                                                                                                ?>required>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Civil Status<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <?php if ($row['civil_status'] != '') : ?>
                                                            <select id="civil_status" name="civil_status" class="form-control " class="form-control bg-light" disabled required>
                                                                <option value="new"><?= $row['civil_status']; ?></option>
                                                            </select>
                                                        <?php else : ?>
                                                            <select id="civil_status" name="civil_status" class="form-control" class="form-control bg-light" required>
                                                                <option value="">--Select--</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married"> Married</option>
                                                                <option value="divorced"> divorced</option>
                                                                <option value="separated"> separated</option>
                                                                <option value="widowed"> widowed</option>

                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>



                                            </div>
                                        </section>





                                        <h5>Address Information</h5>
                                        <section>
                                            <div class="form-wrap max-width-1000 mx-auto">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">House_Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" placeholder="Ex.123" name="unit_number" class="form-control " value="<?= $row['unit_number'] ?>" <?php

                                                                                                                                                                                if ($row['unit_number'] != '') {
                                                                                                                                                                                    echo "disabled ";
                                                                                                                                                                                }

                                                                                                                                                                                ?>>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Street<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Divina Street" name="street" class="form-control " value="<?= $row['street'] ?>" <?php

                                                                                                                                                                            if ($row['street'] != '') {
                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                            }

                                                                                                                                                                            ?>>


                                                    </div>

                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Barangay<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Sirangan" name="barangay" class="form-control" value="<?= $row['barangay'] ?>" <?php

                                                                                                                                                                            if ($row['barangay'] != '') {
                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                            }

                                                                                                                                                                            ?>required>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Zip_code<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="number" placeholder="Ex.4700" name="zip_code" class="form-control  " value="<?= $row['zip_code'] ?>" <?php

                                                                                                                                                                            if ($row['zip_code'] != '') {
                                                                                                                                                                                echo "disabled ";
                                                                                                                                                                            }

                                                                                                                                                                            ?>required>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">District<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.West/East" name="district" class="form-control" value="<?= $row['district'] ?>" <?php

                                                                                                                                                                            if ($row['district'] != '') {
                                                                                                                                                                                echo "disabled";
                                                                                                                                                                            }

                                                                                                                                                                            ?>>
                                                    </div>
                                                </div>





                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">City<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="city" placeholder="Ex.Sorsogon" class="form-control form-control-sm " value="<?= $row['city'] ?>" maxlength="" <?php

                                                                                                                                                                                                if ($row['city'] != '') {
                                                                                                                                                                                                    echo "disabled ";
                                                                                                                                                                                                }

                                                                                                                                                                                                ?>required>

                                                    </div>
                                                </div>

                                            </div>
                                        </section>



                                        <h5>Parent Information (If You Have One)</h5>
                                        <section>
                                            <div class="form-wrap max-width-1000 mx-auto">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Parent_name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Juana Dela Cruz" name="parent_name" class="form-control" value="<?= $row['parent_name'] ?>" <?php

                                                                                                                                                                                        if ($row['parent_name'] != '') {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                        }
                                                                                                                                                                                        ?>>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Occupation:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Teacher" name="parent_occupation" placeholder="Ex.Teacher" class="form-control " value="<?= $row['parent_occupation'] ?>" <?php

                                                                                                                                                                                                                        if ($row['parent_occupation'] != '') {
                                                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        ?>>


                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Contact_no</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="parent_contact_no" maxlength="11" placeholder="Ex.09021013245" class="form-control" value="<?= $row['parent_contact_no'] ?>" <?php if ($row['parent_contact_no'] != '') {
                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                } ?> oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">


                                                    </div>
                                                </div>

                                            </div>
                                        </section>




                                        <!-- Step 3 -->

                                        <!-- Step 4 -->
                                        <h5>Guardian Information (If You Have One)</h5>
                                        <section>
                                            <div class=" form-wrap max-width-1000 mx-auto">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Guardian_name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ex.Juana Dela Cruz" name="guardian_name" class="form-control" value="<?= $row['guardian_name'] ?>" <?php

                                                                                                                                                                                            if ($row['guardian_name'] != '') {
                                                                                                                                                                                                echo "disabled";
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>>
                                                    </div>
                                                </div>




                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Occupation</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="guardian_occupation" maxlength="11" placeholder="Ex.Teacher" class="form-control " value="<?= $row['guardian_occupation'] ?>" <?php

                                                                                                                                                                                                                    if ($row['guardian_occupation'] != '') {
                                                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    ?>>
                                                    </div>
                                                </div>




                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Contact_no</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="guardian_contact_no" placeholder="Ex.09021013245" maxlength="11" class="form-control" value="<?= $row['guardian_contact_no'] ?>" <?php if ($row['guardian_contact_no'] != '') {
                                                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                                                    } ?> oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">


                                                    </div>
                                                </div>




                                            </div>
                                        </section>
                                        <h5>Other Information</h5>
                                        <section>
                                            <div class="form-wrap max-width-1000 mx-auto">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Date_of_Reg<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="date_of_registration" class="form-control form-control-sm" value="<?= $row['date_of_registration'] ?>" <?php
                                                                                                                                                                                        if ($row['date_of_registration'] != '') {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                        }
                                                                                                                                                                                        ?> required max="2033-12-31">
                                                    </div>
                                                </div>







                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Student_type<B style="color:red">*</B></label>
                                                    <div class="col-sm-8">
                                                        <?php if ($row['student_type'] != '') : ?>
                                                            <select id="student_type" onchange="loadData()" name="student_type" class="form-control" disabled required>
                                                                <option value="new"><?= $row['student_type']; ?></option>
                                                            </select>
                                                        <?php else : ?>
                                                            <select id="student_type" onchange="loadData()" name="student_type" class="form-control" required>
                                                                <option value="">--Select type--</option>
                                                                <option value="new">New</option>
                                                                <option value="old">Old</option>
                                                                <option value="transferee">Transferee</option>
                                                                <option value="returnee">Returnee</option>
                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <?php
                                                    $query = "SELECT * from grade_level ";
                                                    $result = mysqli_query($conn, $query);
                                                    ?>
                                                    <label class="col-sm-4 col-form-label">Grade Level</label>
                                                    <div class="col-sm-8">
                                                        <?php if ($row['GRADE_LEVEL_ID'] != '') : ?>
                                                            <?php
                                                            $query = "SELECT * from grade_level where GRADE_LEVEL_ID = '$row[GRADE_LEVEL_ID]'";
                                                            $result = mysqli_query($conn, $query);
                                                            $bulbol = mysqli_fetch_assoc($result);
                                                            ?>
                                                            <select id="GRADE_LEVEL_ID" name="GRADE_LEVEL" class="form-control bg-light">
                                                                <option value="new"><?= $bulbol['GRADE_LEVEL']; ?></option>
                                                            </select>
                                                        <?php else : ?>
                                                            <select id="GRADE_LEVEL_ID" onchange="loadDatas()" name="GRADE_LEVEL" class="form-control bg-light" required>
                                                                <?php foreach ($result as $data) : ?>
                                                                    <option value="<?= $data['GRADE_LEVEL_ID']; ?>"><?= $data['GRADE_LEVEL']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div id="loaddatas"></div>



                                                <?php if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') : ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Strand for SHS:</label>
                                                        <div class="col-sm-8">
                                                            <?php if ($row['strand'] != '') : ?>
                                                                <select id="strand" name="strand" class="form-control " class="form-control bg-light" disabled required>
                                                                    <option value="new"><?= $row['strand']; ?></option>
                                                                </select>
                                                            <?php else : ?>
                                                                <select id="strand" name="strand" class="form-control" class="form-control bg-light" required>
                                                                    <option value="None">--Select strand--</option>
                                                                    <option value="GAS">General Academic Strand</option>
                                                                    <option value="HUMMS">Humanities and social sciences </option>
                                                                    <option value="STEM">Science, technology, engineering, and mathematics</option>
                                                                    <option value="ABM">Accountancy, business, and management</option>

                                                                </select>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                <?php endif; ?>



                                                <div id="loaddata"></div>




                                                <?php if ($row['student_type'] == 'transferee') : ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">School_last_attended </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="school_last_attended" class="form-control input-sm  " value="<?= $row['school_last_attended'] ?>" <?php



                                                                                                                                                                                        if ($row['school_last_attended'] != '') {
                                                                                                                                                                                            echo "disabled ";
                                                                                                                                                                                        }
                                                                                                                                                                                        ?>>
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">School_year</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="school_year" placeholder="ex. 2019-2020" class="form-control input-sm  " value="<?= $row['school_year'] ?>" <?php

                                                                                                                                                                                                    if ($row['school_year'] != '') {
                                                                                                                                                                                                        echo "disabled ";
                                                                                                                                                                                                    }

                                                                                                                                                                                                    ?>>
                                                        </div>
                                                    </div>

                                                <?php endif; ?>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">LRN: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Optional" name="LRN" class="form-control input-sm  " value="<?= $row['LRN'] ?>" <?php

                                                                                                                                                                        if ($row['LRN'] != '') {
                                                                                                                                                                            echo "disabled ";
                                                                                                                                                                        }

                                                                                                                                                                        ?>>
                                                    </div>
                                                </div>









                                                <?php if ($row1['student_id'] == '0') : ?>
                                                    <button type="submit" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static" name="<?= $action ?>" value="<?= $btn_value ?>">SAVE</button>
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-lg btn-0 bg-lightblue" data-toggle="modal" data-target="#exampleModal">
                                                        Edit
                                                    </button>
                                                <?php endif; ?>

                                            </div>
                                        </section>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>









        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin-right: 850px !important;">
                <div class="modal-content bg-light" style="width: 1250px !important;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> EDIT PRE-REGISTRATION FORM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- INI NA action = "actions/editAction.php" nasa folder in sa pinakataas parang function para gumana modal ng ma edit ito na nasa mismong database -->
                        <form action="actions/editAction.php" method="POST">
                            <div class="container mt-5">
                                <div class="col-sm-12 ">
                                    <div class="row">


                                        <!-- class="container-fluid border border-10 text-light " style="   background:;  padding: 15px;
     border-radius: 15px 50px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      text-align: center;  " -->
                                        <div class="container-fluid  mb-4 border border-1">
                                            <div class="row">


                                                <div class="col-md-6 col-12">
                                                    <div class="form-group text-center">

                                                    </div>
                                                </div>




                                                <div class="col-md-6 col-12">
                                                    <div class="form-group text-center">
                                                        <!-- <label class="mb-3">Insert new image</label>
                                                                     <div class="form-group">
                                                                        <input type="file" class="form-control-file form-control height-auto" name="image">
                                                                     </div> -->
                                                    </div>
                                                </div>


                                                <div class="col-sm-6 ">

                                                    <div class="form-group text-center">
                                                        <?php if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') { ?>
                                                            <label>Semester</label>
                                                            <input value=" <?= $searchSetResultRow['SEMESTER']; ?> Semester" class=" form-control input-sm   text-center" disabled>
                                                        <?php } else {
                                                            echo '<div class="text-center mt-4" role="alert" style = "font-size:10px">
                                                                         
                                                                          </div>';
                                                        } ?>

                                                    </div>


                                                </div>




                                                <div class="col-md-6 col-12">
                                                    <div class="form-group text-center">
                                                        <label>Academic Year</label>
                                                        <input value="   <?= $searchYrRow['school_year']; ?> " class=" form-control input-sm  border border-1 text-center" disabled>
                                                    </div>
                                                </div>






                                                <div class="col-sm-2 ">
                                                    <label>Date_of_registration <B style="color:red">*</B> </label>
                                                    <input type="date" name="date_of_registration" class="form-control  input-sm  " value="<?= $row['date_of_registration'] ?>" <?php

                                                                                                                                                                                ?> required>
                                                </div>



                                                <!-- <label>Student_type <B style="color:red">*</B></label>

                                                               <select id="student_type" name="student_type" class="form-control bg-light" required>
                                                                  <option value="">--Select--</option>
                                                                  <option value="new">New</option>
                                                                  <option value="old">Old</option>
                                                                  <option value="transferee">Transferee</option>
                                                                  <option value="returnee">Returnee</option>
                                                               </select>
                                                            </div> -->



                                                <div class="col-sm-2">
                                                    <label>Student_type<B style="color:red">*</B></label>
                                                    <div>
                                                        <?php if ($row['student_type'] != '') : ?>
                                                            <input id="student_type" name="student_type" class="form-control" value="<?= $row['student_type']; ?>" disabled required>


                                                        <?php else : ?>
                                                            <select id="student_type" name="student_type" class="form-control" required>
                                                                <option value="">--Select type--</option>
                                                                <option value="new">New</option>
                                                                <option value="old">Old</option>
                                                                <option value="transferee">Transferee</option>
                                                                <option value="returnee">Returnee</option>
                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>



















                                                <div class="col-sm-5 ">
                                                    <label>School_last_attended (Transferee Only)</label>
                                                    <input type="text" name="school_last_attended" placeholder="ex.Sorsogon Pilot Elementary School" class="form-control  input-sm  " value="<?= $row['school_last_attended'] ?>" <?php



                                                                                                                                                                                                                                    ?>>
                                                </div>


                                                <div class="col-sm-3 ">
                                                    <label>School_year (Transferee Only) </label>
                                                    <input type="text" name="school_year" class="form-control  input-sm " placeholder="ex. 2019-2020" value="<?= $row['school_year'] ?>" <?php



                                                                                                                                                                                            ?>>
                                                </div>



















                                                <div class="col-sm-3 mt-3 mb-3">
                                                    <?php
                                                    $query = "SELECT * from grade_level ";
                                                    $result = mysqli_query($conn, $query);
                                                    ?>
                                                    <label>Grade Level</label>
                                                    <div>
                                                        <?php if ($row['GRADE_LEVEL_ID'] != '') : ?>
                                                            <?php
                                                            $query = "SELECT * from grade_level where GRADE_LEVEL_ID = '$row[GRADE_LEVEL_ID]'";
                                                            $result = mysqli_query($conn, $query);
                                                            $bulbol = mysqli_fetch_assoc($result);
                                                            ?>
                                                            <input id="GRADE_LEVEL_ID" name="GRADE_LEVEL" class="form-control" class="form-control bg-light" value="<?= $bulbol['GRADE_LEVEL']; ?>" disabled>


                                                        <?php else : ?>
                                                            <select id="GRADE_LEVEL_ID" name="GRADE_LEVEL" class="form-control bg-light" required>
                                                                <?php foreach ($result as $data) : ?>
                                                                    <option value="<?= $data['GRADE_LEVEL_ID']; ?>"><?= $data['GRADE_LEVEL']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>












                                                <div class="col-sm-3">
                                                    <label class="mt-3">LRN: <B style="color:red">*</B></label>
                                                    <input type="text" placeholder="Optional" name="LRN" class="form-control " value="<?= $row['LRN'] ?>" <?php


                                                                                                                                                            ?>>
                                                </div>









                                                <div class="col-sm-3 mt-3">
                                                    <label>Strand for SHS: <B style="color:red">*</B></label>
                                                    <div>
                                                        <?php if ($row['strand'] != '') : ?>
                                                            <input id="strand" name="strand" class="form-control " class="form-control bg-light" value="<?= $row['strand']; ?>" disabled required>

                                                            </input>
                                                        <?php else : ?>
                                                            <select id="strand" name="strand" class="form-control" class="form-control bg-light" required>
                                                                <option value="None">--Select strand--</option>
                                                                <option value="GAS">General Academic Strand</option>
                                                                <option value="HUMMS">Humanities and social sciences </option>
                                                                <option value="STEM">Science, technology, engineering, and mathematics</option>
                                                                <option value="ABM">Accountancy, business, and management</option>

                                                            </select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>






                                                <!-- <label class="mt-3">Strand: (SHS only) <B style="color:red">*</B></label>

                                                               <select id="strand" name="strand" class="form-control " class="form-control bg-light">
                                                                  <option value="None">--Select--</option>
                                                                  <option value="GAS">General Academic Strand</option>
                                                                  <option value="HUMMS">Humanities and social sciences </option>
                                                                  <option value="STEM">Science, technology, engineering, and mathematics</option>
                                                                  <option value="ABM">Accountancy, business, and management</option>
                                                               </select>
                                                            </div>




                                                               <div class="col-sm-3 ">


                                                                  <label class="mt-3"> <B style="color:red">*</B></label>
                                                                  <input type="text" name="first_name" class="form-control input-sm  ">
                                                               </div>



                                                            </div>
                                                         </div>



                                                         <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->


                                                <div class="container-fluid mt-4 mb-4 border border-1 " style="  border-radius: 10px 10px 10px  10px ; overflow: hidden">
                                                    <h5 class=" text-center  text-dark mt-4 mb-2" style=" font-family:Segoe UI; color:white;">PERSONAL INFORMATION</h3>

                                                        <br>

                                                        <div class="row">


                                                            <div class="col-sm-3 ">


                                                                <label>First_name <B style="color:red">*</B></label>
                                                                <input type="text" name="first_name" class="form-control input-sm  " value="<?= $row['first_name'] ?>" <?php

                                                                                                                                                                        ?> required>
                                                            </div>




                                                            <div class="col-sm-3 ">
                                                                <label>Last_name <B style="color:red">*</B> </label>
                                                                <input type="text" name="last_name" class="form-control  input-sm  " value="<?= $row['last_name'] ?>" <?php



                                                                                                                                                                        ?> required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label>Middle_name <B style="color:red">*</B> </label>
                                                                <input type="text" name="middle_name" class="form-control" value="<?= $row['middle_name'] ?>" <?php



                                                                                                                                                                ?> required>
                                                            </div>

                                                            <div class="col-sm-2 ">
                                                                <label>Suffix_name</label>
                                                                <input type="text" name="suffix_name" class="form-control " value="<?= $row['suffix_name'] ?>" <?php


                                                                                                                                                                ?>>
                                                            </div>

                                                            <div class="col-sm-1 ">
                                                                <label>Age <B style="color:red">*</B></label>
                                                                <input type="number" name="age" class="form-control  " value="<?= $row['age'] ?>" <?php



                                                                                                                                                    ?> required>
                                                            </div>





                                                            <div class="col-sm-2 ">
                                                                <label class="mt-3">Contact_number <B style="color:red">*</B></label>
                                                                <input type="text" name="contact_number" maxlength="11" class="form-control " value="<?= $row['contact_number'] ?>" <?php


                                                                                                                                                                                    ?>required>
                                                            </div>


                                                            <!-- <div class="col-sm-3 ">
                                                <label class="mt-3">Email </label>
                                                <input type="text" name="email" class="form-control border border-dark " value="<?= $row['email'] ?>" <?php


                                                                                                                                                        ?>>
                                             </div> -->





                                                            <div class="col-sm-3 ">
                                                                <label class="mt-3">Birth_date <B style="color:red">*</B></label>
                                                                <input type="date" name="birthdate" class="form-control " value="<?= $row['birthdate'] ?>" <?php


                                                                                                                                                            ?>>
                                                            </div>



                                                            <div class="col-sm-4  ">
                                                                <label class="mt-3">Birth_place <B style="color:red">*</B></label>
                                                                <input type="text" name="birthplace" class="form-control " value="<?= $row['birthplace'] ?>" <?php

                                                                                                                                                                ?>>
                                                            </div>



                                                            <div class="col-sm-3">
                                                                <label class="mt-3">Civil_status</label>
                                                                <input type="text" name="civil_status" class="form-control " value="<?= $row['civil_status'] ?>" <?php


                                                                                                                                                                    ?> required>
                                                            </div>





                                                            <div class="col-sm-2 mb-3 ">
                                                                <label class="mt-3">Height(cm)</label>
                                                                <input type="text" name="height" class="form-control " value="<?= $row['height'] ?>" <?php


                                                                                                                                                        ?>>
                                                            </div>




                                                            <div class="col-sm-2 mb-3 ">
                                                                <label class="mt-3">Weight(Kg)</label>
                                                                <input type="text" name="weight" class="form-control " value="<?= $row['weight'] ?>" <?php

                                                                                                                                                        ?>>
                                                            </div>


                                                            <div class="col-sm-2 mb-3">

                                                                <label class="mt-3">Gender <B style="color:red">*</B></label>

                                                                <select name="gender" class="form-control bg-light" required>
                                                                    <option value="">--Select--</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>

                                                                </select>
                                                            </div>












                                                            <div class="col-sm-3 mb-3">
                                                                <label class="mt-3">Religion <B style="color:red">*</B></label>
                                                                <input type="text" name="religion" class="form-control " value="<?= $row['religion'] ?>" <?php


                                                                                                                                                            ?> required>
                                                            </div>


                                                        </div>
                                                </div>
                                                <!-- dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->





                                                <div class="container-fluid  mb-4 border border-1" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden">
                                                    <h4 class="container-fluid mt-2 mb-4">
                                                        <h5 class=" text-center  text-dark mb-2" style=" font-family:Segoe UI; color:white;">ADDRESS INFORMATION</h3>

                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-2 mb-3">
                                                                    <label class="mt-3">House_Number</label>
                                                                    <input type="text" name="unit_number" class="form-control" value="<?= $row['unit_number'] ?>" <?php


                                                                                                                                                                    ?>>
                                                                </div>


                                                                <div class="col-sm-2 mb-3 ">
                                                                    <label class="mt-3">Street <B style="color:red">*</B></label>
                                                                    <input type="text" name="street" class="form-control " value="<?= $row['street'] ?>" <?php


                                                                                                                                                            ?>required>
                                                                </div>

                                                                <div class="col-sm-2 mb-3 ">
                                                                    <label class="mt-3">Barangay <B style="color:red">*</B></label>
                                                                    <input type="text" name="barangay" class="form-control" value="<?= $row['barangay'] ?>" <?php


                                                                                                                                                            ?> required>
                                                                </div>



                                                                <div class="col-sm-2 mb-3 ">
                                                                    <label class="mt-3">District</label>
                                                                    <input type="text" name="district" class="form-control" value="<?= $row['district'] ?>" <?php

                                                                                                                                                            ?>>
                                                                </div>






                                                                <div class="col-sm-1 mb-3">
                                                                    <label class="mt-3">Zip_code <B style="color:red">*</B></label>
                                                                    <input type="text" name="zip_code" class="form-control  " value="<?= $row['zip_code'] ?>" <?php



                                                                                                                                                                ?>required>
                                                                </div>



                                                                <div class="col-sm-3 mb-3">
                                                                    <label class="mt-3">City <B style="color:red">*</B></label>
                                                                    <input type="text" name="city" class="form-control " value="<?= $row['city'] ?>" <?php



                                                                                                                                                        ?> required>
                                                                </div>

                                                            </div>
                                                </div>





                                                <div class="container-fluid border border-1" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden">
                                                    <h4 class="container-fluid  mt-2 mb-4">
                                                        <h5 class=" text-center text-dark  mb-2" style=" font-family:Segoe UI; color:white;">PARENT / GUARDIAN INFORMATION</h3>

                                                            <br>
                                                            <div class="row">

                                                                <div class="col-sm-4">
                                                                    <label class="mt-3">Parent_name</label>
                                                                    <input type="text" name="parent_name" class="form-control " value="<?= $row['parent_name'] ?>" <?php

                                                                                                                                                                    ?>>
                                                                </div>

                                                                <div class="col-sm-4 ">
                                                                    <label class="mt-3">Parent_occupation</label>
                                                                    <input type="text" name="parent_occupation" class="form-control " value="<?= $row['parent_occupation'] ?>" <?php

                                                                                                                                                                                ?>>
                                                                </div>

                                                                <div class="col-sm-4 ">
                                                                    <label class="mt-3">Parent_contact_no</label>
                                                                    <input type="text" name="parent_contact_no" maxlength="11" class="form-control " value="<?= $row['parent_contact_no'] ?>" <?php


                                                                                                                                                                                                ?>>
                                                                </div>

                                                                <div class="col-sm-4 ">
                                                                    <label class="mt-3">Guardian_name</label>
                                                                    <input type="text" name="guardian_name" class="form-control " value="<?= $row['guardian_name'] ?>" <?php

                                                                                                                                                                        ?>>
                                                                </div>



                                                                <div class="col-sm-4">
                                                                    <label class="mt-3">Guardian_occupation</label>
                                                                    <input type="text" name="guardian_occupation" class="form-control " value="<?= $row['guardian_occupation'] ?>" <?php


                                                                                                                                                                                    ?>>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="mt-3">Guardian_contact_no</label>
                                                                    <input type="text" name="guardian_contact_no" maxlength="11" class="form-control " value="<?= $row['guardian_contact_no'] ?>" <?php

                                                                                                                                                                                                    ?>>
                                                                </div>



                                                                <div class="col-sm-3 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                                </div>

                                                                <div class="col-sm-3 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                                </div>


                                                                <div class="col-sm-3 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                                </div>
                                                                <div class="col-sm-2 mt-2 d-flex justify-content-start align-items-center" class="form-control ">

                                                                </div>


                                                                <div class="col-sm-1 mt-2 d-flex justify-content-start align-items-center" class="form-control ">
                                                                    <input type="submit" name="<?= $action ?>" value="<?= $btn_value ?>" class="btn btn-success btn-sm mb-3" style="margin-top:33px">
                                                                </div>




                                                            </div>
                                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



















































        <!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">

        </div>
        <strong>&copy;<a href="https://adminlte.io"> Divine Healer Academy of Sorsogon</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<style>
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        /* additional CSS properties */
    }
</style>

<script src="../template-files/vendors/scripts/core.js"></script>
<script src="../template-files/vendors/scripts/script.min.js"></script>
<script src="../template-files/vendors/scripts/process.js"></script>
<script src="../template-files/vendors/scripts/layout-settings.js"></script>
<script src="../template-files/src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="../template-files/vendors/scripts/steps-setting.js"></script>
<script src="../template-files/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="../template-files/sweetalert/sweetalert2.min.js"></script>






<style type="text/css">
    .elements {
        position: absolute;
        left: 0;
        right: 0;
    }

    #boi {}

    #regiration_form fieldset:not(:first-of-type) {
        display: none;
    }
</style>


<script>
    $(document).ready(function() {
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });
</script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_GET['studa'])) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Successfully Login to Student Dashboard!'
        })
    </script>

<?php endif; ?>







<?php if (isset($_GET['edited'])) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Successfully Updated!'
        })
    </script>

<?php endif; ?>







<?php if (isset($_GET['added'])) : ?>
    <script>
        Swal.fire(
            'Wait for Admin Approval',
            'Information has been Sent to Admin',
            'success'
        )
    </script>
<?php endif; ?>





<?php if (isset($_GET['Cont'])) : ?>
    <script>
        Swal.fire({
            title: 'Error!',
            text: 'Contact Number has been used by other',
            icon: 'error',
            confirmButtonText: 'Logout your Account then Change Contact number '
        })
    </script>
<?php endif; ?>






<script>
    function loadData() {
        var student_type = document.getElementById("student_type").value;

        if (student_type == "transferee") {
            // Send AJAX request to the PHP file that will return the data
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Append the response to the HTML element with id "loaddata"
                    document.getElementById("loaddata").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "loaddata.php", true);
            xmlhttp.send();
        } else {
            // Clear the HTML element with id "loaddata"
            document.getElementById("loaddata").innerHTML = "";
        }
    }
</script>



<script>
    function loadDatas() {
        var GRADE_LEVEL_ID = document.getElementById("GRADE_LEVEL_ID").value;

        if (GRADE_LEVEL_ID == "23" || GRADE_LEVEL_ID == "24") {
            // Send AJAX request to the PHP file that will return the data
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Append the response to the HTML element with id "loaddatas"
                    document.getElementById("loaddatas").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "loaddatas.php?GRADE_LEVEL_ID=" + GRADE_LEVEL_ID, true);
            xmlhttp.send();
        } else {
            // Clear the HTML element with id "loaddatas"
            document.getElementById("loaddatas").innerHTML = "";
        }
    }
</script>


<script>
    $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
            title: 'Notice',
            body: 'Your Pre-registration request has now been Approved this means you can now have your Enrollment form that was created by the Adminitrator .'
        })
    });
</script>








<?php
ob_end_flush();
?>



<?php include('includes/footer.php'); ?>