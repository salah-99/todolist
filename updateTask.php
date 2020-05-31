<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "zentao";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

$id = $_GET['id'];
$t_id = $_GET['t_id'];
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <title>YouDay-Edit Task</title>
</head>

<body>

<header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
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


  <div class="form" style="margin-top: 15%;">
    <form class="login-form" method="POST" action='<?php echo "taskUpdate.php?id=". $id . "&t_id=" . $t_id ?>'>
      <input type="text" placeholder="Update task"  name="taskText"/>
      <button type="submit">Update Task</button>
    </form>
  </div>  



  <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
