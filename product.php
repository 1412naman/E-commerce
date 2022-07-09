<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/product-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        
    <title>Product-Page</title>
</head>
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




      <section id="product-info">
          <div class="row">
               
<?php
$product = $_GET['product'];
// echo $product;

include('conn.php');
$sql = "SELECT * FROM producttable WHERE code='$product'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
        echo"
<div class='c0l-lg-6 col-md-6 col-12'>
        <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel' data-touch='true'>
             <div class='carousel-inner'>
                
             <div class='carousel-item active' role='listbox' >
                        <img src='uploads/$row[img1]' class='d-block w-100' alt='Oil Product'>
                </div>

                <div class='carousel-item ' role='listbox' >
                        <img src='uploads/$row[img2]' class='d-block w-100' alt='Oil Product'>
                </div>
                <div class='carousel-item ' role='listbox' >
                        <img src='uploads/$row[img3]' class='d-block w-100' alt='Oil Product'>
                </div>
                <div class='carousel-item ' role='listbox' >
                        <img src='uploads/$row[img4]' class='d-block w-100' alt='Oil Product'>
                </div>
                <div class='carousel-item ' role='listbox' >
                        <img src='uploads/$row[img5]' class='d-block w-100' alt='Oil Product'>
                </div>
               
             </div>
                
                <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                      
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
                         <span class='carousel-control-next-icon' aria-hidden='true'></span>
                      
                </button>
        
        </div>
</div>


<div class='c0l-lg-6 col-md-6 col-12' style='padding: 0 5% !important;'>
       <h1 style='text-align: center;'> $row[name] </h1>
       
              
                        
       <center> <div style='font-size: 20px; letter-spacing: 3px; color: #097224;'>₹<span id='php'>$row[price]</span></div></center>
                
 ";     
 

echo"

     <center>
     <div class='quantity' style='margin-top:25px ; display: inline-block;'>
     <h1 style='display: inline-block; font-size: 20px;'>Quantity</h1> 
     <form method='post' action='store.php?action=add&code=$row[code]'> 
     <p style='display: inline-block; margin-bottom : 1px; padding: 6px 12px;' ><input type='number' name='quantity' value='1' size='3' style='display: inline; max-width : 80px ; padding: 8px 12px; background-color: #fff; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;' /></p>
      
";




include('conn.php');
 $sql1 = "SELECT * FROM producttable where code = '$product'";
 $result1 = $conn->query($sql1);
 $a=array();
echo"
<h5 style='text-align: center; margin-top: 10px;'>Size</h5>

<select id='ddl' name = 'size' onchange='OnSelectionChange()' style='display: inline; padding: 8px 12px; background-color: #fff; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>


";
while($row1 = $result1->fetch_assoc()) {
    array_push($a,$row1['price'],$row1['price2'],$row1['price3'],$row1['price4'],$row1['price5']);
    
    echo"
    <option value='0'>$row1[vol] UK</option>
    <option value='1'>$row1[vol2] UK</option>
    <option value='2'>$row1[vol3] UK</option>
    <option value='3'>$row1[vol4] UK</option>
    <option value='4'>$row1[vol5] UK</option>
    ";

}
echo "
</select>
";


echo"


     </div>





     
     </center>





     <hr>


       <input type='submit' class='button-66' value='Add to cart' class='btnAddAction'onclick='cFunction($row[code])'/>
       </form>

      

     </center>
</div>


   </div>

</section>

<section id='description'>

<p class='container-fluid' >$row[description]</p>

</section>
   ";


}?>

<section id='featprod'>
  <center>
  <h2>Featured Products</h2>
    </center>
    <div class='row'>
<?php

include 'conn.php';
$sql2 = "SELECT * FROM producttable LIMIT 3";
$res = $conn->query($sql2);
while($row2 = $res->fetch_assoc()) {
  echo"
  
  <div class='col-md-4 col-6'>
  <center><img src='uploads/$row2[img1]'><br><br>
    <p>$row2[name]</p>
    <p class='price'>₹ $row2[price]</p>
  </center> 
</div>
  ";
}

?>    
  </div>
</section>








<!-- Description -->
</select>
</form>

<script type='text/javascript'>
var jas;
function OnSelectionChange()
{
    var e = document.getElementById('ddl');
   var as = document.forms[0].ddl.value;
   var strUser = e.options[e.selectedIndex].value;
   console.log(strUser);
    var complex = <?php echo json_encode($a); ?>;
    document.getElementById('php').innerHTML = complex[strUser];
   jas = complex[strUser];
      
}

function check(){
    var x = document.getElementById('pincode').value;
    if(x.length != 6 || x[0] == 0){
      document.getElementById('pi').innerHTML  = "<p style='color: #b11820';>not available</p>";
    }else{
        document.getElementById('pi').innerHTML  = "<p style='color: #097224;'>available</p>";
    }
    
  }
</script>
</section>
</body>
</html>



<!-- <div class='mrp column'  style='font-size: 20px; letter-spacing: 3px; color: #b11820;' >₹ <span id='php'>$row[price]</span></div> -->