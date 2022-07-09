<?php
session_start();
require_once("dbconn.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM producttable WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"],'vol'=>$productByCode[0]["vol"], 'vol2'=>$productByCode[0]["vol2"] ,'vol3'=>$productByCode[0]["vol3"] , 'vol4'=>$productByCode[0]["vol4"] , 'vol5'=>$productByCode[0]["vol5"] ,'price2'=>$productByCode[0]["price2"] ,'price3'=>$productByCode[0]["price3"] ,'price4'=>$productByCode[0]["price4"] ,'price5'=>$productByCode[0]["price5"] , 'quantity'=>$_POST["quantity"],'size'=>$_POST["size"] ,'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
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
    <link rel="stylesheet" href="css/shop.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">   
    <title>E-com</title>
</head>
<?php include('conn.php') ?>
<body>

<?php
$session_items = 0;
if(!empty($_SESSION["cart_item"])){
	$session_items = count($_SESSION["cart_item"]);
}	
?>


<DIV class="container">

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

<!-- Offer Zone -->
<?php 
$query = "SELECT * FROM saleimgs LIMIT 1";
$resul = $conn->query($query);

while($row2 = $resul->fetch_assoc()) {
    $img = $row2['saleimg'];
}

?>
<section id="offer">
        <img class="card-img-top" src="saleimages/<?php echo $img; ?>" alt="Card image cap">
</section>

<section id="products">
      <h2 style="text-align: center;">All Products</h2>
      <hr>
      <div class="row">



<?php
include('conn.php');
$sql = "SELECT * FROM producttable";
$result = $conn->query($sql);
// output data of each row

echo"<div class='storecontainer'>
<div class='row'>";
while($row = $result->fetch_assoc()) {
  //echo "< div class='pimage' ></div>";
  $product = $row['code'];


  echo"

          <div class='products-img  col-lg-4 col-md-6 col-6' style='align-items: center;'>
          <a href='product.php?product=$product'>

          <center><img src='uploads/$row[img1]'><br><br>
              <p style = 'color : black; font-weight:500; ' >$row[name]</p>
              <p style = 'color : black; font-weight:500; '>Price : $row[price]rs</p>
            </center> 
          </div>
          </a>

";
}


$conn->close();
?>


      </div>
</section>

<center><a href="cart.php">CHECKOUT</a></center>  <br><br>

</DIV>
</body>
</html> 