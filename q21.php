<?php
$transformedArray = []; // Initialize the transformed array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input string from the form
    $inputString = $_POST['numbers'];

    // Convert the input string to an array of numbers
    $numbersArray = array_map('trim', explode(',', $inputString));

    // Define a closure to double each number
    $double = function($num) {
        return (float)$num * 2; // Cast to float to handle decimal inputs
    };

    // Function to transform the array using the callback
    function transformArray($numbers, $callback) {
        $result = []; // Initialize an array to hold transformed values

        foreach ($numbers as $number) {
            $result[] = $callback($number); // Apply the callback to each number
        }

        return $result; // Return the transformed array
    }

    // Call the transformArray function with the numbers array and the closure
    $transformedArray = transformArray($numbersArray, $double);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Transformer</title>
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
    <h1>Array Transformer</h1>
    <form method="post" action="">
        <label for="numbers">Enter Numbers (comma-separated):</label><br>
        <input type="text" id="numbers" name="numbers" required placeholder="1, 2, 3, 4, 5"><br>
        <button type="submit">Transform</button>
    </form>

    <?php if (!empty($transformedArray)): ?>
        <h2>Transformed Array:</h2>
        <pre><?php print_r($transformedArray); ?></pre>
    <?php endif; ?>
</body>
</html>
