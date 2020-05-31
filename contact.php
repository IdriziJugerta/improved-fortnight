<?php
  include 'includes/header.php';
  
?>

<DOCTYPE html>
 <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCqRQUzG8s_7YAqkbG7nxTRD41eul1dMwA&sensor=false"></script>

 </head>
<style>
     #adresa{
        text-align: center;
        color: white;
    }
</style>
<div  id="googleMap" style="width:700px;
        height:500px;
        margin-left: auto;   text-align: center;
        position:fixed;
                    width: 100%;
                    padding:auto;">
  <script>
     
    //koordinatat e adreses
    var myCenter = new google.maps.LatLng(41.3345 , 19.8165 );
    
        function map1() {
    
            //vecorite e hartes
            var mapProp = {
                center: myCenter,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
    
            //krijimi i hartes
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    
            //krijimi i shenjuesit qe do shenjoj tek koordinatat e teatrit
            var marker = new google.maps.Marker({
                position: myCenter
            });
    
            //vendosja e shenjuesit mbi harte
            marker.setMap(map);
    
            //krijimi i info window qe do te tregoj emrin e teatrit
            var infowindow = new google.maps.InfoWindow({
                content: "<b>Aesthetic Coders</b>"
            });
    
            //vendosja e info window ne harte dhe hapja e objektit mbi shenjues
            infowindow.open(map, marker);
    
        }
        
    </script>
</div>

<body  onload="map1()">
 <body  style="background-color:black;">
 
      
 <div id="adresa">
<span id="title">Aeasthetic Coders<br></span>
<span id="information"> Sepse lidhja e teknologjise me artin eshte shume me e madhe sec duket ne siperfaqe. <br>
    <br>
    <br>
    </span>
</div>
</body>
  
  <?php
    include 'includes/footerTHE@HO.php';
  ?>

  </html>