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
    require ('RegsiterLoginAgence.php');
    $A = new RegisterAgence(null, "", "", "", "", "", "", "");
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
                            <input type="text" class="form-control" placeholder="foulen foulen" name="name">
                            <label for="floatingInput">NAME</label>
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
                            <input type="text" class="form-control" placeholder="+216" name="localisation">
                            <label for="floatingInput">LOCALISATON</label>
                        </div>
                    </div>

                    <div class="input-div">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="bizert" name="contact">
                            <label for="floatingInput">contact</label>
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



                    <a href="Loginagence.php">i have a counte</a>
                    <a href="registeruser.php">Register User</a>

                    <input type="submit" value="Register" name="Register" class="btn btn-dark">
                </form>
                <?php
                if (isset($_POST['Register'])) {
                    $A->NAME = $_POST['name'];
                    $A->EMAIL = $_POST['email'];
                    $A->PHONE_NUMBER = $_POST['phonenumber'];
                    $A->LOCALISATION = $_POST['localisation'];
                    $A->CONTACT=$_POST['contact'];
                    $A->PASSWORD = $_POST['password'];
                    $A->PHOTO = $_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], "img/" . $A->PHOTO);
                    $A->register($pdo);
                  
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