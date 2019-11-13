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

    #signup-success {
		color: yellow;
		position:relative;
		top:200px;
		font-size: 24px;
		text-align: center;
		background: rgba(0,0,0,0.8);
		margin: auto;
		padding: 50px 0;
		box-shadow: 0 0 20px 2px rgba(0,0,0,0.5);
    }

    .korisnik-box {
      pointer-events: none;
      cursor: default;
    }

    .nav-links a {
      display: block;
      line-height: 40px;
    }
    
.input-box{
  margin: 31px auto;
  width: 80%;
  border-bottom: 1px solid #fff;
  padding-top: 10px;
  padding-bottom: 5px;

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

<?php
include('includes/dbh.inc.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<p>Pogresna email adresa!</p>";
	}else{
	$sel_query = "SELECT * FROM `users` WHERE emailUsers='".$email."'";
	$results = mysqli_query($conn,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<p>Ne postoji korisnik sa ovom email adresom!</p>";
		}
	}
	if($error!=""){
	echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Prethodna stranica</a>";
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = random_bytes(32);
	$key = bin2hex($key);
	
mysqli_query($conn,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Postovani korisnice,</p>';
$output.='<p>Molimo Vas da kliknete na sledeci link kako biste napravili novu lozinku.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://localhost/ProjekatX/create-new-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
http://localhost/ProjekatX/create-new-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Link ce biti obrisan nakon 24h zbog bezbednosti.</p>';
$output.='<p>Hvala,</p>';
$output.='<p>ProjekatX Tim</p>';
$body = $output; 
$subject = "Nova lozinka ProjekatX";

$email_to = $email;
$fromserver = "noreply@yourwebsite.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "projekatx2019@gmail.com"; // Enter your email here
$mail->Password = "sreta4343"; //Enter your passwrod here
$mail->Port = 25;
$mail->IsHTML(true);
$mail->From = "projekatx2019@gmail.com";
$mail->FromName = "ProjekatX";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<p id='signup-success'>Proverite Vaše e-mail sanduče.</p>";
	}

		}	

}else{
?>
<form class="form-box" method="post" action="" name="reset">
<h1>Unesite Vasu email adresu:</h1>
<div class="input-box">
<input id="user" type="email" name="email" placeholder="Username@email.com" />
</div>
<button type="submit" class="forgot-btn">POSALJI ZAHTEV</button>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>


  <!-- Footer -->
  <div class="footer">
    <p>Dizajn: ProjectX company 2019.</p>
  </div>
  <!--END of Footer-->


  <script src="javascript/script.js"></script>

</body>

</html>