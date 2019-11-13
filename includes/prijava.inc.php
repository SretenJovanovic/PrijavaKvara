<?php
session_start();
include_once "dbh.inc.php";

$userID = $_SESSION['userUid'];
$racunarid = $_POST['racunar'];
$prioritetkvara = $_POST['prioritet'];
$opiskvara = $_POST['opis'];
$curDate = date("Y-m-d H:i:s");

$sql = "INSERT INTO prijava (uidUsers,racunar_id, prioritet_kvara, opis_kvara, datumPrijave) VALUES ('$userID','$racunarid', '$prioritetkvara', '$opiskvara?','$curDate');";
mysqli_query($conn, $sql);


header("Location:../prijavikvar.php?submit=success");
