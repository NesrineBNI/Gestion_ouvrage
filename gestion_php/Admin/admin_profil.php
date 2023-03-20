<?php
include('headeradmin.php'); 
include('navbaradmin.php'); 
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profil
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Ouvrage 
            </button> -->
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
            //   $img = $row["Image_"] ;
          ?>
          <tr>
            <td> <?php echo $row["Nom"] ?></td>
            <td> <?php echo $row["Adresse"] ?></td>
            <!-- <td> <img style="height: 80px;" src="uploaded_img/<?php echo $row["Image_"] ?>" alt="image"></td> -->
            <td> <?php echo $row["Email"] ?></td>
            <td> <?php echo $row["Téléphone"] ?></td>
            <td> <?php echo $row["CIN"] ?></td>
            <td> <?php echo $row["Adhérent_type"] ?></td>
            <td>
                    <!-- <input type="hidden" name="edit_id" value=""> -->
                <a href="../logout.php" class="btn btn-danger">
                Logout
                </a>
                
                    <!-- <button  type="submit" name="edit_btn" class="btn btn-success" value=""> EDIT</button> -->
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