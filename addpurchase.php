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
         
         $pull_query = "SELECT quantity FROM purchases WHERE purchases.prodID = '. $prodID . 'AND purchases.cusID = ' .$cusID";

         $result = mysqli_query($connection,$pull_query);
         if (!$result) {
            die("database max query failed.");
         }

         $row=mysqli_fetch_assoc($result);
         $newQuan = intval($row["quantity"]) + 1;
         $newQuantity = (string)$newQuan;
         echo $row;
         echo '<br>';
         echo $newQuantity;
         echo '<br>';
      ?>
   </body>
   
</html>