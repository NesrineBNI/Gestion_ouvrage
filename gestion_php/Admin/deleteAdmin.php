<?php




if(isset($_POST['btnDelete'])){

$code =  $_POST['btnDelete'] ;

$select2 = "DELETE FROM `Emprunt` WHERE `Code_d_ouvrage` = $code ";
$result2 = $conn->exec($select2);


  $select1 = "DELETE FROM `Reservation` WHERE `Code_d_ouvrage` = $code ";
  $result1 = $conn->exec($select1);


  $select3 = "DELETE FROM `Ouvrage` WHERE `Code_d_ouvrage` = $code  ";
  $result3 = $conn->exec($select3);
  
}
?>