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
  $idv = $_GET['idv'];
  $R = new Reservation(null, "", "", "", "", "");
  $v = new Voiture(null, "", "", "", "", "", "");
  $res = $v->selection_id($pdo, $idv);
  //table reservation 
  $resR = $R->selectioniduser($pdo, $idu);
  $row = $resR->fetch();
  //var_dump($row);
  $idvoiturer = $R->idvoiture($pdo, $idu);

  $idvR = $idvoiturer['id_voiture'];

  $resRv = $v->selection_id($pdo, $idvR);
  //var_dump($resR->fetch());
  $nbr = $R->nbreservoition($pdo);
  $resnbv = $nbr->fetch();
  //var_dump($resnbv['nbvoiture']);
  $etatvoiture = $R->selectionetatvoiture($pdo, $idu);

  $resb= $R->selcetion_reservation_iduser($pdo, $idu);
  //var_dump($etavr->fetch());
  //   $rowetatvr=$etavr->fetch();
  // var_dump($$rowetatvr=$etavr->fetch());
  ?>



  <div class="center">
    <h1><span style="color: rgb(238, 117, 12);;">BA</span>SKET</h1>
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
      <div class="grid-item2">price</div>
      <div class="grid-item2">state</div>



    </div>






    

     <?php   if ($idv==null) 
     {?>
    <h2 style="margin-left:30%; margin-top:5%;">You don't have a car on reservation </h2> 

    <?php }
     else {
      
     ?> 
     
    <form method="post">
      <div class="grid-container">
        <div class="grid-itemphoto">
          <img src="../../Agence/imgvoiture/<?php echo $res['photo'] ?>" alt="" width="200px">

        </div>
        <div class="grid-itemp">
          <p><?php echo $res['marque'] ?></p>
        </div>
        <div class="grid-iteminput">

          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <input class="input" type="number" value="7" min="7" step="7" name="nbjour" />
              <input type="text" name="etat" value="attent" hidden>
            </div>
          </div>
        </div>

        <div class="grid-itemprix">
          <p><?php echo $res['prix'] 
              ?>/7 dey</p>
        </div>


      </div>



      <input type="submit" class="btn" value="confirm" name="btn">
    </form>
    <?php  } 
    ?>
    

  </div>
  </div>

  <?php
  if (isset($_POST['btn'])) {
    $R->iduser = $idu;
    $R->idvoitur = $idv;
    $R->nbjoure = $_POST['nbjour'];
    $R->prixtotal = $res['prix']*$_POST['nbjour'];
    $R->etat = $_POST['etat'];

    $R->insert($pdo);
    var_dump($R);
  }


  ?>



  <footer>
    <?php include 'footer.php' ?>

  </footer>
</body>

</html>