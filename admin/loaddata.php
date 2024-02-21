<?php
include '../db_con.php';

$gradeLevelId = isset($_POST['gradeLevelId']) ? $_POST['gradeLevelId'] : '';
$semester = isset($_POST['semester']) ? $_POST['semester'] : '';

// if (isset($gradeLevelId) and ($semester)) {
//     echo "Grade Level ID: " . $gradeLevelId . "<br>";
//     echo "Semester: " . $semester . "<br>";
// }


if ($gradeLevelId && $semester) {
    $stmt = $conn->prepare("SELECT * FROM subject WHERE GRADE_LEVEL_ID = ? AND SEMESTER = ?");
    $stmt->bind_param("is", $gradeLevelId, $semester);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $gradeLevelId = isset($_POST['gradeLevelId']) ? $_POST['gradeLevelId'] : '';
        $semester = isset($_POST['semester']) ? $_POST['semester'] : '';

        $stmt2 = $conn->prepare("SELECT * FROM subject WHERE GRADE_LEVEL_ID = ? AND SEMESTER = ?");
        $stmt2->bind_param("is", $gradeLevelId, $semester);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        echo "<div class = 'text-left'>";
        echo "<label class = 'text-left' for='subject'>SUBJECT</label>
        <select name='subject' id='subject' class='form-control border border-1 ' required>
        <option value=''>Select</option>";

        while ($row = mysqli_fetch_assoc($result2)) {
            echo "<option value='{$row['subject_id']}'>{$row['subject_code']}</option>";
        }

        echo "</select>";
        echo "</div>";

        // Close the second prepared statement and its result set
        $stmt2->close();
        $result2->close();
    } else {
        echo "No subjects found";
    }

    // Close the first prepared statement and its result set
    $stmt->close();
    $result->close();
} else {
    echo "Please select a grade level and terms";
}
