<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/stylebasket.css" />

  <title>Basket</title>
</head>
<style>
  .grid-container2 {
    display: grid;
    grid-template-columns: 300px 300px auto auto auto;
    padding: 10px;
    margin-top: 2%;
  }

  .grid-container {
    display: grid;
    grid-template-columns: 300px 300px auto auto auto;
    padding: 10px;

  }

  .grid-itemstate {
    background-color: rgba(255, 255, 255, 0.8);
    border: 0px solid rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 30px;
    text-align: center;
  }

  .grid-itemstate p {
    font-size: 20px;
    margin-top: 25%;
    text-align: center;
    color: red;
  }
</style>

<body>
  <?php
  require('../../RegsiterLoginUser.php');
  require('../../Agence/php/voiture/Voiture.php');
  require('Reservation.php');


  ?>

  <?php include 'navbar.php' ?>

  <?php


  $idu = $_SESSION['id_u'];
  $R = new Reservation(null, "", "", "", "", "");
  $v = new Voiture(null, "", "", "", "", "", "");
  //reservation
  $res=$R->selectioniduser($pdo,$idu);
  $row=$res->fetch();
//  while( $row=$res->fetch())
//  {
//     var_dump($row);
//     $idv=$row['id_voiture'];

//  }
 
  //ID voiture
  $idv=$row['id_voiture'];
  $rowv=$v->selection_id($pdo,$idv);
  
  $resb= $R->selcetion_reservation_iduser($pdo, $idu);
 

  
  ?>



  <div class="center">
    <h1><span style="color: rgb(238, 117, 12);;">RE</span>SERVATION</h1>
  </div>

  <div class="container">
    <div class="Header">
      <h3 class="Heading">Shopping Cart</h3>
      <h5 class="Action">Remove all</h5>
    </div>
    <div class="grid-container2">
      <div class="grid-item2">picture car</div>
      <div class="grid-item2">brand car</div>
      <div class="grid-item2">number day</div>
      <div class="grid-item2">price total</div>
      <div class="grid-item2">state</div>



    </div>







<?php  
while($rowb=$resb->fetch())
 { 
   // var_dump($rowb);

    ?>
    


      <div class="grid-container">
        <div class="grid-itemphoto">
          <img src="../../Agence/imgvoiture/<?php echo $rowb['photo'] ?>" alt="" width="200px">

        </div>
        <div class="grid-itemp">
          <p><?php echo $rowb['marque'] ?></p>
        </div>
        <div class="grid-iteminput">

          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <input class="input" type="text"  name="nbjour" value="<?php echo $rowb['nbjoure'] ?>" disabled/>
            </div>
          </div>
        </div>

        <div class="grid-itemprix">
          <p><?php echo $rowb['prixtotal'] 
              ?></p>
        </div>
        <div class="grid-itemstate">
        <p><?php echo $rowb['etat'] 
              ?></p>
        </div>

      </div>
      <?php } ?>



     
 
    

  </div>
  </div>

 



  <footer>
    <?php include 'footer.php' ?>

  </footer>
</body>

</html>