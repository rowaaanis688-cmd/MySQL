<?php
require "dbc.php";
session_start();
if (isset($_POST['city'])) {
    $city = $_POST['city'];
    $query = "SELECT * FROM customers
            WHERE city = '$city'
            ORDER BY name ";
    $result = mysqli_query($connection, $query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <style>

*{
    font-family: Arial, sans-serif;
    background-color: #f7d2f1;
    margin: 0;
    padding: 50px;
}
h1{
    color: #ef44c7;
}
.container {
    width: 500px;
    margin: auto;
    background-color: #eca1d2;
    padding: 30px;
    border-radius: 15px;
}
form {
    display: flex;
    justify-content: center;
}

select {
    width: 65%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
}

input[type="submit"] {
    padding: 12px 20px;
    background-color: #ef44c7;
    color: white;
    border: none;
    border-radius: 8px;
}

.customer {
    margin-top: 15px;
    padding: 15px;
    background-color: #e63aa4;
    border-radius: 8px;
}

</style>
</head>
<body>
<div class="container">
    <h1>Customers by City</h1>
    <form method="post">
        <select name="city">
    <option value="">Select City</option>
     <option value="Ejmiatsin">Ejmiatsin</option>
      <option value="Del Pilar">Del Pilar</option>
       <option value="Tumcon Ilawod">Tumcon Ilawod</option>
        <option value="Ashtarak">Ashtarak</option>
        <option value="	Ubonratana">Ubonratana</option>
        <option value="Chełm">Chełmn</option>
        <option value="Pippo Salvati">Pippo Salvati</option>
         <option value="Codi Pipkin">Codi Pipkin</option>

        </select>

        <input type="submit" value="Submit">

    </form>
<?php

if (isset($result)) {
    if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='customer'>";
        echo $row['name'];
        echo "</div>";

    } 
     }
else{
        echo "<div class='customer'>";
        echo"No customer in this city";
         echo "</div>";
    }
    }
?>
</div>
</body>
</html>