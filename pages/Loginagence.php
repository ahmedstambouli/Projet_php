<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/stylenavbar.css">
    <link rel="stylesheet" href="css/stylefooter.css">

    

    <title>Sign In</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<?php 
  require 'RegsiterLoginAgence.php';
  ?>
<div class="container">
    <div class="img">
        <img  src="img/carlogin.png" alt="">
    </div>

    <div class="login-content">
        <form method="post" enctype="multipart/form-data">
            <h2>Welcome</h2>
            <div class="input-div">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <label for="">EMAIL</label>
                    <input class="input" type="text" name="email">
                </div>
            </div>

            <div class="input-div">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <label for="">Password</label>
                    <input class="input" type="password" name="password">
                </div>
            </div>
            <a href="loginuser.php">login USER ?</a>
            <a href="home.html">Forget Password?</a>
          
            <input type="submit" value="Login" class="btn" name="connexion"> 
        </form>
    </div>

</div>
<?php
          // il faut que le require doit etre avant le test, car l arecuperartion de session est dans admin.php
                
     
        $A=new RegisterAgence (null, "", "", "", "", "", "", "");
        
          if(isset($_POST['connexion']))
          {
                $A->EMAIL=$_POST['email'];
                $A->PASSWORD=$_POST['password'];
                $A->verifierAgence($pdo);
               
          }
       
        
     
        ?>


<footer>
    <?php include 'footer.php' ?>
  </footer>
</body>
</html>