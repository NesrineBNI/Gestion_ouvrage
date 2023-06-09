<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {  
    error_reporting(0);
include 'config.php';

session_start();

if(isset($_POST['login'])){

   $nick = $_POST['Nickname'];
   $nick = filter_var($nick, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['mot_de_passe']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select = $conn->prepare("SELECT * FROM `Adhérent` WHERE Nickname = ? AND mot_de_passe = ?");
   $select->execute([$nick, $pass]);
   $row = $select->fetch(PDO::FETCH_ASSOC);

   if($select->rowCount() > 0){

      if($row['Adhérent_type'] == 'Admin'){

         $_SESSION['admin_Nickname'] = $row['Nickname'];
         header('location:Admin/admin_page.php');

      }elseif($row['Adhérent_type'] == 'Adhérent'){

         $_SESSION['user_Nickname'] = $row['Nickname'];
         header('location:Adhérent_page.php');

      }else{
         $message[] = 'no Adhérent found!';
      }

   }else{
      $message[] = 'incorrect Nickname or password!';
   }

}
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

                    <a href="register.php" class="btn custom-btn d-lg-block d-none">Register</a>
                </div>
            </div>
        </nav>


        <section class="ticket-section section-padding">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-10 mx-auto">
                        <form class="custom-form ticket-form mb-5 mb-lg-0" action="" method="POST">
                            <h2 class="text-center mb-4">Get Login Here</h2>
                            <?php
                            if(isset($message)){
                                foreach($message as $message){
                                    echo '
                                    <div class="message">
                                        <span  style="color: red">'.$message.'</span>
                                        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                                    </div>
                                    ';
                                }
                            }
                            ?>
                            <div class="form-body">
                                <div class="row">
                                   
                                </div>

                                    <input type="text" name="Nickname" id="form-name"
                                    class="form-control" placeholder="Nickname"
                                    required>

                                <input type="password" id="form-password"
                                    class="form-control"
                                    placeholder="Password" 
                                    name="mot_de_passe"
                                    required>

                                <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control" name="login">Login</button>
                                </div>
                                <div class="container mt-4">
                                    <p><strong>Create an account</strong> <a href="register.php">Register</a>.</p>
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

</body>

</html>