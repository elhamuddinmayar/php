<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Scores Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Enter Student Scores</h1>
    <form method="post" action="">
        <label for="students">Students (Name,Score1,Score2,...):</label><br>
        <input type="text" id="students" name="students[]" required><br>
        <button type="submit">Add Student</button>
    </form>

    <?php if (isset($topStudent)): ?>
        <h2>Top Student</h2>
        <p>Top student: <?= htmlspecialchars($topStudent) ?>, Average score: <?= number_format($highestAverage, 2) ?></p>
    <?php endif; ?>

    <h3>More Students</h3>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Scores Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Enter Student Scores</h1>
    <form method="post" action="q16.php">
        <label for="students">Students (Name,Score1,Score2,...):</label><br>
        <input type="text" id="students" name="students[]" required><br>
        <button type="submit">Add Student</button>
    </form>

    <?php if (isset($topStudent)): ?>
        <h2>Top Student</h2>
        <p>Top student: <?= htmlspecialchars($topStudent) ?>, Average score: <?= number_format($highestAverage, 2) ?></p>
    <?php endif; ?>

    <h3>More Students</h3>
    
</html>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get student data from the form
    $students = $_POST['students'];
    $studentScores = [];

    // Parse the input and populate the student scores array
    foreach ($students as $student) {
        $data = explode(',', $student);
        $name = trim($data[0]);
        $scores = array_map('floatval', array_slice($data, 1));
        $studentScores[] = [$name, $scores];
    }

    // Function to find the top student
    function findTopStudent($studentsScores) {
        $topStudent = null;
        $highestAverage = 0;

        foreach ($studentsScores as $student) {
            $name = $student[0];
            $scores = $student[1];

            if (count($scores) > 0) {
                $averageScore = array_sum($scores) / count($scores);

                if ($averageScore > $highestAverage) {
                    $highestAverage = $averageScore;
                    $topStudent = $name;
                }
            }
        }

        return [$topStudent, $highestAverage];
    }

    list($topStudent, $highestAverage) = findTopStudent($studentScores);
}
?>


