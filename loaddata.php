
                           
                           
                           
         <?php

            session_start();

            $query = "Select * from subject WHERE  GRADE_LEVEL_ID=" . $_POST['id'] . " AND SEMESTER = '" . $_POST['SEMESTER'] . "'";
            $result = mysqli_query($conn, $query);


            echo "<div class='col-sm-3 mt-2 text-dark'>";
            echo "<label>SUBJECT</label>";
            echo "<select name ='subject' id ='subject' class = 'form-control border border-secondary'>";


            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<option value = $row[subject_id]>$row[subject_code]$row[subject_description]</option>";
                }
                echo "</select>";
                mysqli_free_result($result);
            } else {
                echo "Failed query";
            }

            echo "</div>";
            ?>