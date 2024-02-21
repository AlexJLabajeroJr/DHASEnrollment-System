<?php

session_start();

$page_title = "Home Page";
include('includes/header.php');



include 'db_con.php';


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();

$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();

?>




<div class="wrapper">

    <!-- Navbar -->
    <?php include('includes/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <br>



        <div class="content">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12">



                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-3 text-purple">
                                    <p style="font-family:Segoe Script; font-size:25px"><b>We care ,We Share!</b></p>
                                </div>
                                <div>
                                    <img src="img/heart.png" height="35px" />
                                </div>
                                <div class="col-sm-3">
                                </div>
                            </div>
                        </div>




                    </div>



                    <div class="col-lg-6">
                        <div class="card" style=" background-image:url('img/el.jpg'); background-repeat:no-repeat; border-style: solid;
  border-width: 1px; border-style: solid;
  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">


                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <label style="font-family:Segoe Script;">School Location:</label>
                                <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.4875990242776!2d124.02960521461213!3d12.981303090849506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a0eef79ea417c3%3A0xcf0c634ea87b1eb5!2sDivine%20Healer%20Academy%20of%20Sorsogon%20Inc.!5e1!3m2!1sen!2sbd!4v1673413977880!5m2!1sen!2sbd" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                            </div>



                        </div>

                    </div>


                    <div class="col-lg-6">
                        <div class="card" style=" background-image:url('img/el.jpg'); background-repeat:no-repeat; border-style: solid;
  border-width: 1px; border-style: solid;
  border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">
                            <div class="card-body">

                                <h1 class="text-center " style=" font-family:Segoe Script; font-size:25px;    "><b>CONTACT DETAILS</b></h1>

                                <p>
                                <ul style="font-family:Segoe Script;">
                                    <b class="text-light" style="background-color:#79836e;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); ">&nbsp DIVINE HEALER ACADEMY OF SORSOGON&nbsp</b><br>

                                    X2JJ+GPF, El Retiro Compound, Cabid-an,, Sorsogon City, Sorsogon, Philippines<br>
                                    <b class="bg-info" style="background-color:#79836e;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); ">&nbspHOURS&nbsp</b><br>


                                    <abbr title="Hours"></abbr>Monday - Friday: 9:00 AM to 5:00 PM
                                    <br>
                                    <b class="text-light" style="background-color:	     #ee5c41;;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); ">&nbspPHONE&nbsp</b><br>
                                    " (083) 228-9722"<br>
                                    <b class="text-light" style="background-color:	                 #8e7cc3 ;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19); ">&nbspEMAIL&nbsp </b><br>
                                    healingservants@gmail.com<br>

                                    </p>




                                    <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>


                                    <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>

                                    <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>


                                </ul>
                                <br>



                            </div>
                        </div>

                    </div>






                </div>







               
            </div>
           
        </div>
    </div>










   
</div>



















<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; <a>2023 DHAS ENROLLMENT SYSTEM | Developed by Alex J. Labajero jr.</a></strong>

    <!-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div> -->
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->



<?php include('includes/footer.php'); ?>


<!-- 
CORE VALUES
F-FAITH
"One strives to be a good example of Christian life"
I-INTEGRITY
"One walks the talks"
R-RESPECT
"One shows respect, gains respect"
E-EXCELLENCE
"One who is blessed, is light to others"
S-SERVICE
"One walks the extra mile" -->