
<DOCTYPE! html>
<html>

<head>
<title>THE@HO</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="hp.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!-- 
<script language="javascript" type="text/javascript" 
src="footerTHE@HO.php"></script>
<script language="javascript" type="text/javascript" 
      src="header.php"></script> -->
</head>

<body style="background-color:black;text-align:center">

<!-----------------------------------------------HEADER-------------------------------------------------------------------------------------------------------------------->
<?php
include 'includes/header.php';
?>
<!------------------------------------------------------------  SLIDER  ---------------------------------------------------------------------------------------------->
<div id="slider">

<div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=".\images\pic5.png"
	  class="d-block w-100">
    </div>
	
    <div class="carousel-item">
   <a href= '#'> <img src=".\images\galaksia.jpg" 
	  class="d-block w-100" > </a>
	</div>
	
    <div class="carousel-item">
      <a href= '#'><img src=".\images\udha e qumshtit1.jpg" class="d-block w-100" > </a>
	  
    </div>
  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  
</div>

</div>



<!---------------------------------------------------------------------  shfaqjet e fundit --------------------------------------- -------------------------------------------->
<div class="row">
<?php
require_once 'includes/dbcon.php';
$sql = "SELECT * FROM shfaqje ORDER BY shfaqje_id DESC LIMIT 3";
$rez=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($rez)){ ?>
    <div class="column">
        <a href= 'shfaqja.php?shfaqje_id=<?php echo $row['shfaqje_id'];?>'> <img src=".\images\<?php echo $row['image']?>"  style="width:100% display:table"><p><?php echo substr($row['pershkrim'],0,150);?>...</p>
    </div>
<?php } ?>
</div>
<!-------------------------------------------------------------------------FOOTER SECTION--------------------------------------------------------------------------------->
<?php
include 'includes\footerTHE@HO.php';
?>
    
</body>
</html>
