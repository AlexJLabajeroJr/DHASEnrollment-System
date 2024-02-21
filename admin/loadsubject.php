<?php
// loadsubject.php

include '../db_con.php';

$INST_ID = isset($_POST['INST_ID']) ? $_POST['INST_ID'] : '';

if (!empty($INST_ID)) {
    $query = "SELECT s.subject_id, s.subject_code, gr.GRADE_LEVEL_ID, gr.GRADE_LEVEL
              FROM `subject` s
              INNER JOIN schedule sc ON s.subject_id = sc.subject_id
              INNER JOIN grade_level gr ON sc.GRADE_LEVEL_ID = gr.GRADE_LEVEL_ID
              WHERE sc.faculty_id = $INST_ID";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container-fluid'>";
        echo "<div class='row'>";
        echo "<div class='col-sm-6 form-control border border-0'>";

        $options = '';

        while ($row = mysqli_fetch_assoc($result)) {
            $options .= '<option value="' . $row['subject_id'] . '">' . $row['subject_code'] . '</option>';
        }

        echo '<select name="Subject" class="form-control" style="width: 100%;">' . $options . '</select>';
        echo "</div>";

        mysqli_data_seek($result, 0); // Reset result set pointer

        echo "<div class='col-sm-6 form-control border border-0'>";

        $options = '';

        while ($row = mysqli_fetch_assoc($result)) {
            $options .= '<option value="' . $row['GRADE_LEVEL_ID'] . '">' . $row['GRADE_LEVEL'] . '</option>';
        }

        echo '<select name="COURSE_ID" class="form-control" style="width: 100%;">' . $options . '</select>';
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "No subjects found for the selected faculty.";
    }
} else {
    echo "Please select a faculty.";
}
