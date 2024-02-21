<?php

session_start();

$page_title = "About Us Page";
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





                    <div class="col-lg-6">
                        <div class="card" style=" background-image:url('img/el.jpg'); background-repeat:no-repeat; border-style: solid;
          border-width: 1px; border-style: solid;
            border-width: 2px;  border-color:	#ffffff;    overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
          ">
                            <div class="card-body">



                                <h1 class="text-light text-center" style=" font-family:Segoe Script;background-color:  #002d72;  border-radius: 15px 15px 50px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
          ">MISSION</h1>

                                <p>
                                <ul>
                                    <p style=" font-family:Segoe UI;">
                                        Thus the Divine Healer Academy of Sorsogon as sharer of the life and mission of the local Church commits itself to: &
                                    </p>


                                    <li style="font-family:Segoe UI;"> Instill a desire for a sincere search of God in prayer and service to others.</li>

                                    &nbsp

                                    <li style="font-family:Segoe UI;"> Facilitate the formation of a value system with emphasis on respect for life and human dignity, uplift the marginalized and promote responsible stewardship of God's creation.</li>
                                    &nbsp
                                    <li style="font-family:Segoe UI;"> Train the students' minds for creative and critical thinking and make them globally competitive.</li>

                                    <li style="font-family:Segoe UI;">Inculcate a profound sense of nationalism and patriotism.</li>
                                    <li>Reach out to the wounded and all others in need of healing of woundedness brought about by broken families and other dysfunctional relationships.</li>
                                    &nbsp
                                    <li style="font-family:Segoe UI;">Develop a genuine and filial devotion o our Lady and Mother of the Divine Healer.</li>
                                    &nbsp
                                    <li style="font-family:Segoe UI;">Witness a life of faith based on Justice equality and solidarity.</li>

                                    </p>

                                </ul>


                            </div>
                        </div>



                        <div class="card" style=" background-image:url('img/el.jpg'); background-repeat:no-repeat; border-style: solid;
            border-width: 1px;  border-style: solid;
               border-width: 2px;  border-color:	#ffffff;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
          ">
                            <div class="card-body">



                                <h1 class=" text-center text-light " style="font-family:Segoe Script; background-color:#026440 ;  border-radius: 15px 15px 50px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">VISION</h1>

                                <p>

                                <ul style=" font-family:Segoe UI;">
                                    <br>
                                    Divine Healer Academy of Sorsogon is a private Catholic and Healing
                                    Institution which is centered in Christ, the Divine Healer is
                                    committed to the
                                    wholistic formation of students into
                                    compassionate, caring Filipino Christians
                                    </p>











                                </ul>


                            </div>
                        </div>














                    </div>


                    <div class="col-lg-6">
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="card" style=" background-image:url('img/.png');  background-repeat:no-repeat;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
       ">
                                    <div class=" card-body">

                                        <h1 class=" text-center text-light " style="font-family:Segoe Script; background-color:	#CC5500;  border-color:	#ffffff; border-radius: 15px 15px 50px;   overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
      ">GOAL</h1>

                                        <p>
                                        <ul style=" font-family:Segoe UI;">
                                            Greatly recognize the need of achieving orderliness, discipline and respect among its internal and external stakeholders in the attainment of the harmonious interpersonal relationship and spirit of oneness.
                                            Highly adhere to its existing policies and standards, rules and regulations as to promote a culture of discipline, i.e.., discipline people, discipline thoughts and discipline actions.



                                            </p>
                                        </ul>




                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">


                                <div class="card" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <div class=" card-body">




                                        <p class="text-center text-primary " style=" font-family:Segoe UI; font-size:20px;  ">PROFILE
                                            OF A DHAS
                                            GRADUATES</p>

                                        <div class="container-fluid">
                                            <div class="row">


                                                <div class="col-sm-6">

                                                    <img src="img/log.png" height="75px" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <p style="font-family:Segoe Script; font-size:13px;"><b>Divine Healer Academy of Sorsogon</b> </p>
                                                </div>

                                                <sub class="text-center"> &nbsp &nbspMission School | &nbsp Established in year 2003 </sub>
                                            </div>
                                        </div>

                                        <br>


                                        <p>
                                        <ul class="text-light" style="font-family:Segoe Script; fo">


                                            <sub class="text-danger bg-red mt-2"><b>C-COMPASSIONATE</b></sub><br>
                                            <sub class="text-yellow bg-yellow mt-4"><b> A-ATTENTIVE</b></sub><br>
                                            <sub class="text-purple bg-purple mt-3"><b>R-RESPONSIBLE</b></sub><br>
                                            <sub class="text-pink bg-pink"><b> I-INTELLIGENT</b></sub><br>
                                            <sub class="text-blue bg-blue"><b>N-NURTURING</b></sub><br>
                                            <sub class="text-green bg-green"><b>G-GOD-CENTERED</b></sub>
                                            </p>
                                        </ul>

                                        <p style="font-size:10px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis, quas sequi voluptates, eligendi consequatur labore inventore necessitatibus autem quasi nisi pariatur ullam soluta, sed saepe aliquidautem quasi nisi pariatur ullam soluta, sed saepe aliquidautem quasi nisi pariatur ullam soluta, .</p>



                                    </div>



                                </div>







                                <div>
                                    <div class=" card-body">



                                    </div>



                                </div>



                            </div>

                            <div class="col-lg-6">
                                <div class="card" style="  border-radius: 10px 10px 10px  10px ; overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);
       ">
                                    <div class="card-body" style="border-radius: 15px 50px 30px;  border-style: solid;
      border-width: 1px;  border-color:	#ffffff;">

                                        <h1 class="text-center text-danger bg-purple" style=" font-family:Segoe Script; font-size:25px;   border-radius: 15px 15px 50px;  overflow: hidden;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.19);"><b>CORE VALUES</b></h1>

                                        <p>
                                        <ul style="font-family:Segoe Script;">
                                            <b class="text-light" style="background-color:	#79836e">F-FAITH</b><br>
                                            "One strives to be a good example of Christian life"<br>
                                            <b class="bg-info">I-INTEGRITY</b><br>
                                            "One walks the talks"<br>
                                            <b class="text-light" style="background-color:	      #780912">R-RESPECT</b><br>
                                            "One shows respect, gains respect"<br>
                                            <b class="text-light" style="background-color:	                 #8e7cc3">E-EXCELLENCE</b><br>
                                            "One who is blessed, is light to others"<br>
                                            <b class="text-light" style="background-color:	                #ee5c41"> S-SERVICE</b><br>
                                            "One walks the extra mile"
                                            </p>
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
    </div>










    <!-- /.content -->
</div>
<!-- /.content-wrapper -->









<!-- 
    <style type="text/css">
        .log {
            float: left;
            margin: 20px;
        }
    </style> -->












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