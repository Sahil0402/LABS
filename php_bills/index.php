<!DOCTYPE html>
<html>

<head>
    <title>Electricity Bill Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Electricity Bill Calculator</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="units">Enter the units consumed</label>
                <input type="number" name="units" id="units" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate Bill</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the units consumed from the form
            $units = $_POST["units"];

            // Calculate the bill amount based on the given conditions
            if ($units <= 50) {
                $bill = $units * 3.50;
            } elseif ($units <= 150) {
                $bill = 50 * 3.50 + ($units - 50) * 4.00;
            } elseif ($units <= 250) {
                $bill = 50 * 3.50 + 100 * 4.00 + ($units - 150) * 5.20;
            } else {
                $bill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + ($units - 250) * 6.50;
            }

            // Display the bill amount
            echo "<div class='alert alert-success mt-3'>Your bill amount for $units units is Rs. $bill</div>";
        }
        ?>
    </div>
</body>

</html>