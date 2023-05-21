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
    <title>Agenc</title>
</head>

<body>


    <?php
    require 'Agence.php';
    $A = new Agence(null, "", "", "", "", "", "", "");
     $res = $A->selection($pdo);

    // var_dump($row=$res->fetch()) ;
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
                                        <i class='bx bx-plus-medical'></i> Add agency
                                    </button></div>
                            </div>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add agency</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" name="nameagence">
                                            <label for="floatingInput">Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"  name="phonenumber">
                                            <label for="floatingInput">Phone Number</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" name="location">
                                            <label for="floatingInput">LOCALISATION</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="contact">
                                            <label for="floatingInput">CONTACT</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput"  name="email">
                                            <label for="floatingInput">EMAIL</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="floatingPassword"  name="password">
                                            <label for="floatingPassword">PASSWORD</label>
                                        </div>

                                        <div class="form-floating" style="margin-top: 4%;">
                                            <input type="file" class="form-control" name="photo">
                                            <label for="floatingInput">PHOTO</label>
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
                    $A->NAME = $_POST['nameagence'];
                    $A->LOCALISATION = $_POST['location'];
                    $A->PHONE_NUMBER = $_POST['phonenumber'];
                    $A->CONTACT = $_POST['contact'];
                    $A->EMAIL = $_POST['email'];
                    $A->PASSWORD = $_POST['password'];
                    $A->PHOTO = $_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], "img/" . $A->PHOTO);
                    $A->insert($pdo);
                  
                }
               



                ?>
                <h1>Agence</h1>
                <div class="col" style="padding: 2%; margin-left: 3%;">

                    <div class="row">
                    <?php
            $res = $A->selection($pdo);
            while ($row = $res->fetch()) { ?>
                        <div class="col-sm-4" style="margin-top: 2%;">
                            <div class="card" style="width: 19rem;">
                                <img src="../Agence/img/<?php echo $row['PHOTO'] ?>" class="card-img-top" >
                                 <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['NAME'] ?></h5>
                                    <p class="card-text"></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="font-size: 13px;">EMAIL:<?php echo $row['EMAIL'] ?></li>
                                    <li class="list-group-item"  style="font-size: 16px;">CONTACT:<?php echo $row['CONTACT'] ?></li>
                                    <li class="list-group-item">PHONE NUMBER:<?php echo $row['PHONE_NUMBER'] ?></li>
                                </ul>
                                <div class="card-body">
                                    <a href="UpdateAgence.php?ida=<?php echo $row['ID'] ?>" class="btn btn-primary" type="submit" >EDIT</a>
                                    <a href="supprimerAgence.php?ida=<?php echo $row['ID'] ?>" class="btn btn-danger" type="submit">DELETE</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>


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

function validateForm() {
  let name = document.forms["myForm"]["nameagence"].value;
  let phone_number = document.forms["myForm"]["phonenumber"].value;
  let location = document.forms["myForm"]["location"].value;
  let contact = document.forms["myForm"]["contact"].value;
  let email = document.forms["myForm"]["email"].value;
  let password = document.forms["myForm"]["password"].value;
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
  const isValidPassword = passwordRegex.test(password);

  let photo = document.forms["myForm"]["photo"].value;

  if (name == ""  ) {
    alert("Name must be filled out");
    return false;
  }
  else if (phone_number== ""){
    alert("phone number must be filled out");
    return false;
  }
  else if (location =="")
  {
    alert("location must be filled out");
    return false;
  }
  else if (contact =="")
  {
    alert("location must be filled out");
    return false;
  }
  else if (email =="")
  {
    alert("email must be filled out");
    return false;
  }
  else if (isValidPassword )
  {
    alert("Password must be at least 8 characters long and contain a combination of letters, numbers, and special characters.");
    return false;
  }
  else if (photo =="")
  {
    alert("picture must be filled out");
    return false;
  }
}
</script>

</html>