<?php
    include_once 'dbh.inc.php';


$sql = "SELECT * FROM prijava";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
while($row= mysqli_fetch_assoc($result)){
echo "<tr>";
  echo "<td>".$row['prijava_id']."</td>";
  echo "<td>".$row['uidUsers']."</td>";
  echo "<td>".$row['racunar_id']."</td>";
  echo "<td>".$row['prioritet_kvara']."</td>";
  echo "<td>".$row['opis_kvara']."</td>";
  echo "<td>".$row['datumPrijave']."</td>";
echo "</tr>";
}}
  ?>
