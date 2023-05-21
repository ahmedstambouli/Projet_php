<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../css/styleacceuilagence.css" />

    <title>HOME</title>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <?php
  require('../../RegsiterLoginAgence.php');
  require('voiture/Voiture.php');
  $idagence = $_SESSION['id_a'];
  $v = new Voiture(null, "", "", "", "", "", "");
  

  ?>
    <div class="center">
        <h1><span style="color: rgb(238, 117, 12);;">YO</span>UR PRODUCT</h1>
      </div>

    <div class="right">
        <a href="Addcra.php"><button class="btn">ADD CAR</button></a>
    </div>

    <div class="container">
      <div class="grid-container">
      <?php   $res=$v->selection($pdo,$idagence);
;
            while ($row = $res->fetch()) { ?>
        <div class="grid-item">
            <div class="card">
                <img
                  src="../imgvoiture/<?php echo $row['photo']?>"
                  alt="Denim Jeans"
                  style="width: 100%"
                />
                <h1><?php echo $row['marque'] ?></h1>
                <p class="price"><?php echo $row['prix'] ?>DT</p>
                
                <a href="updatevoiture.php?idv=<?php echo $row['id'] ?>"><p><button>Edit  to Car</button></p></a>
                <p><button id="btndelete">Delete to Car</button></p>
              </div>
        
        </div>
        <?php } ?>
       
      </div>
    </div>

    <?php include 'footer.php' ?>
  </body>
</html>
