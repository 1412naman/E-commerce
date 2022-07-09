<?php
echo" <center><h1> Your Products Analytics </h1></center>";
include('conn.php');
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
// output data of each row
$totalnorders = 0;
$totalsold = 0;
$avgorder = 0.000000;
$ordersent = 0;
$pendingnorders = 0;

while($row = $result->fetch_assoc()) {
     
    $totalnorders = $totalnorders+1;
    $totalsold=$totalsold+$row['tprice'] ;
   if($row['shipstatus'] == 'yes' ){
     $ordersent = $ordersent+1;
   }
   
     
     
     
     
     

}
$avgorder = $totalsold/$totalnorders;
$pendingnorders = $totalnorders-$ordersent;
echo"Total number of orders :";echo $totalnorders;
echo"<br>";
     echo"Total sale:";echo $totalsold;
     echo"<br>";
     echo"Average Order value :";echo $avgorder;
     echo"<br>";
     echo"Orders sent to shiprocket :";echo $ordersent;
     echo"<br>";
     echo"Pending orders(to be approved) :";echo $pendingnorders;
     echo"<br>";
