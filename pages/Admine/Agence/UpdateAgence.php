<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agenc</title>
</head>

<body>

    <div class="sidebar close">
        <div class="logo-details">
            <i class="bx bx-car"></i>
            <span class="logo_name">LeaseCar</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="Admineagence.php">
                        <i class="bx bx-collection"></i>
                        <span class="link_name">agencies</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">agencies</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../User/AdminUser.php">
                        <i class="bx bxs-user"></i>
                        <span class="link_name">Users</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Category</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="bx bx-line-chart"></i>
                    <span class="link_name">Chart</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Chart</a></li>
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content"></div>
                    <div class="name-job">
                        <div class="profile_name">Prem Shahi</div>
                        <div class="job">Web Desginer</div>
                    </div>
                    <i class="bx bx-log-out"></i>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu"></i>
        </div>
        <div class="container text-center">
            <div class="row row-cols-1">
                <div class="col">
                    <h1>UPDATE Agenc</h1>
                </div>

                <div class="col" style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); border-radius:2%;">
                    <?php
                    require 'Agence.php';
                    $A = new Agence(null, "", "", "", "", "", "", "");
                    $id = $_GET['ida'];
                    $A->selection_id($pdo, $id);

                    ?>
                    <form method="post" enctype="multipart/form-data" >
                        <div class="container text-center" style="margin-top: 2%; margin-bottom: 2%;">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="nameagence" value="<?php echo $A->NAME ?>">
                                        <label for="floatingInput">NAME</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="location" value="<?php echo $A->LOCALISATION ?>">
                                        <label for="floatingInput">LOCALISATION</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="phonenumber" value="<?php echo $A->PHONE_NUMBER ?>">
                                        <label for="floatingInput">PHONE NUMBER</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="contact" value="<?php echo $A->CONTACT ?>">
                                        <label for="floatingInput">CONTACT</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $A->EMAIL ?>">
                                        <label for="floatingInput">EMAIL </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" value="<?php echo $A->PASSWORD ?>">
                                        <label for="floatingInput">PASSWORD</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="photo" value="">
                                        <label for="floatingInput">PHOTO</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <img src="img/<?php echo $A->PHOTO ?>" width="100" height="100" alt="">
                                </div>
                            </div>
                            <input type="submit" value="update" class="btn btn-primary" name="update">
                            <a href="Admineagence.php" class="btn btn-secondary" name="can" role="submit">Cancel</a>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['update'])) {
                        $A->NAME = $_POST['nameagence'];
                        $A->LOCALISATION = $_POST['location'];
                        $A->PHONE_NUMBER = $_POST['phonenumber'];
                        $A->CONTACT = $_POST['contact'];
                        $A->EMAIL = $_POST['email'];
                        $A->PASSWORD = $_POST['password'];
                        $A->PHOTO = $_FILES['photo']['name'];
                        move_uploaded_file($_FILES['photo']['tmp_name'], "img/" . $A->PHOTO);
                        $A->update($pdo, $id);
                      
                        echo "<script>
                            window.location.href='Admineagence.php'
                            </script>";
                    }

                    ?>


                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    
</script>

</html>