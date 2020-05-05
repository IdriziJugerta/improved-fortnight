<?php
session_start();
?>
<DOCTYPE! html>
<html>

<head>
<title>THE@HO</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="includes\header.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:black;text-align:center">

<!-----------------------------------------------HEADER-------------------------------------------------------------------------------------------------------------------->
<section  id="right">
<div class="datetime" ></div>
</section>


<!---------------------------------------------------------------------------- NAVIGATION BAR  ----------------------------------------------------------------------------->
<section id="nav-bar">

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" ><img src="images\logo.png"> </a>
  <button class="navbar-toggler" type="button"data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav ml-auto">
    <li class="nav-item active">
    <a class="nav-link" href="index.php">Home</a>
    </li>
    
    
    	<li class="nav-item">
    <a class="nav-link " href="contact.html" >Contact Us</a>
    </li>
    <?php
    //nese user nuk do jete i logguar  do shfaqet log in
     if((!isset($_SESSION['userId'])) ){
   echo' <li class="nav-item">
    <a class="nav-link " href="./login.php" >Log In</a>
    </li>';
     }
    ?>
  
 <li class="nav-item">
    <a class="nav-link " href="shfaqjet.php" >Shfaqje</a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submitsrch">Search</button>
    </form> 
  </div>
  
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- profil do te shfaqet vetem nese user eshte i loguar -->
  <?php if(isset($_SESSION['userId'])) { ?>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="images\profile.jpg" width="40" height="40" class="rounded-circle">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="profil.php?userId=<?php echo $_SESSION['userId'];?>">Profile</a>
          <a class="dropdown-item" href="editProf.php?userId=<?php echo $_SESSION['userId'];?>">Edit Profile</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>   
    </ul>
  </div>
  <?php } ?>
</nav>
</section>

</body>

</html>
