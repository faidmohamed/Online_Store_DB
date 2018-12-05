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
         $pull_query = 'SELECT quantity FROM purchases WHERE purchases.cusID = '. $prodID . ' AND purchases.cusID = ' .$cusID;

         echo $pull_query;
         echo "<br>";

         $result = mysqli_query($connection,$pull_query); 
         if (!$result) {
            die("ERROR1: insert failed - " . mysqli_error($connection));
         }
         
         while($row = mysqli_fetch_assoc($result)){
         echo $row["quantity"];
         echo "<br>";
         if (intval($row["quantity"])== 0) {
            $query = 'INSERT INTO purchases values("' . $cusID . '","' . $prodID . '", 1)';
            if (!mysqli_query($connection, $query)) {
               die("ERROR2: insert failed - " . mysqli_error($connection));
            }
         }

         else{
            $newQuan = intval($row["quantity"]) + 1;
            $newQuantity = (string)$newQuan;

            $query2 = 'UPDATE purchases SET quantity =' . $newQuantity . ' WHERE purchases.prodID = ' . $prodID . ' AND purchases.cusID = ' . $cusID;

            if (!mysqli_query($connection, $query2)) {
                  die("ERROR3: insert failed - " . mysqli_error($connection));
            }
         } 

         echo "the requested purchase has successfully been added";
         mysqli_close($connection);
      }
      ?>
   </body>
</html>