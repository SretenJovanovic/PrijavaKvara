<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

  <!-- CSS pocetna -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- CSS za polje prijave -->
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




  <title>ProjekatX</title>
  <style>
    #user,
    #pass {
      font-size: 20px;
    }

    #error {
      color: red;
      text-align: center;
      font-size: 20px;
    }

    .errorlogin {
      position: relative;
      top: 150px;
    }

    .korisnik-box {
      pointer-events: none;
      cursor: default;
    }

    .forgot-btn a {
      color: white;
    }

    .nav-links a {
      display: block;
      line-height: 40px;
    }
  </style>

</head>

<body>

  <div class="pozadina">
  </div>
  <!-- NAVIGACIJA -->

  <nav class="fixed-top">
    <div class="logo">
      <a href="index.php">
        <h4>PROJEKAT X</h4>
      </a>
    </div>

    <ul class="nav-links">
      <li>
        <a href="index.php">
          <i class="fa fa-home" aria-hidden="true"></i>
          <p>Početna</p>
        </a>
      </li>
      <li>
        <a href="onama.php">
          <i class="fa fa-users" aria-hidden="true"></i>
          <p>O nama</p>
        </a>
      </li>
      <?php
      if (isset($_SESSION['userId'])) {
        echo "<li>
          <a href='prijavikvar.php'>
            <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            <p>Prijavi kvar</p>
          </a>
        </li>";
      } else {
        echo "<li class='korisnik-box'>
          <a href='signup.php'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            <p>Prijavi kvar</p></a></li>";
      }
      ?>
      <li>
        <a href="listakvarova.php" target="_blank">
          <i class="fa fa-list" aria-hidden="true"></i>
          <p>Lista kvarova</p>
        </a>
      </li>
      <li class="pocetna">
        <a href="login.php">
          <i class="fa fa-sign-in" aria-hidden="true"></i>
          <p>Prijavi se</p>
        </a>
      </li>
      <li>
        <a href="signup.php">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <p>Registruj se</p>
        </a>
      </li>
    </ul>
    <!--izgled navigacije na manjem uredjaju-->
    <div class="burger">
      <div class="line1">

      </div>
      <div class="line2">

      </div>
      <div class="line3">

      </div>
    </div>
  </nav>
  <!-- END of nav -->

  <!-- Form for login -->

  <form class="form-box" action="includes/login.inc.php" method="post">
    <h1>PRIJAVI SE OVDE</h1>
    <div class="input-box">
      <i class="fa fa-envelope-o"></i>
      <input type="text" placeholder="Username/E-mail..." id="user" name="mailuid">
    </div>
    <div class="input-box">
      <i class="fa fa-key"></i>
      <input type="password" placeholder="Password" id="pass" name="pwd">
      <span class="eye" onclick="myFunction()">
        <i id="hide1" class="fa fa-eye"></i>
        <i id="hide2" class="fa fa-eye-slash"></i>
      </span>
    </div>

    <button type="submit" class="login-btn" value="login" name="login-submit">PRIJAVI SE</button>
    <?php
    if (isset($_GET["newpwd"])) {
      if ($_GET["newpwd"] == "passwordupdated") {
        echo '<p class="signupsuccess">Vaša lozinka je promenjena.</p>';
      }
    }
    ?>
    <button type="button" class="forgot-btn"><a href="reset-password.php">ZABORAVILI STE LOZINKU?</a></button>


    <!--PHP ALERTS-->

  </form>



  <!-- Skripta za prikaz ili sakrivanje passworda -->
  <script>
    function myFunction() {
      var x = document.getElementById("pass");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

      if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
      } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
    }
  </script>
  <!-- END of script-->


  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>
  </div>
  <!--END of Footer-->


  <script src="javascript/script.js"></script>

</body>

<?php
if (!isset($_GET['error'])) {
  exit();
} else {
  $signupCheck = $_GET['error'];
  if ($signupCheck == "emptyfields") {
    echo "<div class='errorlogin'><p id='error'>Niste popunili sva polja!</p></div>";
    exit();
  } else if ($signupCheck == "wrongpwd") {
    echo "<div class='errorlogin'><p id='error'>Pogrešna lozinka!</p></div>";
    exit();
  } else if ($signupCheck == "nouser") {
    echo "<div class='errorlogin'><p id='error'>Ne postoji korisnik!</p></div>";
    exit();
  }
}
?>

</html>