<?php
session_start();

include 'config.php';


$user_id = $_SESSION['user_Nickname'];
$pnlt = '';
if (isset($user_id)) {
    $sqlpnlt ="SELECT * FROM `Adhérent` WHERE `Nickname` = '$user_id'";
    $rusltpnlt =$conn->query($sqlpnlt);
    while($rowpnlt = $rusltpnlt->fetch()) {
        $pnlt = $rowpnlt['Nombre_penalite'];
    }
    if($pnlt == 3){
        header("location:Penalty.php");
    }
}else if (!isset($user_id)) {
    header('location:login.php');
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

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    The Books
                </a>
                <!-- <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a> -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Books</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Artists</a>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Schedule</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Contact</a>
                        </li>
                        <li class="nav-item">
                        <?php
                            $select_profile = $conn->prepare("SELECT * FROM `Adhérent` WHERE Nickname = ?");
                            $select_profile->execute([$user_id]);
                            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <a class="nav-link click-scroll" href="">Welcome : <?= $fetch_profile['Nom']; ?></a>
                        </li>
                    </ul>
                    <a href="logout.php" class="btn custom-btn d-lg-block d-none">logout</a>
                </div>
            </div>
        </nav>


        <section class="hero-section" id="section_1">
            <div class="section-overlay">
                <div class="">
                <img src="images/book.jpg" alt="image">
               
            </div>
        </div>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">

                    <div class="col-12 mt-auto mb-5 text-center">
                        <small>Books</small>

                        <h1 class="text-white mb-5">The Books NB</h1>
                        <h2 class=" mb-5" style="color:orangered">Adhérent Page</h2>
                        <!-- <a class="btn custom-btn smoothscroll" href="login.php">LOGIN</a> -->

                                <!-- <label class="form-label text-center" for="form1">Search</label> -->
                            <form action="" method="post" class="input-group">
                                <input type="search" name="inpSearch" id="form1" class="form-control" placeholder="Search...">
                                <button type="submit" name="btnSearch" class="btn btn-warning w-25">
                                <i class="fas fa-search"></i>
                                </button>
                            </form>
                            
                       
                        <!-- <div class="mb-3">
                            <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                            
                        </div>
                        <button type="button" class="btn btn-warning">
                                <i class="fas fa-search"></i>
                            </button> -->

                    </div>

                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                        
                    </div>
                </div>
            </div>

            
        </section>


        <section class="artists-section section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">The Books</h1>
                    </div>
                    <?php 
                    
                    if(isset($_POST['btnSearch'])){
                        $select = "SELECT * FROM `Ouvrage` WHERE `Titre` LIKE '%$_POST[inpSearch]%' ORDER BY `titre` ASC";
                        $result = $conn->query($select);
                        while($row = $result->fetch()) {
                        ?>
                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="Admin/uploaded_img/<?php echo $row['Image_'] ;?>"
                                    class="artists-image img-fluid">
                            </div>

                            <div class="artists-hover">
                                <p>
                                    <strong>Titre:</strong>
                                    <?php echo $row['Titre'] ;?>
                                </p>

                                <p>
                                    <strong>Auteur:</strong>
                                    <?php echo $row['Auteur'] ;?>
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    <?php echo $row['Status'] ;?>
                                </p>

                                <hr>

                                <p class="mb-0">
                                <?php
                                $NickName = "";
                                $user_id = $_SESSION['user_Nickname'];
                    $sqll = "SELECT * FROM `Adhérent` WHERE `Nickname` = '$user_id'";
                    $gitNicmane =  $conn->query($sqll);
                    while($roww = $gitNicmane->fetch()){
                        $NickName = $roww['Nickname'];
                    }

                    $selectreser = "SELECT * FROM `Reservation` WHERE `Nickname` = '$NickName' AND `valid_admin` = 0";
                    $resultreser = $conn->query($selectreser);
                    $selectborow = "SELECT * FROM `Emprunt` WHERE `Nickname` = '$NickName' AND `valiid_return` = 0";
                    $resultborow = $conn->query($selectborow);
                    
                    
                    ?>
                        <?php
                            if($row['Status'] == "Available"){
                                if( $resultreser->rowCount() +  $resultborow->rowCount() < 3){
                                ?>
                                <form action="pageReservation.php" method="POST">
                                    <strong>Reservation:</strong>

                                    <button name="btnRes" value="<?php echo $row['Code_d_ouvrage'] ?>" class="p-2" style="color:orange;background-color:white;border:none"><?php echo $row['Status'] ;?></button>
                                </form>
                                <?php
                                }else{
                                    ?>
                                <!-- <form action="" method="POST"> -->
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#alert"  value="<?php echo $row['Code_d_ouvrage'] ?>" class="p-2" style="color:orange;background-color:white;border:none"><?php echo $row['Status'] ;?></button>
                                <!-- </form> -->
                                <?php
                                }
                            }
                        ?>
                                    <!-- <strong>Reservation:</strong>
                                    <a href="login.php"> Get Login Here</a> -->
                                </p>
                            </div>
                        </div>

                        <!-- <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="images/test.jpg"
                                    class="artists-image img-fluid">
                            </div>

                            <div class="artists-hover">
                                <p>
                                    <strong>Titre:</strong>
                                    Deer Man
                                </p>

                                <p>
                                    <strong>Auteur:</strong>
                                    Geoffroy Delorme
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    Reserved
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Login for reservation:</strong>
                                    <a href="login.php"> Get Login Here</a>
                                </p>
                            </div>
                        </div> -->
                    </div>

                    <!-- <div class="col-lg-5 col-4">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="images/crime.jpg"
                                    class="artists-image img-fluid">
                            </div>

                            <div class="artists-hover">
                                <p>
                                    <strong>Titre:</strong>
                                    Crime
                                </p>

                                <p>
                                    <strong>Auteur:</strong>
                                    Denis Yates
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    Reserved
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Login for reservation:</strong>
                                    <a href="login.php">Get Login Here</a>
                                </p>
                            </div>
                        </div> -->

                        <!-- <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="images/crime.jpg"
                                    class="artists-image img-fluid">
                            </div>

                            <div class="artists-hover">
                                <p>
                                    <strong>Titre:</strong>
                                    SAUTE-LA-PUCE
                                </p>

                                <p>
                                    <strong>Auteur:</strong>
                                    Feb 20, 1988
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    Reserved
                                </p>

                                <hr>

                                <p class="mb-0">
                                    <strong>Login for reservation:</strong>
                                    <a href="login.php">Get Login Here</a>
                                </p>
                            </div>
                        </div> -->
                        <?php 
                        };
                    }
                        ?>
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
                        <!-- <p class="copyright-text">Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p> -->
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
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>