<div class="modal fade" id="edit<?php echo $row['Code_d_ouvrage']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateScriptAdmin.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> titre </label>
                <input type="text" name="titre" value="<?php echo $row['Titre'] ?>" class="form-control" placeholder="Enter titre" required>
            </div>
            <div class="form-group">
                <label>auteur</label>
                <input type="text" name="auteur" value="<?php echo $row['Auteur'] ?>" class="form-control" placeholder="Enter auteur" required>
            </div>
            <div class="form-group">
            <label>image</label>
            <input type="file" name="uploaded_img" value="<?= $img?>" class="form-control" > 
            <input type="hidden" name="imageslink" value="<?= $img?>" >
            <img src="uploaded_img/<?= $img?>" class="rounded-circle" style="width: 50px">
            </div>
            <select class="form-control mb-2" aria-label="Default select example" required name="état" >
                <option disabled selected>Etat d'ouvrage</option>
                <option value="Neuf" <?php if($row['Etat']=="Neuf"){ echo "selected";}?> >Neuf</option>
                <option value="Bon état" <?php if($row['Etat']=="Bon état"){ echo "selected";}?>>Bon état</option>
                <option value="Acceptable" <?php if($row['Etat']=="Acceptable"){ echo "selected";}?>>Acceptable</option>
            </select>
            <select class="form-control mb-2" aria-label="Default select example" required name="type" >
                <option disabled selected>type d'ouvrage</option>
                <option value="livre" <?php if($row['Type']=="livre"){ echo "selected";}?>>livre</option>
                <option value="DVD" <?php if($row['Type']=="DVD"){ echo "selected";}?>>DVD</option>
                <option value="roman" <?php if($row['Type']=="roman"){ echo "selected";}?>>roman</option>
            </select>
            <div class="form-group">
                <label>date_d_édition</label>
                <input type="date" name="date" class="form-control" value="<?php echo $row['Date_d_édition'] ?>"  required>
            </div>
            <div class="form-group">
                <label>date_d_achat </label>
                <input type="date" name="dateAch" class="form-control" value="<?php echo $row['Date_d_achat'] ?>" required>
            </div>
            <div class="form-group">
                <label>nombre_de_pages</label>
                <input type="number" min=0 name="num" class="form-control" value="<?php echo $row['Nombre_de_pages'] ?>" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit" value="<?= $row["Code_d_ouvrage"] ?>" class="btn btn-primary">Edit</button>
        </div>
      </form>

    </div>
  </div>
</div>