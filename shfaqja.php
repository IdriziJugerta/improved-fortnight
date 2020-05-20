<?php
include 'includes/header.php';
require_once 'includes/dbcon.php';
    //merret id  e shfaqjes se klikuar nga url
    $idSh=mysqli_real_escape_string($conn,$_GET['shfaqje_id']);
    
    //marrim te dhenat e shfaqjes 
    $sql="SELECT * FROM shfaqje WHERE shfaqje_id='$idSh'";
    $rez=mysqli_query($conn,$sql) or die(mysqli_error($conn));
         
   
    //marrim reviewn dhe username e user i cili e ka derguar
    $sql1="SELECT username,review FROM opinion INNER JOIN user ON idUser=userId WHERE idShfaqje='$idSh'";
    $rez1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

    //marrim teatrot ne te cilet do shfaqet shfaqja
    $sql2="SELECT DISTINCT teater_id from orar inner join salle on idsalle=salle_id inner join teater on t_id=teater_id WHERE idShfaq='$idSh'";
    $rez2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
    
  
?>

<!DOCTYPE html>
    <body>
          <div class="imazh"> 
           <style>

                .column {
                  float: left;
                  width: 33,3%;
                  padding: 5px;
                  margin:1px;
                }

                /* Clearfix (clear floats) */
                .row::after {
                  content: "";
                  clear: both;
                  display: table;
                }
                table, td  {  
                  border: 1px solid grey;
                  text-align: left;
                }

                table {
                  border-collapse: collapse;
                  width: 90%;
                }

                td {
                  padding: 8px;
                }
                .imazh {
                  background-image: url("images/shfaqjeB.jpg");
                  height: 700px;
                  background-position: right;
                  background-repeat: no-repeat;
                border:   border:1px solid black;
                  position: relative;
                }

                input[type=submit] {
                  background-color: 	#000000;
                  border: none;
                  color: white;
                  padding: 16px 32px;
                  text-decoration: none;
                  margin: 4px 2px;
                  cursor: pointer;
                }

           </style>

            <div  div style= 'float: left;
                    width: 33.33%;
                    padding: 5px;'> 



                        <?php
                            if($row=mysqli_fetch_assoc($rez)){ ?>
                                <!-- afishohen te dhenat e shfaqjes -->
                                  <div class = "column"> 
                                          <p> <img src='images/<?php echo $row['image']; ?>'style= "width:50%  ">
                                          </p>  <h3  style= 'text-align: left; color:	#D3D3D3';><?php echo $row['shfaqje_emer']; ?></h3>  <p style="color:#D3D3D3" ><?php echo $row['zhaner']; ?></p> 
                                          <p  style= 'text-align: left;   padding: 30px;  width: 500px; color:#C0C0C0;  height: 100px;'><?php echo substr($row['pershkrim'],0,200);?>...</p>  <p  style= 'text-align: left; color:#C0C0C0;  padding: 20px;  width: 500px;   height: 100px;'>Cast : <?php echo $row['cast']; ?></p >
                                  </div>
                    
                        <?php } ?>


                    <table>
                              <!-- afishojme teatrot dhe kohet e shfaqjeve -->
              <?php
                      if(isset($_SESSION['userId'])){
                                        while($row2=mysqli_fetch_assoc($rez2)){
                                        $sqlt="SELECT * FROM teater WHERE teater_id='".$row2['teater_id']."'";
                                        $rezt=mysqli_query($conn,$sqlt)  or die(mysqli_error($conn));
                                        while($rowOr=mysqli_fetch_assoc($rezt))
                                      {?>
                    <div >
                                  <tr>                
                                          <!-- afishojme teatrot -->
                                          <td><?php echo $rowOr['teater_emer']." , ".$rowOr['adrese']?> </td> 
                                <?php } ?> 
                                          <td> 
                                <?php
                                    // do marrim oraret ne te cilat shfaqja do te jepet ne teatrot e ndryshme
                                      $sqlOr="SELECT DISTINCT idOrar,ora_fillimi FROM salle INNER JOIN teater ON t_id= teater_id INNER JOIN orar 
                                      ON salle_id=idSalle where idShfaq='$idSh' and teater_id='".$row2['teater_id']."'";
                                      $rezOr=mysqli_query($conn,$sqlOr) or die(mysqli_error($conn));
                                      while($rowOr=mysqli_fetch_assoc($rezOr))
                                {?>
                            <!-- afishojme oraret -->
                            <a href ="rezervim.php?orar=<?php echo $rowOr['idOrar'];?>&shfaqje_id=<?php echo $idSh;?>&teater_id=<?php echo $row2['teater_id'];?>">
                            <button> <?php echo date('h:i A',strtotime($rowOr['ora_fillimi']));?></button></a>
                    
                            <?php } ?> 
                            </td>
                          </tr>
                      </div>
                        <?php 
                                        }  
                      }     
                ?>
                </table>

            </div>
  
            <div style= 'float: center;
                    width: 100%;
                    padding: 5px;'>
              
                            <?php 
                        //per te shfaqur form te review kontrollojme nese kemi nje user te loguar
                        if(isset($_SESSION['userId'])){ ?>
                        <div class = "column">
                            <form action="reviewdb.php?shfaqje_id=<?php echo $idSh ?>" method="post">
                            <textarea  style=" background-color:	transparent; color:	white;" rows="4" cols="50" name ="review" placeholder="Give a review" required > 
                            </textarea>
                            <input type="submit" name="sendrev">
                            </form> 
                          
                        <?php }?>

                  <div>
                    <?php
                        //afishojme review-et e bera te dukshme per user e regjistruar dhe per vizitoret
                        if(mysqli_num_rows($rez1)>0){
                        while($row1=mysqli_fetch_assoc($rez1)){ ?>
                      <div>
                          <h4 style= ' color:	#D3D3D3';>
                          <?php echo $row1['username']; ?></h4> <p>
                          <?php echo $row1['review']; ?></p>
                      </div>
                      
                        <?php  }     
                        }
                      ?>
                  </div>
            </div> 
            
    </body>
 </html>
