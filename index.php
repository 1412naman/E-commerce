<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Raleway&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    <title>E-com</title>
</head>
<body>
<div class="bg-image">
  <div class="header-text">
    
    <h1>SNKRS</h1>
    <div class="bannerbtn">
      <a href="store.php"><span></span>SHOP NOW</a>
      
  </div>
  </div>
</div>


<!-- About Us Video -->
<section id="AboutUsVideo">
  <div class="Aboutus-text">
  <h2 style="text-align: center; font-weight: bold;">About Us</h2>
  </div>
  <center>
  <iframe width="800" height="500" src="https://www.youtube.com/embed/eCrc_7Z_4xI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </center>
  <!-- <?php
    include('conn.php');
    $sql = "SELECT * FROM abtvids";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
  
    echo" 
    <center>
    <iframe width='320' height='240' src='$row[vidname]' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
    </center>
    ";
    }
    ?> -->
    
 
</section>
<hr>
<section id="features">
  
  <div class="row">
    
    <div class="col-md-6 col-12 bmargin"  >
      <center>
      <i class="fas fa-seedling fa-5x icons" ></i>
      <h2>Natural</h2>
      </center>
    </div>
    <div class="col-md-6 col-12 bmargin"  >
      <center>
        <span class="material-icons icons " style="font-size: 75px; ">&#xeb32;</span>
      
      <h2>No Added Chemicals</h2>
      </center>
    </div>
    <div class="col-md-6 col-12  bmargin"  >
      <center>
        <span class="material-icons icons" style="font-size: 75px; ">&#xe661</span>
      <h2>Premium cloth</h2>
      </center>
    </div>
    <div class="col-md-6 col-12  bmargin "  >
      <center>
        <i class="fa-brands fa-adn fa-4x"></i>
      <h2>Breathable Layers</h2>
      </center>
    </div>
 
   </div>
</section>
<hr>


<!-- Testimonials -->

<section id="testimonials">
  <h2 class="testimonials-heading">What People say About Us</h2>

  <div id="carouselExampleIndicators" class="carousel slide testimonial-section" data-bs-ride="false" data-bs-interval="3000" >
    <div class="carousel-inner">
      <div class="carousel-item active" >
        
        <h2 class="testimonial-text">The shoes are comfortable and looks beautiful </h2>
        
        <em style="color: rgb(220, 216, 216);">Anita, Hyderabad</em>
      </div>
      <div class="carousel-item"  >
        
        <h2 class="testimonial-text">It was delivered fast. The customer service is nice. Good product</h2>
  
  <em>Ajay, Vishakapatnam</em>
      </div>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" ></span>
      
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" ></span>
      
    </button>
  </div>
<a href="#"><div  class="whatsapp"><i class="fab fa-whatsapp fa-3x"></i></div></a>
  
</section>

 <!-- FOOTER -->
 <section id="footer">
  <div class="row" >
    <div class="col-lg-4 col-md-4 col-12">
      <p style="font-weight: bold; font-size: 25px; text-decoration: underline;">Important Links</p>
      <p>Privacy Policy</p>
      <p>Terms and Conditions</p>
      <p>Contact Us</p>
    </div>
    <div class="col-lg-4 col-md-4 col-12">
      <p style="font-weight: bold; font-size: 25px; text-decoration: underline;">Social Links</p>
      <p><i class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp; Facebbok</p>
      <p><i class="fab fa-twitter"></i>&nbsp;&nbsp;&nbsp; Twitter</p>
      <p><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;&nbsp; Instagram</p>
    </div>
    <div class="col-lg-4 col-md-4 col-12 contactinfo ">
      <p style="font-weight: bold; font-size: 25px; text-decoration: underline;">Contact Info</p>
      <p><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp; +91-XXXXX-XXXXX</p>
      <p><i class="far fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp; name@gmail.com</p>
      <p><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp; Shop No 1, Anant Niwas, Rajawadi )</p>
      <p><span class="iconify" data-icon="logos:visaelectron"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="iconify" data-icon="logos:mastercard"></span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/gpay.png" >>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/rupay.png" >&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/paytm.png" ></p>

    </div>
  </div>
  <p style="text-align: center;">Copyright Ⓒ SNKRS</p>
</section>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>