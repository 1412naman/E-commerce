<?php
session_start();
require_once("dbconn.php");
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
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Raleway&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>E-com</title>
</head>
<?php include('conn.php') ?>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-light shadow fixed-top navbar-expand-lg text-white p-md-3" >
        <div class="container">
          <a class="textwhite navbar-brand" href="index.php">SNKRS</a>
          <button
            class=" navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
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
                <a class=" nav-link " href="cart.php"><i class="fas fa-shopping-cart"></i> CART</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <h1 class="heading">Shopping Cart</h1>
 <!-- Cart -->
 <section id="cart">
	<div class=" row">
           <div class="col-lg-8 col-md-12 col-12">
              
<?php

$totalprice = 0;
$a = 0;
if(isset($_SESSION["cart_item"])){
    $item_total = 0;

foreach ($_SESSION["cart_item"] as $item) { 
		$product_info = $db_handle->runQuery("SELECT * FROM producttable WHERE code = '" . $item["code"] . "'");
    $a = $a+1;

  ?>    



	<div class="left-row row" onMouseOver="document.getElementById('<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('<?php echo $item["code"]; ?>').style.display='';" >
		<div class="cart-img c0l-lg-4 col-md-4 col-6">
			<img style="width: 100%; border-radius: 10px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" src="./uploads/<?php echo $product_info[0]["img1"]; ?>" >
		</div> 

		<div  class="description c0l-lg-4 col-md-4 col-6">
			<p><?php echo $item["name"]; ?></p>
			<p>Quantity:<?php echo $item["quantity"]; ?></p>
      <p><?php
      if($item["size"] == 0){
        echo "Size:".$item["vol"];
        
        echo "</p>";
    
        echo "<p>";
        echo "Price:Rs".$item["price"];
        echo"</p>";
        $totalprice = $totalprice+$item["price"]*$item["quantity"];

      }
      elseif($item["size"] == 1 ){
        echo"Volume:".$item["vol2"];
        echo"ml";
        echo"<br>";
        echo "Price:Rs".$item["price2"]*$item["quantity"];
        $totalprice = $totalprice+$item["price2"]*$item["quantity"];

      }
      elseif($item["size"] == 2 ){
        echo"Volume:".$item["vol3"];
        echo"ml";
        echo"<br>";
        echo "Price:Rs".$item["price3"]*$item["quantity"];
        $totalprice = $totalprice+$item["price3"]*$item["quantity"];

      }elseif($item["size"] == 3 ){
        echo"Volume:".$item["vol4"];
        echo"ml";
        echo"<br>";
        echo "Price:Rs".$item["price4"]*$item["quantity"];
        $totalprice = $totalprice+$item["price4"]*$item["quantity"];

      }elseif($item["size"] == 4 ){
        echo"Volume:".$item["vol5"];
        echo"ml";
        echo"<br>";
        echo "Price:Rs".$item["price5"]*$item["quantity"];
        $totalprice = $totalprice+$item["price5"]*$item["quantity"];

      }
      
      
      ?>

		</div>
    <div class="col-lg-4">
              <div style="margin-left : 100px" class="btnRemoveAction delete removebtn" id="<?php echo $item["code"]; ?>"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart"><i class="far fa-trash-alt"></i></a></div>
              </div>
    </div>


		<div class="c0l-lg-4 col-md-4 col-12 " style="display: flex; justify-content: center; align-items: center;">        
    <div class="col-lg-8">
  
      	
    <div class="quantity">

  
              <!-- <p style=" font-size: 20px;">Quantity</p> 
              <button type="button" class="btn btn-light" style="padding: 0 !important;"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
              </svg></button>
              <p style="display: inline-block; padding: 6px 12px; background-color: #f0f0f0; ">1</p>
              <button type="button" class="btn btn-light" style="padding: 0 !important;"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg></button>
              	</div>
            	</div> -->
             
    </div>



	</div>
  </div>
<?php     
	}
}
?>
	  </div>

	  <div class="cart-price col-lg-4 col-md-6 col-12">
          	<div class="">
          	<p style="display: inline-block;">SubTotal Price</p> <p style=" float: right;">Rs <?php    $_SESSION['varprice'] = $totalprice;
                                                                                                      if($totalprice > 0)
                                                                                                       {
                                                                                                        echo $totalprice ;
                                                                                                       } 
                                                                                                       else{
                                                                                                         echo"0";
                                                                                                       }?></p>
        	<br>
          	<br>
          	<p style="display: inline-block;">Delivery Fee</p> <p style=" float: right;">Free</p>
          	<hr>
          	<p style="display: inline-block;">Total</p> <p style=" float: right;">Rs <?php if($totalprice > 0)
                                                                                                       {
                                                                                                        echo $totalprice ;
                                                                                                       } 
                                                                                                       else{
                                                                                                         echo"0";
                                                                                                       }?></p>
        	</div>
        	<br>


          <?php 
          if($a > 0){
            $link = "razorpay/index.php";
          }else{
            $link = "";
          }
          ?>
          <a href='<?php echo $link; ?>'><button class="button-66" role="button">PLACE ORDER</button> </a> 
          <a href="cart.php?action=empty"><button class="button-59" role="button">CLEAR CART</button></a> 
          <a href="store.php" title="Cart"><button class="button-59" role="button">CONTINUE SHOPPING</button></a>
         </div>



	</div>

</section>



<div class="cart_footer_link">
<center>



</center>

</div>


<script>
function toggleAction(id) {
	if(document.getElementById("remove"+id).style.display == 'none') {
		document.getElementById("remove"+id).style.display = 'block';
	} else {
		document.getElementById("remove"+id).style.display = 'none';
	        }
}
</script>




</body>
</html>