







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product management</title>
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
      <div class="text" >Product Management</div>
      <section id="info">
        <form method = "post" enctype="multipart/form-data">
          <div class="form-row">
              <div class="col-3">
                <input class="form-control formstyle" type="text" name="pid"required placeholder="Product ID" >
              </div>
              <div class="col-3">
                  
                  
                <input type="text" class="form-control formstyle" name="pname"  required placeholder="Product Name">
              </div>
              </div>
              <div class="form-row">
              <div class="col">
                <input type="text" class="form-control formstyle" name="vol1"  required placeholder="Volume 1">
              </div>
              <div class="col">
                <input type="text" class="form-control formstyle" name="price1"  required placeholder="Price 1">
              </div>
              <div class="col">
                <input type="text" class="form-control formstyle" name="vol2"  required placeholder="Volume 2">
              </div>
              <div class="col">
                <input type="text" class="form-control formstyle" name="price2"  required placeholder="Price 2">
              </div>
              <div class="col">
                <input type="text" class="form-control formstyle" name="vol3"  required placeholder="Volume 3">
              </div>
              <div class="col">
                <input type="text" class="form-control formstyle" name="price3"  required placeholder="Price 3">
              </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control formstyle" name="vol4"  required placeholder="Volume 4">
                </div>
                <div class="col">
                  <input type="text" class="form-control formstyle" name="price4"  required placeholder="Price 4">
                </div>
                <div class="col">
                  <input type="text" class="form-control formstyle" name="vol5"  required placeholder="Volume 5">
                </div>
                <div class="col">
                  <input type="text" class="form-control formstyle" name="price5"  required placeholder="Price 5">
                </div>
                
                </div>
                <textarea  class="form-control" name="desc" id="" cols="30" rows="5" required placeholder="Write DEscription Here"></textarea>
                <h5>Upload the picures below. Each image size should be less than 1MB</h5>
                <div class="form-row">
                    <div class="col">
                    <input type="file"
                             name="uploadfile1"
                               value="" />
                    </div>
                    <div class="col">
                    <input type="file"
          name="uploadfile2"
          value="" />
                    </div>
                    <div class="col">
                    <input type="file"
          name="uploadfile3"
          value="" />
                    </div>
                    <div class="col">
                    <input type="file"
          name="uploadfile4"
          value="" />
                    </div>
                    <div class="col">
                    <input type="file"
          name="uploadfile5"
          value="" />
                    </div>
                </div>
                <input type="submit" name="submit" class="button-27">
              
          
          </form>
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












<?php
$pid = "";
if (isset($_POST['submit'])) {

	$name = $_POST['pname'];
     echo $name;
	$price = $_POST['price1'];
	$pid = $_POST['pid'];
     $price2 =$_POST['price2'];
     $price3 =$_POST['price3'];
     $price4 =$_POST['price4'];
     $price5 =$_POST['price5'];
     $desc = $_POST['desc'];
     $vol1 = $_POST['vol1'];
     $vol2 = $_POST['vol2'];
     $vol3 = $_POST['vol3'];
     $vol4 = $_POST['vol4'];
     $vol5 = $_POST['vol5'];
     $filename1 = $_FILES["uploadfile1"]["name"];
     $filename2 = $_FILES["uploadfile2"]["name"];
     $filename3 = $_FILES["uploadfile3"]["name"];
     $filename4 = $_FILES["uploadfile4"]["name"];
     $filename5 = $_FILES["uploadfile5"]["name"];

	$tempname1 = $_FILES["uploadfile1"]["tmp_name"];	
     $tempname2 = $_FILES["uploadfile2"]["tmp_name"];	
     $tempname3 = $_FILES["uploadfile3"]["tmp_name"];	
     $tempname4 = $_FILES["uploadfile4"]["tmp_name"];	
     $tempname5 = $_FILES["uploadfile5"]["tmp_name"];	
     $folder1 = "uploads/".$filename1;
     $folder2 = "uploads/".$filename2;
     $folder3 = "uploads/".$filename3;
     $folder4 = "uploads/".$filename4;
     $folder5 = "uploads/".$filename5;

     $sql = "INSERT INTO producttable VALUES ('$pid','$name','$vol1','$vol2','$vol3','$vol4','$vol5','$price','$price2','$price3','$price4','$price5','$desc','$filename1','$filename2','$filename3','$filename4','$filename5')";
include 'conn.php';
if(mysqli_query($conn, $sql)){
     echo "<p> product published successfully </p>";
} 
else{
     echo "<p> Unable to publish product  </p> ";
}
if (move_uploaded_file($tempname1, $folder1)) {
     $msg = "Image1 uploaded successfully";
}else{
     $msg = "Failed to upload image1";
}
if (move_uploaded_file($tempname2, $folder2)) {
     $msg = "Image2 uploaded successfully";
}else{
     $msg = "Failed to upload image1";
}
if (move_uploaded_file($tempname3, $folder3)) {
     $msg = "Image3 uploaded successfully";
}else{
     $msg = "Failed to upload image1";
}
if (move_uploaded_file($tempname4, $folder4)) {
     $msg = "Image4 uploaded successfully";
}else{
     $msg = "Failed to upload image1";
}
if (move_uploaded_file($tempname5, $folder5)) {
     $msg = "Image5 uploaded successfully";
}else{
     $msg = "Failed to upload image1";
}
     mysqli_close($conn);
}
?>




</body>
</html>