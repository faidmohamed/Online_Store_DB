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
         $newphone = $_POST["newphone"];
         $query = 'UPDATE customer SET phonenumber =' . $newphone . ' WHERE customer.cusID = ' . $cusID;

         if (!mysqli_query($connection, $query)) {
               die("ERROR2: insert failed - " . mysqli_error($connection));
         }

         $query2 = 'SELECT firstname, lastname FROM customer WHERE customer.cusID = ' . $cusID;
         $result=mysqli_query($connection,$query);
          if (!$result) {
               die("database query2 failed.");
           }
         while($row=mysqli_fetch_assoc($result)){
         echo $row["firstname"]. " ".$row["lastname"]."'s "."phone number has been updated successfully" ;
         }
         mysqli_close($connection);
      ?>
   </body>
</html>