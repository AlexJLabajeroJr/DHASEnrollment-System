<?php
include('includes/header.php');


$setyr = "Select * from school_year where school_year_status = '1'";
$searchYrResult = $conn->query($setyr);
$searchYrRow = $searchYrResult->fetch_assoc();



$setSem = "Select * from tblsemester where SETSEM= '1'";
$searchSemResult = $conn->query($setSem);
$searchSetResultRow = $searchSemResult->fetch_assoc();



?>




<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->



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

                    </div>
                    <div class='col-sm-4 text-center '>
                        <h6 class="pull-right" style="text-transform: uppercase;"></h6>

                        <h6 class="pull-right" style="text-transform: uppercase;">LIST OF SUBJECTS</h6>
                        <h6 class="pull-right" style="text-transform: uppercase;">SY:<?= $searchYrRow['school_year']; ?></h6>


                    </div>
                    <div class='col-sm-4 text-center mt-3'>
                        <small class="pull-right" style="text-transform: uppercase;">&nbsp&nbspPrinted Date: <?php echo date('m/d/Y'); ?></small>
                    </div>

                </div>

            </div>

            <BR>













            <!-- info row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 table-responsive">
                    <table class="table table-bordered table-striped" style="font-size:11px" cellspacing="0">
                        <thead>
                            <tr>

                                <th></th>
                                <th>Subject Description </th>
                                <th>Subject Code</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../db_con.php';

                            // Get the selected grade level


                            // Get the selected grade level
                            // $SYID = $_POST['SYID'];

                            // Retrieve the students based on the selected grade level
                            $query = "SELECT * FROM subject
                            WHERE subject_id  LIKE '%" . $_POST['subject_id'] . "%'";

                            $result = mysqli_query($conn, $query);

                            // Display the list of students
                            $num_students = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';

                                    echo '<td></td>';
                                    echo '<td>' . $row['subject_description'] . '</td>';
                                    echo '<td>' . $row['subject_code'] . '</td>';





                                    echo '<td>';


                                    $num_students++;
                                }
                            } else {
                                echo '<tr><td colspan="5">No Subjects found</td></tr>';
                            }

                            // Free the result set
                            mysqli_free_result($result);

                            // Close the database connection
                            mysqli_close($conn);
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" align="right">
                                    <h6>Total Number of Subject/s :</h6>
                                </td>
                                <td>
                                    <h5><?php echo $num_students; ?></h5>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                    <!-- /.col -->
                    <!-- /.row -->

                    <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>


<?php include('includes/footer.php'); ?>