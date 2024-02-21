<?php


// ob_start();
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("location: ../index.php");
}


$page_title = "Admin Enrollment Copy ";


include '../db_con.php';
include('includes/header.php');




if (isset($_POST['refresh'])) {
  header('location:dashboard.php');
}


$emai = $_SESSION['emai'];
$pass = $_SESSION['pass'];

$stud_id = $_GET['student_id'];


$findIfEnroll = "SELECT * from enrollment WHERE student_id = '$stud_id'";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



$stat = "SELECT * from student WHERE  status = 'Pending' && student_id = '$stud_id'";
$des = mysqli_query($conn, $stat);
$statko = mysqli_fetch_assoc($des);



$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();



$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();




?>



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
          <img src="<?php echo $searchInResultRow['p_p']; ?>" height="35px" /> &nbsp
          <?= $row['name'] ?>
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
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <br>
                <img src="<?php echo $searchInResultRow['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8" height="100px" />


              </div>

              <div class="col-sm-12 text-center">
                <div class="pull-left info">
                  <p style="font-size:15px; font-size:20px;
font-family:Segoe Script;" class="text-dark text-bold"><b> Hello! <?= $row['name'] ?></b></p>
                  <p style="font-size:15px">Administrator</p>
                </div>

              </div>

              <div class="col-sm-12 text-center mt-3">

                <a href="logout.php" class="nav-link text-dark">


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
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #670000">
    <!-- Brand Logo -->
    <a href="Dashboard_admin.php" class="brand-link">
      <img src="../img/saddd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold text-warning text-center" style="font-size:11px;">Divine Healer Academy of Sorsogon</span>

    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=" <?php echo $searchInResultRow['p_p']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>


        <div class="info">

          <!-- <p><?= $_SESSION['auth_user']['email']; ?></p> -->
          <a><?= $_SESSION['auth_user']['username']; ?></a>
        </div>
      </div>


      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar  bg-light border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar bg-light border border-1">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->


      <!-- Sidebar Menu -->
      <?php include('includes/Navbar.php'); ?>

    </div>
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
              <li class="breadcrumb-item active">Notification</li> -->
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

            <div class="card">
              <div>
                <div>


                  <div class="card-body">
                    <!-- /.card-header -->
                    <div class="card-body">





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



                      // $sup = $_SESSION['student_id'];
                      $query = "SELECT * from student WHERE student_id = '$stud_id'";
                      $result = mysqli_query($conn, $query);
                      $row = mysqli_fetch_assoc($result);



                      $sql1 = "Select * from enrollment where student_id = '$stud_id'";
                      $result1 = $conn->query($sql1);
                      $row1 = $result1->fetch_assoc();





                      // $supit = $_SESSION['student_id'];
                      $query = "SELECT * from `student` s, `grade_level` c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID &&student_id = '$stud_id'";
                      $result = mysqli_query($conn, $query);
                      $row2 = mysqli_fetch_assoc($result);

                      // print_r($row1);


                      echo "<div class = 'container mt-5'>";
                      echo "<div class = 'row'>";


                      echo "<div class = 'mt-4 '>";
                      echo "<span class='h5 font-weight-bold pl-5 pr-5 pt-2 pb-2 border border-dark'>ADMINISTRATOR COPY</span>";
                      echo "</div>";

                      echo "<div class = 'col-sm-2 col-4'>";
                      echo "<img src='../img/log.png' alt='logo' class='d-block logo-img' height='100' width='150' style='margin-left: 50px'>";
                      echo "</div>";

                      echo "<div class = 'col-sm-5 col-4 text-left mt-6'>";
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





                      ?>




                      <?php

                      // $schlYear = "Select * from school_year where school_year_id = '$_SESSION[schlYear]'";
                      // $schlYearResult = $conn->query($schlYear);
                      // $schlYearResultRow = $schlYearResult->fetch_assoc();



                      $setSem = "Select * from tblsemester where SETSEM= '1'";
                      $searchSemResult = $conn->query($setSem);
                      $searchSetResultRow = $searchSemResult->fetch_assoc();




                      ?>


                      <?php


                      echo "<div>";



                      ?>


                      <div class="container">

                        <div class="row">
                          <div class="col-4 d-flex align-items-center">
                            <h4>STUDENT NAME: </h4>
                            <!-- <p class="mt-2 ml-3" style="font-size: 25px;  text-decoration: underline;"><?= $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name'] ?></p> -->
                          </div>
                          <div class="col-4 mt-3 text-center" style="font-size: 25px;">
                            <p style="margin-bottom: 0px;"> <?= $row['last_name'] . " " . $row['first_name'] . ", " . $row['suffix_name'] . ", " . $row['middle_name'] . "."  ?></p>
                            <div style="border-bottom: 2px solid black">
                            </div>
                          </div>
                          <div class="col-4 text-center">
                            <p class="mt-3" style='font-size: 13px'>Date registered: <?= $row1['enrollment_date'] ?></p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-3">
                            <div class="d-flex">
                              <h5>Reg Status: </h5>
                              <div>
                                <p class="ml-5" style="margin-bottom: 0px !important;"><?= $row['student_type'] ?></p>
                                <div style="border-bottom: 2px solid black; width: 70px; margin-left: 30px !important"></div>
                              </div>
                            </div>

                            <div class="d-flex mt-3">
                              <p class="h5">Curriculum Year:</p>
                              <div class="ml-3">
                                <p class="ml-2" style="margin-bottom: 0px;">
                                  <?= $searchYrRow['school_year']; ?> </p>
                                <div style="border-bottom: 2px solid black; width: 70px; margin-left:5px;">
                                </div>
                              </div>
                            </div>


                          </div>
                          <div class="col-3 mt-2">
                            <div class="d-flex">
                              <h5>Grade_level:</h5>
                              <div>


                                <p style="margin-bottom: 0px !important;" class="ml-5"><?= $row2['GRADE_LEVEL'] ?></p>
                                <div style="border-bottom: 2px solid black; width: 70px; margin-left: 28px !important"></div>
                              </div>
                            </div>

                            <?php if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') { ?>
                              <div>
                                <div class="d-flex">
                                  <p class="mt-2" style="font-weight: bold;">STRAND:</p>
                                  <div>
                                    <p class="mt-2 ml-5" style="margin-bottom: 0px;">GAS</p>
                                    <div style="border-bottom: 2px solid black; width: 70px; margin-left: 28px !important">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php } else { ?>
                              <div>

                              </div>
                            <?php } ?>

                          </div>




                          <?php if ($row['GRADE_LEVEL_ID'] == '23' || $row['GRADE_LEVEL_ID'] == '24') { ?>
                            <div class="col-3 d-flex mt-2">
                              <h5>SY/SEMESTER:</h5>
                              <div class="ml-3">
                                <p class="ml-2" style="margin-bottom: 0px;">
                                  <?= $searchSetResultRow['SEMESTER']; ?> </p>
                                <div style="border-bottom: 2px solid black; width: 70px; margin-left:5px;">

                                </div>
                              </div>
                            </div>






                          <?php } else { ?>
                            <div class="col-3 d-flex mt-2">
                            </div>
                          <?php } ?>

                          <div class="col-3">
                            <h5 class="mt-2 ml-4" style="font-size: 15px; font-weight: bolder;">Enrollment_Status</h5>
                            <p class="ml-3 p-1 text-center" style="border:  1px solid #000; width: 110px">TO PAY</p>

                            <!-- <= $row['student_id']; ?> -->
                          </div>

                        </div>

                      </div>




                      <div class="container mt-4">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th> Subject_Description </th>
                              <th> Subject_code </th>
                              <th> Room </th>
                              <!-- <th> Grade_level </th> -->
                              <th> Faculty_name</th>

                              <th> Start_time </th>
                              <th> End_time </th>
                              <th> Day </th>
                            </tr>
                          </thead>
                          <tbody>


                            <?php
                            // $supa = $_SESSION['student_id'];
                            $query = "SELECT GRADE_LEVEL_ID from student WHERE student_id = '$stud_id'";
                            $result = mysqli_query($conn, $query);

                            $row = mysqli_fetch_assoc($result);
                            $GRADE_LEVEL_ID =  $row['GRADE_LEVEL_ID'];



                            $getSched = mysqli_query($conn, "SELECT * FROM `subject` as subj  INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id");

                            while ($row = mysqli_fetch_assoc($getSched)) {
                              if ($row['GRADE_LEVEL_ID'] == $GRADE_LEVEL_ID) {

                                echo '<tr>';

                                echo '<td>' . $row['subject_description'] . '</td>';
                                echo '<td>' . $row['subject_code'] . '</td>';
                                echo '<td>' . $row['room_name'] . '</td>';
                                // echo '<td>' . $row['grade_level'] . '</td>';
                                echo '<td>' . $row['fac_name'] . '</td>';

                                echo '<td>' . date("g:iA", strtotime($row['start_time'])) . '</td>';
                                echo '<td>' . date("g:iA", strtotime($row['end_time'])) . '</td>';
                                echo '<td>' . $row['day'] . '</td>';

                                echo '</tr>';
                              }

                              // $_SESSION['schlYear'] = $row['school_year_id'];
                              $_SESSION['subject_id'] = $row['subject_id'];
                            }
                            ?></tbody>

                        </table>

                        <div class="row">

                          <!-- <php if ($row['GRADE_LEVEL_ID'] == '11' || $row['GRADE_LEVEL_ID'] == '12' || $row['GRADE_LEVEL_ID'] == '13' || $row['GRADE_LEVEL_ID'] == '14' || $row['GRADE_LEVEL_ID'] == '15' || $row['GRADE_LEVEL_ID'] == '16' || $row['GRADE_LEVEL_ID'] == '17' || $row['GRADE_LEVEL_ID'] == '18') { ?> -->

                          <?php if ($row2['GRADE_LEVEL'] == '1' || $row2['GRADE_LEVEL'] == '2' || $row2['GRADE_LEVEL'] == '3' || $row2['GRADE_LEVEL'] == '4' || $row2['GRADE_LEVEL'] == '5' || $row2['GRADE_LEVEL'] == '6') { ?>
                            <div class='col-4'>
                              <table class='table table-bordered'>
                                <thead>
                                  <tr class='text-center'>
                                    <th colspan='2'>CHARGES</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope='row'>Miscellaneous Fee:</th>
                                    <td>₱ 300.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>PTA Contribution:</th>
                                    <td>₱ 150.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>Donation Tuition Fee:</th>
                                    <td>₱ 1000.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>Total:</th>
                                    <td>₱ 1450</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          <?php } else { ?>
                            <div class='col-4'>
                              <table class='table table-bordered'>
                                <thead>
                                  <tr class='text-center'>
                                    <th colspan='2'>CHARGES</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope='row'>Miscellaneous Fee:</th>
                                    <td>₱ 500.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>Labaratory Fee:</th>
                                    <td>₱ 150.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>PTA Contribution:</th>
                                    <td>₱ 120.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>Donation Tuition Fee:</th>
                                    <td>₱ 2000.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>Sports Fee:</th>
                                    <td>₱ 50.00</td>
                                  </tr>
                                  <tr>
                                    <th scope='row'>Total:</th>
                                    <td>₱ 2820.00</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                          <?php } ?>








                          <?php if ($row2['GRADE_LEVEL'] == '1' || $row2['GRADE_LEVEL'] == '2' || $row2['GRADE_LEVEL'] == '3' || $row2['GRADE_LEVEL'] == '4' || $row2['GRADE_LEVEL'] == '5' || $row2['GRADE_LEVEL'] == '6') { ?>
                            <div class='col-8'>
                              <table class='table table-bordered table-sm'>
                                <thead>
                                  <tr class='text-center'>
                                    <th colspan='2'>REQUIREMENTS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope='row'>
                                      APPLIED TO ALL LEVEL</th>
                                    <th scope='row'>
                                      ELEMENTARY</th>
                                  </tr>
                                  <tr>

                                  <tr>
                                    <th scope='row' style="font-weight:normal">
                                      PSA Birthcertificate</th>
                                    <td>Good Moral</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal">
                                      Baptismal
                                    </th>
                                    <td>Form 137</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> DSWD Card</th>
                                    <!-- <td>asasasa</td> -->
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> 4pc 2x2 picture</th>

                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> Medical Record</th>

                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> Entrance Examination</th>

                                  </tr>

                                </tbody>
                              </table>
                            </div>
                          <?php } elseif ($row2['GRADE_LEVEL'] == '7' || $row2['GRADE_LEVEL'] == '8' || $row2['GRADE_LEVEL'] == '9' || $row2['GRADE_LEVEL'] == '10') { ?>

                            <div class='col-8'>
                              <table class='table table-bordered table-sm'>
                                <thead>
                                  <tr class='text-center'>
                                    <th colspan='2'>REQUIREMENTS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope='row'>
                                      APPLIED TO ALL LEVEL</th>
                                    <th scope='row'>
                                      JUNIOR HIGH SCHOOL</th>
                                  </tr>
                                  <tr>

                                  <tr>
                                    <th scope='row' style="font-weight:normal">
                                      PSA Birthcertificate</th>
                                    <td>Good Moral</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal">
                                      Baptismal
                                    </th>
                                    <td>Form 137</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> DSWD Card</th>
                                    <td>Barangay Clearance Certificate</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> 4pc 2x2 picture</th>

                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> Medical Record</th>

                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> Entrance Examination</th>

                                  </tr>

                                </tbody>
                              </table>
                            </div>

                          <?php } else { ?>


                            <div class='col-8'>
                              <table class='table table-bordered table-sm'>
                                <thead>
                                  <tr class='text-center'>
                                    <th colspan='2'>REQUIREMENTS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope='row'>
                                      APPLIED TO ALL LEVEL</th>
                                    <th scope='row'>
                                      SENIOR HIGH SCHOOL</th>
                                  </tr>
                                  <tr>

                                  <tr>
                                    <th scope='row' style="font-weight:normal">
                                      PSA Birthcertificate</th>
                                    <td>Good Moral</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal">
                                      Baptismal
                                    </th>
                                    <td>Form 137</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> DSWD Card</th>
                                    <td>Barangay Clearance Certificate</td>
                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> 4pc 2x2 picture</th>
                                    <td> Permanent Record (SF10)</td>

                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> Medical Record</th>

                                  </tr>
                                  <tr>
                                    <th scope='row' style="font-weight:normal"> Entrance Examination</th>

                                  </tr>

                                </tbody>
                              </table>
                            </div>
                          <?php } ?>















                          <div class="col-8">
                            <h6>PROMISSORY NOTE:</h6>
                            <p style="text-align: justify;">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa blanditiis molestiae cum, dolorem ea distinctio nemo delectus quia sunt earum accusantium iste nostrum veritatis sequi natus tenetur accusamus. Sequi, eum itaque officia voluptatibus saepe nisi dicta qui, omnis necessitatibus hic doloremque rerum nesciunt aliquam mollitia earum facere quia fugit molestiae.
                            </p>
                          </div>
                          <div class="col-8">
                            <h6>DISCLAIMER:</h6>
                            <p style="text-align: justify;">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa blanditiis molestiae cum, dolorem ea distinctio nemo delectus quia sunt earum accusantium iste nostrum veritatis sequi natus tenetur accusamus. Sequi, eum itaque officia voluptatibus saepe nisi dicta qui, omnis necessitatibus hic doloremque rerum nesciunt aliquam mollitia earum facere quia fugit molestiae.
                            </p>
                          </div>



                        </div>





                        <div class="row">
                          <div class="col-6 text-center">
                            <p class="text-uppercase" style="text-decoration: underline; margin-bottom: 0px">MRS. Angela PANcho</p>
                            <p class="ml-3">Registar</p>
                          </div>
                          <div class="col-6 text-center">
                            <p class="text-uppercase" style="text-decoration: underline; margin-bottom: 0px">Sr. ODELLE B. GOLLOSO</p>
                            <p class="ml-4">School Director</p>
                          </div>
                        </div>


                        <br>
                        <br>
                        <br>

                        <br>

                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-sm-9 text-center">

                            </div>
                            <div class="col-sm-2 text-center">
                              <button type="button" id="printBtn" onclick=" printPart()" class="btn btn-block btn-primary">Print</button>

                            </div>
                          </div>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->




<?php include('includes/footer.php'); ?>