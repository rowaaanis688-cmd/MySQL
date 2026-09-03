<?php
require "dbc.php";
session_start();
$search_name = $_POST['customer_name'] ?? '';

$query = "SELECT * FROM customers WHERE name LIKE '%$search_name%'";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Customer</title>
    <style>
        * { font-family: Arial, sans-serif; 
        text-align: center;
         padding: 30px;
         background-color: #f5cbf2;
         }
        table { width: 50%; 
        margin: 20px auto;
     }
        th, td {
             padding: 10px; 
             border: 1px solid #f7aef2;
              text-align: left
              ; }
        th { background-color: #dd1698;
         color: white;
         }
         h1{
            color:#dd1698;
         }
         button{
            background-color:#dd1698;
         }
         .
    </style>
</head>
<body>
    <h1>Search cuctomer</h1>
    <form method="POST">
        <input type="text" name="customer_name" placeholder="Eenter name" required>
        <button type="submit">Search</button>
    </form>
<?php
if ($search_name) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
?>