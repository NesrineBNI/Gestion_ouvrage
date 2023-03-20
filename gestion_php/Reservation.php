<?php
session_start();
include "config.php";

if(isset($_POST['Reservation'])){
    $btn = $_POST['Reservation'];
    // $conn = '';

        // update status table item 
    $sql = "UPDATE `Ouvrage` SET `Status`='Reserved' WHERE `Code_d_ouvrage`= '$btn' ";
    $conn->query($sql);

    //select Nickname table 
    $NickName = "";
    $user_id = $_SESSION['user_Nickname'];
    $select = "SELECT * FROM `Adhérent` WHERE `Nickname` = '$user_id'";
    $result = $conn->query($select);
    while($row = $result->fetch()) {
        $Nickname = $row['Nickname'];
    };


    date_default_timezone_set("Africa/Casablanca");
    $d = date_create();
    date_modify($d,"+1 days");
    $resExpirDate = date_format($d ,"Y/m/d-H:i:s");
    $resDate = date("Y/m/d-H:i:s");

    $stmt = $conn->prepare("INSERT INTO `Reservation`( `Reservation_Date`, `Date_limite`, `Code_d_ouvrage`, `Nickname`)
                        VALUES (:resDate,:resExpirDate,:ItmCod,:Nickname)");

    $stmt->execute([
        'resDate'  => $resDate,
        'resExpirDate'  => $resExpirDate,
        'ItmCod'  => $btn,
        'Nickname'  => $Nickname ,
    ]);


    header("location:Adhérent_page.php");

}
?>

