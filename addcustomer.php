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
   $fname=  $_POST["firstname"];
   $lname = $_POST["lastname"];
   $city =  $_POST["city"];
   $phonenumber =  $_POST["phonenumber"];
   $pull_query= 'SELECT MAX(cusID) AS maxid FROM customer';
   $result=mysqli_query($connection,$pull_query);
   if (!$result) {
      die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $cusID = (string)$newkey;
   $query = 'INSERT INTO customer VALUES("' . $cusID . '","' . $fname . '","'. $lname . '","' . $city . '","' . $phonenumber . '")';

   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "a customer has been added";
   mysqli_close($connection);
?>
</body>
</html>