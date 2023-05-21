<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../css/stylehome.css" />

  <title>home</title>
</head>
<style>
    .center {
    margin-top: 5%;
    text-align: center;
    margin-bottom: 20%;
  }

  .center h1 {
    font-size: 50px;
  }
</style>
<body>
  <?php include 'navbar.php' ?>
  <?php
  require('../../RegsiterLoginUser.php');
  require('../../Agence/php/voiture/Voiture.php');
  require('Reservation.php');

  $R = new Reservation(null, "", "", "", "", "");
  $v = new Voiture(null, "", "", "", "", "", "");
  $res = $v->selectiontous($pdo);
  

  $iduser = $_SESSION['id_u'];
  // $resR = $R->selectioniduser($pdo, $iduser);
  // $rows = $resR->fetch();

  // $nbr = $R->nbreservoition($pdo);
  // $resnbv = $nbr->fetch();
  

  ?>
  <?php
  //$nb = $resnbv['nbvoiture'];
  // if ($nb == "0" ) { ?>
    <div class="grid-container">
      <?php while ($row = $res->fetch()) { ?>
        <a href="basket.php?idv=<?php echo $row['id'] ?>">
          <div class="grid-item">
            <div class="container">
              <img src="../../Agence//imgvoiture/<?php echo $row['photo'] ?>" alt="Avatar" />
              <div class="bottomleft">
                <p><?php echo $row['marque'] ?></p>
                <p>Daily Rate :<span>2999.99</span></p>
                <p>Special Price : <?php echo $row['prix'] ?></p>
              </div>

              <div class="overlay">
                <div class="text">Lease</div>
              </div>
            </div>
          </div>
        </a> 
      <?php } ?>


    </div>
    <?php //} 
  // while($rowetatvoiture=$etatvoiture->fetch())
      
  // {  
  //   $bol=$rowetatvoiture['etat']=='attent';
    
  //     if ($bol ==true)
  //    {
      ?>
       <!-- <div class="center">
    <h1><span style="color: rgb(238, 117, 12);;">Pending</span> Reservation</h1>
  </div> -->
    
    <?php  //}
   
    //else if($bol != true)   {
      //var_dump($bol);
      ?>
        <!-- <div class="grid-container">
      <?php //while ($row = $res->fetch()) { ?>
        <a href="basket.php?idv=<?php //echo $row['id'] ?>">
          <div class="grid-item">
            <div class="container">
              <img src="../../Agence//imgvoiture/<?php //echo $row['photo'] ?>" alt="Avatar" />
              <div class="bottomleft">
                <p><?php //echo $row['marque'] ?></p>
                <p>Daily Rate :<span>2999.99</span></p>
                <p>Special Price : <?php //echo $row['prix'] ?></p>
              </div>

              <div class="overlay">
                <div class="text">Lease</div>
              </div>
            </div>
          </div>
        </a>
      <?php //} ?> -->


    </div>
   <?php //}
   
    //}
    ?>


     





  <footer>
    <?php include 'footer.php' ?>
  </footer>
</body>

</html>