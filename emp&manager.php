<?php
require "dbc.php";
session_start();
$query = "SELECT 
            emp.employee_name AS employee_name, 
            manager.employee_name AS manager_name
          FROM employees emp
          LEFT JOIN employees manager ON emp.manager_id = manager.employee_id";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees and Managers</title>
    <style>
        *{
            font-family: Arial, sans-serif;
            background-color: #f6edf4;
            padding: 30px;
            text-align: center;
        }
        h1 {
            color: #cb2e7f;
            margin-bottom: 25px;
        }
        table {
            width: 60%;
            margin: 0 auto;
            background: #ffffff;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #d81b60;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Employees & Their Managers</h1>
    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Manager Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              if(!empty($row['manager_name'])){
                $manager=$row['manager_name'];
              }else {
                $manager='No Manager';
              }
                echo "<tr>";
                echo "<td>" . $row['employee_name'] . "</td>";
                echo "<td>" . $manager . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>