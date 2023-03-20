<?php
include('headeradmin.php'); 
include('navbaradmin.php'); 
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profil
          
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!-- <th> ID </th> -->
            <th>Nom</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>CIN</th>
            <th>Status</th>
            <!-- <th>EDIT</th> -->
            <th>Logout</th>
          </tr>
        </thead>
        <tbody>
          <?PHP 
            $sql = "SELECT * FROM `Adhérent` wHERE Adhérent_type = 'Admin'";
            $result = $conn->query($sql);
            while($row = $result->fetch()){
          ?>
          <tr>
            <td> <?php echo $row["Nom"] ?></td>
            <td> <?php echo $row["Adresse"] ?></td>
            <td> <?php echo $row["Email"] ?></td>
            <td> <?php echo $row["Téléphone"] ?></td>
            <td> <?php echo $row["CIN"] ?></td>
            <td> <?php echo $row["Adhérent_type"] ?></td>
            <td>
                <a href="../logout.php" class="btn btn-danger">
                Logout
                </a>
            </td>
        <?php 
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