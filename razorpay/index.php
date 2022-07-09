<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/info.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Raleway&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>E-com</title>
</head>

<!-- Navbar -->
<nav class="navbar navbar-light fixed-top navbar-expand-lg  p-md-3 shadow bg-light" >
        <div class="container">
          <a class=" navbar-brand" href="#">SNKRS</a>
          <button class=" navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class=" nav-link "  href="index.php">HOME</a>
                
              </li>
              
              <li class="nav-item">
                <a class=" nav-link "  href="store.php">SHOP</a>
              </li>
              
              <li class="nav-item">
                <a class="  nav-link " href="cart.php"><i class="fas fa-shopping-cart"></i> CART</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <script>
        alert('please enter valid data');
      </script>


<?php
session_start();
$totalprice = $_SESSION['varprice'];
// echo $totalprice;



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
        // echo"<br>";
        // echo "volume:".$item["vol"];
        // echo"ml";
        // echo "Price:Rs".$item["price"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price]";
      $pquantity = "$pquantity,$item[quantity]";
      

      }
      elseif($item["size"] == 1 ){
        // echo"<br>";
        // echo"Volume:".$item["vol2"];
        // echo"ml";
        // echo "Price:Rs".$item["price2"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price2]";
      $pquantity = "$pquantity,$item[quantity]";

      }
      elseif($item["size"] == 2 ){
        // echo"<br>";
        // echo"Volume:".$item["vol3"];
        // echo"ml";
        // echo "Price:Rs".$item["price3"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price3]";
      $pquantity = "$pquantity,$item[quantity]";

      }elseif($item["size"] == 3 ){
        // echo"<br>";
        // echo"Volume:".$item["vol4"];
        // echo"ml";
        // echo "Price:Rs".$item["price4"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price4]";
      $pquantity = "$pquantity,$item[quantity]";

      }elseif($item["size"] == 4 ){
        // echo"<br>";
        // echo"Volume:".$item["vol5"];
        // echo"ml";
        // echo"Quantity".$quantity["vol5"];
        // echo "Price:Rs".$item["price5"]*$item["quantity"];
        $pvol = "$pvol,$item[vol]";
        $pprice = "$pprice,$item[price5]";
        $pquantity = "$pquantity,$item[quantity]";

      }}
    echo "<br>"; 
    $pricearr = explode(",",$pprice);
    for($i=1;$i<count($pricearr);$i++){
            // echo"price:";
            // echo $pricearr[$i];
            // echo "<br>";
    }
    $qarr = explode(",",$pquantity);
    for($i=1;$i<count($qarr);$i++){
            // echo"Quantity:";
            // echo $qarr[$i];
            // echo "<br>";
    }
    $varr = explode(",",$pvol);
    for($i=1;$i<count($varr);$i++){
            // echo"Volume:";
            // echo $varr[$i];
            // echo "<br>";
    }
    }

      
    ?>
       














        <section id="delivery">
            <div class="row">
                <div class="col-md-7 col-12" style="background-color: #e6eaf5; border-radius: 8px; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
                    <h3 style="color: black; margin-top: 5px;">Delivery Address <i class="fas fa-truck"></i></h3>
                    <p style="color: #757575;">Enter Your Shipping Details</p>
                    <form  method="post" action="payment.php">
                      <div class="form-row">
                        <div class="col-lg-5 col-12">
                          <input type="text"  name="firstname" class="form-control formstyle" placeholder="First name" required>
                        </div>
                        <div class="col-lg-7 col-12">
                          <input type="text" name="lastname" class="form-control formstyle" placeholder="Last name"required >
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-lg-5 col-12">
                      <input type="text"  name="phone" class="form-control formstyle" placeholder="Phone Number" minlength="10" maxlength="10" required>
                      </div>
                      <div class="col-lg-7 col-12">
                        <input type="email" name="email" class="form-control formstyle" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-lg-5 col-12">
                      <!-- <input type="tel"  name="pincode"  formstyle" placeholder="Pincode" maxlength="6" minlength="6"  required> -->
                      <!-- <input type="text"  name="pincode" class="form-control formstyle" maxlength="6" minlength="6" placeholder="Pincode" required> -->
                      <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" required pattern="^[0-9]{6}$" title="Enter Valid Pin Code"> 
                    </div>
                    <div class="col-lg-7 col-12">
                      <input type="text" maxlength="185" name="address" class="form-control formstyle" placeholder="Locality" required>
                    </div>
                    </div>
                   
                    <div class="form-row">
                      <div class="col-lg-5 col-12">
                      <input type="text" maxlength="185"  name="addr2" class="form-control formstyle" placeholder="landmark" required>
                    </div>
                    <div class="col-lg-7">
                      <input type="text"  name="city" class="form-control formstyle" placeholder="City" required>
                    </div>
                  </div>
                    <div class="form-row">
                      <div class="col-lg-5 col-12">
                    <input type="text"  name="state" class="form-control formstyle" placeholder="State" required>
                  </div>
                  <div class="col-lg-7 col-12">
                    <input type="text" name="country" class="form-control formstyle" placeholder="Country" required>
                  </div>
                  </div>
                  <input type="text" class="form-control formstyle" value="<?php echo $totalprice ?>" name="amt" readonly>
                  <input type="submit" class="button-31" name="submit" value="Proceed to pay" />   
                    </form>
                  
                  
                    
  

                </div>
                <div class="col-md-5 col-12">
                  <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_jydkquj1.json"  background="transparent"  speed="1"  style="width: 100%; margin-top: 20px;"  loop  autoplay></lottie-player>
                </div>
            </div>
      </section>