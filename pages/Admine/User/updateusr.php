<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <a href="#">
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
          <a href="AdminUser.php">
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
          <h1>UPDATE USER</h1>
        </div>

        <div class="col" style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); border-radius:2%;">
          <?php
          require 'User.php';
          $U = new User(null, "", "", "", "", "", "", "");
          $id = $_GET['idu'];
          $U->selection_id($pdo, $id);
          ?>
          <form method="post" enctype="multipart/form-data">
            <div class="container text-center" style="margin-top: 2%; margin-bottom: 2%;">
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="fullname" value="<?php echo $U->FULLNAME ?>">
                    <label for="floatingInput">FULL NAME</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="company" value="<?php echo $U->COMPANY ?>">
                    <label for="floatingInput">COMPANY</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" name="phonenumber" value="<?php echo $U->PHONE_NUMBER ?>">
                    <label for="floatingInput">PHONE NUMBER</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="se" id="flexRadioDefault1" value="M" <?php if ($U->SEXE == "M") {
                                                                                                              echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      MAN
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="se" id="flexRadioDefault2" value="W" <?php if ($U->SEXE == "W") {
                                                                                                              echo 'checked';
                                                                                                            } ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                      WOMEN
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $U->EMAIL ?>">
                    <label for="floatingInput">EMAIL </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingInput" value="<?php echo $U->PASSWORD ?>">
                    <label for="floatingInput">PASSWORD</label>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="photo" value="img/moi.jpg">
                    <label for="floatingInput">PHOTO</label>
                  </div>
                </div>
                <div class="col">
                  <img src=<img src="img/<?php echo $U->PHOTO?> "width="100" height="100" alt="">
                </div>
              </div>
              <input type="submit" value="update" class="btn btn-primary" name="update">
              <a href="AdminUser.php" class="btn btn-secondary" name="can" role="submit">Cancel</a>
            </div>
          </form>

          <?php

          if (isset($_POST['update'])) {
            $U->FULLNAME = $_POST['fullname'];
            $U->COMPANY = $_POST['company'];
            $U->PHONE_NUMBER = $_POST['phonenumber'];
            $U->SEXE = $_POST['se'];
            $U->EMAIL = $_POST['email'];
            $U->PASSWORD = $_POST['password'];
            $U->PHOTO = $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], "img/" . $U->PHOTO);
            $U->update($pdo, $id);
                            

            echo "<script>
            window.location.href='AdminUser.php'
          </script>" ;
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