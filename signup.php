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
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




  <title>ProjekatX</title>
  <style>
    .inputs {
      font-size: 20px;
    }

    #success {
      color: green;
      text-align: center;
      font-size: 20px;
    }

    .signup-btn {
      font-weight: bold;
    }

    .errorsignup {
      position: relative;
      top: 150px;
    }

    .korisnik-box {
      pointer-events: none;
      cursor: default;
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
      <li class="onama">
        <a href="onama.php">
          <i class="fa fa-users" aria-hidden="true"></i>
          <p>O nama</p>
        </a>
      </li>
      <?php
      if (isset($_SESSION['userId'])) {
        $ime = $_SESSION['userUid'];
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
      <li>
        <a href="login.php">
          <i class="fa fa-sign-in" aria-hidden="true"></i>
          <p>Prijavi se</p>
        </a>
      </li>
      <li class="pocetna">
        <a href="signup.php">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <p>Registruj se</p>
        </a>
      </li>
    </ul>
    <div class="burger">
      <div class="line1">

      </div>
      <div class="line2">

      </div>
      <div class="line3">

      </div>
    </div>
  </nav>

  <!-- FORM for signup -->
  <form class="form-box" action="includes/signup.inc.php" method="post">
    <h1>REGISTRUJ SE OVDE</h1>

    <div class="input-box">
      <i class="fa fa-user-circle"></i>
      <?php
      if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        echo '<input type="text" name="uid" class="inputs" placeholder="Username" value="' . $uid . '">';
      } else {
        echo '<input type="text" name="uid" class="inputs" placeholder="Username">';
      }
      ?>

    </div>

    <div class="input-box">
      <i class="fa fa-envelope-o"></i>
      <?php
      if (isset($_GET['mail'])) {
        $mail = $_GET['mail'];
        echo '<input type="text" name="mail" class="inputs"  placeholder="E-mail" value="' . $mail . '">';
      } else {
        echo '<input type="text" name="mail" class="inputs"  placeholder="E-mail">';
      }
      ?>

    </div>

    <div class="input-box">
      <i class="fa fa-key"></i>
      <input type="password" name="pwd" class="inputs" placeholder="Password">
    </div>

    <div class="input-box">
      <i class="fa fa-key"></i>
      <input type="password" name="pwd-repeat" class="inputs" placeholder="Repeat password">
    </div>

    <button type="submit" name="signup-submit" class="signup-btn">REGISTRUJ SE</button>

    <!--PHP ALERTS-->

  </form>


  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>
  </div>
  <!--END of Footer-->


  <script src="javascript/script.js"></script>

  <?php
  if (!isset($_GET['signup'])) {
    exit();
  } else {
    $signupCheck = $_GET['signup'];
    if ($signupCheck == "empty") {
      echo "<div class='errorsignup'><p id='error'>Niste popunili sva polja!</p></div>";
      exit();
    } else if ($signupCheck == "char") {
      echo "<div class='errorsignup'><p id='error'>Koristili ste nedozvoljene znakove!</p></div>";
      exit();
    } else if ($signupCheck == "email") {
      echo "<div class='errorsignup'><p id='error'>Nevažeća e-mail adresa!</p></div>";
      exit();
    } else if ($signupCheck == "username") {
      echo "<div class='errorsignup'><p id='error'>Koristili ste nedozvoljene znakove!</p></div>";
      exit();
    } else if ($signupCheck == "passwordcheck") {
      echo "<div class='errorsignup'><p id='error'>Lozinke se ne poklapaju!</p></div>";
      exit();
    } else if ($signupCheck == "usertaken") {
      echo "<div class='errorsignup'><p id='error'>Korisnicko ime vec postoji!</p></div>";
      exit();
    } else if ($signupCheck == "success") {
      echo "<div class='errorsignup'><p id='success'>Uspešno ste se registrovali!</p></div>";
      exit();
    }
  }
  ?>

</body>

</html>