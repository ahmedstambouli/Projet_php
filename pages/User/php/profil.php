<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleprofil.css">

    <title>Profil</title>
</head>
<style>
    .a{
  text-decoration: none;
  }
</style>

<body>
    <?php include 'navbar.php' ?>
    <?php
    require('../../RegsiterLoginAgence.php');
    require('../../Admine/User/User.php');
    $U = new User(null, "", "", "", "", "", "", "");
    $id = $_SESSION['id_u'];
    $res = $U->selectionprofil($pdo, $id);
    $row = $res->fetch();


    ?>

    <div class="container">
        <div class="grid-container">
            <div class="grid-item">


                <img src="img/<?php echo $row['PHOTO'] ?>" class="img-profil">

                <h2><?php echo $row['FULLNAME'] ?></h2>
                <p><span>Email:</span> <?php echo $row['EMAIL'] ?></p>
                <p><span>Phone number:</span> <?php echo $row['PHONE_NUMBER'] ?></p>
                <p><span>city:</span> <?php echo $row['COMPANY'] ?></p>
                <p><span>Bio:</span> Je suis née en 1937 dans un petit village. Je me rappelle quand j'avais trois ans, je perdis mon père. Ma grand-mère et ma mère travaillaient dans des usines de textiles et je trouvai un emploi moi aussi dans ces usines. Mais je n'abandonnais jamais le grand rêve de ma vie qui était de devenir pilote d'avion.</p>



            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="grid-item">
                    <h1>modify profile</h1>
                    <div class="grid-container2">

                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">Full Name</label>
                                    <input class="input" type="text" value="<?php echo $row['FULLNAME'] ?>" name="fullname">
                                </div>
                            </div>
                        </div>

                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">Email</label>
                                    <input class="input" type="text" value="<?php echo $row['EMAIL'] ?>" name="email">
                                </div>
                            </div>
                        </div>


                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">Phone number</label>
                                    <input class="input" type="number" value="<?php echo $row['PHONE_NUMBER'] ?>" name="phonenumber">
                                </div>
                            </div>
                        </div>



                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">City</label>
                                    <input class="input" type="text" value="<?php echo $row['COMPANY'] ?>" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="grid-item2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="se" id="flexRadioDefault1" value="M" <?php if ($row['SEXE'] == "M") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                <label>
                                    MAN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="se" id="flexRadioDefault2" value="W" <?php if ($row['SEXE'] == "W") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    WOMEN
                                </label>
                            </div>
                        </div>

                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">password</label>
                                    <input class="input" type="password" value="<?php echo $row['PASSWORD'] ?>" name="password">
                                </div>
                            </div>

                        </div>

                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">Confirm password</label>
                                    <input class="input" type="password">
                                </div>
                            </div>
                        </div>


                        <div class="grid-item2">
                            <div class="input-div">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <label for="">picture</label>
                                    <input class="input" type="file" name="photo">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="grid-item2">

                        <div class="input-div">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <label for="">Bio</label>
                                <textarea class="input" rows="4" cols="50">
                                Je suis née en 1937 dans un petit village. Je me rappelle quand j'avais trois ans, je perdis mon père. Ma grand-mère et ma mère travaillaient dans des usines de textiles et je trouvai un emploi moi aussi dans ces usines. Mais je n'abandonnais jamais le grand rêve de ma vie qui était de devenir pilote d'avion.
                            </textarea>
                            </div>
                        </div>

                    </div>
                    <input type="submit" value="update" class="btn" name="update" >
                    <input type="reset" value="cancel" class="btnc">
                    <a href="../../logout.php" style="margin-left: 30%;" class="a">disconnect</a>

                    <?php

                    if (isset($_POST['update'])) {
                        $U->FULLNAME = $_POST['fullname'];
                        $U->COMPANY = $_POST['company'];
                        $U->PHONE_NUMBER = $_POST['phonenumber'];
                        $U->SEXE = $_POST['se'];
                        $U->EMAIL = $_POST['email'];
                        $U->PASSWORD = $_POST['password'];
                        $U->PHOTO = $_FILES['photo']['name'];
                        move_uploaded_file($_FILES['photo']['tmp_name'], "../../Admine/User/img/" . $U->PHOTO);
                        $U->update($pdo, $id);
                        
                    }
                    ?>

                </div>
            </form>
        </div>
    </div>
    <footer>
        <?php include 'footer.php' ?>
    </footer>
</body>

</html>