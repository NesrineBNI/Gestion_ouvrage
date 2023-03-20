<?php
include '../config.php';

// $id = $_GET['code_d_ouvrage'];

if(isset($_POST["edit"])){


    // $imgLink = "";

    // if($_POST["images"]== NULL){
    //     $imgLink = $_POST["imageslink"];
    // }else{
    //     $imgLink = $_POST["images"];

    // };

    function valideLinkeImage(){

        if($_POST["uploaded_img"]== NULL){
            return $_POST["imageslink"];
        }else{
            return $_POST["uploaded_img"];
        };

    }
$valideLinkeImage = valideLinkeImage();

$id =  $_POST["edit"];


// $id =  $_POST["updata"];

try{

    $update = "UPDATE `Ouvrage` SET `Titre`='$_POST[titre]',`Image_`='$valideLinkeImage',
    `Auteur`='$_POST[auteur]',`Etat`='$_POST[état]',`Type`='$_POST[type]',`Date_d_édition`='$_POST[date]',
    `Date_d_achat`='$_POST[dateAch]',`Nombre_de_pages`='$_POST[num]' WHERE Code_d_ouvrage = $id";
    $conn->query($update);
    header('Location: admin_page.php');
    exit();
    }
    catch(PDOException $e) {
        die('error :'.$e->getMessage());
    }
    
    
};

?>