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
</form> 

</body>
</html>