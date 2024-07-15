<?php
session_start();
include './connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <title>ORMS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/pogo-slider.min.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/responsive.css" />
    <link rel="stylesheet" href="./assets/css/custom.css" />
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <h2>Wellcome to ORMS</h2>
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header" style="background-color: white;">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <b style="font-family: Georgia, 'Times New Roman', Times, serif;color:teal;">
                        OUTDOOR RECREATIONS
                    </b>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                    aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Home</a></li>
                        <li><a class="nav-link" href="about.php">About</a></li>

                        <li><a class="nav-link" href="feedback.php">Feedback</a></li>
                        <li>
                            <a class="nav-link" href="login.php">
                                <button class="btn btn" style="background-color: teal;">
                                    <h2 style="color: white;font-size: 13px; margin-top: 10px;"> SIGN IN</h2>
                                </button></a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start Banner -->
    <div class="ulockd-home-slider" style="height: 500px;">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide"
                        style="background-image:url(./assets/images/recre2.jpg); height: 500px;">
                        <div class="container">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide"
                        style="background-image:url(./assets/images/recre5.jpg); height: 500px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3 style="color: white;"><span>We make you feel happiest </span><br>Find the
                                            best recreations from our site</h3>

                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide"
                        style="background-image:url(./assets/images/recre6.jpg); height: 500px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3 style="color: white;"><span>We make you feel happiest </span><br>Find the
                                            best recreations from our site</h3>

                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- section -->
    <div class="section tabbar_menu" style="margin-bottom: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab_menu" style="background-color: teal;">
                        <h2 style="font-family: Georgia, 'Times New Roman', Times, serif;
                         margin-top: 30px;
                         text-align: center;color: white;">
                            We make you feel happiest/ Join with us/ Feel better....
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section margin-top_50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <h2 style="font-size: 30px;">Welcome To Online Recreations</h2>
                        </div>
                        <div class="full">
                            <p>we enhance your experience by providing real-time information
                                on their availability, reducing conflicts and ensuring efficient allocation, users can
                                easily access
                                up-to-date information about various recreation options, including facility
                                availability, program
                                schedules, and special events, facilitating your decision-making.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="full">
                        <img src="./assets/images/recre7.jpeg" style="border-radius: 30px;" "#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2 style="font-size: 30px;">Our popular recreations</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="./assets/images/recre7.jpeg" alt="#" />
                        <h4>National Parks Reserves</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="./assets/images/recre5.jpg" alt="#" />
                        <h4>Land recreations reserve</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="./assets/images/RECRE4.jpg" alt="#" />
                        <h4>Water recreations reserves</h4>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="./assets/images/recre7.jpeg" alt="#" />
                        <h4>National Parks Reserves</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="./assets/images/recre5.jpg" alt="#" />
                        <h4>Land recreations reserve</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="./assets/images/RECRE4.jpg" alt="#" />
                        <h4>Water recreations reserves</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2 style="font-size: 30px;">Stay Informed with the Latest News</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="./assets/images/RECRE4.jpg" alt="#" />
                                            <h4>Recreation 01</h4>
                                            Explore exciting recreational activities
                                            Unwind with leisurely pursuits and relaxation
                                            Discover fun-filled adventures for all ages
                                            Embrace outdoor escapades and indoor amenities
                                            Indulge in rejuvenating spa treatments and wellness
                                            Immerse yourself in cultural and entertainment offerings
                                            Create memorable moments with family and friends
                                            Enhance your leisure experience with our amenities
                                            Experience tranquility and serenity in natural surroundings
                                            Escape the ordinary with our recreational facilities
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="./assets/images/recre3.jpg" alt="#" />
                                            <h4>Recreation 02</h4>
                                            Explore exciting recreational activities
                                            Unwind with leisurely pursuits and relaxation
                                            Discover fun-filled adventures for all ages
                                            Embrace outdoor escapades and indoor amenities
                                            Indulge in rejuvenating spa treatments and wellness
                                            Immerse yourself in cultural and entertainment offerings
                                            Create memorable moments with family and friends
                                            Enhance your leisure experience with our amenities
                                            Experience tranquility and serenity in natural surroundings
                                            Escape the ordinary with our recreational facilities
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="./assets/images/recre5.jpg" alt="#" />
                                            <h4>Recreation 03</h4>
                                            Explore exciting recreational activities
                                            Unwind with leisurely pursuits and relaxation
                                            Discover fun-filled adventures for all ages
                                            Embrace outdoor escapades and indoor amenities
                                            Indulge in rejuvenating spa treatments and wellness
                                            Immerse yourself in cultural and entertainment offerings
                                            Create memorable moments with family and friends
                                            Enhance your leisure experience with our amenities
                                            Experience tranquility and serenity in natural surroundings
                                            Escape the ordinary with our recreational facilities
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="./assets/images/recre6.jpg" alt="#" />
                                            <h4>Recreation 04</h4>
                                            Explore exciting recreational activities
                                            Unwind with leisurely pursuits and relaxation
                                            Discover fun-filled adventures for all ages
                                            Embrace outdoor escapades and indoor amenities
                                            Indulge in rejuvenating spa treatments and wellness
                                            Immerse yourself in cultural and entertainment offerings
                                            Create memorable moments with family and friends
                                            Enhance your leisure experience with our amenities
                                            Experience tranquility and serenity in natural surroundings
                                            Escape the ordinary with our recreational facilities
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" style="background-color:teal;" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" style="background-color:teal;" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->

    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2 style="font-size: 30px;">Testimonies</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $query = "SELECT * FROM info ";
                            $result = mysqli_query($connect, $query);

                            $active_class = 'active';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<div class="carousel-item ' . $active_class . '">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="full testimonial_cont text_align_center">
                                                <div class="person_text">
                                                    <h3>' . $row['name'] . '<br><strong class="orange_color">' . $row['recreation'] . '</strong></h3>
                                                    <p><i class="fa fa-quote-left"></i> ' . $row['feedback'] . ' <i class="fa fa-quote-right"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                $active_class = '';
                            }
                            ?>
                        </div>
7
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
$connect->close();
?>

















    <!-- end section -->
    <!-- Start Footer -->
    <footer class="footer-box" style="background-color: teal;">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer_blog footer_menu white_fonts">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="#">> Join Us</a></li>
                            <li><a href="#">> Facebook</a></li>
                            <li><a href="#">> Instagram</a></li>
                            <li><a href="#">> Tweeter</a></li>
                            <li><a href="#">> Linked In</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer_blog full white_fonts">
                        <h3>Our Services</h3>
                        <p>Recreation managements and reserves services</p>
                        <ul class="full">
                            <li><span>Hospitality</span></li>
                            <li><span>Tourguides operations</span></li>

                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer_blog full white_fonts">
                        <h3>Contact us</h3>
                        <ul class="full">
                            <li><span>Dar Es Salaam-Tanzania</span></li>
                            <li><span>orms.online@gmail.com</span></li>
                            <li><span>+255678767654</span></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- End Footer -->




    <!-- ALL JS FILES -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="./assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./assets/js/jquery.pogo-slider.min.js"></script>
    <script src="./assets/js/slider-index.js"></script>
    <script src="./assets/js/smoothscroll.js"></script>
    <script src="./assets/js/form-validator.min.js"></script>
    <script src="./assets/js/contact-form-script.js"></script>
    <script src="./assets/js/isotope.min.js"></script>
    <script src="./assets/js/images-loded.min.js"></script>
    <script src="./assets/js/custom.js"></script>

</body>

</html>