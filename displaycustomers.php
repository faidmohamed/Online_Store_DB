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

      <?php
         $quantity =  $_POST["quantity"];
         $query = 'SELECT firstname, lastname, description FROM customer,product,purchases WHERE customer.cusID = purchases.cusID AND product.prodID = purchases.prodID AND quantity >'. $quantity. ' ORDER BY lastname, firstname';
         echo $query;
         echo "<br>";
         $result=mysqli_query($connection,$query);
         if (!$result)) {
               die("ERROR: " . mysqli_error($connection));
         }
         
         while ($row = mysqli_fetch_assoc($result)) {
            echo $row["firstname"].' '.$row["lastname"] .' -- '. $row["description"];
            echo "<br>";
        }       
         mysqli_close($connection);
      ?>
   </body>

   <br><br>
   <form action="index2.php" method="post">
   <input type="submit" value="go back">
   </form> 

</html>