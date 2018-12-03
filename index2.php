<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
    include 'connectdb.php'
?>

<form action="costasc.php" method="post">
<?php
    echo "<h4> Customers: </h4>";
    $query = "SELECT * FROM customer ORDER BY lastname";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("database query failed");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name = "customer" value = '
            .$row["cusID"].'>'
            .$row["firstname"].' '.$row["lastname"];
        echo "<br>";
        echo "City: ".$row["city"]."<br>";
        echo "Phone Number: ".$row["phonenumber"]."<br>"."<br>";
    }
    mysqli_free_result($result);
    ?>
<input type="submit" value="Get More information">
</form> 

<div>
        <br>
        <h2> ADD A NEW CUSTOMER:</h2> <!-- form to add a new customer to the database -->
        <form action="addcustomer.php" method="post" >
            Customer's First Name: <input type="text" name="firstname"><br><br>
            Customer's Last Name: <input type="text" name="lastname"><br><br>
            Customer's City <input type="text" name="city"><br><br>
            Customer's Phone Number: <input type="text" name="phonenum"><br><br>
            
            <input type="submit" value="Add New Customer">
        </form>
    </div>

</body>
</html>