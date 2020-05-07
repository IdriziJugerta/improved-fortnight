<?php
require_once 'includes/dbcon.php';
if(isset($_POST['reset'])){

    $tkn=$_POST['token'];
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    $pswrep=$_POST['pswrep'];

    if($psw!=$pswrep){
        header("Location:createpsw.php?reset=nomatch");
        exit();
    }
    $currentd=date('Y-m-d H:i:s');
    $sqlE="SELECT * FROM pswreset INNER JOIN USER ON pswemail = email WHERE email = '$email'";
    $rezE = mysqli_query($conn, $sqlE)or die(mysqli_error($conn));
    if(!$rowE=mysqli_fetch_assoc($rezE)){
        header("Location:forgot-psw.php?reset=noaccount");
    }else{

            $sql="SELECT * FROM pswreset WHERE pswtoken='$tkn'";
            $rez = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            if(!$row=mysqli_fetch_assoc($rez)){
                header("Location:forgot-psw.php?reset=exp");
                exit();
                }  
                $emailres=$row["pswemail"];
            $sqlUpd="UPDATE user set userPass='$psw' WHERE email='$emailres'"; 
            $rezUp = mysqli_query($conn, $sqlUpd)or die(mysqli_error($conn));
            header("Location:login.php?reset=success");
            }
        }

else{
    header("Location:index.php");
}