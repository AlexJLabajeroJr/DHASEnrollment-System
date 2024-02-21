<?php
include '../db_con.php';

// ob_start();
session_start();
$page_title = "Schedule ";
include('includes/header.php');
include 'schedule-action.php';



$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();


if (!isset($_SESSION['admin_id'])) {
   header("location: ../index.php");
}



if (isset($_POST['refresh'])) {
   header('location:schedule.php');
}




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




         <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               <i class="fa fa-plus fa-fw"></i> New <i class="fa fa-caret-down"></i>
               <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->

               <div class="dropdown-divider"></div>
               <a href="schedule.php" class="dropdown-item">
                  <i class="fa fa-calendar fa-fw"></i> Schedule
                  <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
               </a>

               <div class="dropdown-divider"></div>
               <a href="subject.php" class="dropdown-item">
                  <i class="fa fa-book fa-fw"></i> Subject
                  <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
               </a>
               <div class="dropdown-divider"></div>
               <a href="room.php" class="dropdown-item">
                  <i class="fa  fa-school  fa-fw"></i> Room
                  <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
               </a>
               <div class="dropdown-divider"></div>
               <a href="profile.php" class="dropdown-item">
                  <i class="fa fa-user  fa-fw"></i> User
                  <!-- <span class="float-right text-muted text-sm">2 days</span> -->
               </a>
               <div class="dropdown-divider"></div>
               <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
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
         <div class="form-inline">
            <!-- <div class="input-group" data-widget="sidebar-search">
               <input class="form-control form-control-sidebar  bg-light border border-1 bg-light" type="search" placeholder="Search" aria-label="Search">
               <div class="input-group-append">
                  <button class="btn btn-sidebar bg-light border border-1">
                     <i class="fas fa-search fa-fw"></i>
                  </button>
               </div>
            </div> -->
         </div>


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
                  <a href="Dashboard_admin.php" class="nav-link ">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                        Dashboard
                        <!-- <i ></i>   class="right fas fa-angle-left" -->
                     </p>
                  </a>

               </li>
               <li class="nav-item">
                  <a href="Pre_registration.php" class="nav-link  ">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        New Enrollee

                        <span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>

                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="" class="nav-link ">
                     <i class="nav-icon far fa-plus-square"></i>
                     <p>
                        Enrollment
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"></span>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                        <a href="Pending.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>View Pre-registration Status</p>
                        </a>
                     </li>
                  </ul>

               </li>
               <li class="nav-item menu-open">
                  <a href="schedule.php" class="nav-link active">
                     <i class="nav-icon far fa-calendar-alt"></i>
                     <p>
                        Schedule
                        <i class="right fas fa-angle-left"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="schedule.php" class="nav-link active bg-light">
                           <i class="far fa-dot-circle nav-icon"></i>
                           <p>Set Schedule</p>
                        </a>
                     </li>


                  </ul>

               </li>

               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class="nav-icon fas fa-edit"></i>
                     <p>
                        School_year
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="school_year.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Set School_year</p>
                        </a>
                     </li>


                  </ul>

               </li>
               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class="nav-icon fas fa-cog"></i>
                     <p>
                        Semester
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="setsem.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Set Semester</p>
                        </a>
                     </li>


                  </ul>

               </li>



               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class="nav-icon fa fa-users"></i>
                     <p>
                        Faculty
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="faculty.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Manage Faculty</p>
                        </a>
                     </li>


                  </ul>

               </li>








               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class="nav-icon fas fa-columns"></i>
                     <p>
                        Room
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="room.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Manage Room</p>
                        </a>
                     </li>


                  </ul>

               </li>


               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class=" nav-icon fas fa-book"></i>
                     <p>
                        Subject
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="subject.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Manage Subject</p>
                        </a>
                     </li>


                  </ul>

               </li>


               <li class="nav-item">
                  <a href="" class="nav-link">
                     <i class=" nav-icon far fa-envelope"></i>
                     <p>
                        Grade_level
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>

                  <ul class="nav nav-treeview">


                     <li class="nav-item">
                        <a href="grade_level.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Manage Grade_level/Strand</p>
                        </a>
                     </li>


                  </ul>

               </li>






               <li class="nav-item">
                  <a class="nav-link">
                     <i class="nav-icon fas fa-file  "></i>
                     <p>
                        Class List
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                        <a href="stud_list_per_inst.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Student_list per Instructors</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="stud_enrolled_per_grad.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Students_Enrolled per Grade level</p>
                        </a>
                     </li>

                     <li class="nav-item">
                        <a href="stud_class_sched_p_grad.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Class Sched per Grade level</p>
                        </a>
                     </li>

                     <li class="nav-item">
                        <a href="stud_enr_per_sub.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Students Enrolled per Subject</p>
                        </a>
                     </li>


                     <li class="nav-item">
                        <a href="stud_enrolled_per_sem.php" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Students Enrolled per Semester</p>
                        </a>
                     </li>


                  </ul>


               </li>


               <li class="nav-item">
                  <a href="profile.php" class="nav-link  text-light">
                     <i class="nav-icon fa fa-user text-light"></i>
                     <p>My Profile</p>
                  </a>




               </li>

               <!-- <li class="nav-item">
                  <a href="logout.php" class="nav-link">
                     <i class="nav-icon fas fa-sign-out-alt"></i>
                     <p>Logout</p>
                  </a>




               </li> -->


            </ul>
         </nav>

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
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Schedule</li>
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

                        <!-- <php include('faculty_message.php'); ?> -->

                        <br>
                        <div class="container">
                           <div class="row">
                              <div class="col-sm-8">
                                 <h3 class="bg-light  text-center  text-light" style="  font-family:Segoe UI; color:white;">SCHEDULING<b class="text-lightblue" style="font-family:Segoe UI;"></b></h3>
                              </div>

                              <div class="col-sm-2">
                                 <button type="button" class="btn btn-success btn-sm border border-1" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   " data-toggle="modal" data-target="#mod">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add Schedule
                                 </button>
                              </div>

                              <div class="col-sm-2">
                                 <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary btn-sm border border-1" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   "><i class="fa fa-refresh" aria-hidden="true"></i>Refresh Page Button</button></form>
                              </div>

                           </div>
                        </div>









                        </h3>
                        <div>


                           <div class="card-body">
                              <!-- /.card-header -->
                              <div class="card-body">
                                 <table id="example1" class="table table-bordered table-striped">
                                    <thead class="bg-light" style="background-color:#">
                                       <tr class="text-black">
                                          <th> Start_Time </th>
                                          <th> End_Time </th>
                                          <th> Day </th>
                                          <th> Subject_Description </th>
                                          <th> Subject_code </th>
                                          <th> Semester/Quarter</th>
                                          <th> School_year </th>
                                          <th> Grade_level </th>
                                          <th> Room_name </th>
                                          <!-- <th> Section </th> -->
                                          <th> Faculty_name </th>
                                          <th> Action </th>
                                       </tr>
                                    </thead>
                                    <tbody class="text-center">
                                       <?php

                                       // WHERE r.availability = '1'
                                       $getSched = mysqli_query($conn, "SELECT * FROM `schedule` as sched  INNER JOIN subject as subj ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id INNER JOIN faculty as f ON sched.faculty_id = f.faculty_id  INNER JOIN grade_level as v ON sched.GRADE_LEVEL_ID= v.GRADE_LEVEL_ID  ;");

                                       
                                       while ($row1 = mysqli_fetch_assoc($getSched)) {

                                          echo '<tr>';
                                          echo '<td>' . date("g:iA", strtotime($row1['start_time'])) . '</td>';
                                          echo '<td>' . date("g:iA", strtotime($row1['end_time'])) . '</td>';
                                          echo '<td>' . $row1['day'] . '</td>';
                                          echo '<td>' . $row1['subject_description'] . '</td>';
                                          echo '<td>' . $row1['subject_code'] . '</td>';
                                          echo '<td>' . $row1['sched_semester'] . '</td>';
                                          echo '<td>' . $row1['sched_sy'] . '</td>';
                                          echo '<td>' . $row1['GRADE_LEVEL'] . '</td>';
                                          echo '<td>' . $row1['room_name'] . '</td>';
                                          // echo '<td>' . $row1['SECTION'] . '</td>';
                                          echo '<td>' . $row1['fac_name'] . '</td>';
                                       ?>
                                          <td>
                                             <!-- <a href="#add_<?php echo $row1['schedule_id']; ?> " class="btn btn-success" data-toggle="modal">ADD</a> -->




                                             <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Action</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                   <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu text-center" role="menu">
                                                   <a class="dropdown-item" href="#"> <a href="#edit_<?php echo $row1['schedule_id']; ?> " class=" btn btn-sm bg-info border border-1" data-toggle="modal"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <i class="fas fa-pencil-alt">
                                                         </i>
                                                         Edit &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </a></a>
                                                   <a class="dropdown-item" href="#"> <a href="#delete_<?php echo $row1['schedule_id']; ?> " class="btn btn-light btn-sm bg-danger border border-1" data-toggle="modal">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <i class="fas fa-trash">
                                                         </i>
                                                         Delete &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></a>

                                                </div>
                                             </div>

                                          </td>
                                          <?php include('modal.php'); ?>





                                       <?php




                                          echo '</tr>';
                                       }
                                       ?>

                                    </tbody>




                                 </table>
                                 </form>


                              </div>

                           </div>




                           <div class="col-sm-9 text-center">

                           </div>
                           <div class="col-sm-1 text-center">
                              <button type="button" id="printBtn" onclick=" printPart()" class="btn btn-block btn-primary">Print</button>

                           </div>




                           <script>
                              function printPart() {
                                 window.print();
                              }
                           </script>













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






   <div class="modal fade" id="mod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-right: 700px !important;">
         <div class="modal-content " style=" background-color: #BACDDB; color:#ffffff; width: 800px !important;">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel" style='font-family:Segoe Script;   '>Add Schedule </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">


               <form action="schedule-action.php" method="POST">
                  <div class="container-fluid">
                     <div class="row ">

                        <?php



                        $query = "Select * from schedule";
                        $result = mysqli_query($conn, $query);

                        echo "<div class='col-sm-6  text-dark'>";
                        echo "<label for = 'starttime'  > Start_time</label>";
                        echo "<input  name = 'starttime'   id = 'starttime'type ='time' class = 'form-control bg-light border border-1'  required>";
                        echo "</div>";

                        $query = "Select * from schedule";
                        $result = mysqli_query($conn, $query);


                        echo "<div class='col-sm-6  text-dark'>";
                        echo "<label for = 'endtime'>End_time</label>";

                        echo "<input name='endtime' id='endtime' type='time' class='form-control border border-1' required>";

                        echo "</div>";




                        $query = "Select * from schedule";
                        $result = mysqli_query($conn, $query);


                        echo "<div class='col-sm-6  text-dark mt-2'>";
                        echo "<label  for = 'days' >DAY</label>";
                        echo "<input name = 'days'  id = 'days' type ='text' class = 'form-control border border-1' placeholder='ex.M,M-T-F,TH or W | Always use uppercase' required>";
                        echo "</div>";


                        $query = "Select * from room WHERE availability = 1";
                        $result = mysqli_query($conn, $query);

                        echo "<div class='col-sm-6  text-dark mt-2'>";
                        echo "<label for = 'room'>ROOM</label>";
                        echo "<select name = 'room'  id = 'room' class = 'form-control border border-1 '  required>";

                        echo "<option value = ''>Select</option>";
                        $key = '';
                        $array = array();

                        while ($row = mysqli_fetch_object($result)) {
                           if ($key) {
                              $array[$row->$key] = $row;
                           } else {
                              $array[] = $row;
                           }
                        }
                        mysqli_free_result($result);

                        foreach ($array as $resulta)
                           echo '<option value=' . $resulta->room_id . ' >' . $resulta->room_name . '</option>';

                        echo "</select>
                        </div>";






                        echo "<div class='col-sm-6 text-dark mt-2'>
                        <label for='GRADE_LEVEL_ID'>Grade_level</label>
                        <select name='GRADE_LEVEL_ID' id='GLI' class='form-control border border-1' required>
                            <option value=''>Select</option>";


                        $query = 'SELECT * FROM grade_level';
                        $result = mysqli_query($conn, $query);

                        $key = '';
                        $array = array();

                        while ($row = mysqli_fetch_object($result)) {
                           if ($key) {
                              $array[$row->$key] = $row;
                           } else {
                              $array[] = $row;
                           }
                        }
                        mysqli_free_result($result);

                        foreach ($array as $resulta)
                           echo '<option value=' . $resulta->GRADE_LEVEL_ID . ' >' . $resulta->GRADE_LEVEL . '</option>';

                        echo "</select>
                        </div>";

                        echo "<div class='col-sm-6 text-dark mt-2'>
                        <label for='sched_semester'>Academic Terms</label>
                        <select name='sched_semester' id='SS' class='form-control border border-1' required>
                            <option value=''>Select</option>
                            <option value='Quarter'>Quarter </option>
                            <option value='First'>First Semester</option>
                            <option value='Second'>Second Semester</option>
                        </select>
                    </div>";

                        echo "<div class='col-sm-6 text-center mt-2'>
                        <div id='loaddata'></div>
                    </div>";


                        echo "<div class='col-sm-6  text-dark mt-2'>";
                        echo "<label for = 'SECTION' >Section</label>";
                        echo "<input name = 'SECTION' maxlength = '2' type ='number' id = 'SECTION'  type ='text' class = 'form-control border border-1' placeholder='Ex.1,2,8,10'  required>";
                        echo "</div>";

                        // $query = "Select * from subject";
                        // $result = mysqli_query($conn, $query);

                        // echo "<div  text-dark  '>";
                        // echo "<label>SUBJECT</label>";
                        // echo "<select  name='subject' id='subject' class = 'form-control border border-dark' required>";

                        // echo "<option value = ''>Select</option>";



                        // $key = '';
                        // $array = array();

                        // while ($row = mysqli_fetch_object($result)) {
                        //    if ($key) {
                        //       $array[$row->$key] = $row;
                        //    } else {
                        //       $array[] = $row;
                        //    }
                        // }
                        // mysqli_free_result($result);

                        // foreach ($array as $resulta)
                        //    echo '<option value=' . $resulta->subject_id . ' >' . $resulta->subject_code . '</option>';
                        // echo "</select>";
                        // echo "</div>";











                        $query = "Select * from faculty";
                        $result = mysqli_query($conn, $query);

                        echo "<div class='col-sm-12  text-dark text-center mt-3 mb-2'>";
                        echo "<label>FACULTY</label>";
                        echo "<select name ='faculty' id ='faculty' class = 'form-control border border-1' required>";

                        echo "<option value = ''>Select</option>";



                        $key = '';
                        $array = array();

                        while ($row = mysqli_fetch_object($result)) {
                           if ($key) {
                              $array[$row->$key] = $row;
                           } else {
                              $array[] = $row;
                           }
                        }
                        mysqli_free_result($result);

                        foreach ($array as $resulta)
                           echo '<option value=' . $resulta->faculty_id . ' >' . $resulta->fac_name . '</option>';
                        echo "</select>";
                        echo "</div>";







                        echo "<div class='container mt-5'>";
                        echo "<div class='row'>";
                        echo "<div class='col-sm-8'>";
                        echo "</div>";
                        echo "<div class='col-sm-2'>";
                        echo " <input name='enroll' type='submit' value='Save' class='form-control bg-success text-light mt-2 ' style = 'font-family:Segoe Script; background-color:	#CC5500;  border-color:	#ffffff; border-radius: 10px 15px 10px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>";
                        echo "</div>";

                        echo "<div class='col-sm-2'>";
                        echo " <button type='button' class=' form-control btn btn-secondary mt-2' data-dismiss='modal' style = 'font-family:Segoe Script; background-color:	#CC5500;  border-color:	#ffffff; border-radius: 10px 15px 10px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);'>Close</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        ?>
                     </div>
                  </div>
               </form>



            </div>
            <!-- <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
         </div>
      </div>
   </div>


   <!-- /.content-wrapper -->
   <footer class="main-footer">
      <strong>Copyright &copy; <a>2023 DHAS ENROLLMENT SYSTEM | Developed by Alex J. Labajero jr.</a></strong>


   </footer>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function() {
      $('#GLI, #SS').on('change', function() {
         var gradeLevelId = $('#GLI').val();
         var semester = $('#SS').val();
         var timestamp = new Date().getTime(); // add timestamp parameter
         $.ajax({
            type: "POST",
            url: "loaddata.php?timestamp=" + timestamp, // append timestamp parameter
            data: {
               gradeLevelId: gradeLevelId,
               semester: semester
            },
            cache: false, // add this line to disable caching
            success: function(data) {
               $('#loaddata').html(data);
            }
         });
      });
   });
</script>




<!-- jQuery -->


<?php include('includes/footer.php'); ?>