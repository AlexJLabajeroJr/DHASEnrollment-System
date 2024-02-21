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


                <li class="nav-item ">
                    <a href="registrar.php" class="nav-link text-light">
                        <i class="nav-icon fas nav-icon fas fa-copy"></i>
                        <p>
                            List of Enrolled Students
                            <!-- <i ></i>   class="right fas fa-angle-left" -->
                        </p>
                    </a>

                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active text-light">
                        <i class="nav-icon fas fa-book text-light"></i>
                        <p>
                            Enrollment Status
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">New</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="enrollment_status.php" class="nav-link active   bg-light">
                            <i class="far fa-dot-circle nav-icon"></i>
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
                    <a href="#" class="nav-link  text-light">
                        <i class="nav-icon far fa-envelope text-light"></i>
                        <p>
                            Enrollment Summary Report
                            <i class="right fas fa-angle-left text-light"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview text-dark">
                        <li class="nav-item">
                            <a href="summary.php" class="nav-link   ">
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
        <div class="Container">
    <div class="row">
        <div class="col-sm-11">
        <br>
        <form method="POST"><button type="submit" name="refresh" class="btn btn-secondary btn-sm border border-light  border border-2" style="
font-family:Segoe UI; font-size:15px; border-radius: 15px 15px 15px 15px;
    overflow: hidden;   "><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Page Button</button></form>
        </div>
        <div class="col-sm-1 mb-3">
            <br>
            <a class="btn btn-light btn-xs border border-2" style="font-family:Segoe UI; font-size:15px;" href='enrollment_status.php'>
                <i class='fa fa-arrow-left'></i>&nbspBack&nbsp
            </a>
        </div>
    </div>
</div>


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
      
        </div>
        <div class="col-sm-1 mb-3">
          
        </div>
    </div>
</div>






<?php   




$timezone = new DateTimeZone('Asia/Manila');
$currentDateTime = new DateTime('now', $timezone);
$currentDateTimeFormatted = $currentDateTime->format('F d, Y h:i:s A');


$query = "SELECT * from student WHERE student_id = $row2[student_id]";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);





$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();








$currentYear = date('Y');
$startDate = strtotime($currentYear . '-01-01');
$endDate = time();
$randomTimestamp = mt_rand($startDate, $endDate);
$randomDate = date('F d, Y', $randomTimestamp);





?>
                      











                      <?php if ($row2['GRADE_LEVEL'] == '1' || $row2['GRADE_LEVEL'] == '2' || $row2['GRADE_LEVEL'] == '3' || $row2['GRADE_LEVEL'] == '4' || $row2['GRADE_LEVEL'] == '5' || $row2['GRADE_LEVEL'] == '6') { ?>

                        <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <i class="fas fa-coins"></i>My Payments
                    <small class="float-right"> <?php echo $currentDateTimeFormatted; ?>
</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Divine Healer Academy of Sorsogon</strong><br>
                    X2JJ+GPF,  El Retiro Compound, Cabid-an<br>
                    Sorsogon City, Sorsogon, Philippines<br>
                    HOURS 
Monday - Friday: 9:00 AM to 5:00 PM<br>
Phone : (083) 228-9722 <br>
Email : healingservants@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= $row['first_name'] . " " . $row['middle_name'] . ", " . $row['last_name'] . ", " . $row['suffix_name'] . "."  ?></strong><br>
                    <?= $row['street'] . " " . $row['barangay'] . ", " . $row['district'] . ", <br>" . $row['city'] . "."  ?><br>
                 
                    Contact number:    <?= $row['contact_number'] . ""  ?><br>
                 




                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Payment #<?= $row['unique_id'] . ""  ?></b><br>
               
        
                  <b>Payment Due:</b> 6/22/2013<br>
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>   Miscellaneous Fee</th>
                      <th>Labaratory Fee</th>
                      <th>PTA Contribution</th>
                      <th>Donation Tuition Fee</th>
                    




                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td> 	₱ 300.00</td>
                      <td>        
	₱ 150.00</td>
                      <td>	₱ 150.00</td>
                      <td>	₱ 1000.00</td>
                  
                    </tr>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../img/credit/visa.png" alt="Visa">
                  <img src="../img/credit/mastercard.png" alt="Mastercard">
                  <img src="../img/credit/american-express.png" alt="American Express">
                  <img src="../img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                 
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo $randomDate; ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      
                      <tr>
                        <th>Total:</th>
                        <td>₱ 1450.00
</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>

              <?php } else { ?>

                <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <i class="fas fa-coins"></i>My Payments
                    <small class="float-right"> <?php echo $currentDateTimeFormatted; ?>
</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Divine Healer Academy of Sorsogon</strong><br>
                    X2JJ+GPF,  El Retiro Compound, Cabid-an<br>
                    Sorsogon City, Sorsogon, Philippines<br>
                    HOURS 
Monday - Friday: 9:00 AM to 5:00 PM<br>
Phone : (083) 228-9722 <br>
Email : healingservants@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= $row['first_name'] . " " . $row['middle_name'] . ", " . $row['last_name'] . ", " . $row['suffix_name'] . "."  ?></strong><br>
                    <?= $row['street'] . " " . $row['barangay'] . ", " . $row['district'] . ", <br>" . $row['city'] . "."  ?><br>
                 
                    Contact number:    <?= $row['contact_number'] . ""  ?><br>
                 




                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Payment #<?= $row['unique_id'] . ""  ?></b><br>
               
        
                  <b>Payment Due:</b> 6/22/2013<br>
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>   Miscellaneous Fee</th>
                      <th>Labaratory Fee</th>
                      <th>PTA Contribution</th>
                      <th>Donation Tuition Fee</th>
                      <th>   Sports Fee</th>




                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td> 	₱ 500.00</td>
                      <td>        
	₱ 150.00</td>
                      <td>	₱ 120.00</td>
                      <td>	₱ 2000.00</td>
                      <td>
                   	₱ 50.00</td>
                    </tr>
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../img/credit/visa.png" alt="Visa">
                  <img src="../img/credit/mastercard.png" alt="Mastercard">
                  <img src="../img/credit/american-express.png" alt="American Express">
                  <img src="../img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                 
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo $randomDate; ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      
                      <tr>
                        <th>Total:</th>
                        <td>₱ 2820.00
</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
            <?php }?>


              
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
  



<?php 
$sy_id = $_GET['SYID'];


$statole = "SELECT * from schoolyr WHERE SYID = '$sy_id'";
$desU = mysqli_query($conn, $statole);
$statkong = mysqli_fetch_assoc($desU);


$query12 = "SELECT * FROM schoolyr WHERE enrollment_status = '1' AND archieve = '0' AND SYID = {$statkong['SYID']}";
$result12 = mysqli_query($conn, $query12);
$row13 = mysqli_fetch_assoc($result12);



if (isset($_GET['SYID']) && isset($_GET['payment_status'])) {
    $sy_id = $_GET['SYID'];
    $payment_status = $_GET['payment_status'];

    // Perform proper sanitization/validation of input values to prevent SQL injection
    $SYID = mysqli_real_escape_string($conn, $sy_id);
    $payment_status = mysqli_real_escape_string($conn, $payment_status);

    mysqli_query($conn, "UPDATE schoolyr SET payment_status = '$payment_status' WHERE SYID = '$sy_id'");
    // Return the updated payment status as JSON response
    $response = array('status' => 'success', 'payment_status' => $payment_status);
    echo json_encode($response);
    exit();


}?>

<!-- <p class = "float-right" style = "border-radius:10px 10px;"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp&nbspPlease refresh the page after updating the status:</p>			 -->
<div class="container-fluid">
  <div class="row">
<div class="col-sm-9">
</div>
<div class="col-sm-3">

<p class = "" style = "border-radius:10px 10px;"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp&nbspPlease refresh the page after updating the status:</p>			


<select class="form-control badge badge-xs mb-2" onchange="status_updatesu(this.options[this.selectedIndex].value, '<?php echo $row13['SYID']; ?>')">
    <option value="">Update Status</option>
    <option value="0">Unpaid</option>
    <option value="1">Partially paid</option>
    <option value="2">Fully Paid</option>
</select>



</div>
</div>
</div>
</div>




<div class="container-fluid">
  <div class="row">
<div class="col-sm-9">
</div>

<div class="col-sm-3">



<?php if ($statkong['payment_status'] == '0') : ?>
	<div class="form-group row">
	<span style="font-size: 36px; color: black; background-color: #ffcccf;
	border: px solid yellow; padding: 10px; animation: movingText 2s infinite; display: flex; justify-content: center;
     align-items: center; width: 100%; font-weight: bold;">UNPAID</span>
    </div>

	<style>
	@keyframes movingText {
	0% {
     transform: translateX(0);
	   }
      50%
      {
		transform: translateX(5px);
		}
		100% 
      {
		transform: translateX(0);
		}
		}
		</style>
		<?php endif; ?>


      <?php if ($statkong['payment_status'] == '1') : ?>
	    <div class="form-group row">
       <span style="font-size: 36px; color: black; background-color: #ffcc00;
		border: px solid yellow; padding: 10px; animation: movingText 2s infinite; display: flex; justify-content: center;
																				 align-items: center; width: 100%; font-weight: bold;">PARTIALLY PAID</span>
																		</div>

																		<style>
																			@keyframes movingText {
																				0% {
																					transform: translateX(0);
																				}

																				50% {
																					transform: translateX(5px);
																				}

																				100% {
																					transform: translateX(0);
																				}
																			}
																		</style>
																	<?php endif; ?>




																	<?php if ($statkong['payment_status'] == '2') : ?>
																
																		<div class="form-group row">
																		
																			<span style="font-size: 36px; color: green; background-color: lightgreen; border: px solid green; padding: 10px; animation: movingText 2s infinite; display: flex; justify-content: center; align-items: center; width: 100%; font-weight: bold;">FULLY PAID</span>
																		</div>

																		<style>
																			@keyframes movingText {
																				0% {
																					transform: translateX(0);
																				}

																				50% {
																					transform: translateX(5px);
																				}

																				100% {
																					transform: translateX(0);
																				}
																			}
																		</style>
																	<?php endif; ?>






                                  </div>
</div>
</div>
</div>     









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
<script type="text/javascript">
    function status_updatesu(value, SYID) {
        let url = "http://localhost/Enrollment/registrar/view_enrolled_stud.php?SYID=" + SYID + "&payment_status=" + value;
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // Update the payment status on the page dynamically
                    let updatedPaymentStatus = response.payment_status;
                    // Update the necessary elements on the page with the updatedPaymentStatus
                    // Example: document.getElementById('payment-status').innerText = updatedPaymentStatus;
                    console.log("Payment status updated: " + updatedPaymentStatus);
                } else {
                    console.log("Error occurred during update: " + response.message);
                }
            }
        };
        xhr.send();
    }
</script>

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