<?php
$mergedScores = []; // Initialize the merged scores array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values from the form
    $scores1Input = $_POST['scores1'];
    $scores2Input = $_POST['scores2'];

    // Convert input strings to associative arrays
    $scores1 = array_map('trim', explode(',', $scores1Input));
    $scores2 = array_map('trim', explode(',', $scores2Input));

    // Create associative arrays from inputs
    $scoresArray1 = [];
    $scoresArray2 = [];

    foreach ($scores1 as $entry) {
        list($name, $score) = explode(':', $entry);
        $scoresArray1[trim($name)] = (int)trim($score);
    }

    foreach ($scores2 as $entry) {
        list($name, $score) = explode(':', $entry);
        $scoresArray2[trim($name)] = (int)trim($score);
    }

    // Function to merge student scores
    function mergeStudentScores($array1, $array2) {
        $mergedArray = $array1;

        foreach ($array2 as $student => $score) {
            if (isset($mergedArray[$student])) {
                $mergedArray[$student] = max($mergedArray[$student], $score);
            } else {
                $mergedArray[$student] = $score;
            }
        }

        return $mergedArray;
    }

    // Merge the arrays
    $mergedScores = mergeStudentScores($scoresArray1, $scoresArray2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Student Scores</title>
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
    <h1>Merge Student Scores</h1>
    <form method="post" action="">
        <label for="scores1">Enter Scores for First Array (Name:Score, separated by commas):</label><br>
        <input type="text" id="scores1" name="scores1" required placeholder="Alice:85, Bob:90"><br>
        <label for="scores2">Enter Scores for Second Array (Name:Score, separated by commas):</label><br>
        <input type="text" id="scores2" name="scores2" required placeholder="Bob:92, Charlie:75"><br>
        <button type="submit">Merge Scores</button>
    </form>

    <?php if (!empty($mergedScores)): ?>
        <h2>Merged Scores:</h2>
        <pre><?php print_r($mergedScores); ?></pre>
    <?php endif; ?>
</body>
</html>
