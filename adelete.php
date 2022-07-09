<?php

$oid = $_GET['oid'];
echo $oid;
include('conn.php');
$sql = "SELECT * FROM orders WHERE orderid = '$oid'  ";
$result = $conn->query($sql);
$id = '';
$amount = '';
while($row = $result->fetch_assoc()) {
$id = $row['paymentid'];
$amount = intval($row['tprice'])*100;
$pstat = $row['pstatus'];
// echo $id;
// echo $amount;
}
require('./razorpay/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
if($pstat != 'refunded' && $pstat != 'accepted'){

    $key_id = "rzp_test_YJlWwxQqe3VJp0";
    $secret = "txNBcttqUvNGsMLcFYbBQdXs";
    
    $api = new Api($key_id, $secret);
    // $api = new Api($key_id, $secret);$api->payment->fetch($id)->capture(array('amount'=>70000,'currency' => 'INR'));
    $api->payment->fetch($id)->capture(array('amount'=>$amount,'currency' => 'INR'));
    $api->payment->fetch($id)->refund(array("amount"=> $amount, "speed"=>"normal"));
    $sql1 = "UPDATE orders SET pstatus = 'refunded' where orderid = '$oid'";
    $res = $conn->query($sql1);
    if($res){
        echo"<br><h3>ammount will be refunded with in 5 working days</h3>";
    }else{
        echo"some issue in refunding the ammont";
    }
}else{
    echo"Payment already refunded or order may be accepted";
}

?>

