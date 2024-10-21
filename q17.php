<?php
$aboveThreshold = []; // Initialize the result array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values from the form
    $numbersInput = $_POST['numbers'];
    $thresholdValue = (float)$_POST['threshold'];

    // Convert the input string to an array of numbers
    $numbersArray = array_map('trim', explode(',', $numbersInput));

    // Function to filter numbers above the threshold
    function getNumbersAboveThreshold($numbers, $threshold) {
        $result = [];
        foreach ($numbers as $number) {
            if ((float)$number > $threshold) {
                $result[] = $number;
            }
        }
        return $result;
    }

    // Get numbers above the threshold
    $aboveThreshold = getNumbersAboveThreshold($numbersArray, $thresholdValue);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threshold Filter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"], input[type="number"] {
            width: 300px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Filter Numbers Above a Threshold</h1>
    <form method="post" action="">
        <label for="numbers">Enter Numbers (comma-separated):</label><br>
        <input type="text" id="numbers" name="numbers" required><br>
        <label for="threshold">Enter Threshold:</label><br>
        <input type="number" id="threshold" name="threshold" step="any" required><br>
        <button type="submit">Filter Numbers</button>
    </form>

    <?php if (!empty($aboveThreshold)): ?>
        <h2>Numbers Greater Than <?= htmlspecialchars($thresholdValue) ?>:</h2>
        <p><?= implode(', ', $aboveThreshold) ?></p>
    <?php endif; ?>
</body>
</html>
