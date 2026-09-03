<?php
require "dbc.php";
session_start();
$query = "SELECT * FROM customers WHERE salary > 20000";

$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers With Salary > 20000</title>

    <style>
        *{
            font-family: Arial;
            background-color: #ffe6f2;
            text-align: center;
        }

        h1 {
            color: #ef3ab0;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #db89d6;
            padding: 12px 20px;
        }

        th {
            background-color: #f2c2da;
            color: white;
        }
    </style>
</head>

<body>
<h1>Customers With Salary Greater Than 20,000</h1>
<table>

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Salary</th>
    </tr>

    <?php

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . $row["customer_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["salary"] . "</td>";

        echo "</tr>";
    }

    ?>

</table>

</body>
</html>

<?php
mysqli_close($conn);
?>