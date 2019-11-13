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
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/onama.css" type="text/css">
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
  <!--SKRIPTA ZA PROMENU OPISA 1-2-3 -->

  <script type="text/javascript">
    function switchVisible() {
      if (document.getElementById('sreten') !== undefined) {
        if (document.getElementById('sreten').style.display == 'Block') {
          document.getElementById('sreten').style.display = 'none';
          document.getElementById('zoran').style.display = 'Block';
          document.getElementById('andreja').style.display = 'none';
        } else {
          document.getElementById('sreten').style.display = 'Block';
          document.getElementById('zoran').style.display = 'none';
          document.getElementById('andreja').style.display = 'none';
        }
      }
    }

    function switchVisible1() {
      if (document.getElementById('zoran') !== undefined) {
        if (document.getElementById('zoran').style.display == 'Block') {
          document.getElementById('zoran').style.display = 'none';
          document.getElementById('sreten').style.display = 'Block';
          document.getElementById('andreja').style.display = 'none';
        } else {
          document.getElementById('zoran').style.display = 'Block';
          document.getElementById('sreten').style.display = 'none';
          document.getElementById('andreja').style.display = 'none';
        }
      }
    }

    function switchVisible2() {
      if (document.getElementById('andreja') !== undefined) {
        if (document.getElementById('andreja').style.display == 'Block') {
          document.getElementById('andreja').style.display = 'none';
          document.getElementById('zoran').style.display = 'Block';
          document.getElementById('andreja').style.display = 'none';
        } else {
          document.getElementById('andreja').style.display = 'Block';
          document.getElementById('sreten').style.display = 'none';
          document.getElementById('zoran').style.display = 'none';
        }
      }
    }
  </script>

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
      <li class="pocetna">
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
  <!-- Kraj NAVIGACIJE -->


  <!--O NAMA-->

  <section id="vrh" class="opis1">
    <div class="sreten">
      <h1 id="sreten1">Sreten Jovanović<span onclick="switchVisible()">Klikni za detalje.</span></h1>
      <h1>Zoran Spasić<span onclick="switchVisible1()">Klikni za detalje.</span></h1>
      <h1>Andreja Milutinović<span onclick="switchVisible2()">Klikni za detalje.</span></h1>
      <div id="sreten">
        <p><br />
          Ime i prezime : Sreten Jovanović<br />
          Datum rodjenja : 04.07.1993.<br />
          Zanimanje : Mašinski tehničar<br />
          E-mail : sreten93jovanovic@gmail.com<br />
          Telefon : 060/45-00-953
        </p>
        <aside>
          <img src="img/programer1.jpg" />
        </aside>
      </div>
    </div>

    <div class="zoran">
      <div id="zoran">
        <p><br />
          Ime i prezime : Zoran Spasić<br />
          Datum rodjenja : 15.06.1965.<br />
          Zanimanje : Inženjer elektronike<br />
          E-mail : zspasicucenik@gmail.com<br />
          Telefon : 063/238-686
        </p>
        <aside>
          <img src="img/zoki.jpg" />
        </aside>
      </div>
    </div>

    <div class="andreja">
      <div id="andreja">
        <p><br />
          Ime i prezime : Andreja Milutinović<br />
          Datum rodjenja : 16.12.1983.<br />
          Zanimanje : Inženjer saobraćaja<br />
          E-mail : andrejaman@gmail.com<br />
          Telefon : 063/880-10-13
        </p>
        <aside>
          <img src="img/programer.jpg" />
        </aside>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>
  </div>
  <!--END of Footer-->


</body>
<script src="javascript/script.js"></script>

</html>
