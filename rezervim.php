<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';
// marrim id e userit
$user= $_SESSION["userId"];
//mysqli_real_escape_string($conn,$_GET['userId']);

$queryUser="select * from user where userId='".$user."'";
$resultUser=mysqli_query($conn,$queryUser);
$arrayUser=mysqli_fetch_assoc($resultUser);


$orari=$_GET['orar'];
$kodTeater=$_GET['teater_id'];
$kodShfaqje=$_GET['shfaqje_id'];

$query="select * from orar,salle,shfaqje where idOrar='".$orari."' and idSalle=salle_id and idShfaq=shfaqje_id and idShfaq='".$kodShfaqje."'";
$result=mysqli_query($conn,$query);
$v=mysqli_fetch_assoc($result);


// marrim emrin e teatrit, bejme shfaqjen e tij ne rezervim
$query1="select * from teater where teater_id='".$kodTeater."'";
$result1=mysqli_query($conn,$query1);
$v1=mysqli_fetch_assoc($result1);

//marrim te dhenat e shfaqjes
$sql="SELECT * FROM shfaqje WHERE shfaqje_id='$kodShfaqje'";
$rez=mysqli_query($conn,$sql) or die(mysql_error($conn));
$row=mysqli_fetch_assoc($rez);   
?>
<html>

<head>
    <title>THE@HO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <title>Book  Now</title>
        <link rel="icon" type="image/png" href="img/logo.png">
    </head>
    
  <body>
  <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h2>RESERVE YOUR TICKET</h2>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <img src="" alt="">            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"></div>
            <div class="movie-information">
              
            </div>
            <div class="booking-form-container">
                <form method="post" action="rezervo.php">

                  <input placeholder="First Name" type="text" name="fName" required>

                  <input placeholder="Last Name" type="text" name="lName">

                  <input placeholder="Phone Number" type="text" name="pNumber" required>

                  <input type="text" name ="orar" value="<?php echo $v['ora_fillimi'];?>">

                  <input type="text" name ="date" value="<?php echo $v['date_shfaqje'];?>">

                  <input type="text" name ="tEmer" value="<?php echo $v1['teater_emer'];?>">

                  <input type="text" name ="tSalle" value="<?php echo $v['emer_salle'];?>">

                  <input type="number" name="noSeats" placeholder="numri i vendeve">

                  <input type="number" name="pagesa" placeholder="cmimi/seat" value="100" min="100" max="100">
                  <input type="hidden" name="orari" value="<?php echo $orari;?>">
                  <input type="hidden" name="shfaqja" value="<?php echo $row['shfaqje_emer'];?>">
                  <input type="hidden" name="user" value="<?php echo $_SESSION['userId'];?>">


                  <?php
//kontrollojme nese numri i vendeve ne salle ka arritur ne zero atehere  nuk mund te behet rezervimi, butoni behet disabled
                    if($v['seats']>0)
                    { ?>
                  <button type="submit" value="submit" name="submit" class="form-btn">Book a Seat</button>
                      <?php
                       }
                        else if($v['seats']==0)
                       {
                      ?>
<button type="submit" value="submit" name="submit" class="form-btn" disabled>Book a Seat</button>

         <?php

}
?>


                </form>
              </div>
    </form>
  </body>
</html>
