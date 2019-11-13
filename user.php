<?php
session_start();
include_once 'includes/dbh.inc.php';
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

    .korisnik-box {
      pointer-events: none;
      cursor: default;
    }

    .nav-links a {
      display: block;
      line-height: 40px;
    }
    .slika1{
      position: absolute;
      z-index: 10;
      width: 200px;
      height: 200px;
      left:700px;
      top:180px;
      border-radius: 50%;
      border: 3px solid white;
    }
    .kutija1{
        position: relative;
        width: 300px;
        background: rgba(0, 0, 0, 0.8);
        margin:auto;
        top: 100px;
        height: 500px;
        padding: 50px 0;
        box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.5);
        border-radius: 40px;
        border: 1px solid white;
    }
    .kutija1 h3{
      color:white;
      font-size:34px;
      position: relative;
      top:-20px;
      text-align: center;
    }
    #tip{
      position: relative;
      top: 210px;
      margin:auto+20px;
      color:white;
      border: 1px solid white;
      width: 260px;
    }
    #dugme{
      position: relative;
      top: 220px;
      margin:auto+20px;
      color:white;
      width:260px;
      height: 30px;
      background-color: rgba(0, 0, 0, 0.8);
    }
    #idkorisnika{
      position: relative;
      left:670px;
      color:white;
      font-size:34px;
      font-weight: bold;
      top:-120px;
      margin-top: 20px;
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
        echo '<li class="pocetna">
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
<?php


    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        $id = $row['idUsers'];

          $sqlImg = "SELECT * FROM slikaprofila WHERE idUsers='$id'";
          $resultImg = mysqli_query($conn,$sqlImg);
          while($rowImg = mysqli_fetch_assoc($resultImg)){
            echo "<div>";
              if($rowImg['status'] == 0){
                echo "<img class='slika1' src='uploads/profile".$id.".jpg'>";
              }else {
                echo "<img class='slika1' src='uploads/profiledefault.jpg'>";
              }
            echo "</div>";
          }
      }
    }


  if (isset($_SESSION['userId'])) {
    if ($_SESSION['userId'] !== 0) {
      echo "";
    }
    echo "<form class='kutija1' action='upload.php' method='POST' enctype='multipart/form-data'>
    <h3>Vasi podaci:</h3>
      <input id='tip' type='file' name='file'>
      <button id='dugme' type='submit' name='submit'>Dodaj/Promeni sliku</button>
    </form>";
  }else{
    echo "Niste ulogovani!";
  }
?>

<?php
      if (isset($_SESSION['userId'])) {
        $id = $_SESSION['userId'];
        $username = $_SESSION['userUid'];
        echo "<p id='idkorisnika'>Korisnik br:  #$id<br/></p>
        <p id='idkorisnika'>Username:  $username<br/></p>";
      } else {
        echo '<a href="login.php">Greska, molimo Vas da se ulogujete!</a>';
      }
      ?>


  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>
  </div>

  <!--END of Footer-->


</body>
<script src="javascript/script.js"></script>

</html>
