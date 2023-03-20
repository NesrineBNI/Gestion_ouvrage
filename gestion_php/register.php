<?php 
    session_start();

    include 'config.php';

    // value input
    $valueNickname = "";
    $valueFullName = "";
    $valueAddress = "";
    $valueEmail = "";
    $valueTele = "";
    $valueDate = "";
    $valueCin = "";
    $valueType = "";
    $valuePassword = "";

    // value message error
    $Nicknameexists = "";
    $Cinexists ="";
    $Emailexists ="";

    if(isset($_POST['Register'])){

        $nick = $_POST['Nickname'];
        $nick = filter_var($nick, FILTER_SANITIZE_STRING); 
       $nom = $_POST['nom'];
       $nom = filter_var($nom, FILTER_SANITIZE_STRING);
       $adresse = $_POST['adresse'];
       $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
       $email = $_POST['email'];
       $email = filter_var($email, FILTER_SANITIZE_STRING);
       $tele = $_POST['téléphone'];
       $tele = filter_var($tele, FILTER_SANITIZE_STRING);
       $cin = $_POST['C_I_N'];
       $cin = filter_var($cin, FILTER_SANITIZE_STRING);
       $date = $_POST['date_de_naissance'];
       $date = filter_var($date, FILTER_SANITIZE_STRING);
       $type = $_POST['type_d_adhérent'];
       $type = filter_var($type, FILTER_SANITIZE_STRING);
       $pass = md5($_POST['mot_de_passe']);
       $pass = filter_var($pass, FILTER_SANITIZE_STRING);


       $valueFullName = $nom;
       $valueAddress = $adresse;
       $valuePhone = $tele;
       $valueDate = $date;
       $valuePassword = $_POST["mot_de_passe"];
       $valueType = $type;
  
    
       $selectNickname = $conn->prepare("SELECT * FROM `Adhérent` WHERE Nickname = ? ");
       $selectNickname->execute([$nick]);

       $selectCin = $conn->prepare("SELECT * FROM `Adhérent` WHERE CIN = ? ");
       $selectCin->execute([$cin]);

       $selectEmail = $conn->prepare("SELECT * FROM `Adhérent` WHERE Email = ? ");
       $selectEmail->execute([$email]);

       if($selectNickname->rowCount() <= 0 && $selectCin->rowCount() <= 0 && $selectEmail->rowCount() <= 0){
        $insert = $conn->prepare("INSERT INTO `Adhérent`(Nickname, Nom, Adresse, Email,Téléphone,CIN,Date_de_naissance,Type_d_adhérent,Mot_de_passe,Date_d_ouverture_du_compte) VALUES(?,?,?,?,?,?,?,?,?,NOW())");
        $insert->execute([$nick, $nom, $adresse, $email,$tele, $cin, $date, $type,$pass]);
        $_SESSION['Email'] = $email;
        header("location:login.php");

       }else if ($selectEmail->rowCount() <= 0 && $selectCin->rowCount() <= 0 && $selectNickname->rowCount() >= 1 ){
        $valueEmail = $email;
        $valueCin = $cin;
        $Nicknameexists = "The nickname has already been used";
    }else if ($selectEmail->rowCount() <= 0 && $selectCin->rowCount() >= 1 && $selectNickname->rowCount() <= 0 ){
        $valueNickname = $nick;
        $valueEmail = $email;
        $Cinexists ="The CIN  has already been used";
    }else if ($selectEmail->rowCount() >= 1 && $selectCin->rowCount() <= 0 && $selectNickname->rowCount() <= 0 ){
        $valueNickname = $nickname;
        $valueCin = $cin;
        $Emailexists ="The email has already been used";
    }else if ($selectEmail->rowCount() <= 0 && $selectCin->rowCount() >= 1 && $selectNickname->rowCount() >= 1 ){
        echo "error nicname cin";
        $valueEmail = $email;
        $Nicknameexists = "The nickname  has already been used";
        $Cinexists ="The CIN has already been used";
    }else if ($selectEmail->rowCount() >= 1 && $selectCin->rowCount() >= 1 && $selectNickname->rowCount() <= 0 ){
        echo "error cin email";
        $valueNickname = $nick;
        $Cinexists ="The CIN has already been used";
        $Emailexists ="The email has already been used";
    }else if ($selectEmail->rowCount() >= 1 && $selectCin->rowCount() <= 0 && $selectNickname->rowCount() >= 1 ){
        echo "error email  nicname";
        $valueCin = $cin;
        $Emailexists ="The email has already been used";
        $Nicknameexists = "The nickname  has already been used";
    }else{
        echo "error email nicname cin";
        $Emailexists ="The email has already been used";
        $Nicknameexists = "The nickname  has already been used";
        $Cinexists ="The CIN has already been used";

    };

    
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Books</title>
     <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/message.css" rel="stylesheet">


</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    The Books
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_3">Contact</a>
                        </li>
                    </ul>

                    <a href="login.php" class="btn custom-btn d-lg-block d-none">Login</a>
                </div>
            </div>
        </nav>


        <section class="ticket-section section-padding">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-10 mx-auto">
                        <form class="custom-form ticket-form mb-5 mb-lg-0" action="" method="POST" id="form">
                            <h2 class="text-center mb-4">Get Register Here</h2>
                        
                            <div class="ticket-form-body">
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="Nickname" id="nickname"
                                            class="form-control" placeholder="Nickname" 
                                            required value="<?php echo $valueNickname?>">
                                            <div class="text-danger"><?php echo $Nicknameexists?></div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="nom" id="nom"
                                            class="form-control" placeholder="nom"
                                            required value="<?php echo $valueFullName?>">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="adresse" id="adress"
                                            class="form-control" placeholder="adresse"
                                            required value="<?php echo $valueAddress?>">
                                            
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12" id="inputBox">
                                        <input type="email" name="email" id="email"
                                            pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address"
                                            required value="<?php echo $valueEmail?>">
                                            <div class="text-danger"><?php echo $Emailexists ?></div>

                                    </div>
                                    
                                    
                                </div>

                                <input type="number" class="form-control" name="téléphone"
                                    placeholder="Ph 085-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                    required value="<?php echo $valuePhone?>">

                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="C_I_N" id="form-name"
                                            class="form-control" placeholder="CIN"
                                            required value="<?php echo $valueCin?>">
                                            <div class="text-danger"><?php echo $Cinexists ?></div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="date" name="date_de_naissance" id="form-name"
                                            class="form-control" min="1960-01-01" max="2004-12-31" placeholder="date de naissance" 
                                            required value="<?php echo $valueDate?>">
                                            

                                    </div>
                                </div>

                                <input type="password" name="mot_de_passe" id="form-passe"
                                    class="form-control" placeholder="Password" 
                                    required value="<?php echo $valuePassword?>">
                                    


                                    <select class="form-control mb-5" aria-label="Default select example" required name="type_d_adhérent" >
                                        <option disabled selected>Type d'adhérent</option>
                                        <option value="Student" <?php if($valueType == "Student "){ echo "selected";}?>>Student</option>
                                        <option value="salary" <?php if($valueType == "salary "){ echo "selected";}?>>salary</option>
                                        <option value="entrepreneur" <?php if($valueType == "entrepreneur "){ echo "selected";}?>>entrepreneur</option>
                                    </select>

                                <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control" name="Register">Register</button>
                                </div>
                                <div class="container mt-4">
                                    <p><strong>Already have an account ? </strong> <a href="login.php">Login</a>.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </main>


    <footer class="site-footer" id="section_3">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="text-white mb-lg-0">The Books</h2>
                    </div>

                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                        <ul class="social-icon d-flex justify-content-lg-end">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-apple"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-youtube"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-pinterest"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 pb-2">
                    <h5 class="site-footer-title mb-3">Links</h5>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">About</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <h5 class="site-footer-title mb-3">Have a question?</h5>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 090-080-0760" class="site-footer-link">
                            090-080-0760
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:hello@company.com" class="site-footer-link">
                            Books@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                    <h5 class="site-footer-title mb-3">Location</h5>

                    <p class="text-white d-flex mt-3 mb-2">
                        Silang Junction South, Tagaytay, Cavite, Philippines</p>

                    <a class="link-fx-1 color-contrast-higher mt-3" href="#">
                        <span>Our Maps</span>
                        <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="16" cy="16" r="15.5"></circle>
                                <line x1="10" y1="18" x2="16" y2="12"></line>
                                <line x1="16" y1="12" x2="22" y2="18"></line>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mt-5">
                        <p class="copyright-text">Copyright © 2023 The Books</p>
                    </div>

                    <div class="col-lg-8 col-12 mt-lg-5">
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Privacy Policy</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Your Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/validation.js"></script>

</body>

</html>