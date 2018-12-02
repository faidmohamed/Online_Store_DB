<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Store</title>
<link rel="stylesheet" href="styles.css"> <!-- css style sheet which 
adds visuals to webpage -->
</head>
<body>
<?php
include 'connectdb.php'
?>

<div>
<h2>OUR CUSTOMERS</h2> <!-- form to get customer information -->
<form action="costasc.php" method="post">
<?php
$query = "SELECT * FROM customers ORDER BY firstname";
$result = mysqli_query($conenction, $query);
if(!$result){
die("database query failed");
}

echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["fistname"];
    echo " ";
    echo $row["lastname"];
    echo <br>;
    echo "City: ".$row["city"];
    echo <br>;
    echo "Phone Number: ".$row["phonenumber"];
    echo <br>;
    echo <br>;
    echo "</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>
</form> 

</body>
</html>
