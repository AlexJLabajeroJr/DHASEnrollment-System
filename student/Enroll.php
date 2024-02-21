<?php


ob_start();
session_start();


if (!isset($_SESSION['student_id'])) {
   header("location: ../index.php");
}


include '../db_con.php';
include('includes/header.php');



if (isset($_POST['refresh'])) {
   header('location:dashboard.php');
}


$emai = $_SESSION['email'];
$pass = $_SESSION['pass'];


$findIfEnroll = "SELECT * from enrollment WHERE student_id = '$_SESSION[student_id]'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



$stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$_SESSION[student_id]'";
$des = mysqli_query($conn, $stat);
$statko = mysqli_fetch_assoc($des);


$staf = "SELECT * from student WHERE status = 'Approved' && student_id = '$_SESSION[student_id]'";
$dest = mysqli_query($conn, $staf);
$statkoyz = mysqli_fetch_assoc($dest);


$stafota = "SELECT * from student WHERE status = 'Decline' && student_id = '$_SESSION[student_id]'";
$destab = mysqli_query($conn, $stafota);
$statopak = mysqli_fetch_assoc($destab);







$sql = "Select * from student where student_id = '$_SESSION[student_id]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();


if (isset($row['p_p'])) {
   $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
   $searchIMResult = $conn->query($setIM);
   $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
   // Handle the error condition when 'p_p' key is not defined in $row array.
}


?>

<script type="text/javascript">
   function toggle_check() {
      var checkboxes = document.getElementsByName('selectedSubjects[]');
      var button = document.getElementById('toggle');

      if (button.value == 'check all') {
         for (var i in checkboxes) {
            checkboxes[i].checked = 'FALSE';
         }
         button.value = 'uncheck all'
      } else {
         for (var i in checkboxes) {
            checkboxes[i].checked = '';
         }
         button.value = 'check all';
      }
   }
</script>




<style>
   @media print {
      #printBtn {
         display: none;
      }

      .con {
         width: 100%;
      }

      .logo-img {}

   }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="wrapper">
   <!-- Preloader -->
   <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/aa.png" alt="AdminLTELogo" height="60" width="60">
   </div> -->

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

            <li class="nav-item menu-open ">
               <a href="#" class="nav-link  active text-light">
                  <i class="nav-icon fas fa-book text-light"></i>
                  <p>
                     Enrollment
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="Enroll.php" class="nav-link active bg-light ">
                        <i class="far fa-dot-circle nav-icon text-dark"></i>
                        <p>My Enrollment Form</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="class.php" class="nav-link text-light ">
                        <i class="far fa-circle nav-icon text-light"></i>
                        <p>My Class</p>
                     </a>
                  </li>


               </ul>

            </li>
            <li class="nav-item ">
               <a href="" class="nav-link  text-light">
                  <i class="nav-icon far fa-envelope text-light"></i>
                  <p>
                     Notification
                     <i class="right fas fa-angle-left text-light"></i>
                  </p>
               </a>

               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="notification.php" class="nav-link  text-light">
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
                     <li class="breadcrumb-item active">Enroll Your Subjects</li> -->
                  </ol>
               </div>
            </div>
         </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  <div class="card">

                     <!-- /.card-header -->

                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div class="">
                     <div>

                        <!-- <php include('faculty_message.php'); ?> -->



                        <div>


                           <div class="">
                              <!-- /.card-header -->
                              <div class="">


                                 <div class="">

                                    <?php

                                    if (isset($row['status']) == '') {
                                    ?>
                                       <script>
                                          Swal.fire({
                                             title: '<b class = " text-warning" > &nbsp <i>Fill out the Pre-registration Form</i> </b>',
                                             text: 'Then wait for the Admin Approval',
                                             icon: 'warning',

                                             showCloseButton: true,
                                             // showCancelButton: true,
                                             focusConfirm: false,
                                             confirmButtonText: '<a href="dashboard.php" class = "text-light text-bold">Fill out now!</a>',
                                             confirmButtonAriaLabel: 'Thumbs up, great!'

                                          })
                                       </script>
                                    <?php


                                    } else if ($statko) {
                                    ?>
                                       <script>
                                          Swal.fire({
                                             title: '<b class = "  text-success" ><i>Pre-registration request is pending</i> </b>',
                                             text: 'Wait for the Admin Approval',
                                             icon: 'info',

                                             showCloseButton: true,
                                             // showCancelButton: true,
                                             focusConfirm: false,
                                             confirmButtonText: '<a href="dashboard.php" class = "text-light text-bold">Back to Dashboard</a>',
                                             confirmButtonAriaLabel: 'Thumbs up, great!'

                                          })
                                       </script>
                                    <?php

                                    } else if ($statkoyz) {
                                    ?>
                                       <script>
                                          Swal.fire({
                                             title: '<b class = "  text-success" ><i>You can now Proceed to Payment !</i> </b>',
                                             text: 'Print this form and pass the needed requirements',
                                             icon: 'success',

                                             showCloseButton: true,
                                             // showCancelButton: true,
                                             focusConfirm: false,
                                             confirmButtonText: '<a href="#" class = "text-light text-bold">Okay</a>',
                                             confirmButtonAriaLabel: 'Thumbs up, great!'

                                          })
                                       </script>
                                    <?php
                                    } else if ($statopak) {
                                    ?>
                                       <script>
                                          Swal.fire({

                                             title: '<b class = " text-red" > &nbsp<b>Your Pre-registration request has been Declined!</b> </b>',
                                             text: 'This is due to maximum student request',
                                             icon: 'error',

                                             showCloseButton: true,
                                             // showCancelButton: true,
                                             focusConfirm: false,
                                             confirmButtonText: '<a href="dashboard.php" class = "text-light text-bold">Okay!</a>',
                                             confirmButtonAriaLabel: 'Thumbs up, great!'

                                          })
                                       </script>
                                    <?php
                                    }
                                    ?>

                                    <style>
                                       @media print {
                                          #printBtn {
                                             display: none;
                                          }

                                          .con {
                                             width: 100%;
                                          }

                                          .logo-img {}

                                       }
                                    </style>





                                    <?php

                                    $Display = False;

                                    if ($findIfEnrollresultrow != null) {


                                       $sup = $_SESSION['student_id'];
                                       $query = "SELECT * from student WHERE student_id = $sup";
                                       $result = mysqli_query($conn, $query);
                                       $row = mysqli_fetch_assoc($result);



                                       $sql1 = "Select * from enrollment where student_id = '$_SESSION[student_id]'";
                                       $result1 = $conn->query($sql1);
                                       $row1 = $result1->fetch_assoc();


                                       // $searchSem = "Select * from schedule where subject_id = '$_SESSION[subject_id]'";
                                       // $searchSemResult = $conn->query($searchSem);
                                       // $searchSemResultRow = $searchSemResult->fetch_assoc();


                                       $supit = $_SESSION['student_id'];
                                       $query = "SELECT * from `student` s, `grade_level` c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID &&student_id = $supit";
                                       $result = mysqli_query($conn, $query);
                                       $row2 = mysqli_fetch_assoc($result);


                                       echo "<div class = 'container mt-5'>";
                                       echo "<div class = 'row'>";


                                       echo "<div class = ''>";
                                       echo "<span class='h5 font-weight-bold pl-5 pr-5 pt-2 pb-2 border border-dark'>STUDENT_COPY</span>";
                                       echo "</div>";

                                       echo "<div class = 'col-sm-2 col-4'>";
                                       echo "<img src='../img/log.png' alt='logo' class='d-block logo-img' height='100' width='150' style='margin-left: 50px'>";
                                       echo "</div>";

                                       echo "<div class = 'col-sm-5 col-4 text-left '>";
                                       echo "<h5>DIVINE HEALER ACADEMY OF SORSOGON</h5>";
                                       echo "<p style='font-size: 15px'>EL Retiro Compound, Cabid-an, Sor. City</p>";
                                       echo "</div>";

                                       echo "<div class = 'col-sm-1'>";
                                       echo "</div>";

                                       echo "<div class = 'col-sm-1'>";
                                       echo "</div>";

                                       echo "</div>";
                                       echo "</div>";
                                       // okeyy ini prob

                                       echo "<div class = 'container>";
                                       echo "<div class = 'row'>";


                                       // sssssssssssssssssssssssssssssssssssssssssssssss

                                       echo '<div class="container">';

                                       echo '<div class="row">';
                                       echo ' <div class="col-4 d-flex align-items-center">';
                                       echo '<h4>STUDENT NAME: </h4>';

                                       echo '</div>';
                                       echo '<div class="col-4 mt-3 text-center" style="font-size: 25px;">';
                                       echo ' <p style="margin-bottom: 0px;">' . $row['last_name'] . ' ' . $row['first_name'] . ', ' . $row['suffix_name'] . ', ' . $row['middle_name'] . '.</p>';
                                       echo '  <div style="border-bottom: 2px solid black"></div>
                                           </div>';
                                       echo ' <div class="col-4 text-center">';
                                       echo ' <p class="mt-3" style="font-size: 13px">Date registered: ' . $row1['enrollment_date'] . '</p>';
                                       echo ' </div>';
                                       echo '</div>';

                                       echo '<div class="row">';
                                       echo ' <div class="col-3">';
                                       echo ' <div class="d-flex">';
                                       echo ' <h5>Reg Status: </h5>';
                                       echo '<div>';
                                       echo ' <p class="ml-5" style="margin-bottom: 0px !important;">' . $row['student_type'] . '</p>';
                                       echo ' <div style="border-bottom: 2px solid black; width: 70px; margin-left: 30px !important"></div>';
                                       echo '</div>';
                                       echo '</div>';


                                       echo '<div class="d-flex mt-3">';
                                       echo '<p class="h5">Curriculum Year:</p>';
                                       echo '<div class="ml-5">';
                                       echo '<input value="' . $searchYrRow['school_year'] . '" class=" form-control input-xs  border border-0 text-center">';
                                       echo '<div style="border-bottom: 2px solid black; width: 70px;">';

                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';





                                       echo '</div>';
                                       echo ' <div class="col-3 mt-2">';
                                       echo '<div class="d-flex">';
                                       echo '<h5>Grade_level:</h5>';
                                       echo ' <div>';


                                       echo '  <p style="margin-bottom: 0px !important;" class="ml-5">' . $row2['GRADE_LEVEL'] . '</p>';
                                       echo ' <div style="border-bottom: 2px solid black; width: 70px; margin-left: 28px !important"></div>';
                                       echo ' </div>';
                                       echo ' </div>';

                                       if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') {
                                          echo '<div>';
                                          echo '<div class="d-flex">';
                                          echo '<p class="mt-2" style="font-weight: bold;">Strand:</p>';
                                          echo '<div>';
                                          echo ' <p class="mt-2 ml-5" style="margin-bottom: 0px;">GAS</p>';
                                          echo ' <div style="border-bottom: 2px solid black; width: 70px; margin-left: 28px !important">
                                                 </div>';
                                          echo ' </div>';
                                          echo '</div>';
                                          echo ' </div>';
                                       } else {
                                          echo '<div>';
                                          echo '</div>';
                                       }

                                       echo '</div>';

                                       if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') {

                                          echo '<div class="col-3 d-flex mt-2">
                                           <h5>SY/SEMESTER:</h5>';
                                          echo '<div class="ml-3">';
                                          echo '<p class="ml-2" style="margin-bottom: 0px;">
                                               ' . $searchSetResultRow['SEMESTER'] . '
                                           
                                             </p>';
                                          echo ' <div style="border-bottom: 2px solid black; width: 70px; margin-left:5px;">';

                                          echo ' </div>';
                                          echo '</div>';
                                          echo '</div>';
                                       } else {

                                          echo ' <div class="col-3 d-flex mt-2">
                                         </div>';
                                       }

                                       echo '<div class="col-3">';
                                       echo ' <h5 class="mt-2 ml-4" style="font-size: 15px; font-weight: bolder;">Enrollment_Status:</h5>';
                                       echo '<p class="ml-3 p-1 text-center" style="border:  1px solid #000; width: 110px">TO PAY</p>';
                                       echo ' </div>';

                                       echo '</div>';

                                       echo '<div>';



                                       echo '<p class="text-dark text-center text-uppercase">Your  Subjects</p>';
                                    } else {
                                       echo '<p class="text-dark text-center text-uppercase"></p>';
                                    }





                                    $sql = "Select * from student where status = 'Approved' &&  student_id = '$_SESSION[student_id]'";
                                    $result = $conn->query($sql);
                                    if (mysqli_num_rows($result) > 0) {

                                       $Display = True;

                                       if ($Display) {

                                          echo "<div class  = 'container-fluid' >";
                                          echo "<div class  = 'row' >";
                                          echo "<div class  = 'col-sm-10' >";
                                          echo '<p>&nbsp</>';
                                          echo "</div>";



                                          echo "<div class  = 'col-sm-2' >";
                                          // if ($findIfEnrollresultrow == null) {

                                          //    echo '<input type="button" id="toggle"class="btn btn-light btn btn-sm border border-secondary" value="check all" onclick="toggle_check()">';
                                          // }
                                          echo "</div>";
                                          echo "</div>";
                                          echo "</div>";


                                    ?>
                                          <div class="table-responsive ">

                                             <form action="enroll_process.php" method="post">
                                                <table class="table table-hover mb-0 text-center">
                                                   <thead class="bg-light ">


                                                      <th> Subject_Description </th>
                                                      <th> Subject_code </th>
                                                      <th> Room </th>
                                                      <th> Grade_level </th>
                                                      <th> Start_time </th>
                                                      <th> End_time </th>
                                                      <th> Day </th>

                                                      <!-- <php
                                                   if ($findIfEnrollresultrow == null) {
                                                      echo '<th> Enroll_subject </th>';
                                                   }
                                                   echo '</tr>';
                                                   ?> -->
                                                   </thead>

                                                   <tbody>
                                                      <?php
                                                      $supa = $_SESSION['student_id'];
                                                      $query = "SELECT GRADE_LEVEL_ID from student WHERE student_id = $supa";
                                                      $result = mysqli_query($conn, $query);

                                                      $row = mysqli_fetch_assoc($result);
                                                      $GRADE_LEVEL_ID =  $row['GRADE_LEVEL_ID'];


                                                      // echo $_SESSION['user_id'];




                                                      $getSched = mysqli_query($conn, "SELECT * FROM `subject` as subj  INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id  INNER JOIN grade_level as v ON sched.GRADE_LEVEL_ID= v.GRADE_LEVEL_ID ");

                                                      $getSem = mysqli_query($conn, "SELECT * FROM `tblsemester` WHERE SETSEM = 1");

                                                      $sem = mysqli_fetch_assoc($getSem)['SEMESTER'];


                                                      while ($row = mysqli_fetch_assoc($getSched)) {
                                                         if ($row['GRADE_LEVEL_ID'] == $GRADE_LEVEL_ID) {

                                                            if ($row['sched_semester'] == $sem or $row['sched_semester'] == 'Quarter') {

                                                               echo '<tr>';

                                                               echo '<td>' . $row['subject_description'] . '</td>';
                                                               echo '<td>' . $row['subject_code'] . '</td>';
                                                               echo '<td>' . $row['room_name'] . '</td>';
                                                               echo '<td>' . $row['GRADE_LEVEL'] . '</td>';
                                                               // echo '<td>'.$row['faculty_fname'].'</td>';
                                                               // echo '<td>'.$row['faculty_lname'].'</td>';
                                                               echo '<td>' . date("g:iA", strtotime($row['start_time'])) . '</td>';
                                                               echo '<td>' . date("g:iA", strtotime($row['end_time'])) . '</td>';
                                                               echo '<td>' . $row['day'] . '</td>';

                                                               // if ($findIfEnrollresultrow == null) {
                                                               //    echo '<td><input type="checkbox" name="selectedSubjects[]" value="' . $row['subject_id'] . '"/></td>';
                                                               // }
                                                               echo '</tr>';
                                                            }
                                                         }
                                                      }
                                                      ?></tbody>
                                                </table>
                                                <br>



                                                <div class="container">
                                                   <div class="row">


                                                      <div class="col-sm-11">

                                                      </div>



                                                      <div class="col-sm-1">
                                                         <!-- <php
                                                      if ($findIfEnrollresultrow == null) {
                                                         echo '<input type="submit" class="btn btn-success btn-sm" value="Enroll Subjects" />';
                                                      }

                                                      ?> -->
                                                      </div>


                                                   </div>
                                                </div>


                                             </form>

                                          </div>







                                          <?php

                                          $Display = False;

                                          if ($findIfEnrollresultrow != null) {


                                             echo '<div class="row">';
                                             if ($row2['GRADE_LEVEL'] == '1' || $row2['GRADE_LEVEL'] == '2' || $row2['GRADE_LEVEL'] == '3' || $row2['GRADE_LEVEL'] == '4' || $row2['GRADE_LEVEL'] == '5' || $row2['GRADE_LEVEL'] == '6') {



                                                echo '<div class="col-4">';
                                                echo '<table class="table table-bordered">';
                                                echo '<thead>';
                                                echo ' <tr class="text-center">';
                                                echo '<th colspan="2">CHARGES</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                echo '<tr>';
                                                echo '<th scope="row">Miscellaneous Fee:</th>';
                                                echo '<td>₱ 300.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">PTA Contribution:</th>';
                                                echo '<td>₱ 150.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">Donation Tuition Fee:</th>';
                                                echo '<td>₱ 1000.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">Total:</th>';
                                                echo '<td>₱ 1450</td>';
                                                echo '</tr>';
                                                echo '</tbody>';
                                                echo ' </table>';
                                                echo '</div>';
                                             } else {
                                                echo '<div class="col-4">';
                                                echo '<table class="table table-bordered">';
                                                echo '<thead>';
                                                echo '<tr class="text-center">';
                                                echo ' <th colspan="2">CHARGES</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                echo '<tr>';
                                                echo '<th scope="row">Miscellaneous Fee:</th>';
                                                echo '<td>₱ 500.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo ' <th scope="row">Labaratory Fee:</th>';
                                                echo '<td>₱ 150.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">PTA Contribution:</th>';
                                                echo '<td>₱ 120.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">Donation Tuition Fee:</th>';
                                                echo '<td>₱ 2000.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">Sports Fee:</th>';
                                                echo ' <td>₱ 50.00</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row">Total:</th>';
                                                echo '<td>₱ 2820.00</td>';
                                                echo ' </tr>';
                                                echo '</tbody>';
                                                echo ' </table>';
                                                echo '</div>';
                                             }






                                             if ($row2['GRADE_LEVEL'] == '1' || $row2['GRADE_LEVEL'] == '2' || $row2['GRADE_LEVEL'] == '3' || $row2['GRADE_LEVEL'] == '4' || $row2['GRADE_LEVEL'] == '5' || $row2['GRADE_LEVEL'] == '6') {

                                                echo '<div class="col-8">';
                                                echo '<table class="table table-bordered table-sm">';
                                                echo '<thead>';
                                                echo ' <tr class="text-center">';
                                                echo ' <th colspan="2">REQUIREMENTS</th>';
                                                echo ' </tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                echo '<tr>';
                                                echo '<th scope="row">
                                                    APPLIED TO ALL LEVEL</th>';
                                                echo ' <th scope="row">
                                                    ELEMENTARY</th>';
                                                echo '</tr>';
                                                echo ' <tr>';

                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal">
                                                    PSA Birthcertificate</th>';
                                                echo '<td>Good Moral</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal">
                                                    Baptismal
                                                  </th>';
                                                echo '<td>Form 137</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> DSWD Card</th>';

                                                echo '</tr>';
                                                echo ' <tr>';
                                                echo ' <th scope="row" style="font-weight:normal"> 4pc 2x2 picture</th>';

                                                echo ' </tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> Medical Record</th>';

                                                echo '</tr>';
                                                echo '<tr>';
                                                echo ' <th scope="row" style="font-weight:normal"> Entrance Examination</th>';

                                                echo ' </tr>';

                                                echo '</tbody>';
                                                echo '</table>';
                                                echo '</div>';
                                             } elseif ($row2['GRADE_LEVEL'] == '7' || $row2['GRADE_LEVEL'] == '8' || $row2['GRADE_LEVEL'] == '9' || $row2['GRADE_LEVEL'] == '10') {

                                                echo ' <div class="col-8">';
                                                echo ' <table class="table table-bordered table-sm">';
                                                echo ' <thead>';
                                                echo ' <tr class="text-center">';
                                                echo ' <th colspan="2">REQUIREMENTS</th>';
                                                echo ' </tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                                echo '<tr>';
                                                echo ' <th scope="row">
                                                    APPLIED TO ALL LEVEL</th>';
                                                echo '<th scope="row">
                                                    JUNIOR HIGH SCHOOL</th>';
                                                echo '</tr>';
                                                echo '<tr>';

                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal">
                                                    PSA Birthcertificate</th>';
                                                echo '<td>Good Moral</td>';
                                                echo '</tr>';
                                                echo ' <tr>';
                                                echo '<th scope="row" style="font-weight:normal">
                                                    Baptismal
                                                  </th>';
                                                echo '<td>Form 137</td>';
                                                echo '</tr>';
                                                echo ' <tr>';
                                                echo '<th scope="row" style="font-weight:normal"> DSWD Card</th>';
                                                echo ' <td>Barangay Clearance Certificate</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> 4pc 2x2 picture</th>';

                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> Medical Record</th>';

                                                echo '</tr>';
                                                echo '<tr>';
                                                echo ' <th scope="row" style="font-weight:normal"> Entrance Examination</th>';

                                                echo '</tr>';

                                                echo '</tbody>';
                                                echo '</table>';
                                                echo ' </div>';
                                             } else {


                                                echo '<div class="col-8">';
                                                echo '<table class="table table-bordered table-sm">';
                                                echo '<thead>';
                                                echo '<tr class="text-center">';
                                                echo '<th colspan="2">REQUIREMENTS</th>';
                                                echo '</tr>';
                                                echo ' </thead>';
                                                echo '<tbody>';
                                                echo '<tr>';
                                                echo '<th scope="row">
                                                    APPLIED TO ALL LEVEL</th>';
                                                echo '<th scope="row">
                                                    SENIOR HIGH SCHOOL</th>';
                                                echo '</tr>';
                                                echo '<tr>';

                                                echo ' <tr>';
                                                echo '<th scope="row" style="font-weight:normal">
                                                    PSA Birthcertificate</th>';
                                                echo '<td>Good Moral</td>';
                                                echo '</tr>';
                                                echo ' <tr>';
                                                echo ' <th scope="row" style="font-weight:normal">
                                                    Baptismal
                                                  </th>';
                                                echo '<td>Form 137</td>';
                                                echo ' </tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> DSWD Card</th>';
                                                echo '<td>Barangay Clearance Certificate</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> 4pc 2x2 picture</th>';
                                                echo ' <td> Permanent Record (SF10)</td>';

                                                echo ' </tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> Medical Record</th>';

                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<th scope="row" style="font-weight:normal"> Entrance Examination</th>';

                                                echo '</tr>';

                                                echo '</tbody>';
                                                echo '</table>';
                                                echo '</div>';
                                             }




                                             echo ' <div class="col-8">';
                                             echo '<h6>PROMISSORY NOTE:</h6>';
                                             echo ' <p style="text-align: justify;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa blanditiis molestiae cum, dolorem ea distinctio nemo delectus quia sunt earum accusantium iste nostrum veritatis sequi natus tenetur accusamus. Sequi, eum itaque officia voluptatibus saepe nisi dicta qui, omnis necessitatibus hic doloremque rerum nesciunt aliquam mollitia earum facere quia fugit molestiae.
                                           </p>';
                                             echo '</div>';


                                             echo ' <div class="col-8">';
                                             echo '<h6>DISCLAIMER:</h6>';
                                             echo ' <p style="text-align: justify;">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa blanditiis molestiae cum, dolorem ea distinctio nemo delectus quia sunt earum accusantium iste nostrum veritatis sequi natus tenetur accusamus. Sequi, eum itaque officia voluptatibus saepe nisi dicta qui, omnis necessitatibus hic doloremque rerum nesciunt aliquam mollitia earum facere quia fugit molestiae.
                                           </p>';
                                             echo '</div>';



                                             echo '</div>';


                                             echo '<div class="row">';

                                             echo '<div class="col-6 text-center">';
                                             echo '<p class="text-uppercase" style="text-decoration: underline; margin-bottom: 0px">MRS. Angela PANcho</p>';
                                             echo '<p class="ml-3">Registar</p>';
                                             echo '</div>';

                                             echo '<div class="col-6 text-center">';
                                             echo '<p class="text-uppercase" style="text-decoration: underline; margin-bottom: 0px">Sr. ODELLE B. GOLLOSO</p>';
                                             echo '<p class="ml-4">School Director</p>';
                                             echo '</div>';
                                             echo '</div>';
                                             echo '<br>';

                                             //-------------------- 
                                             echo '<div class="container-fluid">';
                                             echo '<div class="row">';

                                             echo '<div class="col-sm-9 text-center">';
                                             echo '</div>';

                                             echo '<div class="col-sm-2 text-center">';
                                             echo '<button type="button" id="printBtn" onclick=" printPart()" class="btn btn-block btn-primary">Print</button>';
                                             echo '</div>';
                                             echo '</div>';
                                             //------------------------
                                             echo '</div>';
                                          } else {
                                          }
                                          ?>






                                    <?php
                                       }
                                    }

                                    ?>


                                 </div>



                                 <script>
                                    function printPart() {
                                       window.print();
                                    }
                                 </script>




                              </div>

                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
      </section>

      <!-- /.content -->
   </div>

   <!-- /.content-wrapper -->
   <!-- <footer class="main-footer">
      <div class="float-right d-none d-sm-block">

      </div>
      <strong>&copy;<a href="https://adminlte.io"> Divine Healer Academy of Sorsogon</a>.</strong> All rights reserved.
   </footer> -->

   <!-- Control Sidebar -->
   <!-- <aside class="control-sidebar control-sidebar-dark">
  
   </aside> -->
   <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_GET['app'])) : ?>
   <script>
      Swal.fire(
         'Information',
         'Admin Successfully Approved!',
         'success'
      )
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

<?php
ob_end_flush();
?>



<?php include('includes/footer.php'); ?>