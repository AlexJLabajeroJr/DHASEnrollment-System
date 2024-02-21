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


<?php
echo PHP_VERSION;
?>




<div class="wrapper">

    <!-- Navbar -->
    <?php include('includes/navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row ">
                    <!-- /.col -->


                    <div class="col-sm-4">
                        <h6 style="font-family:Times New Roman; font-size:30px; " class="text-center">"EDUCARE EST SANARE"</h6>
                        <p style="font-family:Times New Roman; font-size:15px; " class="text-center">"To Educate is to Heal"</p>
                    </div>
                    <div class="col-sm-4">

                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Call Us:(083)228-9722</a></li>
                            <li class="breadcrumb-item"><a href="home.php">healingservants@gmail.com</a></li>
                            <li><a href="home.php">www.healingservants.com</a></li>
                            <!-- <li class="breadcrumb-item"><a href="index.php">Login</a></li> -->
                            <!-- <li class="breadcrumb-item active">home</li> -->
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->





        <div class="content">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <img class="img-fluid" src="img/121.png" alt="">
                            </div>
                        </div>



                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <div class="content">
            <div class="container mt-3 mb-3">
                <div class="row">



                    <div class="col-sm-9">
                        <h1 style="font-family:Times New Roman; font-size:40px; ">DIVINE HEALER ACADEMY OF SORSOGON</h1>
                        <p style="font-family:Times New Roman;">X2JJ+GPF, El Retiro Compound, Cabid-an,, Sorsogon City, Sorsogon, Philippines</p>
                    </div>

                    <div class="col-sm-1 mt-3">
                    </div>



                    <br>

                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">




                        <div class="card" style="    border-radius: 15px 15px 15px 15px;
    overflow: hidden;   box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      ">
                            <div class="">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="    border-radius: 15px 15px 15px 15px;
    overflow: hidden;   box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      ">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="img/sad.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="img/qwe.jpg" alt="Second slide">
                                        </div>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>

                        </div>





                        <div class="card">
                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <img class="d-block w-100" src="img/1.png" alt="Second">

                                </div>
                                <br>


                            </div>


                        </div>

                        <div class="card">
                            <div class="card-body border border-1">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <img class="d-block w-100" src="img/2.png" alt="Second">

                                </div>
                                <br>


                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card-body">


                            </div>

                        </div> -->












                    </div>





                    <!-- /.col-md-6 -->
                    <div class="col-lg-4 bg-reds ">
                        <div class="card" style="background-color:  #002d72;  border-radius: 15px 50px 30px; border-style: dashed;
  border-width: 4px; border-color:#ffffff; color:white;">
                            <div class="card-body" style="background-color:  #002d72;  border-radius: 15px 50px 30px; border-style: dashed; border-width: 7px; border-color: #ffffff;">


                                <p class="text-center text-light" style="font-family:Segoe Script; font-size:20px;"><strong>Enrollment is going for the School Year:<strong><br><input value="''<?= $searchYrRow['school_year']; ?>''" class=" form-control text-light text-center mt-2" style=" background-color:  #002d72; font-size:22px; "></b></p>

                                <p class="text-center text-light" style="font-family:Segoe Script; font-size:20px">Semester:<input value="''<?= $searchSetResultRow['SEMESTER']; ?> Semester''" class=" form-control   input-sm text-light  text-center " style=" background-color:  #002d72; font-size:22px;  "></p>


                            </div>
                        </div>
                        <div style="  border-radius: 15px 15px 15px 15px;
    overflow: hidden;   box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    wow fadeInUp" data-wow-delay="0.3s ">
                            <!-- <div class="card-header">
                                    <h5 class="card-title m-0" style="text-align:center">ABOUT US</h5>
                                </div> -->


                            <div style="   background: #FFC107;  ">
                                <div class=" card-body">
                                    <img class="img-fluid " style="  border-radius: 15px 15px 15px 15px;
    overflow: hidden;   box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    wow fadeInUp" src=" img/d665.jpg" alt="">



                                </div>
                            </div>



                        </div>


                        <div>
                            <!-- <div class="card-header">
                                    <h5 class="card-title m-0" style="text-align:center">ABOUT US</h5>
                                </div> -->

                            <br>
                            <img class="img-fluid border border-1" style="  border-radius: 15px 15px 15px 15px;
    overflow: hidden;   " src=" img/112.jpg" alt="">


                            <br>
                            <img class="img-fluid border border-1 mt-2" style="  border-radius: 15px 15px 15px 15px;
    overflow: hidden;   " src=" img/1234.jpg" alt="">

                            <!-- 
                            <div class=" card-body">
                                <img class="img-fluid" src=" img/d6.jpg" alt="">

                            </div> -->


                        </div>





                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>











        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->









    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>









    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; <a>2023 DHAS ENROLLMENT SYSTEM | Developed by Alex J. Labajero jr.</a></strong>

        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->



<?php include('includes/footer.php'); ?>



<style>
    form {
        background: #000;
    }

    .form-control {

        fill: none;
        background: transparent;
        border: none;

        font-size: 18px;

    }
</style>