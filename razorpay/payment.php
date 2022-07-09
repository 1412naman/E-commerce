<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/payment.css">
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







<?php
session_start();
$totalprice = $_SESSION['varprice'];


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
$pvol = '';

$totalprice = $_SESSION['varprice']; 

foreach ($_SESSION["cart_item"] as $item) { 
  $product_info = $db_handle->runQuery("SELECT * FROM producttable WHERE code = '" . $item["code"] . "'");


              $pname = "$pname,$item[name]";
  if($item["size"] == 0){

      $pprice = "$pprice,$item[price]";
    $pquantity = "$pquantity,$item[quantity]";
    $pvol = "$pvol,$item[vol]";
    

    }
    elseif($item["size"] == 1 ){

      $pprice = "$pprice,$item[price2]";
    $pquantity = "$pquantity,$item[quantity]";
    $pvol = "$pvol,$item[vol]";

    }
    elseif($item["size"] == 2 ){

      $pprice = "$pprice,$item[price3]";
    $pquantity = "$pquantity,$item[quantity]";
    $pvol = "$pvol,$item[vol]";

    }elseif($item["size"] == 3 ){

      $pprice = "$pprice,$item[price4]";
    $pquantity = "$pquantity,$item[quantity]";
    $pvol = "$pvol,$item[vol]";

    }elseif($item["size"] == 4 ){
      $pprice = "$pprice,$item[price5]";
      $pquantity = "$pquantity,$item[quantity]";
      $pvol = "$pvol,$item[vol]";

    }}


  }

  $date = date("md");
  $time = time();
  $uid=uniqid();
  $orderid= $date.$uid ;
  $rdate=date("Ymd");      
  $pricearr = explode(",",$pprice);
  $qarr = explode(",",$pquantity);
  $varr = explode(",",$pvol);   
  $names = explode(",",$pname);
      ?>






<h2 style="margin-top: 80px; text-align: center; color: black;">Review Your Order</h2>


<section id="review">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr >
                                  
                                  <th scope="col">Product</th>
                                  <th scope="col">Size</th>
                                  <th scope="col">Qty</th>
                                  <th scope="col">Price</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                   for($i=1;$i<count($pricearr);$i++){
                                     echo "
                                     <tr>
                                     <td>$names[$i]</td>
                                     <td>$varr[$i]ml</td>
                                     <td>$qarr[$i]</td>
                                     <td>Rs $pricearr[$i]</td>
                                   </tr>
                                     ";

                                   }

                                ?>
                              </tbody>
                        </table>
                      </div>
                </div>
            
                <div class="col-md-4 col-12">
                    <lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_rdtlewvq.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; margin-left: 28px;"  loop  autoplay></lottie-player>
                    <center><h4>Total Price : <?php echo $totalprice; ?></h4>
</center>

                    <input type="button" class="button-66" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/> 
                </div>
            </div>
       
       </section>


       <?php
if (isset($_POST['submit'])){
       
        $fname = filter_input(INPUT_POST, "firstname");
        $lname = filter_input(INPUT_POST, 'lastname');
        $address = filter_input(INPUT_POST,'address');
        $address2 = filter_input(INPUT_POST,'addr2');
        $city = filter_input(INPUT_POST,'city');
        $pincode = filter_input(INPUT_POST,'pincode');
        $phone = filter_input(INPUT_POST,'phone');
        $email = filter_input(INPUT_POST,'email');
        $country = filter_input(INPUT_POST,'country');
        $state = filter_input(INPUT_POST,'state');

        include('../conn.php');

        $sql = "INSERT INTO orders VALUES ('$fname','$lname','$address','$address2','$city','$pincode','$phone','$email'	,'$state'	,'$country' ,'$orderid','','$pname','$pquantity' ,'$pprice','$pvol','$totalprice','no','no' )";

        if(mysqli_query($conn, $sql)){
          echo "<p> </p>";
        } else{
          echo "<p> Unable to your create order! Please try again  </p> ";
        }
        // Closing connection
        mysqli_close($conn);
        $_SESSION['orderid'] = $orderid;
       
        
        unset($_POST);

}?>






<script>
    function pay_now(){
       var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
        var options  = {
                        "key": "rzp_test_YJlWwxQqe3VJp0", 
                        "amount": <?php echo $totalprice; ?>*100, 
                        "currency": "INR",
                        
                        "name": "Raja Oils",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                            jQuery.ajax({
                               type:'post',
                             url:'payment_process.php',
                             data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           
                            })

        


                            
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();

        
    }
</script>
<?php
unset($_POST);
?>