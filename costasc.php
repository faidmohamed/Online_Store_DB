<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Purchases</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>List of Purchases:</h1>
<ol>
<?php
   $whichOwner= $_POST["customer"];
   $query = "SELECT * FROM customer, purchases, product WHERE customer.cusID =  purchases.cusID 
            AND product.prodID = purchases.prodID AND customer.cusID =".$whichOwner." ORDER BY cost ASC";
    echo $query;
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    echo "<ol>";
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["description"]."\t".$row["cost"];
        echo '</li>';
     }
    echo "</ol>";
     mysqli_free_result($result);
    echo '<form action="costasc.php" method="post">';
    echo '<input value = "'.$whichOwner.'">';    
?>
</ol>

<input type="submit" value="sort by cost: ascending">
</form> 
<form action="costdesc.php" method="post">
<input type="submit" value="sort by cost: descending">
</form>
<form action="descasc.php" method="post">
<input type="submit" value="sort by description: ascending">
</form>
<form action="descdesc.php" method="post">
<input type="submit" value="sort by description: descending">
</form>
<br><br>
<form action="index2.php" method="post">
<input type="submit" value="go back">
</form> 

<?php
   mysqli_close($connection);
?>
</body>
</html>