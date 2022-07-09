<center><script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_zovnor9s.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>

<?php
$oid = $_GET['oid'];
// echo $oid;

$ordname = '';
$tprice = 0;
include('conn.php');
$sql1 = "SELECT * FROM orders WHERE orderid = '$oid' and shipstatus = 'no'  ";
$result1 = $conn->query($sql1);
$j = 0;
while($row1 = $result1->fetch_assoc()) {
  $j = $j + 1;
    $pprice = $row1['pprice'];
    $pquantity = $row1['pquantity'];
    $name = $row1['pname'];
    $pvol = $row1['pvol'];
    $tprice = $row1['tprice'];
}

if($j>0){
  $pricearr = explode(",",$pprice);
$qarr = explode(",",$pquantity);
$varr = explode(",",$pvol);   
$names = explode(",",$name);
for($i=0;$i<count($pricearr);$i++){
  $tprice = $tprice + intval($varr[$i]);
  if($i==0){
    $ordname =$ordname."$names[$i] $varr[$i] $qarr[$i]";
  }else{
  $ordname =$ordname."$names[$i] $varr[$i]ml $qarr[$i],";
}
}
}
// echo $ordname; echo "<br>";
// echo $tprice;

$today = date("Y-m-d H:i");
include('conn.php');
$sql = "SELECT * FROM orders WHERE orderid = '$oid' and pstatus = 'yes' and shipstatus = 'no' ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "email": "rkexp3@gmail.com",
    "password": "exp3#11019"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
  ),
));

$response=curl_exec($curl);
curl_close($curl);

$response_out=json_decode($response);
$token=$response_out->{'token'};


$curl = curl_init();

curl_setopt_array($curl, array(

  CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "order_id": "'.$row['orderid'].'",
    "order_date": "'.$today.'",
    "pickup_location": "exp",
    "channel_id": "",
    "comment": "Reseller: M/s Goku",
    "billing_customer_name": " '.$row['fname'].' " ,
    "billing_last_name": "'.$row['lname'].'",
    "billing_address": "'.$row['address1'].' ",
    "billing_address_2": "'.$row['address2'].'",
    "billing_city": "'.$row['cityname'].'",
    "billing_pincode": "'.$row['pincode'].'",
    "billing_state": "'.$row['state'].'",
    "billing_country": "'.$row['country'].'",
    "billing_email": "'.$row['email'].'",
    "billing_phone": "'.$row['mobilenumber'].'",
    "shipping_is_billing": true,
    "shipping_customer_name": "",
    "shipping_last_name": "",
    "shipping_address": "",
    "shipping_address_2": "",
    "shipping_city": "",
    "shipping_pincode": "",
    "shipping_country": "",
    "shipping_state": "",
    "shipping_email": "",
    "shipping_phone": "",
    "order_items": [
      {
        "name": "'.$ordname.'",
        "sku": "cha123",
        "units": 11019,
        "selling_price": "90980",
        "discount": "",
        "tax": "",
        "hsn": 441122
      }
    ],
    "payment_method": "Prepaid",
    "shipping_charges": 0,
    "giftwrap_charges": 0,
    "transaction_charges": 0,
    "total_discount": 0,
    "sub_total": '.$tprice.',
    "length": 10,
    "breadth": 15,
    "height": 20,
    "weight": 2.5
  }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Bearer $token"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;



}



$sql1 = "UPDATE orders SET `shipstatus`= 'yes' , `pstatus` = 'accepted' WHERE orderid = '$oid'";
$result1 = $conn->query($sql1);
if($result1){
  echo  '<h3>order sent to shiprocket successfully</h3>';

}
else{
  echo" failed to send to shiprocket ";
}


$oid = $_GET['oid'];
echo $oid;
include('conn.php');
$sql = "SELECT * FROM orders WHERE orderid = '$oid'  ";
$result = $conn->query($sql);
$id = '';
$amount = '';
$paystatus = '';
while($row = $result->fetch_assoc()) {
$id = $row['paymentid'];
$amount = intval($row['tprice'])*100;

// echo $id;
// echo $amount;
// echo"Money Captured Visit Shiprocket";

}
require('./razorpay/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
$key_id = "rzp_test_YJlWwxQqe3VJp0";
$secret = "txNBcttqUvNGsMLcFYbBQdXs";
if($j>0){
  $api = new Api($key_id, $secret);
  $api->payment->fetch($id)->capture(array('amount'=>$amount,'currency' => 'INR'));
}




 ?>
</center>