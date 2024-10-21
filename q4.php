<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Type Detector</title>
</head>
<body>
    <h1>Data Type Detector</h1>
    <form action="q4.php" method="post">
        <label for="inputData">Enter your data (comma-separated):</label><br>
        <textarea id="inputData" name="inputData" rows="10" cols="50" required></textarea><br><br>
        <input type="submit" value="Detect Data Types">
    </form>
</body>
</html>
<?php

class InvalidTypeException extends Exception {
    public function __construct($message) {
        parent::__construct($message);
    }
}

function detectDataTypes($variables) {
    $results = [];
    
    foreach ($variables as $var) {
        // Trim and check if empty
        $var = trim($var);
        
        // Handle different types
        if (is_numeric($var)) {
            // Check if it's an integer or a float
            $results[] = "Variable: " . var_export($var, true) . " | Type: " . (strpos($var, '.') !== false ? 'float' : 'integer');
        } elseif (strtolower($var) === 'true' || strtolower($var) === 'false') {
            $results[] = "Variable: " . var_export($var, true) . " | Type: boolean";
        } elseif ($var === 'null') {
            $results[] = "Variable: " . var_export($var, true) . " | Type: null";
        } elseif ($var === '') {
            $results[] = "Variable: " . var_export($var, true) . " | Type: string (empty)";
        } else {
            $results[] = "Variable: " . var_export($var, true) . " | Type: string";
        }
    }
    
    return $results;
}

// Process the input data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inputData'])) {
    $inputData = $_POST['inputData'];
    $dataArray = explode(',', $inputData); // Split input by commas

    try {
        $results = detectDataTypes($dataArray);
        echo "<h1>Detected Data Types</h1><pre>";
        foreach ($results as $result) {
            echo $result . PHP_EOL;
        }
        echo "</pre>";
        echo '<a href="index.html">Go Back</a>';
    } catch (InvalidTypeException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
