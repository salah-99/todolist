<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "zentao";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/boarde.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <title>YouDay</title>
  </head>

  <body style="font-family: 'Poppins';">


    <header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container box_1620">
            <h1 class="navbar-brand logo_h" style="color: white; font-family: 'Poppins Medium'; font-size: x-large;">You<span style="color: #87ecff;">Day</span></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'Poppins Light'; font-size: medium;"><?php echo $_SESSION['username'] ?></a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="Profil.php">Edite Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
                  </ul>
                </li> 
              </ul>
            </div> 
          </div>
        </nav>
      </div>
    </header>


    <section class="home_banner_area">
      <div class="container box_1620">
        <div class="banner_inner d-flex align-items-center">
          <div class="banner_content">
            <div class="media" style="margin-top: -10%; margin-bottom: -10%;">
              <div class="d-flex" style="width: 55%;">
                <img src="<?php echo $_SESSION['image'] ?>" style="width: 480px;height: auto;">
              </div>
              <div class="media-body">
                <div class="personal_text">
                  <h6>Hello </h6>
                  <h3><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></h3>
                  <p>You will begin to realise why this exercise is called the Dickens Pattern (with reference to the ghost showing Scrooge some different futures)</p>
                  <ul class="list basic_info">
                    <li><i class="lnr lnr-calendar-full"><?php echo $_SESSION['email'] ?></i></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="container" style="margin-top: 15%;">
      <div class="row" style="margin-left: 40%;">
        <div class="col-sm-4">
          <div class="mod-add" style='background-color: #7a86fc;'>
            <a onclick="openForm();" class="text-white">Create New List</a>
          </div>
        </div>
      </div>
    </div>


    <div class="container" id="container">
      <div class="row justify-content-center">
        <div class="col-6 col-md-4" style="margin-top: 12px;background: white;opacity:none:padding: 61px;">
          <div class="popup" style="">
            <div class="form-group" id="overlay">
              <form method="POST" action="insertBoard.php">
                <div class="social-containe">
                  <input type="color" class="form-control border-0" name="color" id="color" required="" style="background: none;height: 68px;">
                </div>
                <input type="text" name="name"  placeholder="Add List title" style="width: 100%;margin: 0px 10px 10px 0;padding: 11px;">
                <button type="submit"  class="btn btn-primary" onclick="closeForm();" style="margin: auto;display: flex;">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section style="padding-top:30px" >
      <?php
        $id = $_SESSION['user_id'];
        $user_id = $_SESSION['user_id'];
        $posts = "SELECT * FROM todolist";
        $all_posts = mysqli_query($conn, $posts);
        while ($row = mysqli_fetch_array($all_posts)) {
          if ($row['user_id'] == $_SESSION['user_id']) {
            echo "
            <div class='container' style='margin-left: 40%;'>
              <div class='row'>
                <div class='col'>
                  <div class='board-tile mod-add' style='border-radius:0; cursor:pointer;background-color:" . $row['color'] ."'>
                    <div class='row'>
                      <div class='col-sm-10'>
                        <a href='task.php?id=".$row['todolist_id']."' style=' padding-left: 20px; margin-top:4%;font-size: 20px; display: flex;align-items: center;height: 49px;color:white'>". $row['name'] ."</a>
                      </div>
                      <div class='col-sm-2 d-flex flex-column'>
                        <a href='formDeleteBoard.php?id=".$row['todolist_id']."'><i class='fa fa-close' style='color:white'></i></a>
                        <a href='task.php?id=".$row['todolist_id']."'><i class='fa fa-share' style='color:white'></i></a>
                        <a href='formUpdateBoard.php?id=".$row['todolist_id']."'><i class='fa fa-edit' style='color:white'></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
          }
        }
      ?>
    </section>


    <script>
      function toggle(){
        var blur = document.getElementById('blur');
        blur.classList.toggle('active');
      }
    </script>


    <script>
      const btn = document.getElementById("color");
      const box = document.querySelector(".mod-add");

      for (var i = 0; i <btn.length; i++) {
        btn[i].addEventListener("click", function(){
          box.style.background = this.getAttribute("data-color");
          this.style.color = this.getAttribute("data-color");
        })
      }

      function openForm(){
        document.getElementById("overlay").style.display="block";
      }
      function closeForm(){
        document.getElementById("overlay").style.display="none";

      }
    </script>


    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
