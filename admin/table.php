<?php



// if (!isset($_SESSION['account_id'])) {
//    redirect(web_root . "../index.php");
// }



session_start();
include '../db_con.php';

if (!isset($_SESSION['admin_id'])) {
	header("location: ../index.php");
}


$page_title = "Admin Dashboard ";
include('includes/header.php');




// $currentyear = date('Y');
// $nextyear =  date('Y') + 1;
// $sy = $currentyear . '-' . $nextyear;
// $_SESSION['School_year'] = $sy;



$sql = "SELECT count(*) as 'enrollees' FROM student WHERE NewEnrollees = '1' && status = 'Pending'";
$result = $conn->query($sql);
$enrollees = $result->fetch_assoc();













$sad = "SELECT * FROM account WHERE account_id = $_SESSION[admin_id]";
$ako = $conn->query($sad);
$row = $ako->fetch_assoc();


$setIn = "SELECT * FROM account WHERE p_p = '" . $row['p_p'] . "'";
$searchIMResult = $conn->query($setIn);
$searchInResultRow = $searchIMResult->fetch_assoc();



// if (isset($row['p_p'])) {
//    $setIM = "SELECT * FROM student WHERE p_p = '" . $row['p_p'] . "'";
//    $searchIMResult = $conn->query($setIM);
//    $searchIMResultRow = $searchIMResult->fetch_assoc();
// } else {
//    // Handle the error condition when 'p_p' key is not defined in $row array.
// }



// $sql = "SELECT count(*) as 'enrollee' FROM schoolyr WHERE enrollment_status = '2' && archieve = '0'";
// $resulter = $conn->query($sql);
// $enrollee = $resulter->fetch_assoc();



$sqler = "SELECT count(*) as 'enrolleer' FROM faculty ";
$resulteri = $conn->query($sqler);
$enrolleer = $resulteri->fetch_assoc();

$sqlerO = "SELECT count(*) as 'enrolleerO' FROM room ";
$resulteriO = $conn->query($sqlerO);
$enrolleerO = $resulteriO->fetch_assoc();






$sqlf = "SELECT count(*) as 'enrolleex' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '11' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterx = $conn->query($sqlf);
$enrolleex = $resulterx->fetch_assoc();


$sqlfor = "SELECT count(*) as 'enrolleexo' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '14' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxo = $conn->query($sqlfor);
$enrolleexo = $resulterxo->fetch_assoc();

$sqlfore = "SELECT count(*) as 'enrolleexoe' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '15' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoe = $conn->query($sqlfore);
$enrolleexoe = $resulterxoe->fetch_assoc();

$sqlfored = "SELECT count(*) as 'enrolleexoed' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '16' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoed = $conn->query($sqlfored);
$enrolleexoed = $resulterxoed->fetch_assoc();


$sqlforeder = "SELECT count(*) as 'enrolleexoeder' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '17' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoeder = $conn->query($sqlforeder);
$enrolleexoeder = $resulterxoeder->fetch_assoc();


$sqlforedere = "SELECT count(*) as 'enrolleexoedere' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '18' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoedere = $conn->query($sqlforedere);
$enrolleexoedere = $resulterxoedere->fetch_assoc();



$sqlforedered = "SELECT count(*) as 'enrolleexoedered' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '19' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoedered = $conn->query($sqlforedered);
$enrolleexoedered = $resulterxoedered->fetch_assoc();


$sqlforedereder = "SELECT count(*) as 'enrolleexoedereder' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '20' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoedereder = $conn->query($sqlforedereder);
$enrolleexoedereder = $resulterxoedereder->fetch_assoc();


$sqlforederedery = "SELECT count(*) as 'enrolleexoederedery' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '21' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoederedery = $conn->query($sqlforederedery);
$enrolleexoederedery = $resulterxoederedery->fetch_assoc();


$sqlforederederys = "SELECT count(*) as 'enrolleexoederederys' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '22' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoederederys = $conn->query($sqlforederederys);
$enrolleexoederederys = $resulterxoederederys->fetch_assoc();


$sqlforederederyst = "SELECT count(*) as 'enrolleexoederederyst' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '23' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoederederyst = $conn->query($sqlforederederyst);
$enrolleexoederederyst = $resulterxoederederyst->fetch_assoc();


$sqlforederederysta = "SELECT count(*) as 'enrolleexoederederysta' FROM schoolyr as sch INNER JOIN student as stud ON sch.student_id = stud.student_id INNER JOIN grade_level as grad ON stud.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID WHERE stud.GRADE_LEVEL_ID = '24' && sch.enrollment_status = '2' && sch.archieve = '0'";
$resulterxoederederysta = $conn->query($sqlforederederysta);
$enrolleexoederederysta = $resulterxoederederysta->fetch_assoc();







?>



<div class="wrapper">

	<!-- Preloader -->
	<!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/d2.png" alt="AdminLTELogo" height="60" width="60">
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

	<!-- /.navbar -->












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
					<!-- <img src="../img/9.jpg" > -->
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


					<li class="nav-item menu-open">
						<a href="Dashboard_admin.php" class="nav-link ">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
								<!-- <i ></i>   class="right fas fa-angle-left" -->
							</p>
						</a>

					</li>
					<li class="nav-item">
						<a href="Pre_registration.php" class="nav-link active">
							<i class="nav-icon fas fa-copy"></i>
							<p>
								New Enrollee

								<span class="right badge badge-danger"> <span id="success"> <?= $enrollees['enrollees']; ?></span></span>

							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="" class="nav-link">
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
					<li class="nav-item">
						<a href="schedule.php" class="nav-link">
							<i class="nav-icon far fa-calendar-alt"></i>
							<p>
								Schedule
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>

						<ul class="nav nav-treeview">


							<li class="nav-item">
								<a href="schedule.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
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
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"></h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<a href="Pre_registration.php" class="btn btn-1  border border-1 bg-light btn-xs float-end text-right"><i class="fa fa-arrow-left" aria-hidden="true"></i>BACK</a>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<br>
		<br>


		<!-- Main content -->













		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-folder"></i>
					ENROLLED STUDENTS PER GRADE LEVEL
				</h3>
			</div>
			<div class="card-body">

				<div class="row">
					<div class="col-5 col-sm-3">
						<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
							<!-- <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#g" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Home</a> -->

							<a class="nav-link active" id="vert-tabs-profile-tab" data-toggle="pill" href="#g1" role="tab" aria-controls="vert-tabs-profile" aria-selected="true">Grade 1</a>

							<a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#g2" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Grade 2</a>

							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g3" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 3</a>

							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g4" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 4</a>

							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g5" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 5</a>

							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g6" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 6</a>


							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g7" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 7</a>


							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g8" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 8</a>


							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g9" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 9</a>


							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g10" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 10</a>

							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g11" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 11</a>


							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#g12" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Grade 12</a>
						</div>
					</div>
					<div class="col-7 col-sm-9">


						<div class="tab-content" id="vert-tabs-tabContent">


							<!-- <div class="tab-pane text-left fade show active" id="g" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                            </div> -->
							<div class="tab-pane text-left fade show active" id="g1" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"><input value="<?= $enrolleex['enrolleex']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 1 St.Joseph <br>
														<br>
														<a href="tbl1.php" class=" text-dark bg-warning  " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; border-width:3px; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/jo.jpg" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>
							<div class="tab-pane fade" id="g2" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoeder['enrolleexoeder']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 2 St.Lorenzo Ruiz <br>
														<br>
														<a href="tbl2.php" class=" text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/enzo.jpg" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>
							<div class="tab-pane fade" id="g3" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoe['enrolleexoe']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 3 Our Lady of Fatima <br>
														<br>
														<a href="tbl3.php" class="  text-dark bg-warning  " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/mama.webp" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>
							<div class="tab-pane fade" id="g4" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoed['enrolleexoed']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 4 St. Michael Archangel <br>
														<br>
														<a href="tbl4.php" class="  text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/mic.webp" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>


							<div class="tab-pane fade" id="g5" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoeder['enrolleexoeder']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 5 .Our Lady of Divine Healer <br>
														<br>
														<a href="tbl5.php" class=" text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/sor.jpg" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>


							<div class="tab-pane fade" id="g6" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoedere['enrolleexoedere']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 6 St. Isdore the Farmer<br>
														<br>
														<a href="tbl6.php" class="  text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/dore.webp" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>


							<div class="tab-pane fade" id="g7" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoedered['enrolleexoedered']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 7 St. Therese of Lisieux<br>
														<br>
														<a href="tbl7.php" class="  text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/there.jpg" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>

							<div class="tab-pane fade" id="g8" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoedereder['enrolleexoedereder']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 8 St. John Paul II<br>
														<br>
														<a href="tbl8.php" class=" text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/pol.jpg" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>


							<div class="tab-pane fade" id="g9" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoederedery['enrolleexoederedery']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 9 St.Peter the Apostle<br>
														<br>
														<a href="tbl9.php" class="  text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/pete.webp" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>

							<div class="tab-pane fade" id="g10" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoederederys['enrolleexoederederys']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 10 St.Peter Calungsod<br>
														<br>
														<a href="tbl10.php" class="  text-dark bg-warning " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/lung.jpg" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>

							<div class="tab-pane fade" id="g11" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoederederyst['enrolleexoederederyst']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 11 <br>
														<br>
														<a href="tbl11.php" class="  text-dark bg-warning  " style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/pray.png" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>

							<div class="tab-pane fade" id="g12" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
								<section class="content">

									<!-- Default box -->
									<div class="card">
										<div class="card-body row">
											<div class="col-5 text-center d-flex align-items-center justify-content-center">
												<div class="">
													<h2>Total<strong> Enrolled </strong></h2>
													<p class="lead mb-5"> <input value="<?= $enrolleexoederederysta['enrolleexoederederysta']; ?>" class="form-control form-control-lg border border-0  text-dark bg-transparent text-center" style="font-size: 60px;"><br> Grade - 12 <br>
														<br>
														<a href="tbl12.php" class="  text-dark bg-warning" style="font-size:15px; border-radius: 10px 10px 10px 10px; overflow: hidden; border-style: solid; ">
															&nbsp &nbsp &nbsp<span class="fa fa-eye"></span> <b>View Enrolled Students &nbsp &nbsp</b>
														</a>
													</p>
												</div>
											</div>
											<div class="col-7">

												<div class="form-group">
													<img src="../img/dov.png" height="500px" />
												</div>
											</div>
										</div>
									</div>

								</section>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- /.card -->
		</div>













		<!-- right col -->
	</div>
	<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
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


<script>
	$('.toastsDefaultDefault').click(function() {
		$(document).Toasts('create', {
			title: 'Room Availability',
			body: `<table class="table table-bordered table-striped" style="font-size:10px" cellspacing="0">
                  <thead class="text-center">
                     <tr>
                        <th>&nbspRoom_name&nbsp</th>
                        <th>&nbspBuilding_name&nbsp</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     <?php
						$query = "Select * from room WHERE availability =1";
						$query_run = mysqli_query($conn, $query);

						if (mysqli_num_rows($query_run) > 0) {
							foreach ($query_run as $room) {
						?>
                     <tr>
                        <td><?= $room['room_name']; ?></td>
                        <td><?= $room['building_name']; ?></td>
                     </tr>
                     <?php
							}
						} else {
							echo "<h5> No Record Found </h5>";
						}
						?>
                  </tbody>
               </table>`
		});
	});
</script>












<?php include('includes/footer.php'); ?>