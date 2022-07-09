<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<?php
session_start();
$totalprice = $_SESSION['varprice'];
echo $totalprice;



require_once("../dbconn.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
	}
}

if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    $pname = '';
$pquantity = ''; 
$pprice = '';
$pvol ='';

$totalprice = $_SESSION['varprice']; 

foreach ($_SESSION["cart_item"] as $item) { 
	$product_info = $db_handle->runQuery("SELECT * FROM producttable WHERE code = '" . $item["code"] . "'");

        $pname = "$pname,$item[name]";
    if($item["size"] == 0){
        echo"<br>";
        echo "volume:".$item["vol"];
        echo"ml";
        echo "Price:Rs".$item["price"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price]";
      $pquantity = "$pquantity,$item[quantity]";
      

      }
      elseif($item["size"] == 1 ){
        echo"<br>";
        echo"Volume:".$item["vol2"];
        echo"ml";
        echo "Price:Rs".$item["price2"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price2]";
      $pquantity = "$pquantity,$item[quantity]";

      }
      elseif($item["size"] == 2 ){
        echo"<br>";
        echo"Volume:".$item["vol3"];
        echo"ml";
        echo "Price:Rs".$item["price3"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price3]";
      $pquantity = "$pquantity,$item[quantity]";

      }elseif($item["size"] == 3 ){
        echo"<br>";
        echo"Volume:".$item["vol4"];
        echo"ml";
        echo "Price:Rs".$item["price4"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price4]";
      $pquantity = "$pquantity,$item[quantity]";

      }elseif($item["size"] == 4 ){
        echo"<br>";
        echo"Volume:".$item["vol5"];
        echo"ml";
        echo"Quantity".$quantity["vol5"];
        echo "Price:Rs".$item["price5"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price5]";
        $pquantity = "$pquantity,$item[quantity]";

      }}
    echo "<br>"; 
    $pricearr = explode(",",$pprice);
    for($i=1;$i<count($pricearr);$i++){
            echo"price:";
            echo $pricearr[$i];
            echo "<br>";
    }
    $qarr = explode(",",$pquantity);
    for($i=1;$i<count($qarr);$i++){
            echo"Quantity:";
            echo $qarr[$i];
            echo "<br>";
    }
    $varr = explode(",",$pvol);
    for($i=1;$i<count($varr);$i++){
            echo"Volume:";
            echo $varr[$i];
            echo "<br>";
    }
    }

      
    ?>
       
      

<form method="post" action="payment.php">
             name <br>
                <input type="text" name="firstname" placeholder="name">
        <br>
                last name<br>
                <input type="text" name="lastname" placeholder="lname">
        <br>
                Address <br>
                <input type="text" name="address" placeholder="addr">
        <br>
                addr 2<br>
                <input type="text" name="addr2" placeholder="addr2">
        <br>
                city name<br>
                <input type="text" name="city" placeholder="city">
        <br>
                pincode<br>
                <input type="text" name="pincode" placeholder="pincode">
        <br>
                phone<br>
                <input type="text" name="phone" placeholder="phonenum">
        <br>
                email<br>
                <input type="email" name="email" placeholder="email">
        <br>
                country<br>
                <input type="text" name="country" placeholder="country">
        <br>
                state<br>
                <input type="text" name="state" placeholder="state">
        <br>
                <input type="text" value="<?php echo $totalprice; ?>" name="amt" readonly>
        <br>
        <input type="submit" name="submit" value="Proceed to pay" />        
        
                                                                                   
        </form>








