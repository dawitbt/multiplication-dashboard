<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiplication Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Multiplication Table</h1>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" name="number" id="number" required>
            <button type="submit">Show Table</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST["number"];
            echo "<h2>Table of $num</h2>";
            echo "<table>";
            for ($i = 1; $i <= 10; $i++) {
                $result = $num * $i;
                echo "<tr><td>$num x $i</td><td>= $result</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>

