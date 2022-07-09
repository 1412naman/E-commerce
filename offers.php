<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
   </head>

<body>






<div class="sidebar open">
    <div class="logo-details">
      <i class='bx bxs-bar-chart-alt-2 icon' ></i>
        <div class="logo_name">SNKRS</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="admin.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="recentorders.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Orders</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="productmanagement.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Products</span>
       </a>
       <span class="tooltip">Messages</span>
     </li>
     <li>
       <a href="orders.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Orders Management</span>
       </a>
       <span class="tooltip">Files</span>
     </li>
     <li>
       <a href="inventory.php">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Products Management</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="offers.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Offers</span>
       </a>
       <span class="tooltip">Offers</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">First Last</div>
             <div class="job">Raja Oil</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <main>







<div id="content">
  <h1>Home Page video Link(youtube Embed)</h1>
        <form method="POST"  action="" >
          <input type="text" name="vname" placeholder="Enter Video YT Link" required> <br>
            <div>
                <button type="submit" name="name"> UPLOAD </button>
            </div>
        </form>
</div>
<br>
<br>
<br>

<?php
error_reporting(0);
?>
<?php


$msg = "";

// If upload button is clicked ...
$vlink = $_POST['vname'];

if (isset($_POST['name'])) {

       include 'conn.php';

		// Get all the submitted data from the form
		$sql = "INSERT INTO abtvids (vidname) VALUES ('$vlink')";

		// Execute query
		mysqli_query($conn, $sql);
        unset($_POST);
}

?>

<h1>Sale img</h1>
<form method="POST" action="" enctype="multipart/form-data">
                <label for="">For sale img</label> <br>
			<input type="file" name="saleim" value="" required/> <br>
                        <button type="submit" name="saleimgupload"> UPLOAD </button>
                </form>



               

<?php

// If upload button is clicked ...
if (isset($_POST['saleimgupload'])) {


        $name = $_POST['name'];

        
	$ifilename = $_FILES["saleim"]["name"];
	$itempname = $_FILES["saleim"]["tmp_name"];	
        if ($ifilename != ''){

	$folder = "saleimages/".$ifilename;
     include 'conn.php';

		// Get all the submitted data from the form
		$isql = "INSERT INTO saleimgs (saleimg) VALUES ('$ifilename')";

		// Execute query
		mysqli_query($conn, $isql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($itempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	        } 
                unset($_POST);
}
	
		
		
              
}

?>
<h3>sale images that are currently active</h3>
<?php

include('conn.php');
$query = "SELECT * FROM saleimgs";
$res = $conn->query($query);
// output data of each row

while($row1 = $res->fetch_assoc()) {

  
  echo"
  <img src='saleimages/$row1[saleimg]'' alt=''>
  $row1[image]  
        
        <a class='btn btn-danger' href='delete.php?id=$row1[saleimg]'>Delete</a>

        <br> 
  "; 

}
  
?> 
<style>
	img{
		height :300px;
		width :450px;
	}
</style>















</body>
</html>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>