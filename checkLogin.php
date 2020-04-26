<?php
    require_once 'dbcon.php';
    require_once'check.php';
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($conn,$_POST['search']);
    }
    
    $sql="SELECT * FROM user where username='$name'AND userPass";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)<=0){
        echo "nuk ekziston";
    }else{
        $_SESSION['type']=$row['userType'];
        $_SESSION['username']=$row['username'];
        $_SESSION['userId']=$row['userId'];
        $_SESSION['loguar']=true;
        if($_SESSION['type']=="0"){
            header("Location:home.php");
        }else{
            header("Location:user.php");
        }
    }
    mysqli_close($conn);
?>