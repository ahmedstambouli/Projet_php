<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>delete agenc</title>
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
        <div class="col"></div>

        <div class="col" style="margin-top: 10%;">

          <?php 
            require 'Agence.php';
            $A = new Agence(null, "", "", "", "", "", "", "");
            
           
          ?>
           <form method="post">
            <h1>Are you sure you want to delete this Agenc</h1>
              <input type="submit" name="supprimer" value="Supprimer" class="btn btn-danger" >
              <input type="submit" name="annuler" value="Annuller" class="btn btn-primary" >
            </form>

          <?php
          
             if (isset($_POST['supprimer'])) {
              $idas=$_GET['ida'];
               $A->supprimer($pdo, $idas);
               header("location:Admineagence.php");
             }

             if (isset($_POST['annuler'])) {
               header("location:Admineagence.php");
             }
           ?>
        </div>
      </div>
    </div>
  </section>
</body>
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