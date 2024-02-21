<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Count Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 500px;">
        <canvas id="myChart"></canvas>
    </div>

    <?php
    // include database connection
    include '../db_con.php';

    // retrieve data from database
    $query = $conn->query("
        SELECT COUNT(*) AS total, GRADE_LEVEL, strand
        FROM schoolyr AS sch 
        INNER JOIN student AS st ON st.student_id = sch.student_id 
        INNER JOIN grade_level AS gr ON gr.GRADE_LEVEL_ID = st.GRADE_lEVEL_ID 
        WHERE enrollment_status = 2 AND archieve = 0 
        GROUP BY GRADE_LEVEL, strand
    ");

    if (!$query) {
        // handle error if query fails
        die('Error retrieving data: ' . $conn->error);
    }

    // initialize arrays for chart data
    $labels = [];
    $data = [];

    // fetch data into arrays
    while ($row = $query->fetch_assoc()) {
        $labels[] = $row['GRADE_LEVEL'] . "";
        $data[] = (int) $row['total'];
    }

    // encode arrays as JSON for use in chart
    $labelsJson = json_encode($labels);
    $dataJson = json_encode($data);

    // check if data was retrieved correctly
    // var_dump($labels, $data);
    ?>

    <script>
        const labels = <?php echo $labelsJson ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Students',
                data: <?php echo $dataJson ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
                borderWidth: 1
            }]
        };



        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>