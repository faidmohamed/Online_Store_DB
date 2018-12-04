<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display Customers</title>
</head>
   <body>
      <?php
         include 'connectdb.php';
      ?>
      <h4>Product Revenue</h4>
      <?php
         $prodID =  $_POST["product"];
         $query = "SELECT SUM(quantity) s FROM purchases WHERE purchases.prodID =" . $prodID;
         $query2 = "SELECT cost FROM product WHERE product.prodID =" . $prodID;
         $result=mysqli_query($connection,$query);
         $result2=mysqli_query($connection,$query2);
         if (!$result || !$reult2) {
            die("ERROR: " . mysqli_error($connection));
         }
         $row = mysqli_fetch_assoc($result);
         $row2 = mysqli_fetch_assoc($result2);
         $sum = intval($row["s"]);
         $cost = intval($row["cost"]);
         $Rev = $sum*$cost;
         $revenue = (string)$Rev;
         echo "total Revenue is: " . $Revenue;
         mysqli_close($connection);

      ?>

   <br><br>
   <form action="index2.php" method="post">
   <input type="submit" value="go back">
   </form> 

   </body>


</html>