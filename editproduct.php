<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pmg.css">
   </head>
<div class="sidebar open">
    <div class="logo-details">
      <i class='bx bxs-bar-chart-alt-2 icon' ></i>
        <div class="logo_name">Dhinesh</div>
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
       <a href="">
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
     
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Dhinesh</div>
             <div class="job">SNKRS</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <main>
  
    <p class="hamburger-btn" id="ham-btn"><i class="fas fa-bars" style="margin: 12px 15px; "></i></p>
      <div class="text" >Dashboard</div>






<section id="info">
     <?php
// include('conn.php');
// $code = $_GET['product'];
// $sql = "SELECT * FROM producttable WHERE code='$code'";
// $result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    
echo" 
<form method = 'post' enctype='multipart/form-data'>
     <div class='form-row'>
     <div class='col'>
      <label >Product ID</label>
     <input type='text' class='form-control formstyle ' name='pid' value='$row[code]' readonly required >
     </div>
     <div class='col'>
         <label >Product Name</label>
         <input type='text' class='form-control formstyle 'name='pname' value='$row[name]'  required>
        </div>
        <div class='col'>
         <label >Vol 1</label>
         <input type='text'class='form-control formstyle ' name='vol1' value='$row[vol]' required >
        </div>
        <div class='col'>
         <label >Price 1</label>
         <input type='text' class='form-control formstyle 'name='price1' value='$row[price]' required>
        </div>
     
  
     </div>
     <div class='form-row'>
             <div class='col'>
             <label >Vol 2</label>
             <input type='text'class='form-control formstyle ' name='vol2' value='$row[vol2]' required >
            </div>
            <div class='col'>
             <label >Price 2</label>
             <input type='text' class='form-control formstyle ' name='price2' value='$row[price2]' required>
            </div>
            <div class='col'>
             <label >Vol 3</label>
             <input type='text' class='form-control formstyle ' name='vol3'value='$row[vol3]' required >
            </div>
            <div class='col'>
             <label >Price 3</label>
             <input type='text' class='form-control formstyle ' name='price3' value='$row[price3]'required>
            </div>
     </div>
     <div class='form-row'>
         <div class='col'>
             <label >Vol 4</label>
             <input type='text'class='form-control formstyle ' name='vol4' value='$row[vol4]'  required >
            </div>
            <div class='col'>
             <label >Price 4</label>
             <input type='text' class='form-control formstyle '  name='price4' value='$row[price4]'  required>
            </div>
            <div>
            <label >Vol 5</label>
             <input type='text'class='form-control formstyle 'name='vol5' value='$row[vol5]'    required >
            </div>
            <div class='col'>
             <label >Price 5</label>
             <input type='text' class='form-control formstyle '  name='price5' value='$row[price5]'   required>
            </div>
            </div>
            <input type='submit' class='button-27' name='submit'>
     
     </form>
";



}
if (isset($_POST['submit'])) {

	// $name = $_POST['pname'];
	// $price = $_POST['price1'];
  //    $price2 =$_POST['price2'];
  //    $price3 =$_POST['price3'];
  //    $price4 =$_POST['price4'];
  //    $price5 =$_POST['price5'];
  //    $vol1 = $_POST['vol1'];
  //    $vol2 = $_POST['vol2'];
  //    $vol3 = $_POST['vol3'];
  //    $vol4 = $_POST['vol4'];
  //    $vol5 = $_POST['vol5'];
     $sql = "UPDATE producttable SET name ='$name',vol = '$vol1',vol2 = '$vol2',vol3 = '$vol3',vol4 = '$vol4',vol5 = '$vol5' ,price = '$price', price2 = '$price2',  price3 = '$price3',price4 = '$price4',price5 = '$price5' WHERE code = '$code'";
     if(mysqli_query($conn, $sql)){
          echo "<p> Changes saved successfully </p>";
     } 
     else{
          echo "<p> Unable to  change product details </p> ";
     }

}


?>



</div>
  </div>
</section>
      <script>
          let sidebar = document.querySelector(".sidebar");
          let hamBtn = document.querySelector("#ham-btn");
        
         
        
          hamBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("open");
            menuBtnChange();
          });
        
            if(window.innerWidth < 420){
                sidebar.classList.remove("open");
                console.log(window)
              }
        
          window.addEventListener("resize", function() {
              if(window.innerWidth < 420){
                sidebar.classList.remove("open");
                console.log(window)
              }
            if(window.innerWidth > 420){
                sidebar.classList.add("open");
                console.log(window)
              }
          });
        </script>
</main>
</body>
</html>












