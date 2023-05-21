<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/styleaddcar.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <title>Document</title>
</head>

<body>
  <?php include 'navbar.php' ?>
  <?php
  require('../../RegsiterLoginAgence.php');
  require('voiture/Voiture.php');
  $idagence = $_SESSION['id_a'];
  $v = new Voiture(null, "", "", "", "", "", "");

  ?>


  <form method="post" enctype="multipart/form-data">
    <div class="container">
      <div class="header">
        <h1>Add Car</h1>
      </div>
      <div class="articel">

        <div class="input-div">
          <div class="i">
          </div>
          <div>
            <label for="">matriculation</label>
            <input class="input" type="text" name="matricule">
          </div>
        </div>

        <div class="input-div">
          <div class="i">
          </div>
          <div>
            <label for="">brand</label>
            <input class="input" type="text" name="marque">
          </div>
        </div>

        <div class="input-div">
          <div class="i">
          </div>
          <div>
            <label for="">Price</label>
            <input class="input" type="number" name="prix">
          </div>
        </div>

        <div class="input-div">
          <div class="i">
          </div>
          <div>
            <label for="">number of car</label>
            <input class="input" type="number" name="nbvoiture">
          </div>
        </div>
        <div class="input-div">
          <div class="i">
          </div>
          <div>
            <input class="input" type="file" accept="image/png, image/jpg, image/gif, image/jpeg" name="photo">
          </div>
        </div>


        <div>
          <input class="text" name="id_agence" value="<?php echo $idagence ?>" hidden>
        </div>

      </div>



      <input type="submit" value="SEND" class="btn" name="btn">

    </div>
  </form>
  <?php


  if (isset($_POST['btn'])) {
    $v->matricule = $_POST['matricule'];
    $v->marque = $_POST['marque'];
    $v->prix = $_POST['prix'];
    $v->nbvoiture = $_POST['nbvoiture'];
    $v->id_agence = $_POST['id_agence'];
    $v->PHOTO = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "../imgvoiture/" . $v->PHOTO);
    $mat = $v->matricule;
    $num = $v->selection_matriculation($pdo, $mat);

    if ($num == 0) {
      $v->insert($pdo);
    } else
    echo '<script>alert("this matricule already exists")</script>';

  

   
  }
  

 



  ?>


  <?php include 'footer.php' ?>
</body>

</html>