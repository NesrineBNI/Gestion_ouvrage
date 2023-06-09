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

$select ="SELECT * FROM `Reservation` WHERE `valid_admin` = 0";
$result = $conn->query($select);
if($result->rowCount() > 0){
    while($row = $result->fetch()) {
        $ouvrageCode = $row['code_d_ouvrage'];
        $Nickname = $row['Nickname'];
        $reservCode = $row['Reservation_Code'];
        $resedate = $row['Reservation_Date'];
        $limitdate = $row['Date_limite'];
?>

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nickname</th>
            <th>Title</th>
            <th>Reservation Date </th>
            <th>Date limite</th>
            <th>Acceptance</th>
            <th>Reject</th>
          </tr>
        </thead>
        <tbody>
          <?PHP 
            $sql = "SELECT * FROM `Ouvrage` WHERE `code_d_ouvrage` = '$row[code_d_ouvrage]'";
            $result2 = $conn->query($sql);
            while($row2 = $result2->fetch()){
          ?>
          <tr>
            <td> <?php echo $Nickname ?></td>
            <td> <?php echo $row2["Titre"] ?></td>
            <?php
                }
            ?>
            <td> <?php echo $resedate ?></td>
            <td> <?php echo $limitdate ?></td>
            <form action="" method="POST">
            <td>
                <button type="submit" class="btn btn-success" name="btnAccept">
                Acceptance
                </button>
            </td>
            <td>
                <button type="submit" name='btnReject'  class="btn btn-danger">To Reject</button>
            </td>
            </form>
          </tr>
        <?php 
            }
        }else{
        ?>
        </tbody>
      </table>


    </div>
  </div>
</div>

</div>

<?php 
}

if(isset($_POST["btnAccept"])){

    $stmt = $conn->prepare("INSERT INTO `Emprunt`( `Date_emprunt`, `Date_de_retour`,`Reservation_Code`, `Nickname`, `code_d_ouvrage`) 
            VALUES (:empDat ,:retour ,:resevcod ,:nickname ,:ouvcod)");


    date_default_timezone_set("Africa/Casablanca");
    $d = date_create();
    date_modify($d,"+15 days");
    $Date_de_retour = date_format($d ,"Y/m/d-H:i:s");
    $Date_emprunt = date("Y/m/d-H:i:s");


    $stmt->execute([
    'empDat'  => $Date_emprunt,
    'retour'  => $Date_de_retour,
    'resevcod'  => $reservCode,
    'nickname'  => $Nickname ,
    'ouvcod'  => $ouvrageCode,
    // 'returne'  => $return,
    ]);
    
    $sql = "UPDATE `Reservation` SET `valid_admin`='1' WHERE `Reservation_Code` = '$reservCode'";
    $conn->query($sql);
    // header("Location: resevation.php");
};


// btnReject 

if(isset($_POST["btnReject"])){


        // update status table item 
        $sql = "UPDATE `Ouvrage` SET `Status`='Available' WHERE `code_d_ouvrage`= '$itemCode' ";
        $conn->query($sql);

        $sql = "DELETE FROM `Reservation` WHERE `Reservation_Code` = '$reservCode'";
        $conn->query($sql);
        // $result = $db->exec($sql);

}

?>

<!-- /.container-fluid -->

<?php
// include('scriptsadmin.php');
include('footeradmin.php');
?>