<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="../../css/stylenavbar.css">
  <link rel="stylesheet" href="../../css/stylefooter.css">
  <link rel="stylesheet" href="../css/stylecontact.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>


<style>
  .right-side .button input[type="submit"] {
    color: #fff;
    font-size: 18px;
    outline: none;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    background: rgb(238, 117, 12);
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .button input[type="submit"]:hover {
    background: rgb(238, 87, 12);
  }
</style>

<body>

  <?php include 'navbar.php' ; 
  
  ?>
  <?php  
    require 'Contacte.php';
    require('../../RegsiterLoginAgence.php');
    require('../../Admine/User/User.php');
  $C=new Contacte(null,"","","","");
  $idu = $_SESSION['id_u'];?>

  <div class="center">
    <h1><span style="color: rgb(238, 117, 12);;">CO</span>NTACT</h1>
  </div>

  <form method="post">
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class='bx bx-map'></i>
          <div class="topic">Address</div>
          <div class="text-one">Bizert ghar el melh</div>
        </div>
        <div class="phone details">
          <i class='bx bx-phone'></i>
          <div class="topic">Phone</div>
          <div class="text-one">53804490</div>

        </div>
        <div class="email details">
          <i class='bx bx-envelope'></i>
          <div class="topic">Email</div>
          <div class="text-one">contact@gmail.com</div>

        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <form action="#">
          <div class="input-box">
            <input type="text" placeholder="Enter your name" name="name">

          </div>
<input type="text" name="id_user" value="<?php echo $idu ?>" hidden>
          <div class="input-box">
            <input type="text" placeholder="Enter your email" name="email">
          </div>
          <div class="input-box message-box">

            <textarea  cols="30" rows="10" placeholder="Enter your message" name="message"></textarea>
          </div>
          <div class="button">
            <input type="submit" value="Send Now" name="btn">
          </div>
        </form>
      </div>

    </div>
  </div>
  </form>
  <?php 
    
    if (isset($_POST['btn'])) {
          $C->id_user=$_POST['id_user'];
          $C->name=$_POST['name'];
          $C->email=$_POST['email'];
          $C->message=$_POST['message'];
          $C->insert($pdo);
          var_dump($C);

        }
  
  
  ?>

  <footer>
    <?php include 'footer.php' ?>
  </footer>

</body>

</html>