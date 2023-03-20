<?php
include('headeradmin.php'); 
include('navbaradmin.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="scriptsadmin.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> titre </label>
                <input type="text" name="titre" class="form-control" placeholder="Enter titre" required>
            </div>
            <div class="form-group">
                <label>auteur</label>
                <input type="text" name="auteur" class="form-control" placeholder="Enter auteur" required>
            </div>
            <div class="form-group">
            <label>image</label>
            <input type="file" name="image_" required class="box" accept="jpg, png, jpeg">
            </div>
            <select class="form-control mb-2" aria-label="Default select example" required name="état" >
                <option disabled selected>Etat d'ouvrage</option>
                <option value="Neuf">Neuf</option>
                <option value="Bon état">Bon état</option>
                <option value="Acceptable">Acceptable</option>
            </select>
            <select class="form-control" aria-label="Default select example" required name="type" >
                <option disabled selected>type d'ouvrage</option>
                <option value="livre">livre</option>
                <option value="DVD">DVD</option>
                <option value="roman">roman</option>
            </select>
            <div class="form-group">
                <label>date_d_édition</label>
                <input type="date" name="date" class="form-control"  required>
            </div>
            <div class="form-group">
                <label>date_d_achat </label>
                <input type="date" name="dateAch" class="form-control"  required>
            </div>
            <div class="form-group">
                <label>nombre_de_pages</label>
                <input type="number" min=0 name="num" class="form-control"  required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Ouvrage 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!-- <th> ID </th> -->
            <th>titre</th>
            <th>auteur</th>
            <th>image</th>
            <th>état</th>
            <th>type</th>
            <th>Status</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
          <?PHP 
            $sql = "SELECT * FROM `Ouvrage`";
            $result = $conn->query($sql);
            while($row = $result->fetch()){
              $img = $row["Image_"] ;
          ?>
          <tr>
            <td> <?php echo $row["Titre"] ?></td>
            <td> <?php echo $row["Auteur"] ?></td>
            <td> <img style="height: 80px;" src="uploaded_img/<?php echo $row["Image_"] ?>" alt="image"></td>
            <td> <?php echo $row["Etat"] ?></td>
            <td> <?php echo $row["Type"] ?></td>
            <td> <?php echo $row["Status"] ?></td>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $row['Code_d_ouvrage']?>">
                EDIT
                </button>
            </td>
            <td>
            <form action="" method="POST" class="d-flex gap-3">
                            <button type="submit" name='btnDelete' value="<?php echo $row["Code_d_ouvrage"]?>" class="btn btn-danger">DELETE</button>
                            <?php include("deleteAdmin.php"); ?>
            </form>
            </td>
          </tr>
        <?php 
          include("updateModalAdmin.php");
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
include('scriptsadmin.php');
include('footeradmin.php');
?>