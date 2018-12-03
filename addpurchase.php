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
         $prodID = $_POST["product"];
         
         $pull_query = 'SELECT * FROM purchases WHERE purchases.prodID = '. $prodID . 'AND purchases.cusID = ' .$cusID;

         $result = mysqli_query($connection,$pull_query);
         if (!$result) {
            $query = 'INSERT INTO customer VALUES("' . $cusID . '","' . $prodID . '","'. 1 . '")';
            if (!mysqli_query($connection, $query)) {
               die("ERROR1: insert failed - " . mysqli_error($connection));
            }
         }

         $row=mysqli_fetch_assoc($result);
         $newQuan = intval($row["quantity"]) + 1;
         $newQuantity = (string)$newkey;

         $query = "UPDATE purchases SET quanitity = " . $newQuantity . " WHERE purchases.prodID = " . $prodID . " AND purchases.cusID = " .$cusID;
         
         if (!mysqli_query($connection, $query)) {
               die("ERROR2: insert failed - " . mysqli_error($connection));
         }

         echo "a purchase has been added";
         mysqli_close($connection);
      ?>
   </body>
</html>