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
    <link rel="stylesheet" href="css/admin.css">
   </head>
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
      <div class="text" >Products</div>
      <section id="info">
      

        <?php


include('conn.php');
$sql = "SELECT * FROM producttable";
$result = $conn->query($sql);
// output data of each row
echo"<div class='storecontainer'>
          <div class='row'>";
echo"";
while($row = $result->fetch_assoc()) {
  //echo "< div class='pimage' ></div>";
  $product = $row['code'];

  echo"

  <div class='products-img  col-lg-3 col-md-6 col-12' style='align-items: center;'>
  

  <center><img src='uploads/$row[img1]' height='150px'><br><br>
      <p>$row[name]</p>
      <p>Price : $row[price]rs</p>
   
    <a class='btn btn-dark' href='editproduct.php?product=$product'>EDIT</a> 
   
    <a class = 'btn btn-light' href='productdelete.php?product=$product'>DELETE</a>
  </div>
  </center> 


";
}
echo"     </div>
     </div>";

$conn->close();


?>
       
    </section>
    
  
  </main>
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
</body>
</html>
