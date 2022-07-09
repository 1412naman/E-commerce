

<?php
session_start();


$payment_id = $_SESSION['payid'];



include('../conn.php');

$orderid = $_SESSION['orderid'];

// Performing insert query 
// here our table name is orders
$sql = "UPDATE `orders` SET `pstatus`='yes',`paymentid` = '$payment_id'  WHERE orderid = '$orderid'  ";

if(mysqli_query($conn, $sql)){
  
} else{
  echo "<p> Unable to your create order! Please try again  </p> ";
}
// Closing connection
mysqli_close($conn);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/thankyou.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Raleway&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>E-com</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light fixed-top navbar-expand-lg  p-md-3 shadow bg-light"">
       <div class="container">
         <a class=" navbar-brand" href="#">SNKRS</a>
         <button class=" navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
 
         <div class="collapse navbar-collapse" id="navbarNav">
           <div class="mx-auto"></div>
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class=" nav-link "  href="#">HOME</a>
               
             </li>
             
             <li class="nav-item">
               <a class=" nav-link "  href="#">SHOP</a>
             </li>
             
             <li class="nav-item">
               <a class="  nav-link " href="#"><i class="fas fa-shopping-cart"></i> CART</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>
   <center>
      
        <h1 style="margin-top: 150px;">Your Order Has Been Placed</h1>
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_uu0x8lqv.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        <p class="lead">Your Order ID : <?php echo $orderid ?></p>
        <p class="lead">Your Payment ID : <?php echo $payment_id ?></p>
        <a class="btnfos btnfos-4" href="./../store.php" style="color: black;"><span>CONTINUE SHOPPING</span></a> 
      
    </center>
    
     </body>

