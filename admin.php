
<?php 
    
    // include('conn.php');
    // $sql = "SELECT * FROM orders";
    // $result = $conn->query($sql);
    // // output data of each row
    // $reven = 0;
    // $totalnorders = 0;
    // $totalsold = 0;
    // $avgorder = 0.000000;
    // $ordersent = 0;
    // $pendingnorders = 0;
    
    // while($row = $result->fetch_assoc()) {
    //      $reven = $reven + $row['tprice'];
    //     $totalnorders = $totalnorders+1;
    //     // $totalsold=$totalsold+$row['tprice'] ;
    //    if($row['shipstatus'] == 'yes' ){
    //      $ordersent = $ordersent+1;
    //    }
    //    if($row['pstatus'] == 'yes' && $row['shipstatus'] == 'no' ){
    //      $pendingnorders = $pendingnorders + 1;
    //    }
    // }
    // $avgorder = 0;
    // if($totalnorders>0){
    //     $avgorder = $totalsold/$totalnorders;
    // }


    // $products = 0;
    // $sql1 = "SELECT * FROM producttable";
    // $res = $conn->query($sql1);
    // while($row1 = $res->fetch_assoc()){
    //     $products = $products + 1;
    // }

?>
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
      <div class="text" >Dashboard</div>
      <section id="info">
      <div class="row ">
        
        <div class="col-lg-3 col-12 box" style="background-color: #d1e7dd; color: #0f5132;  ">
          <div class="row">
            <div class="col-3">
              <i class="fas fa-rupee-sign fa-2x " style="background-color:#0f5132; color: #fff; padding: 5px 10px; border-radius: 5px; margin: 12px 0;"></i>
            </div>
            <div class="col-9 " style="margin-top: 10px;">

              <p>Revenue</p>
              <p>RS <?php echo $reven; ?></p>
            </div>
          </div>
          
        </div>
        <!-- <div class="col-lg-3 col-12 box" style="background-color: #f8d7da; color: #842029;">
          <div class="row">
            <div class="col-3">
              <i class="fas fa-credit-card fa-2x " style="background-color:#842029; color: #fff; padding: 5px 10px; border-radius: 5px; margin: 12px 0;"></i>
            </div>
            <div class="col-9 " style="margin-top: 10px;">

              <p>Expneses</p>
              <p>RS 86,000</p>
            </div>
          </div>
        </div> -->
        <div class="col-lg-3 col-12">
          
        </div>
        
      </div>
    </section>
    <section id="maindashboard">
      <div class="row">
        <div class="col-lg-4 bmargin">
          <div class="row">
            <div class="col-7">
              <p>Order</p>
              <p><?php echo $totalnorders; ?></p>
            </div>
            <div class="col-5">
              <i class="fas fa-store-alt fa-3x"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 bmargin">
          <div class="row">
            <div class="col-7">
              <p>Average Sale</p>
              <p>Rs <?php echo intval($avgorder); ?></p>
            </div>
            <div class="col-5">
              <i class="fas fa-chart-line fa-3x"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 bmargin">
          <div class="row">
            <div class="col-7">
              <p>Average Item Sale</p>
              <p>190</p>
            </div>
            <div class="col-5">
              <i class="fas fa-percentage fa-3x"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 bmargin">
          <div class="row">
            <div class="col-7">
              <p>satisfaction</p>
              <p><?php echo(rand(70,100)); ?></p>
            </div>
            <div class="col-5">
              <i class="fas fa-users fa-3x"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 bmargin">
          <div class="row">
            <div class="col-7">
              <p>Pending orders</p>
              <p><?php echo $pendingnorders; ?></p>
            </div>
            <div class="col-5">
              <i class="fas fa-angle-double-up fa-3x"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-4 bmargin">
          <div class="row">
            <div class="col-7">
              <p>Number Of Products</p>
              <p><?php echo $products; ?></p>
            </div>
            <div class="col-5">
              <i class="fas fa-box-open fa-3x"></i>
            </div>
          </div>
        </div>
      </div>
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













