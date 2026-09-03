<?php
require "dbc.php";
session_start();
$query = "SELECT customers.name, COUNT(orders.order_id) AS order_count 
          FROM customers 
          LEFT JOIN orders 
          ON customers.customer_id = orders.customer_id 
          GROUP BY customers.customer_id";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Orders Count</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #efbfeb;
            padding: 20px;
        }
        h1 {
            color: #ee09c0;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            background: #f292df;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f758aa;
            color: #ffffff;
            font-weight: bold;
        }
        tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <h1>Customer Orders Count</h1>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Total Orders</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){ 
             echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
             echo "<td>" . $row['order_count'] . "</td>";
             echo "</tr>";}
             ?>
        </tbody>
    </table>
</body>
</html>