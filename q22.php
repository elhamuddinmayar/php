<?php
class StringManipulator {
    private $string;

    public function __construct($string) {
        $this->string = $string;
    }

    public function uppercase() {
        $this->string = strtoupper($this->string);
        return $this; // Return the instance for chaining
    }

    public function reverse() {
        $this->string = strrev($this->string);
        return $this; // Return the instance for chaining
    }

    public function addPrefix($prefix) {
        $this->string = $prefix . $this->string;
        return $this; // Return the instance for chaining
    }

    public function addSuffix($suffix) {
        $this->string = $this->string . $suffix;
        return $this; // Return the instance for chaining
    }

    public function getString() {
        return $this->string; // Return the manipulated string
    }
}
?>
<?php
include 'StringManipulator.php'; // Include the string manipulator class

$resultString = ""; // Initialize the result string

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input string and manipulation options from the form
    $inputString = $_POST['inputString'];
    $toUpper = isset($_POST['toUpper']);
    $toReverse = isset($_POST['toReverse']);
    $prefix = $_POST['prefix'];
    $suffix = $_POST['suffix'];

    // Create an instance of StringManipulator
    $stringManipulator = new StringManipulator($inputString);

    // Chain methods based on user input
    if ($toUpper) {
        $stringManipulator->uppercase();
    }
    if ($toReverse) {
        $stringManipulator->reverse();
    }
    if (!empty($prefix)) {
        $stringManipulator->addPrefix($prefix);
    }
    if (!empty($suffix)) {
        $stringManipulator->addSuffix($suffix);
    }

    // Get the final manipulated string
    $resultString = $stringManipulator->getString();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Manipulator</title>
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
    <h1>String Manipulator</h1>
    <form method="post" action="">
        <label for="inputString">Enter a String:</label><br>
        <input type="text" id="inputString" name="inputString" required><br>

        <input type="checkbox" id="toUpper" name="toUpper">
        <label for="toUpper">Convert to Uppercase</label><br>

        <input type="checkbox" id="toReverse" name="toReverse">
        <label for="toReverse">Reverse String</label><br>

        <label for="prefix">Add Prefix:</label><br>
        <input type="text" id="prefix" name="prefix" placeholder="Prefix"><br>

        <label for="suffix">Add Suffix:</label><br>
        <input type="text" id="suffix" name="suffix" placeholder="Suffix"><br>

        <button type="submit">Manipulate String</button>
    </form>

    <?php if (!empty($resultString)): ?>
        <h2>Result:</h2>
        <p><?= htmlspecialchars($resultString) ?></p>
    <?php endif; ?>
</body>
</html>
