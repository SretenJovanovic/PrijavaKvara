<?php
session_start();
include_once "includes/dbh.inc.php";
$id = $_SESSION['userId'];

if(isset($_POST['submit'])){

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
          if($fileSize < 1000000){
            $fileNameNew = "profile".$id.".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            $sql = "UPDATE slikaprofila SET status = 0 WHERE idUsers='$id';";
            $result = mysqli_query($conn,$sql);
            header("Location: user.php?upload=success");
          }else {
            echo "Fajl je prevelik.";
          }
        }else{
          echo "Desila se greska prilikom dodavanja fajla.";
        }
    }else{
      echo "Pogresna ekstenzija.";
    }
}



 ?>
