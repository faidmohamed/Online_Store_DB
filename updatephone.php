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
         $query = 'UPDATE customer SET phonenumber ="' . $newphone . '" WHERE customer.cusID = ' . $cusID;
         if (!mysqli_query($connection, $query)) {
               die("ERROR2: insert failed - " . mysqli_error($connection));
         }
         else
            echo "phone number has been updated successfully" ;
         mysqli_close($connection);
      ?>
   </body>
</html>