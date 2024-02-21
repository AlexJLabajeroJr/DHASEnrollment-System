<?php
include('includes/header.php');



$grade_level_id = $_POST['grade_level'];
// Retrieve the students based on the selected grade level
$queryer =  "SELECT * FROM `subject` as subj  INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id INNER JOIN grade_level as grad ON sched.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID AND grad.GRADE_LEVEL_ID = $grade_level_id";

$resultes = mysqli_query($conn, $queryer);
$row22 = mysqli_fetch_assoc($resultes);







$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();



?>
<style>
    @media print {
        @page {
            size: A4 landscape long;
        }
    }
</style>


<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">











            <?php

            $grade_level_id = $_POST['grade_level'];

            // Retrieve the students based on the selected grade level
            $queryer = "SELECT * FROM `subject` as subj  
            INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id 
            INNER JOIN room as r ON sched.room_id = r.room_id 
            INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id 
            INNER JOIN grade_level as grad ON sched.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID 
            WHERE grad.GRADE_LEVEL_ID = $grade_level_id 
            AND grad.GRADE_LEVEL_ID IN (11,14,15,16,17,18,19,20,21,22)";

            $resultes = mysqli_query($conn, $queryer);
            $row35 = mysqli_fetch_assoc($resultes);

            ?>










            <?php if ($row35) : ?>

                <div class='container mt-5'>
                    <div class='row'>
                        <div class='mt-4'>
                            <span class='h5 font-weight-bold pl-5 pr-5 pt-2 pb-2 border border-0'>&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                        </div>
                        <div class='col-sm-2 col-4'>
                            <img src='../img/log.png' alt='logo' class='d-block logo-img' height='100' width='150' style='margin-left: 50px'>&nbsp
                        </div>
                        <div class='col-sm-5 col-4 text-center mt-6'>
                            <h5>DIVINE HEALER ACADEMY OF SORSOGON</h5>
                            <p style='font-size: 15px'>EL Retiro Compound, Cabid-an, Sor. City</p>
                        </div>
                        <div class='col-sm-1'>
                        </div>
                        <div class='col-sm-1'>
                        </div>
                    </div>
                </div>










                <!-- title row -->

                <div class="container-fluid">
                    <div class="row">

                        <div class='col-sm-4 '>
                            <small class="pull-right">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                        </div>
                        <div class='col-sm-4 text-center '>
                            <h6 class="pull-right" style="text-transform: uppercase;">Grade: <?= $row22['GRADE_LEVEL']   . " " .  $row22['Section'] . "" ?></h6>

                            <h6 class="pull-right" style="text-transform: uppercase;">CLASS PROGRAM</h6>
                            <h6 class="pull-right" style="text-transform: uppercase;">SY:<?= $searchYrRow['school_year']; ?></h6>







                        </div>
                        <div class='col-sm-4 text-center'>
                            <small class="pull-right" style="text-transform: uppercase;">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                        </div>

                    </div>

                </div>

                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-12 table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 table-responsive">
                                <table class="table table-bordered table-striped" style="font-size:10px" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th class="text-center">Time</th>

                                            <th class="text-center">Activities</th>

                                            <!-- <th>Room</th> -->
                                            <th>Teacher</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Get the selected grade level
                                        $grade_level_id = $_POST['grade_level'];
                                        // Retrieve the students based on the selected grade level
                                        $query =  "SELECT * FROM `subject` as subj  INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id INNER JOIN room as r ON sched.room_id = r.room_id INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id INNER JOIN grade_level as grad ON sched.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID AND grad.GRADE_LEVEL_ID = $grade_level_id";

                                        $result = mysqli_query($conn, $query);

                                        // Set initial value for total subjects
                                        $num_subjects = 0;

                                        // Display the list of subjects
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<tr>';
                                                echo '<td class = "text-center">' . date('h:i A', strtotime($row['start_time'])) . ' - ' . date('h:i A', strtotime($row['end_time'])) . '</td>';

                                                echo '<td class = "text-center" >' . $row['subject_description'] . ' - ' . $row['day'] . '</td>';

                                                // echo '<td>' . $row['room_name'] . '</td>';
                                                echo '<td>' . $row['fac_name'] . '</td>';



                                                echo '</tr>';
                                                // Increment total subjects
                                                $num_subjects++;
                                            }
                                        } else {
                                            echo '<tr><td colspan="12">No Schedule found</td></tr>';
                                        }

                                        // Close the database connection
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <!-- <tr>
                                        <td colspan="2" align="right">
                                            <h6>Total Number of Subjects :</h6>
                                        </td>
                                        <td>
                                            <h5><php echo $num_subjects; ?></h5>
                                        </td>
                                    </tr> -->
                                    </tfoot>
                                </table>

                                <!-- /.col -->
                                <!-- /.row -->

                                <!-- /.row -->





                            </div>
        </section>










        <br>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>



        <br>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid text-center">
            <div class="row">


                <div class="col-sm-4 text-right">
                    <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                </div>
                <div class="col-sm-4 text-right">
                    <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                </div>

                <!-- border-bottom: 2px solid black -->

                <div class="col-sm-4 text-center">
                    <div class="container-fluid text-center">

                        <div class="text-center float-right" style="">Noted By: <br><b>L̲i̲t̲o̲ D̲o̲m̲i̲n̲g̲u̲e̲z̲</b><br> School Principal</div>


                        <div class="text-center "></div><br>
                    </div>

                </div>



            </div>
        </div>











        <br>














    <?php else : ?>


        <?php
                $grade_level_id = $_POST['grade_level'];

                // Retrieve the students based on the selected grade level
                $queryeri = "SELECT * FROM `subject` as subj
                INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id
                INNER JOIN room as r ON sched.room_id = r.room_id
                INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id
                INNER JOIN grade_level as grad ON sched.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID
                WHERE sched.sched_semester IN ('First','Second') AND  grad.GRADE_LEVEL_ID = $grade_level_id
                AND grad.GRADE_LEVEL_ID IN (23,24)";


                $resultesi = mysqli_query($conn, $queryeri);
                $row28 = mysqli_fetch_assoc($resultesi);

        ?>



        <div class='container mt-5'>
            <div class='row'>
                <div class='mt-4'>
                    <span class='h5 font-weight-bold pl-5 pr-5 pt-2 pb-2 border border-0'>&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                </div>
                <div class='col-sm-2 col-4'>
                    <img src='../img/log.png' alt='logo' class='d-block logo-img' height='100' width='150' style='margin-left: 50px'>&nbsp
                </div>
                <div class='col-sm-5 col-4 text-center mt-6'>
                    <h5>DIVINE HEALER ACADEMY OF SORSOGON</h5>
                    <p style='font-size: 15px'>EL Retiro Compound, Cabid-an, Sor. City</p>
                </div>
                <div class='col-sm-1'>
                </div>
                <div class='col-sm-1'>
                </div>
            </div>
        </div>










        <div class="container-fluid">
            <div class="row">

                <div class='col-sm-4 '>
                    <small class="pull-right">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                </div>
                <div class='col-sm-4 text-center '>
                    <h6 class="pull-right" style="text-transform: uppercase;">Grade: <?= $row22['GRADE_LEVEL']   . " " .  $row22['Section'] . "" ?></h6>
                    <h6 class="pull-right" style="text-transform: uppercase;">FIRST SEMESTER</h6>
                    <h6 class="pull-right" style="text-transform: uppercase;">CLASS PROGRAM</h6>
                    <h6 class="pull-right" style="text-transform: uppercase;">SY:<?= $searchYrRow['school_year']; ?></h6>




                </div>
                <div class='col-sm-4 text-center'>
                    <small class="pull-right" style="text-transform: uppercase;">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                </div>

            </div>

        </div>

        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12 table-responsive">
                <div class="row">
                    <div class="col-sm-12 col-md-12 table-responsive">
                        <table class="table table-bordered table-striped" style="font-size:13px" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Monday</th>
                                    <th class="text-center">Tuesday</th>
                                    <th class="text-center">Wednesday</th>
                                    <th class="text-center">Thursday</th>
                                    <th class="text-center">Friday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Get the selected grade level
                                $grade_level_id = $_POST['grade_level'];

                                // Retrieve the students based on the selected grade level
                                $query = "SELECT * FROM `subject` as subj  
                                          INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id 
                                          INNER JOIN room as r ON sched.room_id = r.room_id 
                                          INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id 
                                          INNER JOIN grade_level as grad ON sched.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID   AND  sched.sched_semester = 'First'
                                          AND grad.GRADE_LEVEL_ID = $grade_level_id
                                          ORDER BY sched.start_time ASC, sched.end_time ASC";

                                $result = mysqli_query($conn, $query);

                                // Set initial value for total subjects
                                $num_subjects = 0;

                                // Check if there are any rows returned
                                if (mysqli_num_rows($result) > 0) {

                                    // Initialize variables to keep track of session
                                    $is_morning_session = false;
                                    $is_afternoon_session = false;

                                    // Loop through each row and display the data in the table
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        // Check if current row is in morning session
                                        if (date('H:i:s', strtotime($row['start_time'])) < '13:00:00' && !$is_morning_session) {
                                            echo '<tr><th colspan="7" class="text-center">Morning Session</th></tr>';
                                            $is_morning_session = true;
                                            $is_afternoon_session = false;
                                        }

                                        // Check if current row is in afternoon session
                                        if (date('H:i:s', strtotime($row['start_time'])) >= '13:00:00' && !$is_afternoon_session) {
                                            echo '<tr><th colspan="7" class="text-center">Afternoon Session</th></tr>';
                                            $is_afternoon_session = true;
                                            $is_morning_session = false;
                                        }

                                        echo '<tr>';
                                        echo '<td class="text-center"></td>';
                                        echo '<td class="text-center">' . date('h:i A', strtotime($row['start_time'])) . ' - ' . date('h:i A', strtotime($row['end_time'])) . '</td>';

                                        // Check if subject is scheduled on Monday
                                        if (strpos($row['day'], 'M') !== false) {
                                            echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                        } else {
                                            echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                        }

                                        // Check if subject is scheduled on Tuesday
                                        if (strpos($row['day'], 'T') !== false) {
                                            echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                        } else {
                                            echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                        }

                                        // Check if subject is scheduled on Wednesday
                                        if (strpos($row['day'], 'W') !== false) {
                                            echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                        } else {
                                            echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                        }


                                        // Check if subject is scheduled on Thursday
                                        if (strpos($row['day'], 'TH') !== false) {
                                            echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                        } else {
                                            echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                        }

                                        // Check if subject is scheduled on Friday
                                        if (strpos($row['day'], 'F') !== false) {
                                            echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                        } else {
                                            echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                        }

                                        echo '</tr>';
                                        $num_subjects++;
                                    }
                                } else {
                                    echo '<tr><td colspan="12">No Schedule found</td></tr>';
                                }

                                // Close the database connection
                                // mysqli_close($conn);
                                ?>
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                        <td colspan="2" align="right">
                                            <h6>Total Number of Subjects :</h6>
                                        </td>
                                        <td>
                                            <h5><php echo $num_subjects; ?></h5>
                                        </td>
                                    </tr> -->
                            </tfoot>
                        </table>

                        <!-- /.col -->
                        <!-- /.row -->

                        <!-- /.row -->





                    </div>
                    </section>








                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="container-fluid text-center">
                        <div class="row">


                            <div class="col-sm-4 text-right">
                                <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                            </div>
                            <div class="col-sm-4 text-right">
                                <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                            </div>

                            <!-- border-bottom: 2px solid black -->

                            <div class="col-sm-4 text-center">
                                <div class="container-fluid text-center">

                                    <!-- <div class="text-center float-right" style="">Noted By: <br><b>L̲i̲t̲o̲ D̲o̲m̲i̲n̲g̲u̲e̲z̲</b><br> School Principal</div> -->


                                    <div class="text-center "></div><br>
                                </div>

                            </div>



                        </div>
                    </div>



                    <div class="container-fluid text-center">
                        <div class="row">


                            <div class="col-sm-4 text-right">
                                <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                            </div>
                            <div class="col-sm-4 text-right">
                                <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                            </div>

                            <!-- border-bottom: 2px solid black -->

                            <div class="col-sm-4 text-center">
                                <div class="container-fluid text-center">

                                    <div class="text-center float-right" style="">Noted By: <br><b>L̲i̲t̲o̲ D̲o̲m̲i̲n̲g̲u̲e̲z̲</b><br> School Principal</div>


                                    <div class="text-center "></div><br>
                                </div>

                            </div>



                        </div>
                    </div>

















                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>












                    <div class='container mt-5'>
                        <div class='row'>
                            <div class='mt-4'>
                                <span class='h5 font-weight-bold pl-5 pr-5 pt-2 pb-2 border border-0'>&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                            </div>
                            <div class='col-sm-2 col-4'>
                                <img src='../img/log.png' alt='logo' class='d-block logo-img' height='100' width='150' style='margin-left: 50px'>&nbsp
                            </div>
                            <div class='col-sm-5 col-4 text-center mt-6'>
                                <h5>DIVINE HEALER ACADEMY OF SORSOGON</h5>
                                <p style='font-size: 15px'>EL Retiro Compound, Cabid-an, Sor. City</p>
                            </div>
                            <div class='col-sm-1'>
                            </div>
                            <div class='col-sm-1'>
                            </div>
                        </div>
                    </div>










                    <div class="container-fluid">
                        <div class="row">

                            <div class='col-sm-4 '>
                                <small class="pull-right">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                            </div>
                            <div class='col-sm-4 text-center '>
                                <h6 class="pull-right" style="text-transform: uppercase;">Grade: <?= $row22['GRADE_LEVEL']   . " " .  $row22['Section'] . "" ?></h6>
                                <h6 class="pull-right" style="text-transform: uppercase;">SECOND SEMESTER</h6>
                                <h6 class="pull-right" style="text-transform: uppercase;">CLASS PROGRAM</h6>
                                <h6 class="pull-right" style="text-transform: uppercase;">SY:<?= $searchYrRow['school_year']; ?></h6>




                            </div>
                            <div class='col-sm-4 text-center'>
                                <small class="pull-right" style="text-transform: uppercase;">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                            </div>

                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 table-responsive">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 table-responsive">
                                    <table class="table table-bordered table-striped" style="font-size:13px" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center"></th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Monday</th>
                                                <th class="text-center">Tuesday</th>
                                                <th class="text-center">Wednesday</th>
                                                <th class="text-center">Thursday</th>
                                                <th class="text-center">Friday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Get the selected grade level
                                            $grade_level_id = $_POST['grade_level'];

                                            // Retrieve the students based on the selected grade level
                                            $queryor = "SELECT * FROM `subject` as subj  
                                          INNER JOIN schedule as sched ON sched.subject_id = subj.subject_id 
                                          INNER JOIN room as r ON sched.room_id = r.room_id 
                                          INNER JOIN faculty as fac ON sched.faculty_id = fac.faculty_id 
                                          INNER JOIN grade_level as grad ON sched.GRADE_LEVEL_ID = grad.GRADE_LEVEL_ID  
                                          AND  sched.sched_semester = 'second'  AND grad.GRADE_LEVEL_ID = $grade_level_id
                                          ORDER BY sched.start_time ASC, sched.end_time ASC";

                                            $result = mysqli_query($conn, $queryor);

                                            // Set initial value for total subjects
                                            $num_subjects = 0;

                                            // Check if there are any rows returned
                                            if (mysqli_num_rows($result) > 0) {

                                                // Initialize variables to keep track of session
                                                $is_morning_session = false;
                                                $is_afternoon_session = false;

                                                // Loop through each row and display the data in the table
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    // Check if current row is in morning session
                                                    if (date('H:i:s', strtotime($row['start_time'])) < '13:00:00' && !$is_morning_session) {
                                                        echo '<tr><th colspan="7" class="text-center">Morning Session</th></tr>';
                                                        $is_morning_session = true;
                                                        $is_afternoon_session = false;
                                                    }

                                                    // Check if current row is in afternoon session
                                                    if (date('H:i:s', strtotime($row['start_time'])) >= '13:00:00' && !$is_afternoon_session) {
                                                        echo '<tr><th colspan="7" class="text-center">Afternoon Session</th></tr>';
                                                        $is_afternoon_session = true;
                                                        $is_morning_session = false;
                                                    }

                                                    echo '<tr>';
                                                    echo '<td class="text-center"></td>';
                                                    echo '<td class="text-center">' . date('h:i A', strtotime($row['start_time'])) . ' - ' . date('h:i A', strtotime($row['end_time'])) . '</td>';

                                                    // Check if subject is scheduled on Monday
                                                    if (strpos($row['day'], 'M') !== false) {
                                                        echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                                    } else {
                                                        echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                                    }

                                                    // Check if subject is scheduled on Tuesday
                                                    if (strpos($row['day'], 'T') !== false) {
                                                        echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                                    } else {
                                                        echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                                    }

                                                    // Check if subject is scheduled on Wednesday
                                                    if (strpos($row['day'], 'W') !== false) {
                                                        echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                                    } else {
                                                        echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                                    }


                                                    // Check if subject is scheduled on Thursday
                                                    if (strpos($row['day'], 'TH') !== false) {
                                                        echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                                    } else {
                                                        echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                                    }

                                                    // Check if subject is scheduled on Friday
                                                    if (strpos($row['day'], 'F') !== false) {
                                                        echo '<td class="text-center">' . $row['subject_description'] . '<br><b style = " font-weight:400;">' . $row['fac_name'] . '</b></td>';
                                                    } else {
                                                        echo '<td class="text-center"></td>'; // Empty cell if no subject scheduled
                                                    }

                                                    echo '</tr>';
                                                    $num_subjects++;
                                                }
                                            } else {
                                                echo '<tr><td colspan="12">No Schedule found</td></tr>';
                                            }

                                            // Close the database connection
                                            mysqli_close($conn);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                                        <td colspan="2" align="right">
                                            <h6>Total Number of Subjects :</h6>
                                        </td>
                                        <td>
                                            <h5><php echo $num_subjects; ?></h5>
                                        </td>
                                    </tr> -->
                                        </tfoot>
                                    </table>

                                    <!-- /.col -->
                                    <!-- /.row -->

                                    <!-- /.row -->





                                </div>
                                </section>








                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>

                                <div class="container-fluid text-center">
                                    <div class="row">


                                        <div class="col-sm-4 text-right">
                                            <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                                        </div>

                                        <!-- border-bottom: 2px solid black -->

                                        <div class="col-sm-4 text-center">
                                            <div class="container-fluid text-center">

                                                <!-- <div class="text-center float-right" style="">Noted By: <br><b>L̲i̲t̲o̲ D̲o̲m̲i̲n̲g̲u̲e̲z̲</b><br> School Principal</div> -->


                                                <div class="text-center "></div><br>
                                            </div>

                                        </div>



                                    </div>
                                </div>



                                <div class="container-fluid text-center">
                                    <div class="row">


                                        <div class="col-sm-4 text-right">
                                            <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <!-- <div class="container">
                        <div class="row">
                            <div class="text-left float-right" style="border-bottom: 2px solid black">Noted By: <br><b>Lito Dominguez</b></div><br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="text-left float-right">School Principal</div><br>
                        </div>
                    </div> -->
                                        </div>

                                        <!-- border-bottom: 2px solid black -->

                                        <div class="col-sm-4 text-center">
                                            <div class="container-fluid text-center">

                                                <div class="text-center float-right" style="">Noted By: <br><b>L̲i̲t̲o̲ D̲o̲m̲i̲n̲g̲u̲e̲z̲</b><br> School Principal</div>


                                                <div class="text-center "></div><br>
                                            </div>

                                        </div>



                                    </div>
                                </div>




























































































                            <?php endif; ?>







































































                            <!-- /.content -->
                            </div>
                            <!-- ./wrapper -->
</body>

</html>


<?php include('includes/footer.php'); ?>