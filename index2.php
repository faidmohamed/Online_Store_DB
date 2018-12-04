<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
    include 'connectdb.php'
?>
<h2> Customer Information: </h2>
<form action="costasc.php" method="post">
    <?php
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

<br>
<h2> Add Purchase:</h2> <!-- form to add a new customer to the database -->
<form action="addpurchase.php" method="post" >
    <?php
            echo "<h4> Customer: </h4>";
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
            }
            mysqli_free_result($result);
        ?>
    <br><br>
        <?php
            echo "<h4> Purchase: </h4>";
            $query = "SELECT * FROM product ORDER BY description";
            $result = mysqli_query($connection, $query);
            if(!$result){
                die("database query failed");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<input type="radio" name = "product" value = '
                    .$row["prodID"].'>'
                    .$row["description"];
                echo "<br>";
            }
            mysqli_free_result($result);
        ?>
    <br>
    <input type="submit" value="Add Purchase">
</form>
<br>


<h2> Add Customer:</h2> <!-- form to add a new customer to the database -->
<form action="addcustomer.php" method="post" id = "addcustomerform" >
    First Name:     <input type="text" name="firstname"><br>
    Last Name:      <input type="text" name="lastname"><br>
    City:           <input type="text" name="city"><br>
    Phone Number:   <input type="text" name="phonenumber"><br>
    Agent:
    <select name="agentnumber">
        <?php
            $query = "SELECT * FROM agent ORDER BY lastname";
            $result = mysqli_query($connection, $query);
            if(!$result){
                die("database query failed");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row["agentID"].'">'.$row["firstname"]." ".$row["lastname"].'</option>';
                echo "<br>";
            }
            mysqli_free_result($result);
        ?>
    </select>
    <br>
    <input type="submit" value="Add Customer">
</form>

<h2> Change Customer Phone Number: </h2>
<form action="updatephone.php" method="post">
    <?php
        $query = "SELECT * FROM customer ORDER BY lastname";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("database query failed");
        }
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name = "customer" value = '
                .$row["cusID"].'>'
                .$row["firstname"].' '.$row["lastname"];
            echo " -- ";
            echo "Phone Number: ".$row["phonenumber"]."<br>"."<br>";
        }
        mysqli_free_result($result);
    ?>
New Phone Number:  <input type="text" name="newphone"><br>    
<input type="submit" value="Update Phone Number">
</form>
<br>

<h2> Change Customer Phone Number: </h2>
<form action="updatephone.php" method="post">
    <?php
        $query = "SELECT * FROM customer ORDER BY lastname";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("database query failed");
        }
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<input type="radio" name = "customer" value = '
                .$row["cusID"].'>'
                .$row["firstname"].' '.$row["lastname"];
        }
        mysqli_free_result($result);
    ?>  
<input type="submit" value="Delete Customer">
</form>
<br>


</body>
</html>