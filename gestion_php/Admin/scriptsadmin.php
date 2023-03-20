  <!-- Bootstrap core JavaScript-->
  <script src="vendoradmin/jquery/jquery.min.js"></script>
  <script src="vendoradmin/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendoradmin/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="jsadmin/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendoradmin/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="jsadmin/demo/chart-area-demo.js"></script>
  <script src="jsadmin/demo/chart-pie-demo.js"></script>


  <?php


// $connection = mysqli_connect("localhost","root","","adminpanel");
include('../config.php');
if(isset($_POST['add'])){

    $titre = $_POST['titre'];
    $titre = filter_var($titre, FILTER_SANITIZE_STRING); 
   $auteur = $_POST['auteur'];
   $auteur = filter_var($auteur, FILTER_SANITIZE_STRING);
   $etat = $_POST['état'];
   $etat = filter_var($etat, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $date = $_POST['date'];
   $date = filter_var($date, FILTER_SANITIZE_STRING);
   $dateAch = $_POST['dateAch'];
   $dateAch = filter_var($dateAch, FILTER_SANITIZE_STRING);
   $num = $_POST['num'];
   $num = filter_var($num, FILTER_SANITIZE_STRING);
//    $cpass = md5($_POST['cpass']);
//    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image_']['name'];
   $image_tmp_name = $_FILES['image_']['tmp_name'];
   $image_size = $_FILES['image_']['size'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `Ouvrage` WHERE titre = ? ");
   $select->execute([$titre]);
   if($select->rowCount() > 0){
      $message[] = 'titre ouvrage already exist!';
   }else{
    //   if($pass != $cpass){
    //      $message[] = 'confirm password not matched!';
    //   }
        if($image_size > 2000000){
         $message[] = 'image size is too large!';
        }
    //   else{
         $insert = $conn->prepare("INSERT INTO `Ouvrage`(Titre, Auteur, Image_, Etat,Type,Date_d_édition,Date_d_achat,Nombre_de_pages) VALUES(?,?,?,?,?,?,?,?)");
         $insert->execute([$titre, $auteur,$image,$etat,$type,$date, $dateAch, $num]);
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered succesfully!';
            header('location:admin_page.php');
         }
    //   }
   }

}

?>