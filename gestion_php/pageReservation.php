<?php
session_start();

include("config.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <?php
        if(isset($_POST['btnRes'])){
            $select = "SELECT * FROM `Ouvrage` WHERE `Code_d_ouvrage` = ' $_POST[btnRes]' ";
            $result = $conn->query($select);
            while($row = $result->fetch()) {
    ?>
    <div class="container mt-5">
        <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <img src="Admin/uploaded_img/<?= $row['Image_'] ;?>" class="card-img-top" alt="image" style="height:400px;">
            <div class="card-body">
                <h5 class="card-title">Title : <?php echo $row['Titre'] ;?>t</h5>
                <p class="card-text">Auteur Name : <?php echo  $row['Auteur'] ;?></p>
                <p class="card-text">Status : <?php echo  $row['Status'] ;?></p>
            </div>
            </div>
        </div>
        <!-- -->
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <form action="Reservation.php" method="post">
                <h5 class="card-title">Ces règles sont les suivantes :</h5>
                <p class="card-text"><i class="fa-solid fa-check"></i>Une personne ne peut pas emprunter, ni réserver plus que trois ouvrages en même temps.</p>
                <p class="card-text"><i class="fa-solid fa-check"></i>Une opération d’emprunt doit être précédée par une réservation.</p>
                <p class="card-text"><i class="fa-solid fa-check"></i>La validité d’une réservation est limitée à 24 h.</p>
                <p class="card-text"><i class="fa-solid fa-check"></i>La durée d’emprunt ne doit pas dépasser 15 jours.</p>
                <p class="card-text"><i class="fa-solid fa-check"></i>Une personne qui remet un ouvrage au-delà des 15 jours, reçoit une pénalité.</p>
                <p class="card-text"><i class="fa-solid fa-check"></i>Une personne qui cumule plus de 3 pénalités n’a pas le droit de continuer à emprunter les ouvrages. Et son compte sera immédiatement verrouillé.</p>
                <p class="card-text"><i class="fa-solid fa-check"></i>Aucune opération ne sera possible sans authentification, même une simple consultation.<?php echo $row['Code_d_ouvrage'] ?></p>
                <p>Merci pour votre compréhension...!</p>
                <button type="submit" name="Reservation" value="<?php echo $row['Code_d_ouvrage'] ?>" style="background: orange" class="w-100 p-3 text-white ">reservation</button>
                <p class="mb-0 mt-2">
                    <strong>Retour:</strong>
                    <a href="Adhérent_page.php" style="text-decoration: none;">Retour</a>
                </p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

    <?php
        };
    };
    // include("Reservation.php");
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>