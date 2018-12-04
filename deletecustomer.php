<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Customer</title>
</head>
   <body>
      <?php
         include 'connectdb.php';
      ?>

      <?php
         $cusID =  $_POST["customer"];
         $query = 'DELETE FROM customer WHERE customer.cusID = ' . $cusID;
         if (!mysqli_query($connection, $query)) {
               die("ERROR: delete failed - " . mysqli_error($connection));
         }
         else
            echo "customer successfully removed" ;
         mysqli_close($connection);
      ?>
   </body>

   <br><br>
   <form action="index2.php" method="post">
   <input type="submit" value="go back">
   </form> 

</html>