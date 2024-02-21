<?php
include('includes/header.php');





?>




<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="page-header ">
                        <i class="fa fa-globe"></i>Divine Healer Academy of Sorsogon.
                        <small class="pull-right">Printed Date: <?php echo date('m/d/Y'); ?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <h3 align="center">&nbsp&nbspList Of Students per Grade_level</h3>
                <!-- <h5 align="center"><php echo isset($_POST['grade_level']) ? "Course/Year :" . $_POST['grade_level'] : ''; ?></h5> -->
            </div>
            <!-- info row -->
            <!-- Table row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 table-responsive">
                    <table class="table table-bordered  table-striped" style="font-size:11px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>IdNo.</th>
                                <th>IMG</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Contact No.</th>

                                <th>Status</th>
                                <th>Grade level</th>
                                <th>Strand</th>
                                <th>Date of Enrollment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../db_con.php';

                            // Get the selected grade level
                            $grade_level_id = $_POST['grade_level'];

                            // Retrieve the students based on the selected grade level
                            $query = "SELECT * FROM schoolyr sy
              INNER JOIN student s ON sy.student_id = s.student_id
              INNER JOIN grade_level g ON s.GRADE_LEVEL_ID = g.GRADE_LEVEL_ID
              WHERE enrollment_status = 2 AND g.GRADE_LEVEL_ID = $grade_level_id";
                            $result = mysqli_query($conn, $query);

                            // Display the list of students
                            $num_students = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $row['student_id'] . '</td>';
                                    echo '<td><img src="' . $row['p_p'] . '" style="width="40" height="40" opacity: .8"></td>';
                                    echo '<td><b>' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '</b></td>';
                                    echo '<td>' . $row['street'] . '' . $row['barangay'] . '' . $row['district'] . '' . $row['city'] . '</td>';
                                    echo '<td>' . $row['gender'] . '</td>';
                                    echo '<td>' . $row['contact_number'] . '</td>';

                                    echo '<td>';
                                    if ($row['enrollment_status'] == 1) {
                                        echo "<B>PENDING</B>";
                                    } else if ($row['enrollment_status'] == 2) {
                                        echo "<B class='badge badge-1 bg-success' style='background-color:#BFDB38;border-radius:15px 15px 15px 15px;overflow:hidden;border-style:solid;border-width:3px;border-color:#ffffff;'>ENROLLED</B>";
                                    } else if ($row['enrollment_status'] == 3) {
                                        echo "<B class='badge badge-danger'>REJECT</B>";
                                    }
                                    echo '</td>';

                                    echo '<td>' . $row['GRADE_LEVEL'] . '</td>';
                                    echo '<td>' . $row['strand'] . '</td>';
                                    echo '<td>' . date("l, F j, Y  h:iA", strtotime($row['DATE_ENROLLED'])) . '</td>';

                                    $num_students++;
                                }
                            } else {
                                echo '<tr><td colspan="12">No students found</td></tr>';
                            }

                            // Free the result set
                            mysqli_free_result($result);

                            // Close the database connection
                            mysqli_close($conn);
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9" align="right">
                                    <h4>Total Number of Student/s :</h4>
                                </td>
                                <td>
                                    <h4><?php echo $num_students; ?></h4>
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