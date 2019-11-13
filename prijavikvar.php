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

  <!-- CSS opsti -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/prijaviobrazac.css">
  <!-- CSS za polje prijave kvara -->

  <!-- Link za ikonice-->
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

    #korisnik-box {
      pointer-events: none;
      cursor: default;
    }

    #loader {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.75) url(images/loading2.gif) no-repeat center center;
      z-index: 10000;
    }
    .form-box label {
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

  <!-- NAVIGATION -->

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
      <li class="pocetna">
        <a href="prijavikvar.php">
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
          <p>Prijavi kvar</p>
        </a>
      </li>
      <li>
        <a href="listakvarova.php" target="_blank">
          <i class="fa fa-list" aria-hidden="true"></i>
          <p>Lista kvarova</p>
        </a>
      </li>
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
    <div class="burger">
      <div class="line1">

      </div>
      <div class="line2">

      </div>
      <div class="line3">

      </div>
    </div>
  </nav>
  </div>
  <!--END of nav -->



  <?php

  require "prijavaform.html";

  ?>

  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>
  </div>
  <!--END of Footer-->




  <script src="javascript/script.js"></script>

</body>

</html>
