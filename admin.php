<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
 
  margin:0px;
  border:0px;
}

html {
  font-family: 'Courier New', sans-serif;
  font-size:20px;
}

.header {
  width:100%;
  height:140px;
  background-color: black;
  color: white;
}

.sidebar {
  padding:30px;
  width:400px;
  height:700px;
  float:left;

}
.data{
  height: 700px;
  background-image: url("images/thKid.jpg");
 background-repeat: no-repeat;
 background-position: 70% 50%;
  background-size: 550px 500px;
  
  font-size:25px;
}
#adminl{
background:white
border-radius:50px;
padding:10px;
height:70px;
weight:60px;
}

ul li {
    padding: 20px;
    border-bottom: 2px solid grey;
}
 ul li:hover {
        background: #6B6D6A;
        color: white;
    }

img {
    padding-right: 10px;
}

a {
    color: black;
}

</style>
</head>
<body>

<div class="header">
  <center><img src="images/adminlogo.png" alt="adminLogo" id="adminl"><br>Admin Profile
</center>
</div>

<div class="sidebar">
    <ul>
    <li><img src="images/theatre.jpg" height="75" width="75"> <a href="teaterCRUD.php" target="_blank">Teater</a></li>
    <li><img src="images/shfaqje.jpg" height="75" width="75"> <a href="shfaqje.php" target="_blank">Shfaqje</a></li>
    <li><img src="images/salle.jpg" height="75" width="75"> <a href="salle.php" target="_blank">Salle</a></li>
    <li><img src="images/time.jpg" height="75" width="75"> <a href="orarCRUD.php" target="_blank">Orar</a></li>
    </ul>
  </div>

  <div class="data"><br>
   
 <center><h3>Hello</h3><center>
  </div>


</body>
</html>
