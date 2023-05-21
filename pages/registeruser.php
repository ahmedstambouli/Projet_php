<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/Styleregister.css" />
  <link rel="stylesheet" href="css/stylenavbar.css">
  <link rel="stylesheet" href="css/stylefooter.css">
  <link rel="stylesheet" href="./bootstrap-5.2.3-dist/css/bootstrap.min.css">

  <title>Sign Up</title>
</head>

<style>
  form {
    padding: 11%;
    width: auto;
    margin-top: 0%;
  }

  a {
    display: block;
    text-align: right;
    text-decoration: none;
    color: #999;
    font-size: 0.9rem;
    transition: .3s;
  }

  a:hover {
    color: #38d39f;
  }
</style>


<body>
  <?php include 'navbar.php'; ?>
  
  <?php 
  require 'RegsiterLoginUser.php';
  $U = new registeruser (null, "", "", "", "", "", "", "");
  ?>

  <div class="grid-container">
    <div class="grid-item1">

    </div>
    <div class="grid-item">
      <div class="login-content">
        <form method="post" enctype="multipart/form-data">
          <h2>Sign up</h2>

          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder="foulen foulen" name="fullname">
              <label for="floatingInput">Full name</label>
            </div>
          </div>


          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" placeholder="exemple@mail.com" name="email">
              <label for="floatingInput">Email</label>
            </div>
          </div>


          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" placeholder="+216" name="phonenumber">
              <label for="floatingInput">Phone Number</label>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" selected name="se" aria-label="Default select example" style="border: 0px solid #ced4da;">
                <option >SEXE</option>
                <option value="M">MAN</option>
                <option value="W">WOMEN</option>
              </select>
            </div>
          </div>

          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder="bizert" name="company">
              <label for="floatingInput">Company</label>
            </div>
          </div>

          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" placeholder="********" name="password">
              <label for="floatingInput">Password</label>
            </div>

          </div>
          <div id="passwordHelpBlock" class="form-text" style="margin-top: -1.75rem;font-size: .6em;color: #ff0000;">
            8-20 characters long ,letters and numbers.
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" placeholder="********" name="Cpassword">
              <label for="floatingInput">Confirm Password</label>
            </div>
          </div>
          <div class="input-div">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="form-floating mb-3">

              <input type="file" class="form-control" name="photo">
              <label for="floatingInput">photo</label>
            </div>
          </div>



          <a href="Loginuser.php">i have a counte</a>
          <a href="registeragence.php">Register agence</a>
          <input type="submit" value="Register" name="Register" class="btn btn-dark">
        </form>
        <?php
        if (isset($_POST['Register'])) {
          $U->FULLNAME = $_POST['fullname'];
          $U->COMPANY = $_POST['company'];
          $U->PHONE_NUMBER = $_POST['phonenumber'];
          $U->SEXE = $_POST['se'];  
          $U->EMAIL = $_POST['email'];
          $U->PASSWORD = $_POST['password'];
          $U->PHOTO = $_FILES['photo']['name'];
          move_uploaded_file($_FILES['photo']['tmp_name'], "img/". $U->PHOTO);
          $U->register($pdo);
        }


        ?>
      </div>
    </div>
  </div>




  <footer>
    <?php include 'footer.php' ?>
  </footer>
</body>

</html>