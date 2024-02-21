<?php
include '../db_con.php';




// show box movie goto movie hdtoday.tv

session_start();
// ob_start();
include('includes/header.php');
$page_title = "View Enrolled Page";
if (!isset($_SESSION['registrar_id'])) {
    header("location: ../index.php");
}







$sy_id = $_GET['SYID'];



$statol = "SELECT * from schoolyr WHERE SYID = '$sy_id'";
$des = mysqli_query($conn, $statol);
$statko = mysqli_fetch_assoc($des);


$query1 = "SELECT student_id FROM schoolyr WHERE SYID = " . $statko['SYID'];

$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);


$query2 = "SELECT * FROM student WHERE student_id = $row1[student_id] ";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);




$query4 = "SELECT GRADE_LEVEL FROM grade_level WHERE GRADE_LEVEL_ID =  $row2[GRADE_LEVEL_ID] ";
$result4 = mysqli_query($conn, $query4);
$row5 = mysqli_fetch_assoc($result4);





$findIfEnroll = "SELECT * from enrollment WHERE student_id = $row2[student_id]";
$findIfEnrollresult = mysqli_query($conn, $findIfEnroll);

$findIfEnrollresultrow = mysqli_fetch_assoc($findIfEnrollresult);



// $stat = "SELECT * from student WHERE  status = 'Pending' && student_id = $row2[student_id]";
// $des = mysqli_query($conn, $stat);
// $statko = mysqli_fetch_assoc($des);



$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();




$sad = "SELECT * FROM account WHERE account_id = $_SESSION[registrar_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();





if (isset($row['p_p'])) {
    $setIM = "SELECT * FROM student WHERE p_p = '" . $row2['p_p'] . "'";
    $searchIMResult = $conn->query($setIM);
    $searchIMResultRow = $searchIMResult->fetch_assoc();
} else {
    // Handle the error condition when 'p_p' key is not defined in $row array.
}







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
                                    <p style="font-size:15px">Registrar</p>
                                </div>

                            </div>

                            <div class="col-sm-12 text-center mt-3">

                                <a href="logout_registrar.php" class="nav-link text-dark">


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


    <aside class="main-sidebar sidebar-0-primary elevation-4 " style="background-color:   #037d50">
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
                    <img src="<?php echo $row['p_p']; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>










                <div class="pull-left info">
                    <p style="font-size:15px; font-size:15px;
font-family:Segoe UI;" class="text-light text-bold"><b><?= $_SESSION['auth_user']['username']; ?></b></p>
                </div>





            </div>
        </div>


        <!-- <form class="tab-wizard2 wizard-circle wizard" action="../picko/p_p.php" method="POST" enctype="multipart/form-data">


            <div class="form-wrap max-width-600 mx-auto">
                <div class="form-group row">


                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control-file form-control height-auto" accept="image/*" required>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <button type="submit" class="btn btn-dark btn-xs " name="jobSeekerSubmitBtn">Submit</button>
                    </div>


                </div>
        </form> -->

        <!-- 
        <div class="card-footer">
            <div class="text-right">

                <a href="summary.php" class="btn btn-sm btn-warning">


                    <i class="fas fa-sign-out-alt fa-flip-both" style="color: #000;"></i> Back
                </a>
            </div>
        </div> -->

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


                <li class="nav-item menu-open">
                    <a href="" class="nav-link text-light" style="font-size:14px;">
                        <i class=""></i>
                        <p>
                            &nbsp &nbsp &nbspMAIN NAVIGATION
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item menu-open">
                    <a href="registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas nav-icon fas fa-copy"></i>
                        <p>
                            List of Enrolled Students
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link  active text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Enrollment Status
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="enrollment_status.php" class="nav-link  active bg-light">
                                <i class="far fa-circle nav-icon"></i>
                                <p> View Enrollment Status</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <!-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active text-light">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Enrollment Status
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="enrollment_status.php" class="nav-link active">
                                <i class="nav-icon fas fa-book text-light"></i>
                                <p>Manage Enrollment Status</p>
                            </a>
                        </li>

                    </ul>
                </li> -->

                <li class="nav-item ">
                    <a href="#" class="nav-link text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Enrollment Summary Report
                            <i class="right fas fa-angle-left text-light"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview text-light">
                        <li class="nav-item">
                            <a href="summary.php" class="nav-link text-light  ">
                                <i class="far fa-circle nav-icon text-light"></i>
                                <p style="font-size:15px">Manage Report</p>
                            </a>
                        </li>

                    </ul>



                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link   text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Requirements
                            <i class="fas fa-angle-left right text-light"></i>
                            <!-- <span class="badge badge-info right text-light">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="student_requirement.php" class="nav-link  text-light">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Manage Student Requirements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="requirement.php" class="nav-link text-light">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Manage Requirements</p>
                            </a>
                        </li>

                    </ul>

                </li>




                <li class="nav-item">
                    <a href="charges.php" class="nav-link text-light">
                        <i class="nav-icon fa-solid fa-peso-sign"></i>


                        <p>Charges</p>
                    </a>




                </li>


                <li class="nav-item">
                    <a href="archieve.php" class="nav-link text-light">
                        <i class=" nav-icon fa-solid fa-box-archive"></i>


                        <p>Archive</p>
                    </a>




                </li>



                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-light">
                        <i class="nav-icon fa fa-user text-light"></i>
                        <p>My Profile</p>
                    </a>




                </li>



                <!-- <li class="nav-item">
                    <a href="logout_registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas fa-sign-out-alt text-light"></i>
                        <p>Logout</p>
                    </a>




                </li> -->


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
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Subject</li> -->
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















































                        <?php

                        $query = "SELECT * from student WHERE student_id = $row2[student_id]";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);



                        $sql1 = "Select * from enrollment where student_id = $row2[student_id]";
                        $result1 = $conn->query($sql1);
                        $row1 = $result1->fetch_assoc();





                        // $supit = $_SESSION['student_id'];
                        $query = "SELECT * from `student` s, `grade_level` c WHERE s.GRADE_LEVEL_ID=c.GRADE_LEVEL_ID &&student_id = $row2[student_id]";
                        $result = mysqli_query($conn, $query);
                        $row2 = mysqli_fetch_assoc($result);




                        $setSem = "Select * from tblsemester where SETSEM= '1'";
                        $searchSemResult = $conn->query($setSem);
                        $searchSetResultRow = $searchSemResult->fetch_assoc();



















                        ?>








<div class="Container">
    <div class="row">
        <div class="col-sm-11">
        <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary btn-sm border border-light  border border-2" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   "><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page Button</button></form>
        </div>
        <div class="col-sm-1 mb-3">
            <a class="btn btn-light btn-xs border border-2" style="font-family:Segoe UI; font-size:15px;" href='enrollment_status.php'>
                <i class='fa fa-arrow-left'></i>&nbspBack&nbsp
            </a>
        </div>
    </div>
</div>




                        <div class="card-body ">
                            <!-- /.card-header -->
                            <div class="card-body ">


                                <div class="container-fluid  ">
                                    <div class="row ">

                                        <div class="col-md-3   ">

                                            <!-- Profile Image -->
                                            <div class="card card-success card-outline  ">
                                                <div class="card-body box-profile">







                                                    <div class="text-center border border-1">




                                                        <img src='<?php echo $searchIMResultRow['p_p']; ?>' class=" brand-image img-circle elevation-3" style="width: 200px ; height:200px;opacity: .8">


                                                        <p class="profile-username text-center" style="font-size:15px;"><?= $row['last_name'] . " " . $row['first_name'] . ", " . $row['suffix_name'] . ", " . $row['middle_name'] . "."  ?></p>



                                                        <a href="#" class="btn btn-1 bg-white btn-block">Grade : <?= $row2['GRADE_LEVEL'] . " "  ?> |&nbsp Type : <?= $row2['student_type'] . " "  ?> |&nbsp Strand : <?= $row2['strand'] . " "  ?> </a>



                                                     


                                                    </div>



                                                    <div class="text-center border border-1">


  
                                                 

</div>











                                                    <!-- <ul class="list-group list-group-unbordered mb-3">
                                                                    <li class="list-group-item">
                                                                        <b>Followers</b> <a class="float-right">1,322</a>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <b>Following</b> <a class="float-right">543</a>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <b>Friends</b> <a class="float-right">13,287</a>
                                                                    </li>
                                                                </ul> -->

                                                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->

                                            <!-- About Me Box -->
                                            <!-- <div class="card card-1 border border-1">
                                                <div class="card-header text-light  " style="background-color:   #609966">
                                                    <h3 class="card-title ">Student Information</h3>
                                                </div>

                                                <div class="card-body">


                                                    <?php
                                                    if ($row2['student_type'] == 'transferee') {
                                                    ?>
                                                        <strong><i class="fas fa-book mr-1"></i> School last Attended</strong>
                                                        <p class="text-muted">
                                                            <?= $row['school_last_attended'] . ""  ?>
                                                        </p>
                                                        <hr>
                                                        <strong><i class="fas fa-calendar mr-1"></i> School Year</strong>
                                                        <p class="text-muted">
                                                            <?= $row['school_year'] . ""  ?>
                                                        </p>
                                                    <?php
                                                    }
                                                    ?>







                                                    <hr>

                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                                                    <p class="text-muted" style="text-transform:uppercase;"> <?= $row['street'] . " " . $row['barangay'] . ", " . $row['district'] . ", " . $row['city'] . "."  ?></p>

                                                    <hr>



                                                    <strong><i class="fas fa-phone-alt mr-1"></i> Contact Number</strong>

                                                    <p class="text-muted">
                                                        <?= $row['contact_number'] . ""  ?>
                                                    </p>

                                                    <hr>

                                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                                    <p class="text-muted">
                                                        <span class="tag tag-danger">UI Design</span>
                                                        <span class="tag tag-success">Coding</span>
                                                        <span class="tag tag-info">Javascript</span>
                                                        <span class="tag tag-warning">PHP</span>
                                                        <span class="tag tag-primary">Node.js</span>
                                                    </p>

                                                    <hr>

                                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                                </div>

                                            </div> -->
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header p-2">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item"><a class="nav-link   " href="#activity" data-toggle="tab">Requirements that Student pass during the Enrollment</a></li>
                                                     
                                                    </ul>
                                                </div><!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div class="active tab-pane" id="activity">
                                                            <!-- Post -->
                                                            <div class="post">
                                                                <div class="container-fluid mt-4">

                                                                

							  <?php
														
					            $sy_id = $_GET['SYID'];

					 										// database query to retrieve incomplete requirements
					    $sql = "SELECT * FROM student_requirements AS sr
		                INNER JOIN schoolyr AS sch ON sr.SYID = sch.SYID
		                INNER JOIN requirement AS r ON sr.requirement_id = r.requirement_id
		                INNER JOIN student as stud ON stud.student_id = sch.student_id
		                INNER JOIN grade_level as grad ON grad.GRADE_lEVEL_ID = stud.GRADE_lEVEL_ID
		                        WHERE sr.SYID = $sy_id";

					    $result = mysqli_query($conn, $sql);

															// check for errors in the database query
															if (!$result) {
																die("Query failed: " . mysqli_error($conn));
															}

															// initialize an empty array to hold the incomplete requirements for each grade level
															$incomplete_requirements = array();

															// loop through the query results and group the incomplete requirements by grade level
															while ($row = mysqli_fetch_assoc($result)) {
																$grade_level_id = $row['GRADE_LEVEL_ID'];
																$requirement_name = $row['requirement'];
																$requirement_status = $row['requirement_status'];
																if (!isset($incomplete_requirements[$grade_level_id])) {
																	$incomplete_requirements[$grade_level_id] = array();
																}
																if ($requirement_status == 1) {
																	$incomplete_requirements[$grade_level_id][] = $requirement_name;
																} elseif ($requirement_status == 2) {
																	$incomplete_requirements[$grade_level_id] = "Complete";
																}
															}

															// output the incomplete or complete requirements for each grade level
															foreach ($incomplete_requirements as $grade_level_id => $requirements) {
																if (is_array($requirements)) {
																	$requirements_text = implode(" || ", $requirements);
																	switch ($grade_level_id) {
																		case 11:
																		case 14:
																		case 15:
																		case 16:
																		case 17:
																		case 18:
																			echo "<span style='background-color: #ffcccc; padding: 10px; font-size:10px;'  >Incomplete Requirments :  No Moral Certificate || No Form 137</span> <span style='color:red'></span>";
																			break;
																		case 19:
																		case 20:
																		case 21:
																		case 22:
																			echo "<span style='background-color: #ffcccc; padding: 10px;  font-size:10px;' >Incomplete Requirments :  No Moral Certicate || No Form 137 || No Barangay Clearance Certificate</span> <span style='color:red'></span><br>";
																			break;
																		case 23:
																		case 24:
																			echo "<span style='background-color: #ffcccc; padding: 10px;  font-size:9px;' >Incomplete Requirments :  No Moral Certicate || No Form 137 || No Barangay Clearance Certificate || No Permanent Record (SF10)</span> <span style='color:red'></span><br>";
																			break;
																		default:
																			break;
																	}
																} else {
																	echo "<span style='background-color: #ccffcc; padding: 10px; font-size:10px' >Complete Requirements&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span> <span style='color:red'></span><br>";
																}
															}
															?>

                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>


                                                                                <th> Requirements </th>
                                                                                <!-- <th> Grade_level </th> -->



                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>


                                                                        <?php
$sy_id = $_GET['SYID'];
$stat = "SELECT * FROM student_requirements AS sr 
         INNER JOIN schoolyr AS sch ON sr.SYID = sch.SYID 
         INNER JOIN requirement AS r ON sr.requirement_id = r.requirement_id 
         WHERE sr.SYID = '$sy_id'";
$des = mysqli_query($conn, $stat);

$status = ''; // Variable to store requirement_status


                                                                            // $statko = mysqli_fetch_assoc($des);

                                                                            if ($des) {
                                                                                while ($row56 = mysqli_fetch_assoc($des)) {
                                                                                    echo "<tr>";
                                                                                    echo "<td>$row56[requirement]</td>";
                                                                                    echo "</tr>";
                                                                            
//   if ($row56['requirement_status'] == 1) {
//                                                                                         $status = "<B class='badge badge-1 text-light border border-1' style='background-color: #D21312; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>INCOMPLETE</B>";
//                                                                                     } elseif ($row56['requirement_status'] == 2) {
//                                                                                         $status = "<B class='badge badge-1 bg-purple text-light border border-1' style='background-color: #; overflow: hidden; border-style: solid; border-width: 3px; border-color: #ffffff;'>COMPLETE</B>";
//                                                                                     }
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </tbody>

                                                                    </table>







                                                  
                                                    
                                                                    <!-- <php echo $status; ?> -->
                                                                    <br>
                                                                    <br>

                                                                                                                 
  <div class="container">
  <div class="row">

  <div class="col-sm-9"></div>


  <div class="col-sm-3">
  <a href="student_requirement.php" style="font: 180%/180% 'Freckle Face', cursive;"> <button><i class="fa-solid fa-plus"> &nbsp</i>Add Requirements</button></a>

  </div>
</div>
                                           
</div>                                               











                                                                </div>
                                                            </div>
                                                            <!-- /.post -->









                                                            <!-- /.post -->
                                                        </div>
                                                        <!-- /.tab-pane -->



<?php

$sy_id = $_GET['SYID'];

$statol = "SELECT * FROM student_requirements AS sr 
INNER JOIN schoolyr AS sch ON sr.SYID = sch.SYID 
INNER JOIN requirement AS r ON sr.requirement_id = r.requirement_id 
WHERE sr.SYID = '$sy_id'";
$desiree = mysqli_query($conn, $statol);


                                                        ?>




                                                        <div class="tab-pane" id="timeline">
                                                            <!-- The timeline -->







                                                        </div>

































                                                        <!-- /.tab-pane -->

                                                        <!-- <div class="tab-pane" id="settings">
                                                            <form class="form-horizontal">
                                                                <div class="form-group row">
                                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-2 col-sm-10">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-2 col-sm-10">
                                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div> -->
                                                        <!-- /.tab-pane -->
                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div><!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>





                                        <div class="col-sm-3">



                                            <tr>
                                                <p class="mb-3 border border-1" style="background-color:#;">Students are required to submit the items listed in this list.</p>
                                                <td>


                                                    <ul>

                                                        <br>
                                                        <p class="text-left">Students are required to submit the items listed in this list (Applied to all Grade_level) <B style="color:red">*</B></p>
                                                        <li>PSA Birthcertificate</li>
                                                        <li>Baptismal</li>
                                                        <li>Medical Record</li>
                                                        <li>4pc 2x2 picture</li>
                                                        <li>Entrance Examination</li>

                                                    </ul>



                                                    <?php if ($row2['GRADE_LEVEL'] == '1' || $row2['GRADE_LEVEL'] == '2' | $row2['GRADE_LEVEL'] == '3' | $row2['GRADE_LEVEL'] == '4' | $row2['GRADE_LEVEL'] == '5' | $row2['GRADE_LEVEL'] == '6') : ?>
                                                        <ul>
                                                            <p>Additional Requirements</p>
                                                            <li>Good Moral </li>
                                                            <li>Form 137</li>
                                                        </ul>


                                                    <?php endif; ?>


                                                    <?php if ($row2['GRADE_LEVEL'] == '7' || $row2['GRADE_LEVEL'] == '8' | $row2['GRADE_LEVEL'] == '9' | $row2['GRADE_LEVEL'] == '10') : ?>
                                                        <ul>
                                                            <li>Additional Requirements</li>
                                                            <li>Good Moral</li>
                                                            <li>Form 137</li>
                                                            <li>Barangay Clearance Certificate</li>
                                                        </ul>
                                                    <?php endif; ?>



                                                    <?php if ($row2['GRADE_LEVEL'] == '11' || $row2['GRADE_LEVEL'] == '12') : ?>


                                                        <ul>
                                                            <p>Additional Requirements</p>
                                                            <li>Good Moral</li>
                                                            <li>Form 137</li>
                                                            <li>Barangay Clearance Certificate</li>
                                                            <li>Permanent Record (SF10)</li>
                                                        </ul>

                                                    <?php endif; ?>

                                                </td>
                                            </tr>

  <p class = "border border-1" style = "border-radius:10px 10px;"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp&nbspPlease refresh the page after updating the status.</p>


  
                                            <?php
if (isset($_GET['SYID']) && isset($_GET['requirement_status'])) {
    $sy_id = $_GET['SYID'];
    $requirement_status = $_GET['requirement_status'];

    $query = "UPDATE schoolyr SET requirement_status = '$requirement_status' WHERE SYID = '$sy_id'";
    mysqli_query($conn, $query);

    // Return the updated requirement status as JSON response
    $response = array('status' => 'success', 'requirement_status' => $requirement_status);
    echo json_encode($response);
    exit();
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 text-center mt-2 border border-top-0 border-left-0 border-right-0" style=";font-size: 14px;">
            <b>Requirement Status :</b>
        </div>
        <div class="col-sm-6" >
            <select class="form-control badge badge-xs bg-light border border-success " 
 onchange="status_updates(this.value, '<?php echo $statko['SYID']; ?>')">
                <option value="">Update Status</option>
                <option value="0">FOR SUBMISSION</option>
                <option value="1">INCOMPLETE</option>
                <option value="2">COMPLETE</option>
            </select>
        </div>
    </div>
</div>

<script type="text/javascript">
    function status_updates(value, SYID) {
        let url = "https://dv1enrollment-system.online/registrar/view_req.php?SYID=" + SYID + "&requirement_status=" + value;
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // Update the requirement status on the page dynamically
                    let updatedRequirementStatus = response.requirement_status;
                    console.log("Requirement status updated: " + updatedRequirementStatus);
                } else {
                    console.log("Error occurred during update: " + response.message);
                }
            }
        };
        xhr.send();
    }
</script>
<br>
<?php
$requirement_status = $statko['requirement_status'];
if ($requirement_status == '0') :
?>
    <div class="form-group row">
        <span style="font-size: 36px; color: red; background-color: #ffcccc; border: 5px solid red; padding: 10px; animation: movingText 2s infinite; display: flex; justify-content: center; align-items: center; width: 100%; font-weight: bold;">FOR SUBMISSION</span>
    </div>
<?php elseif ($requirement_status == '1') : ?>
    <div class="form-group row">
        <span style="font-size: 36px; color: yellow; background-color: #ffcc00; border: 5px solid yellow; padding: 10px; animation: movingText 2s infinite; display: flex; justify-content: center; align-items: center; width: 100%; font-weight: bold;">INCOMPLETE</span>
    </div>


<?php elseif ($requirement_status == '2') : ?>
    <div class="form-group row">
        <span style="font-size: 36px; color: green; background-color: lightgreen; border: 5px solid green; padding: 10px; animation: movingText 2s infinite; display: flex; justify-content: center; align-items: center; width: 100%; font-weight: bold;">COMPLETE</span>
    </div>
<?php endif; ?>



</div>
</div>






                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>





                            </div>

                        </div>















                     

















                        <!-- /.container-fluid -->
        </section>








    </div>
</div>

<div class="col-sm-12 col-sm-7 col-md-2 d-flex align-items-stretch flex-column">
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

<style>
    button {
        color: #444444;
        background: #F3F3F3;
        border: 1px #DADADA solid;
        padding: 5px 10px;
        border-radius: 2px;
        font-weight: bold;
        font-size: 9pt;
        outline: none;
    }

    button:hover {
        border: 1px #C6C6C6 solid;
        box-shadow: 1px 1px 1px #EAEAEA;
        color: #333333;
        background: #F7F7F7;
    }

    button:active {
        box-shadow: inset 1px 1px 1px #DFDFDF;
    }

    /* Blue button as seen on translate.google.com*/
    button.blue {
        color: white;
        background: #4C8FFB;
        border: 1px #3079ED solid;
        box-shadow: inset 0 1px 0 #80B0FB;
    }

    button.blue:hover {
        border: 1px #2F5BB7 solid;
        box-shadow: 0 1px 1px #EAEAEA, inset 0 1px 0 #5A94F1;
        background: #3F83F1;
    }

    button.blue:active {
        box-shadow: inset 0 2px 5px #2370FE;
    }

    /* Orange button as seen on blogger.com*/
    button.orange {
        color: white;
        border: 1px solid #FB8F3D;
        background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
        background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
        background: -ms-linear-gradient(top, #FDA251, #FB8F3D);
    }

    button.orange:hover {
        border: 1px solid #EB5200;
        background: -webkit-linear-gradient(top, #FD924C, #F9760B);
        background: -moz-linear-gradient(top, #FD924C, #F9760B);
        background: -ms-linear-gradient(top, #FD924C, #F9760B);
        box-shadow: 0 1px #EFEFEF;
    }

    button.orange:active {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.3);
    }

    /* Red Google Button as seen on drive.google.com */
    button.red {
        background: -webkit-linear-gradient(top, #DD4B39, #D14836);
        background: -moz-linear-gradient(top, #DD4B39, #D14836);
        background: -ms-linear-gradient(top, #DD4B39, #D14836);
        border: 1px solid #DD4B39;
        color: white;
        text-shadow: 0 1px 0 #C04131;
    }

    button.red:hover {
        background: -webkit-linear-gradient(top, #DD4B39, #C53727);
        background: -moz-linear-gradient(top, #DD4B39, #C53727);
        background: -ms-linear-gradient(top, #DD4B39, #C53727);
        border: 1px solid #AF301F;
    }

    button.red:active {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2);
        background: -webkit-linear-gradient(top, #D74736, #AD2719);
        background: -moz-linear-gradient(top, #D74736, #AD2719);
        background: -ms-linear-gradient(top, #D74736, #AD2719);
    }
</style>
<?php include('includes/footer.php'); ?>