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

                        <!-- <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Contact</a>
                        </li>
                    </ul>

                    <a href="Login.php" class="btn custom-btn d-lg-block d-none">LOGIN</a>
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

                        <a class="btn custom-btn smoothscroll" href="login.php">LOGIN</a>
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

                    <div class="col-lg-5 col-12">
                        <div class="artists-thumb">
                            <div class="artists-image-wrap">
                                <img src="images/Deer.jpg"
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

                    <div class="col-lg-5 col-4">
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
                        </div>

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

                    </div>
            </div>
        </section>

<!-- 
        <section class="schedule-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Event Schedule</h1>

                            <div class="table-responsive">
                                <table class="schedule-table table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>

                                            <th scope="col">Wednesday</th>

                                            <th scope="col">Thursday</th>

                                            <th scope="col">Friday</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Day 1</th>

                                            <td class="table-background-image-wrap pop-background-image">
                                                <h3>Pop Night</h3>

                                                <p class="mb-2">5:00 - 7:00 PM</p>

                                                <p>By Adele</p>

                                                <div class="section-overlay"></div>
                                            </td>

                                            <td style="background-color: #F3DCD4"></td>

                                            <td class="table-background-image-wrap rock-background-image">
                                                <h3>Rock & Roll</h3>

                                                <p class="mb-2">7:00 - 11:00 PM</p>

                                                <p>By Rihana</p>

                                                <div class="section-overlay"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Day 2</th>

                                            <td style="background-color: #ECC9C7"></td>

                                            <td>
                                                <h3>DJ Night</h3>

                                                <p class="mb-2">6:30 - 9:30 PM</p>

                                                <p>By Rihana</p>
                                            </td>

                                            <td style="background-color: #D9E3DA"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Day 3</th>

                                            <td class="table-background-image-wrap country-background-image">
                                                <h3>Country Music</h3>

                                                <p class="mb-2">4:30 - 7:30 PM</p>

                                                <p>By Rihana</p>

                                                <div class="section-overlay"></div>
                                            </td>

                                            <td style="background-color: #D1CFC0"></td>

                                            <td>
                                                <h3>Free Styles</h3>

                                                <p class="mb-2">6:00 - 10:00 PM</p>

                                                <p>By Members</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </section> -->


        <!-- <section class="pricing-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Plans, you' love</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="pricing-thumb">
                            <div class="d-flex">
                                <div>
                                    <h3><small>Early Bird</small> $120</h3>

                                    <p>Including good things:</p>
                                </div>

                                <p class="pricing-tag ms-auto">Save up to <span>50%</span></h2>
                            </div>

                            <ul class="pricing-list mt-3">
                                <li class="pricing-list-item">platform for potential customers</li>

                                <li class="pricing-list-item">digital experience</li>

                                <li class="pricing-list-item">high-quality sound</li>

                                <li class="pricing-list-item">standard content</li>
                            </ul>

                            <a class="link-fx-1 color-contrast-higher mt-4" href="ticket.html">
                                <span>Buy Ticket</span>
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

                    <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                        <div class="pricing-thumb">
                            <div class="d-flex">
                                <div>
                                    <h3><small>Standard</small> $240</h3>

                                    <p>What makes a premium festava?</p>
                                </div>
                            </div>

                            <ul class="pricing-list mt-3">
                                <li class="pricing-list-item">platform for potential customers</li>

                                <li class="pricing-list-item">digital experience</li>

                                <li class="pricing-list-item">high-quality sound</li>

                                <li class="pricing-list-item">premium content</li>

                                <li class="pricing-list-item">live chat support</li>
                            </ul>

                            <a class="link-fx-1 color-contrast-higher mt-4" href="ticket.html">
                                <span>Buy Ticket</span>
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
            </div>
        </section> -->


        <!-- <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Interested? Let's talk</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Contact Form</h5>
                                </button>

                                <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactMap" type="button" role="tab"
                                    aria-controls="nav-ContactMap" aria-selected="false">
                                    <h5>Google Maps</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                    role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name"
                                                    class="form-control" placeholder="Full name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email"
                                                    pattern="[^ @]*@[^ @]*" class="form-control"
                                                    placeholder="Email address" required>
                                            </div>
                                        </div>

                                        <input type="text" name="contact-company" id="contact-company"
                                            class="form-control" placeholder="Company" required>

                                        <textarea name="contact-message" rows="3" class="form-control"
                                            id="contact-message" placeholder="Message"></textarea>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                                aria-labelledby="nav-ContactMap-tab">
                                <iframe class="google-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                 You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                            <!-- </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>  -->
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

                        <!-- <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Artists</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Schedule</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Pricing</a>
                        </li> -->

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