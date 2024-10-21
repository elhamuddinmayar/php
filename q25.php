<?php
function transform2DArray($array, $callback) {
    $result = []; // Initialize an array to hold transformed values

    foreach ($array as $row) {
        $resultRow = []; // Initialize a row array
        foreach ($row as $element) {
            $resultRow[] = $callback($element); // Apply the callback to each element
        }
        $result[] = $resultRow; // Add the transformed row to the result
    }

    return $result; // Return the transformed 2D array
}

$resultArray = []; // Initialize the result array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input from the form
    $input = $_POST['arrayInput'];
    
    // Convert the input string into a 2D array
    $inputArray = array_map(function($row) {
        return array_map('intval', explode(',', trim($row)));
    }, explode("\n", trim($input)));

    // Define a callback function to apply (e.g., square each element)
    $callback = function($num) {
        return $num * $num; // Example: square the number
    };

    // Transform the 2D array using the higher-order function
    $resultArray = transform2DArray($inputArray, $callback);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transform 2D Array</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        textarea {
            width: 300px;
            height: 150px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Transform 2D Array</h1>
    <form method="post" action="">
        <label for="arrayInput">Enter a 2D Array (comma-separated rows):</label><br>
        <textarea id="arrayInput" name="arrayInput" required placeholder="1,2,3\n4,5,6\n7,8,9"></textarea><br>
        <button type="submit">Transform</button>
    </form>

    <?php if (!empty($resultArray)): ?>
        <h2>Transformed 2D Array:</h2>
        <pre><?php print_r($resultArray); ?></pre>
    <?php endif; ?>
</body>
</html>
