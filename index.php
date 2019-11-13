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
  <link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">


  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




  <title>ProjekatX</title>
  <style>
    #korisnik {
      color: #1481fc;
      font-size: 25px;
      position: relative;
      line-height: 30px;
      text-transform: capitalize;
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
      <li class="pocetna">
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
      <!--Prikaz polja "prijavi kvar" pre i posle logovanja-->
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
          <a href='#'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
            <p>Prijavi kvar</p></a></li>";
      }
      ?>
      <li>
        <a href="listakvarova.php" target="_blank">
          <i class="fa fa-list" aria-hidden="true"></i>
          <p>Lista kvarova</p>
        </a>
      </li>
      <!--Prikaz polja "prijavi se" pre i posle logovanja-->
      <?php
      if (isset($_SESSION['userId'])) {
        echo '<li>
        <a href="includes/logout.inc.php">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
          <p>Odjavi se</p>
        </a>
      </li>';
      } else {
        echo '<li>
          <a href="login.php">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            <p>Prijavi se</p>
          </a>
        </li>';
      }
      ?>
      <!--Prikaz polja "registruj se" pre i posle logovanja (dodaje se ime korisnika koji je ulogovan)-->
      <?php
      if (isset($_SESSION['userId'])) {
        echo '<li>
          <a href="user.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            <p>Moj profil</p>
          </a>
        </li>';
      } else {
        echo '<li>
          <a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
            <p>Registruj se</p></a></li>';
      }
      ?>

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
  <!--END of nav -->
    <!--2 verzije obavestenja, pre prijave i nakon prijave.-->
  <div>
    <?php
    if (isset($_SESSION['userId'])) {
      echo '<div class="kutija">
<p class="login-status">Uspešno ste se prijavili</p><br />
<p class="login-status">Prijavite kvar pritiskom na<br />
 <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> "PRIJAVI KVAR"</p></div>';
    } else {
      echo '<div class="kutija">
  <p class="login-status">Da bi ste prijavili kvar, potrebno je da se prijavite pritiskom na polje
  <i class="fa fa-sign-in" aria-hidden="true"></i>"PRIJAVI SE"</p></div>';
    }
    ?>
  </div>


  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>


  </div>

  <!--END of Footer-->


</body>

<script src="javascript/script.js"></script>

</html>
