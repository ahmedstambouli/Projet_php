<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/stylecontact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    
  <?php include 'navbar.php' ?>
      <div class="center">
        <h1><span style="color: rgb(238, 117, 12);;">CO</span>NTACT</h1>
      </div>
      
      <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class='bx bx-map' ></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Bizert ghar el melh</div>
                  </div>
                  <div class="phone details">
                    <i class='bx bx-phone' ></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">53804490</div>
                   
                  </div>
                  <div class="email details">
                    <i class='bx bx-envelope' ></i>
                    <div class="topic">Email</div>
                    <div class="text-one">contact@gmail.com</div>
                    
                  </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
              <form action="#">
                <div class="input-box">
                  <input type="text" placeholder="Enter your name">
                </div>
                <div class="input-box">
                  <input type="text" placeholder="Enter your email">
                </div>
                <div class="input-box message-box">
                 
                  <textarea name="" id="" cols="30" rows="10"  placeholder="Enter your message"></textarea>
                </div>
                <div class="button">
                  <input type="button" value="Send Now" >
                </div>
              </form>
            </div>  
            
        </div>
      </div>


      <?php include 'footer.php' ?>

</body>
</html>