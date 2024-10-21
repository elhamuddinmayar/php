<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Discount Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>

<h1>Discount Calculator</h1>
<form action="q8.php" method="POST">
    <label for="years">Years of Membership:</label>
    <input type="number" id="years" name="years" min="0" required>
    <br><br>

    <label for="premium">Are you a Premium Member?</label>
    <select id="premium" name="premium">
        <option value="no">No</option>
        <option value="yes">Yes</option>
    </select>
    <br><br>

    <input type="submit" value="Calculate Discount">
</form>

</body>
</html>
<?php

function calculateDiscount($years, $isPremium) {
    $discount = 0;

    // Determine the base discount based on membership duration
    if ($years > 5) {
        $discount = 30;
    } elseif ($years >= 3) {
        $discount = 20;
    } else {
        $discount = 10;
    }

    // Check for premium membership
    if ($isPremium === 'yes') {
        $discount += 10; // Increase discount by 10%
    }

    return $discount;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $years = intval($_POST['years']);
    $premium = $_POST['premium'];

    $discount = calculateDiscount($years, $premium);

    echo "Your discount is: " . $discount . "%";
}
?>
