<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylereservation.css">
    <title>reservation</title>
</head>
<?php include 'navbar.php' ?>
<?php require("../../User/php/Reservation.php") ;
  require('../../RegsiterLoginAgence.php');

  $R = new Reservation(null, "", "", "", "", "");
  $idagence = $_SESSION['id_a'];
  $row=$R->selction_iduser_idvoitur_idagence($pdo,$idagence)->fetch();
  //var_dump($row);

?>
<style>
    .center {
    margin-top: 5%;
    text-align: center;
    margin-bottom: 5%;
  }

  .center h1 {
    font-size: 50px;
  }
</style>


<body>
    <div class="container">
    <div class="center">
    <h1><span style="color: rgb(238, 117, 12);;"></span> Reservation</h1>
  </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">MATRICULE</th>
                <th scope="col">NAME USER</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">MARQUE CAR</th>
                <th scope="col">NOMBER OF DAYS</th>
                <th scope="col">CITY</th>
                <th scope="col">PHOTO</th>
                <th scope="col"></th>



              </tr>
            </thead>
            <?php
            $res = $R->selction_iduser_idvoitur_idagence($pdo,$idagence);
            while ($row=$res->fetch()) { 
              if ($row['etat']=="attent")
              {
                
              
              ?>
            
              <tbody>
                <tr>
                  <td><?php  echo $row['matricule'] ?></td>
                  <td><?php echo $row['FULLNAME'] ?></td>
                  <td><?php echo $row['PHONE_NUMBER'] ?></td>
                  <td><?php echo $row['marque'] ?></td>
                  <td><?php echo $row['nbjoure'] ?></td>
                  <td><?php echo $row['COMPANY'] ?></td>
                  <td><img src="../../Admine/User/img/<?php  echo $row['PHOTO']?>"width="80" height="80"></td>
                  <td>
                    <form method="post">
                    <input type="submit" class="btn btn-outline-primary" role="button" name="accept" value="accept" >
                    <input type="submit" class="btn btn-outline-danger" role="button" name="refuse" value="refuse">




                    <input type="text" name="iduser" id="" value="<?php echo  $row['id_user']; ?>" hidden>
                    <input type="text" name="idv" id="" value="<?php echo  $row['id_voiture']; ?>" hidden>
                    <input type="text" name="nbjoure" id="" value="<?php echo  $row['nbjoure']; ?>" hidden>
                    <input type="text" name="prixtotal" id="" value="<?php echo  $row['prixtotal']; ?>" hidden>
                    <input type="text" name="idR" id="" value="<?php echo  $row['0']; ?>" name="idR" hidden>
                    <input type="text" name="etat" value="true" hidden>
                    <input type="text" name="etatf" value="false" hidden>


                    </form>
                  </td>
             
                </tr>

              </tbody>

            <?php }
          
                else {?>

                    <tbody>
                      <tr>
                        
                      </tr>
                    </tbody>

                <?php }
          } ?>
          </table>
            </div>
            <?php 
            
           
                        if (isset($_POST['accept'])) {
                          $idR=$_POST['idR'];
                          $R->iduser =$_POST['iduser'];
                          $R->idvoitur=$_POST['idv'];
                          $R->nbjoure=$_POST['nbjoure'];
                          $R->prixtotal=$_POST['prixtotal'];
                          $R->etat=$_POST['etat'];
                          
                          $R->updateetat($pdo,$idR);
                        }


                        if (isset($_POST['refuse'])) {
                          $idR=$_POST['idR'];
                          $R->iduser =$_POST['iduser'];
                          $R->idvoitur=$_POST['idv'];
                          $R->nbjoure=$_POST['nbjoure'];
                          $R->prixtotal=$_POST['prixtotal'];
                          $R->etat=$_POST['etatf'];
                          
                          $R->updateetat($pdo,$idR);
                        }

            
            
            
            ?>
        </div>
    </div>
   

    <footer>
        <?php include 'footer.php' ?>
    </footer>
</body>

</html>