<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalized Message Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>

<h1>Get Your Personalized Message</h1>
<form action="q9.php" method="POST">
    <label for="age">Enter your Age:</label>
    <input type="number" id="age" name="age" min="0" required>
    <br><br>

    <label for="membership">Membership Status:</label>
    <select id="membership" name="membership">
        <option value="regular">Regular Member</option>
        <option value="premium">Premium Member</option>
    </select>
    <br><br>

    <label for="amount">Purchase Amount ($):</label>
    <input type="number" id="amount" name="amount" min="0" required>
    <br><br>

    <input type="submit" value="Generate Message">
</form>

</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = intval($_POST['age']);
    $membership = $_POST['membership'];
    $amount = floatval($_POST['amount']);

    // Using nested ternary operators to generate a personalized message
    $message = ($age < 18) ? "Hello, young shopper! " :
              (($age >= 18 && $age < 60) ? "Greetings, valued adult! " :
              "Welcome, esteemed senior! ");

    $message .= ($membership === 'premium') ? "As a premium member, " : "As a regular member, ";

    $message .= ($amount > 100) ? "you'll receive a 20% discount on your next purchase!" :
              (($amount >= 50) ? "you qualify for a 10% discount!" :
              "thank you for shopping with us, every bit helps!");

    echo $message;
}
?>
