<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <title>User</title>
</head>

<body>


  <?php
  require 'User.php';
  $U = new User(null, "", "", "", "", "", "", "");
  $res = $U->selection($pdo);
  ?>
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
          <a href="../Agence/Admineagence.php">
            <i class="bx bx-collection"></i>
            <span class="link_name">agencies</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../Agence/Admineagence.php">agencies</a></li>
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
          <div class="container text-center">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
              <div class="col">
              </div>
              <div class="col">
              </div>
              <div class="col">
              </div>
              <div class="col">
              </div>
              <div class="col">
                <div class="p-3"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class='bx bxs-user-plus'></i> Add User
                  </button></div>
              </div>
            </div>
          </div>
          <form method="post" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput"  name="fullname">
                      <label for="floatingInput">Full Name</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput"  name="company">
                      <label for="floatingInput">Company</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput"  name="phonenumber">
                      <label for="floatingInput">Phone Number</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="se" id="flexRadioDefault1" value="M">
                      <label class="form-check-label" for="flexRadioDefault1">
                        MAN
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="se" id="flexRadioDefault2" value="W">
                      <label class="form-check-label" for="flexRadioDefault2">
                        women
                      </label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                      <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                      <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                      <input type="file" class="form-control" name="photo">
                      <label for="floatingInput">photo</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btn">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php
        if (isset($_POST['btn'])) {
          $U->FULLNAME = $_POST['fullname'];
          $U->COMPANY = $_POST['company'];
          $U->PHONE_NUMBER = $_POST['phonenumber'];
          $U->SEXE = $_POST['se'];  
          $U->EMAIL = $_POST['email'];
          $U->PASSWORD = $_POST['password'];
          $U->PHOTO = $_FILES['photo']['name'];
          move_uploaded_file($_FILES['photo']['tmp_name'], "../../Admine/User/img/". $U->PHOTO);
          $U->insert($pdo);
        }


        ?>
        <h1>Users</h1>
        <div class="col" style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); border-radius: 2%;">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">FULL NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">COMPANY</th>
                <th scope="col">SEXE</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">PHOTO</th>
                <th scope="col"></th>



              </tr>
            </thead>
            <?php
            $res = $U->selection($pdo);
            while ($row = $res->fetch()) { ?>
              <tbody>
                <tr>
                  <td><?php echo $row['ID'] ?></td>
                  <td><?php echo $row['FULLNAME'] ?></td>
                  <td><?php echo $row['EMAIL'] ?></td>
                  <td><?php echo $row['COMPANY'] ?></td>
                  <td><?php echo $row['SEXE'] ?></td>
                  <td><?php echo $row['PHONE_NUMBER'] ?></td>
                  <td><img src="../../Admine/User/img/<?php echo $row['PHOTO']?>"width="80" height="80"></td>
                  <td>

                    <a class="btn btn-outline-primary" href="updateusr.php?idu=<?php echo $row['ID'] ?>" role="button" >Update</a>
                    <a class="btn btn-outline-danger" href="Supprimeruser.php?idus=<?php echo $row['ID'] ?>" role="button"><i class='bx bxs-trash-alt'></i> Delete</a>
                  </td>
             
                </tr>

              </tbody>

            <?php } ?>
          </table>
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