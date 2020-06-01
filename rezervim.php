<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';
// marrim id e userit
$user= $_SESSION["userId"];
//mysqli_real_escape_string($conn,$_GET['userId']);

 //merret id  e shfaqjes se klikuar nga url
 $idSh=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    
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

//marrim te dhenat e userit
$sql="SELECT * FROM user WHERE userId='$user'";
$rez=mysqli_query($conn,$sql) or die(mysql_error($conn));
$rowu=mysqli_fetch_assoc($rez); 
////////////////////


$sql ="select * from salle where emer_salle='". $v['emer_salle']."'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($result);
$id=$row['salle_id'];



// $rezId=$rowR['rezervim_id'];
// $currentd=date('Y-m-d H:i:s');





?>
<html>

<head>
    <title>THE@HO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--  <link rel="stylesheet" href="styles.css">-->
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
        <!--link rel="stylesheet" href="styles.css"-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
       
        <link rel="icon" type="image/png" href="img/logo.png">
    </head>
    
  <body>
 <style>
           
          .booking-panel {
        display: grid;
        grid-gap: 25px;
        grid-template-columns: 1fr 3fr;
        background-color: black;
        padding: 40px;
        box-shadow: 1px 0px 23px 3px rgba(0, 0, 0, 0.45);
       
        transition: all 0.7s ease;
        width: 90%;
        height: 100vh;
        margin: 0 auto;
    }
    .booking-form-container form button {
        border-radius: 4px;
        border: none;
        padding: 10px;
        margin-top: 10px;
        float: right;
        width: 25%;
        text-align: center;
        background-color: rgb(140, 141, 134);
        color: #FFF;
        transition: all 0.7s ease;
        cursor: pointer;
        height: 42px;
    }
          .booking-form-container {
        background-color: #87998d;
        width: 100%;
        padding: 25px;
        margin: 20px 0;
    }
    .booking-form-container form select {
        padding: 10px;
        -moz-appearance: none;
        /* Firefox */
        -webkit-appearance: none;
        /* Safari and Chrome */
        background: #fff url('#') no-repeat calc(100% - 10px) 50%;
        /* custom arrow set as a background */
        background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiICB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE1cHgiIGhlaWdodD0iOHB4IiB2aWV3Qm94PSIwIDAgMTUgOCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMTUgOCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+ICA8cGF0aCBmaWxsPSIjODk4OTg5IMKgIiBkPSJNMS4wMywwLjE3NWMtMC4yMzYtMC4yMzMtMC42MTgtMC4yMzMtMC44NTQsMGMtMC4yMzUsMC4yMzItMC4yMzYsMC42MSwwLDAuODQybDYuODk3LDYuODA5ICAgIGMwLjIzNiwwLjIzMywwLjYxOCwwLjIzMywwLjg1NCwwbDYuODk3LTYuODA5YzAuMjM2LTAuMjMzLDAuMjM2LTAuNjEsMC0wLjg0MmMtMC4yMzYtMC4yMzMtMC42MTgtMC4yMzMtMC44NTQsMEw3LjUsNi4zODQgICAgTDEuMDMsMC4xNzV6Ii8+ICA8L3N2Zz4=);
        box-sizing: border-box;
        border: solid 2px #cbcbcb;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        color: #606060;
        text-indent: 0.01px;
        text-overflow: '';
        width: 23%;
        height: 42px;
        margin: 5px 0;
    }

    .booking-form-container form input {
        border-radius: 4px;
        border: 1px solid #6e6e6e;
        padding: 10px;
        width: 31%;
        height: 42px;
        margin: 5px 0;
    }

   
    .booking-form-container form {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        align-items: center;
    }
    .booking-panel-section3>.movie-box {
        border-radius: 10px;
        overflow: hidden;
    }

    .booking-panel-section3 img {
        max-width: 100%;
    }

    .booking-panel-section3>.movie-box {
        margin: 0;
    }
   

    
</style>



  <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h2   style= 'text-align: center; color:	#D3D3D3';>RESERVE YOUR TICKET</h2>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
              <!--  <img src="" alt="">     -->
              <p> <img src='images/<?php echo $row['image']; ?>'style= "width:80%  ">  </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"></div>
            <div class="movie-information">
              
            </div>
            <div class="booking-form-container">
                <form method="post" action="rezervo.php">

                  <input placeholder="First Name" type="text" name="fName"  value="<?php echo $rowu['emer']?>">

                  <input placeholder="Last Name" type="text" name="lName" value="<?php echo $rowu['mbiemer']?>">

                  <input placeholder="Phone Number" type="text" name="pNumber" value="<?php echo $rowu['telefon']?>" >

                  <input type="text" name ="orar" value="<?php echo $v['ora_fillimi'];?>">

                  <input type="text" name ="date" value="<?php echo $v['date_shfaqje'];?>">

                  <input type="text" name ="tEmer" value="<?php echo $v1['teater_emer'];?>">

                  <input type="text" name ="tSalle" value="<?php echo $v['emer_salle'];?>">

                  <input type="number" id="seats" name="noSeats" placeholder="numri i vendeve" oninput="calcPrice()">

                  <input type="number" id="pay" name="pagesa" placeholder="cmimi" min="100">
                  
                  <input type="hidden" name="orari" value="<?php echo $orari;?>">
                  
                 <input type="hidden" name="shfaqja" value="<?php echo $row['shfaqje_emer'];?>">
                 
                  <input type="hidden" name="user" value="<?php echo $_SESSION['userId'];?>">


                  <?php
//kontrollojme nese numri i vendeve ne salle ka arritur ne zero atehere, ose ne rast se eshte me i madh se numri i vendeve qe ka salla nuk mund te behet rezervimi, butoni behet disabled
                    if($v['seats']>0)
                    { ?>
                  <button style="background-color:gray;" type="submit" value="submit" name="submit" class="form-btn">Book a Seat</button>
                      <?php
                       }
                        else if($v['seats']==0 )
                       {
                      ?>
<button type="submit" value="submit" name="submit" class="form-btn" disabled>Book a Seat</button>

         <?php

}
?>
                </form>
              </div>
    </form>
    <script>
        function calcPrice() {
  var x = document.getElementById("seats").value;
  document.getElementById("pay").value = x*100;
}
    </script>
  </body>
</html>
