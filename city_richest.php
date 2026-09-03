<?php
require "dbc.php";
session_start();
if (isset($_POST['city'])) {
    $city = $_POST['city'];
    $query = "SELECT name, salary
            FROM customers
            WHERE city = '$city'
            ORDER BY salary DESC
            LIMIT 3";

    $result = mysqli_query($connection, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Richest Customers</title>
    <style>

        * {
            font-family: Arial;
            background-color: #f2c5eb;
            padding: 50px;
        }

        .all {
            width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            color: #e834a6;
        }

        input {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #e72bc2;
            color: white;
            border: none;
            padding: 10px 20px;
        }

        .customer {
            margin-top: 15px;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 8px;
        }

    </style>
</head>
<body>

<div class="all">

    <h2>Richest Customers</h2>

    <form method="post">
        <input type="text" name="city" placeholder="Enter City to find the richest" required>
        <input type="submit" value="Submit">

    </form>

    <?php

    if (isset($result)) {

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='customer'>";
                echo  $row['name'];
                echo "<br>";
                echo "</div>";
            }

        } else {
            echo "<div class='customer'>";
            echo "No customers in this city";
            echo "</div>";

        }

    }

    ?>

</div>

</body>

</html>