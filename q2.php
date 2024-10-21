
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<body>
    <h1>Currency Converter</h1>
    <form action="q2.php" method="post">
        <label for="amounts">Enter amounts (separated by commas):</label><br>
        <input type="text" id="amounts" name="amounts" required><br><br>

        <label for="direction">Convert from:</label><br>
        <select id="direction" name="direction" required>
            <option value="USD_to_EUR">USD to EUR</option>
            <option value="EUR_to_USD">EUR to USD</option>
        </select><br><br>

        <input type="submit" value="Convert">
    </form>
</body>
</html>


<?php

// Define the exchange rate constant
define('EXCHANGE_RATE', 0.85); // 1 USD = 0.85 EUR

/**
 * Converts an array of amounts between USD and EUR.
 *
 * @param array $amounts The array of amounts to convert.
 * @param string $direction The conversion direction: 'USD_to_EUR' or 'EUR_to_USD'.
 * @return array The converted amounts.
 */
function convertCurrency(array $amounts, string $direction): array {
    $convertedAmounts = [];

    foreach ($amounts as $amount) {
        if ($direction === 'USD_to_EUR') {
            $convertedAmounts[] = round($amount * EXCHANGE_RATE, 2); // Convert to EUR
        } 
        elseif ($direction === 'EUR_to_USD') {
            $convertedAmounts[] = round($amount / EXCHANGE_RATE, 2); // Convert to USD
        } 
        else {
            throw new InvalidArgumentException("Invalid conversion direction.");
        }
    }

    return $convertedAmounts;
}

// Process form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amountsInput = $_POST['amounts'];
    $directionInput = $_POST['direction'];

    // Convert the input amounts into an array of floats
    $amounts = array_map('floatval', explode(',', $amountsInput));

    try {
        $convertedAmounts = convertCurrency($amounts, $directionInput);
        echo "Converted amounts: " . implode(", ", $convertedAmounts) . " ";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . " ";
    }
} else {
    echo "Invalid request method.";
}
?>
