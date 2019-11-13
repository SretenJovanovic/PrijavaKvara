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
    #pass1,
    #pass2 {
      font-size: 20px;
    }
    .input-box {
      margin: 20px auto;
      width: 80%;
      border-bottom: 1px solid #fff;
      padding-top: 0px;
      padding-bottom: 0px;
    }
    #signup-success {
      color: green;
      position: relative;
      top: 200px;
      font-size: 24px;
      text-align: center;
      background: rgba(0, 0, 0, 0.8);
      margin: auto;
      box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.5);
    }
    #signup-success a {
      color: darkcyan;
    }
    #povratak {
      position: relative;
      font-size: 24px;
      text-align: center;
      background: rgba(0, 0, 0, 0.8);
      margin: auto;
      padding: 10px 0;
      box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.5);
    }
    #povratak a {
      color: lightsteelblue;
    }
    .form-box {
      top: 100px;
    }

  </style>
</head>

<body>

  <div class="pozadina"></div>

  <div id="povratak"><a href="http://localhost/ProjekatX/index.php">Vrati se nazad na pocetnu stranicu!</a></div>

  <?php
    include('includes/dbh.inc.php');
      if (isset($_GET["key"]) && isset($_GET["email"])&& isset($_GET["action"]) && ($_GET["action"]=="reset")&& !isset($_POST["action"])){
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");

        $query = mysqli_query($conn,"SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
        $row = mysqli_num_rows($query);

      if ($row==""){
        $error .= '<h2>Invalid Link</h2>
          <p>The link is invalid/expired. Either you did not copy the correct link from the email,
          or you have already used the key in which case it is deactivated.</p>
          <p><a href="http://localhost/ProjekatX/index1.php">Click here</a> to reset password.</p>';
  	  }else{
  	     $row = mysqli_fetch_assoc($query);
  	     $expDate = $row['expDate'];

      if ($expDate >= $curDate){
  	     ?>
         <br />
      <form class="form-box" method="post" action="" name="update">
        <input type="hidden" name="action" value="update" />
          <h1>Unesite novu lozinku:</h1>
        <div class="input-box">
          <input type="password" name="pass1" id="pass1" maxlength="20" required />
        </div>
          <h1>Ponovo unesite novu lozinku:</h1>
        <div class="input-box">
          <input type="password" name="pass2" id="pass2" maxlength="20" required />
        </div>
        <input type="hidden" name="email" value="<?php echo $email;?>" />
        <button type="submit" class="forgot-btn">PROMENI LOZINKU</button>
      </form>
      <?php

      }else{
        $error .= "<h2>Link je obrisan.</h2>
          <p>Proslo je24h, link je istekao. <br /><br /></p>";
				    }
		    }
      if($error!=""){
	       echo "<div class='error'>".$error."</div><br />";
	      }
      } // isset email key validate end


      if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
        $error="";
        $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
        $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
        $email = $_POST["email"];
        $curDate = date("Y-m-d H:i:s");

      if ($pass1!=$pass2){
		     $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
		}
      if($error!=""){
		      echo "<div class='error'>".$error."</div><br />";
		}else{
			   $pass1 = password_hash($pass1, PASSWORD_DEFAULT);

         mysqli_query($conn,"UPDATE `users` SET `pwdUsers`='".$pass1."' WHERE `emailUsers`='".$email."';");

         mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");

         echo '<div  id="signup-success"><p>Cestitamo! Vasa sifra je uspesno promenjena.</p>
         <p><a href="http://localhost/ProjekatX/login.php">Klikni ovde</a> da se ulogujes.</p></div><br />';
		     }
       }
       ?>

</body>

</html>
