<?php
include('headeradmin.php'); 
include('navbaradmin.php'); 
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin 
    </h6>
  </div>

  <div class="card-body">

  <?php

$select ="SELECT * FROM `emprunt` WHERE `valiid_return` = 0";
$result = $conn->query($select);
if($result->rowCount() > 0){
    while($row = $result->fetch()) {
        $EmpruntCode = $row['Emprunt_Code'];
        $CodeOuvrage  = $row['Code_d_ouvrage'];
        $Nickname = $row['Nickname'];
        $DateEmprunt = $row['Date_emprunt'];
        $DateRetour = $row['Date_de_retour'];
        $resedate = $row['Reservation_Code'];
?>

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nickname</th>
            <th>Title</th>
            <th>Date_emprunt </th>
            <th>Date_de_retour</th>
            <th>Valid Emprunt</th>
          </tr>
        </thead>
        <tbody>
          <?PHP 
            $sql = "SELECT * FROM `Ouvrage` WHERE `code_d_ouvrage` = '$CodeOuvrage'";
            $result2 = $conn->query($sql);
            while($row2 = $result2->fetch()){
          ?>
          <tr>
            <td> <?php echo $Nickname ?></td>
            <td> <?php echo $row2["Titre"] ?></td>
            <?php
                }
            ?>
            <td> <?php echo $DateEmprunt ?></td>
            <td> <?php echo $DateRetour ?></td>
            <form action="" method="POST">
            <td>
                <button type="submit" class="btn btn-success" name="btnValid" value="<?php echo $EmpruntCode ?>">
                Valid
                </button>
            </td>
            </form>
          </tr>
        <?php 
            }
            if(isset($_POST['btnValid'])){
                $id = $_POST['btnValid'];
                $sqlborr = "SELECT * FROM `emprunt` WHERE `Emprunt_Code`='$id' ";
                $resultborr = $conn->query($sqlborr);
                while($rowborr = $resultborr->fetch()) {
                    $Nickname = $rowborr['Nickname'];
                    $Borrowing_Return_Date = $rowborr['Date_de_retour'];
                }
                $sqladh = "SELECT * FROM `Adhérent` WHERE `Nickname`= '$Nickname'";
                $resultadh = $conn->query($sqladh);
                while($rowadh = $resultadh->fetch()) {
                    $Penalty = $rowadh['Nombre_penalite'];
                }
                echo  $Penalty ;
                    $sqlUp = "UPDATE `emprunt` SET `valiid_return`='1' WHERE `Emprunt_Code` = '$id'";
                    $conn->query($sqlUp);
        
                $date = date("Y/m/d-H:i:s");
                if($date < $Borrowing_Return_Date){
                    $sqlpn = "UPDATE `Adhérent` SET `Nombre_penalite`= $Penalty + 1 WHERE `Nickname`='$Nickname'";
                    $conn->query($sqlpn);
                    
                }
        
            }
        }
        ?>
        </tbody>
      </table>


    </div>
  </div>
</div>

</div>

<!-- /.container-fluid -->

<?php
// include('scriptsadmin.php');
include('footeradmin.php');
?>