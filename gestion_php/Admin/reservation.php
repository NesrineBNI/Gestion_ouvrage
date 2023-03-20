<?php
include('headeradmin.php'); 
include('navbaradmin.php'); 
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin 
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Ouvrage 
            </button> -->
    </h6>
  </div>

  <div class="card-body">

  <?php
//  $itemCode = "";

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

<?php


// $select ="SELECT * FROM borrowings WHERE valiid_return = 0";
// $result = $db->query($select);
// if($result->rowCount() > 0){
//     while($row = $result->fetch()) {

//         $Borrowing_Code = $row['Borrowing_Code'];
//         $itemCode = $row['Item_Code'];
//         $Nickname = $row['Nickname'];
//         $Borrowing_Date = $row['Borrowing_Date'];
//         $Borrowing_Return_Date = $row['Borrowing_Return_Date'];
//         $Reservation_Code = $row['Reservation_Code'];

// ?>

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!-- <th> ID </th> -->
            <th>Nickname</th>
            <th>Title</th>
            <th>Reservation Date </th>
            <th>Date limite</th>
            <!-- <th>type</th>
            <th>Status</th> -->
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
            <!-- <td> <img style="height: 80px;" src="uploaded_img/" alt="image"></td> -->
            <td> <?php echo $resedate ?></td>
            <td> <?php echo $limitdate ?></td>
            <!-- <td></td> -->
            <form action="" method="POST">
            <td>
                    <!-- <input type="hidden" name="edit_id" value=""> -->
                <button type="submit" class="btn btn-success" name="btnAccept">
                Acceptance
                </button>
                    <!-- <button  type="submit" name="edit_btn" class="btn btn-success" value=""> EDIT</button> -->
            </td>
            <td>
            
                <button type="submit" name='btnReject'  class="btn btn-danger">To Reject</button>
                            
            
               
                  <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['Code_d_ouvrage']?>"> DELETE</button> -->
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